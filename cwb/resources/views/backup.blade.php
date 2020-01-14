-----------------power bi
<?php
namespace App;
class PowerbiHelper
{
    public static function processPowerbiHttpRequest($url, $header, $data, $method = 'POST')
    {
        $header[] = 'Content-Length:' . strlen($data);
        $context = [
            'http' => [
                'method'  => $method,
                'header'  => implode("\r\n", $header),
                'content' => $data
            ]
        ];
        $content = file_get_contents($url, false, stream_context_create($context));
        if ($content != false) {
            $content = json_decode($content);
        }
        return [
            'content'=> $content,
            'headers'=> $http_response_header,
        ];
    }


    public static function getOffice360AccessToken()
    {
        $data = http_build_query([
            'grant_type'    => 'password',
            'resource'      => 'https://analysis.windows.net/powerbi/api',
            'client_id'     => '727c679c-aa38-4b0e-bafb-95824762d19e',
            'client_secret' => 'YenMDEX1Guv06qGm8fWySvOz4cg3m9OxG4E9G0Dqk78',
            'username'      => 'parmar@ualberta.ca',
            'password'      => 'Atmiya2720',
        ], '', '&');
        $header = [
            "Content-Type:application/x-www-form-urlencoded",
            "return-client-request-id:true",
        ];
        $result = self::processPowerbiHttpRequest('https://login.microsoftonline.com/common/oauth2/token', $header, $data);
        if ($result) {
            return $result['content'];
        }else{
            return null;
        }
    }


    public static function debugPrint($param)
    {
        print '<pre>';
        print_r($param);
        print '</pre>';
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\PowerbiHelper;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::select('customer.*','trk.*')->where('customer.account_type', 'personal')->join('track_reviews as trk','trk.customer_id','=','customer.id')->orderBy('customer.id','DESC')->paginate(10);
       // ->join('regions', 'regions.id', '=', 'branch.region_id')
        $office360token = PowerbiHelper::getOffice360AccessToken();
        if(!is_null($office360token)){

            $url = 'https://api.powerbi.com/v1.0/myorg/datasets/%s/tables/%s/rows';
            $url = sprintf($url, 'YOUR_DATA_SOURCE_ID', 'YOUR_TABLE_ID');

            //$header[] = "content-type: application/json";
            $header = [
                "Authorization:{$office360token->token_type} {$office360token->access_token}",
                "content-type: application/json"
            ];

            $result = PowerbiHelper::processPowerbiHttpRequest($url, $header, json_encode([]), 'DELETE');

            $rows = array();       

            $rows[] = [
                'Date' => $workforce_last->logged_on,
                'TOTAL EMPLOYEE' => 100,
                'ONDUTY' => 80,
                'ON_VACATION' => 10,
                'DAY_OFF' => 3,
                'ON_ESCORT' => 3,
                'RELIEVER' => 4
            ];

            $data = [
                "rows" => $rows
            ];
            $result = PowerbiHelper::processPowerbiHttpRequest($url, $header, json_encode($data), 'POST');

            print_r($result);exit;

        }

        return view('accounts.personal.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Customer::join('account as ac','ac.id','=','customer.account_id')
        ->join('branch as br','br.id','=','customer.branch_id')
        ->join('address as add','add.id','=','customer.address_id')
        ->join('dao as d','d.id','=','customer.dao_id')
        ->join('broker as bk','bk.id','=','customer.broker_id')
        ->join('loan_lending as lo','lo.id','=','customer.loan_lending_id')
        ->join('metrics as ms','ms.id','=','customer.metrics_id')
        ->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('residence as res','res.id','=','pr.residence_id')
        ->join('review as rw','rw.id','=','pr.review_id')
        ->join('personal_review as prr','prr.id','=','pr.personal_review_id')
        ->join('third_party as tp','tp.id','=','pr.third_party_id')
        ->join('average_money as am','am.id','=','pr.average_money_id')
        ->join('intended_use as iu','iu.id','=','pr.intended_use_id')
        ->join('pefp_pep as pfp','pfp.id','=','pr.pefp_pep_id')
        ->join('employer as emp','emp.id','=','pr.employer_id')
        ->join('occupation as occ','occ.id','=','pr.occupation_id')
        ->join('noc as nc','nc.id','=','pr.noc_id')
        ->join('identification as idnt','idnt.id','=','pr.identification_id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','ac.account_number','br.*','add.*','d.*','bk.*','lo.*','ms.*','pr.*','ac.*','res.*','rw.*','prr.*','tp.*','am.*','iu.*','pfp.*','emp.*','occ.*','nc.*','idnt.*')
        ->where('customer.account_type', 'personal')
        ->where('customer.id', $id)->first();

       // print_r($datas['line_1_address']);
        if($datas['line_1_address_legal'] == $datas['cp_address'] )
            $addressline1check = "True";
        else 
            $addressline1check = "False";

        if($datas['customer_city_name_legal'] == $datas['cp_city'] )
            $customercitynamelegal = "True";
        else 
            $customercitynamelegal = "False";

        if($datas['postal_code_legal'] == $datas['cp_postal_code'] )
            $postalcodelegal = "True";
        else 
            $postalcodelegal = "False";

        if($datas['province_state_code_legal'] == $datas['cp_province'] )
            $provincestatecodelegal = "True";
        else 
            $provincestatecodelegal = "False";

        if($datas['total_account_count'] == $datas['total_loan_count'] )
            $totalaccountcount = "YES";
        else 
            $totalaccountcount = "NO";

    
        //exit;   
        return view('accounts.personal.edit',compact('datas','addressline1check','customercitynamelegal','postalcodelegal','provincestatecodelegal','totalaccountcount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //print_r($request->all());exit;
        
        switch ($request['action']) {
        case 'address':
            
            //$data = array_combine($columns, $values);
            $np_track = 0;
            $npr_track = 0;
            if($request['address_def_comm'])
            {
                $np_track = \DB::table('residence')->where('id',$request['residence_id'])->update(
                    array(
                        'address_def_comm'=>$request['address_def_comm']
                    ));

            }
            if($request['address_review'])
            {
                $npr_track = \DB::table('review')->where('id',$request['review_id'])->update(array('address_review'=>$request['address_review']));

            }
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('address_review'=>'1'));
            }
            break;

        case 'ids':
            $np_track = 0;
            $npr_track = 0;
            if($request['id_review'])
            {
                $npr_track = \DB::table('personal_review')->where('id',$request['personal_review_id'])->update(array('id_review'=>$request['id_review']));

            }

            if($npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('id_review'=>'1'));
            }
            break;

        case 'noc':
            $np_track = 0;
            $npr_track = 0;
            if($request['noc_def_comm'] )
            {
                $np_track = \DB::table('noc')->where('id',$request['noc_id'])->update(
                    array(
                        'noc_def_comm'=>$request['noc_def_comm']
                    ));

            }
            if($request['noc_r'])
            {
                $npr_track = \DB::table('personal_review')->where('id',$request['personal_review_id'])->update(array('noc_r'=>$request['noc_r']));

            }
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('noc_review'=>'1'));
            }
            break;

        case 'occupation':
            $np_track = 0;
            $npr_track = 0;
            if($request['occupation_def_comm'] )
            {
                $np_track = \DB::table('occupation')->where('id',$request['occupation_id'])->update(
                    array(
                        'occupation_def_comm'=>$request['occupation_def_comm']
                    ));

            }
            if($request['occupation_review'])
            {
                $npr_track = \DB::table('personal_review')->where('id',$request['personal_review_id'])->update(array('occupation_review'=>$request['occupation_review']));

            }
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('occupation_review'=>'1'));
            }
            break;
        case 'employer':
            $np_track = 0;
            $npr_track = 0;
            if($request['employer_def_comm'] )
            {
                $np_track = \DB::table('employer')->where('id',$request['employer_id'])->update(
                    array(
                        'employer_def_comm'=>$request['employer_def_comm']
                    ));

            }
            
            if($np_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('employer_review'=>'1'));
            }
            break;

        case 'pefp_pep':
            $np_track = 0;
            $npr_track = 0;
            if($request['pefp_pep_def_comm'] )
            {
                $np_track = \DB::table('pefp_pep')->where('id',$request['pefp_pep_id'])->update(
                    array(
                        'pefp_pep_def_comm'=>$request['pefp_pep_def_comm']
                    ));

            }
            if($request['pefp_review'] || $request['pep_review'] )
            {
                $npr_track = \DB::table('personal_review')->where('id',$request['personal_review_id'])->update(array('pefp_review'=>$request['pefp_review'],'pep_review'=>$request['pep_review']));

            }
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('pefp_pep_review'=>'1'));
            }
            break;

        case 'thirdparty':
           $np_track = 0;
            $npr_track = 0;
            if($request['third_party_def_comm'] )
            {
                $np_track = \DB::table('third_party')->where('id',$request['third_party_id'])->update(
                    array(
                        'third_party_def_comm'=>$request['third_party_def_comm']
                    ));

            }
            if($request['third_party'])
            {
                $npr_track = \DB::table('non_personal_review')->where('id',$request['non_personal_review_id'])->update(array('third_party'=>$request['third_party']));

            }
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('third_party_review'=>'1'));
            }
            break;
        case 'intendeduse':
            $np_track = 0;
            $npr_track = 0;
            if($request['intended_use_def_comm'] )
            {
                $np_track = \DB::table('intended_use')->where('id',$request['intended_use_id'])->update(
                    array(
                        'intended_use_def_comm'=>$request['intended_use_def_comm']
                    ));

            }
            if($request['intended_use'])
            {
                $npr_track = \DB::table('non_personal_review')->where('id',$request['non_personal_review_id'])->update(array('intended_use'=>$request['intended_use']));

            }
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('intended_use_review'=>'1'));
            }
            break;

        case 'averagemoney':
            $np_track = 0;
            $npr_track = 0;
            if($request['aaa_def_comm'] )
            {
                $np_track = \DB::table('average_money')->where('id',$request['average_money_id'])->update(
                    array(
                        'aaa_def_comm'=>$request['aaa_def_comm']
                    ));

            }
            if($request['anticipated_acct_activities'])
            {
                $npr_track = \DB::table('non_personal_review')->where('id',$request['non_personal_review_id'])->update(array('anticipated_acct_activities'=>$request['anticipated_acct_activities']));

            }
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('average_money_review'=>'1'));
            }
            break;

            case 'metrics':
            
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('metrics_review'=>'1'));
            break;

            case 'cwb':
            
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('cwb_review'=>'1'));
            break;
        }
        //print_r("In Main Edit");
        //print_r($request->all());
        return redirect()->route('personal.index')
                        ->with('success_msg','review saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function editThisTableData($table,$columns,$values,$id){
       //print_r();
        $data = array_combine($columns, $values);
        $id = \DB::table($table)->where('id',$id)->update($data);
        return $id;
    }


    function csvToArray($filename = '', $delimiter = ',')
        {
            if (!file_exists($filename) || !is_readable($filename))
                return false;

            $header = null;
            $data = array();
            $i = 0;
            if (($handle = fopen($filename, 'r')) !== false)
            {
                
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
                {
                    $num = count($row);
                        if($i == 0){
                            $i++;
                            continue; 
                         }
                   /* if (!$header)
                        $header = $row;
                    else
                        $data[] = $row;
                        // $data[] = array_combine($header, $row);*/
                    for ($c=0; $c < $num; $c++) {
                    $data[$i][] = $row [$c];
                 }
                 $i++;
                }
                fclose($handle);
            }
           // print_r($data);
           // exit;
            return $data;
        }
}

-----------------------end



















edit.blade.php

@extends('layouts.app')
@section('content')
    <div class="row">
        <section class="content">
            
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer Accounts Details</h3>
                    </div>
                	<div class="panel-body">
                	{!! Form::model($datas, array('method' => 'PATCH', 'route' => array('customer.update', $datas->cust_id),'class'=>'form-horizontal','role'=>"form")) !!}
                        <div class="form-group {{ $errors->first('customer_name', 'has-error') }} "> 
                            {{ Form::label('customer_name', 'Customer Name',array('class'=>'col-sm-4 control-label')) }} 
                            <div class="col-sm-3">
                            {{ Form::text('customer_name',null, array('class' => 'form-control')) }}
                            {{ $errors->first('customer_name', '<span class="error">:message</span>') }} 
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('c_cif', 'has-error') }} "> 
                            {{ Form::label('c_cif', 'CIF',array('class'=>'col-sm-4 control-label')) }} 
                            <div class="col-sm-3">
                            {{ Form::text('c_cif', null, array('id'=>'cif','class' => 'form-control')) }}
                            {{ $errors->first('c_cif', '<span class="error">:message</span>') }} 
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#home" class="nav-link active" data-toggle="tab">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" class="nav-link" data-toggle="tab">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#messages" class="nav-link" data-toggle="tab">Messages</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="home">
                                <div class=" col-md-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Address Review</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group {{ $errors->first('line_1_address', 'has-error') }} "> 
                                        {{ Form::label('line_1_address', 'Address Line 1',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_1_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_1_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('line_2_address', 'has-error') }} "> 
                                        {{ Form::label('line_2_address', 'Address Line 2',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_2_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_2_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('line_3_address', 'has-error') }} "> 
                                        {{ Form::label('line_3_address', 'Address Line 3',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_3_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_3_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('customer_city_name', 'has-error') }} "> 
                                        {{ Form::label('customer_city_name', 'City Name',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('customer_city_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('customer_city_name', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('postal_code', 'has-error') }} "> 
                                        {{ Form::label('postal_code', 'Postal Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('postal_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('postal_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('province_state_code', 'has-error') }} "> 
                                        {{ Form::label('province_state_code', 'Province State Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('province_state_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('province_state_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('address_country_code', 'has-error') }} "> 
                                        {{ Form::label('address_country_code', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('address_country_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('address_country_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <p>Profile tab content ...</p>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <p>Messages tab content ...</p>
                            </div>
                        </div>
                        <!-- address -->
                        <div class=" col-md-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Address Review</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group {{ $errors->first('line_1_address', 'has-error') }} "> 
                                        {{ Form::label('line_1_address', 'Address Line 1',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_1_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_1_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('line_2_address', 'has-error') }} "> 
                                        {{ Form::label('line_2_address', 'Address Line 2',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_2_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_2_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('line_3_address', 'has-error') }} "> 
                                        {{ Form::label('line_3_address', 'Address Line 3',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_3_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_3_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('customer_city_name', 'has-error') }} "> 
                                        {{ Form::label('customer_city_name', 'City Name',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('customer_city_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('customer_city_name', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('postal_code', 'has-error') }} "> 
                                        {{ Form::label('postal_code', 'Postal Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('postal_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('postal_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('province_state_code', 'has-error') }} "> 
                                        {{ Form::label('province_state_code', 'Province State Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('province_state_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('province_state_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('address_country_code', 'has-error') }} "> 
                                        {{ Form::label('address_country_code', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('address_country_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('address_country_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- account -->
                        <div class=" col-md-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Account Details</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group {{ $errors->first('account_number', 'has-error') }} "> 
                                        {{ Form::label('account_number', 'Account Number',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('account_number', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('account_number', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('account_open_date', 'has-error') }} "> 
                                        {{ Form::label('account_open_date', 'Account Open Date',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('account_open_date', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('account_open_date', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('account_status_desc', 'has-error') }} "> 
                                        {{ Form::label('account_status_desc', 'Account Status Description',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('account_status_desc', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('account_status_desc', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('product_desc', 'has-error') }} "> 
                                        {{ Form::label('product_desc', 'Product Description',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('product_desc', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('product_desc', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Dao -->
                        <div class=" col-md-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Dao</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group {{ $errors->first('acct_dao_number', 'has-error') }} "> 
                                        {{ Form::label('acct_dao_number', 'Account DAO Number',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('acct_dao_number', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('acct_dao_number', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('acct_dao_fullname', 'has-error') }} "> 
                                        {{ Form::label('acct_dao_fullname', 'Account DAO Full Name',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('acct_dao_fullname', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('acct_dao_fullname', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('account_dao_branch_desc', 'has-error') }} "> 
                                        {{ Form::label('account_dao_branch_desc', 'Account DAO Branch Description',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('account_dao_branch_desc', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('account_dao_branch_desc', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('account_dao_dept', 'has-error') }} "> 
                                        {{ Form::label('account_dao_dept', 'Account DAO Department',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('account_dao_dept', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('account_dao_dept', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('cust_dao_number', 'has-error') }} "> 
                                        {{ Form::label('cust_dao_number', 'Customer DAO Number',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('cust_dao_number', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('cust_dao_number', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('cust_dao_fullname', 'has-error') }} "> 
                                        {{ Form::label('cust_dao_fullname', 'Customer DAO Full Name',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('cust_dao_fullname', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('cust_dao_fullname', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('cust_dao_branch_desc', 'has-error') }} "> 
                                        {{ Form::label('cust_dao_branch_desc', 'Customer DAO Branch Description',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('cust_dao_branch_desc', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('cust_dao_branch_desc', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('cust_dao_dept', 'has-error') }} "> 
                                        {{ Form::label('cust_dao_dept', 'Customer DAO Department',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('cust_dao_dept', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('cust_dao_dept', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('efg_dao', 'has-error') }} "> 
                                        {{ Form::label('efg_dao', 'EFG DAO',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('efg_dao', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('efg_dao', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- broker -->
                        <div class=" col-md-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Broker</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group {{ $errors->first('broker_number', 'has-error') }} "> 
                                        {{ Form::label('broker_number', 'Broker Number',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('broker_number', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('broker_number', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('broker_name', 'has-error') }} "> 
                                        {{ Form::label('broker_name', 'Broker Name',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('broker_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('broker_name', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <!-- loan landing -->
                        <div class=" col-md-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Loan Landing</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group {{ $errors->first('loan_division_code', 'has-error') }} "> 
                                        {{ Form::label('loan_division_code', 'Loan Landing Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('loan_division_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('loan_division_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('loan_division_desc', 'has-error') }} "> 
                                        {{ Form::label('loan_division_desc', 'Loan Division Description',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('loan_division_desc', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('loan_division_desc', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('lending_program_code', 'has-error') }} "> 
                                        {{ Form::label('lending_program_code', 'Lending Program Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('lending_program_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('lending_program_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('lending_program_desc', 'has-error') }} "> 
                                        {{ Form::label('lending_program_desc', 'Lending Program Description',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('lending_program_desc', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('lending_program_desc', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- metrics -->
                        <div class=" col-md-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Metrics</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group {{ $errors->first('joint_total_count', 'has-error') }} "> 
                                        {{ Form::label('joint_total_count', 'Joint Total Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('joint_total_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('joint_total_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('primary_count', 'has-error') }} "> 
                                        {{ Form::label('primary_count', 'Primary Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('primary_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('primary_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('joint_joint_count', 'has-error') }} "> 
                                        {{ Form::label('joint_joint_count', 'Joint Joint Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('joint_joint_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('joint_joint_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('joint_singer_count', 'has-error') }} "> 
                                        {{ Form::label('joint_singer_count', 'Joint Singer Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('joint_singer_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('joint_singer_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('joint_power_of_attorney_count', 'has-error') }} "> 
                                        {{ Form::label('joint_power_of_attorney_count', 'Joint Power of Attorney Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('joint_power_of_attorney_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('joint_power_of_attorney_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('joint_executor_count', 'has-error') }} "> 
                                        {{ Form::label('joint_executor_count', 'Joint Executor Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('joint_executor_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('joint_executor_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('joint_trustee_count', 'has-error') }} "> 
                                        {{ Form::label('joint_trustee_count', 'Joint Trustee Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('joint_trustee_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('joint_trustee_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('joint_tenants_in_common_count', 'has-error') }} "> 
                                        {{ Form::label('joint_tenants_in_common_count', 'Joint Tenants in Common Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('joint_tenants_in_common_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('joint_tenants_in_common_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('joint_guarantor_count', 'has-error') }} "> 
                                        {{ Form::label('joint_guarantor_count', 'Joint Guarantor Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('joint_guarantor_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('joint_guarantor_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('joint_third_party_count', 'has-error') }} "> 
                                        {{ Form::label('joint_third_party_count', 'Joint Third Party Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('joint_third_party_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('joint_third_party_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('joint_other_count', 'has-error') }} "> 
                                        {{ Form::label('joint_other_count', 'Joint Other Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('joint_other_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('joint_other_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('total_account_count', 'has-error') }} "> 
                                        {{ Form::label('total_account_count', 'Total Account Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('total_account_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('total_account_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('total_deposit_count', 'has-error') }} "> 
                                        {{ Form::label('total_deposit_count', 'Total Deposite Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('total_deposit_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('total_deposit_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('total_demand_account_count', 'has-error') }} "> 
                                        {{ Form::label('total_demand_account_count', 'Total Demand Account Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('total_demand_account_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('total_demand_account_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('total_loan_count', 'has-error') }} "> 
                                        {{ Form::label('total_loan_count', 'Total Loan Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('total_loan_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('total_loan_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('total_term_deposit_count', 'has-error') }} "> 
                                        {{ Form::label('total_term_deposit_count', 'Total Term Deposit Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('total_term_deposit_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('total_term_deposit_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('EFG_CIF_count', 'has-error') }} "> 
                                        {{ Form::label('EFG_CIF_count', 'EFG CIF Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('EFG_CIF_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('EFG_CIF_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('CIF_ITF_count', 'has-error') }} "> 
                                        {{ Form::label('CIF_ITF_count', 'CIF ITF Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('CIF_ITF_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('CIF_ITF_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('low_confirm_cif_count', 'has-error') }} "> 
                                        {{ Form::label('low_confirm_cif_count', 'Law Confirm CIF Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('low_confirm_cif_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('low_confirm_cif_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('account_count', 'has-error') }} "> 
                                        {{ Form::label('account_count', 'Account Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('account_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('account_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('itf_account_count', 'has-error') }} "> 
                                        {{ Form::label('itf_account_count', 'ITF Account Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('itf_account_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('itf_account_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('cif_count', 'has-error') }} "> 
                                        {{ Form::label('cif_count', 'CIF Count',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('cif_count', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('cif_count', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  review-->
                        <div class=" col-md-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Review</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group {{ $errors->first('line_1_address', 'has-error') }} "> 
                                        {{ Form::label('line_1_address', 'Address Line 1',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_1_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_1_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('line_2_address', 'has-error') }} "> 
                                        {{ Form::label('line_2_address', 'Address Line 2',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_2_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_2_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('line_3_address', 'has-error') }} "> 
                                        {{ Form::label('line_3_address', 'Address Line 3',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_3_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_3_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('customer_city_name', 'has-error') }} "> 
                                        {{ Form::label('customer_city_name', 'City Name',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('customer_city_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('customer_city_name', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('postal_code', 'has-error') }} "> 
                                        {{ Form::label('postal_code', 'Postal Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('postal_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('postal_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('province_state_code', 'has-error') }} "> 
                                        {{ Form::label('province_state_code', 'Province State Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('province_state_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('province_state_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('address_country_code', 'has-error') }} "> 
                                        {{ Form::label('address_country_code', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('address_country_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('address_country_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- non personal review -->
                        <div class=" col-md-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Non Personal Review</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group {{ $errors->first('line_1_address', 'has-error') }} "> 
                                        {{ Form::label('line_1_address', 'Address Line 1',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_1_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_1_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('line_2_address', 'has-error') }} "> 
                                        {{ Form::label('line_2_address', 'Address Line 2',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_2_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_2_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('line_3_address', 'has-error') }} "> 
                                        {{ Form::label('line_3_address', 'Address Line 3',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('line_3_address', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('line_3_address', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('customer_city_name', 'has-error') }} "> 
                                        {{ Form::label('customer_city_name', 'City Name',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('customer_city_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('customer_city_name', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('postal_code', 'has-error') }} "> 
                                        {{ Form::label('postal_code', 'Postal Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('postal_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('postal_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('province_state_code', 'has-error') }} "> 
                                        {{ Form::label('province_state_code', 'Province State Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('province_state_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('province_state_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('address_country_code', 'has-error') }} "> 
                                        {{ Form::label('address_country_code', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('address_country_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('address_country_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Non Personal  -->
                        <div class=" col-md-offset-2 col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Non Personal</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group {{ $errors->first('cif_status_desc', 'has-error') }} "> 
                                        {{ Form::label('cif_status_desc', 'CIF Status Description',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('cif_status_desc', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('cif_status_desc', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('naics_code', 'has-error') }} "> 
                                        {{ Form::label('naics_code', 'NAICS Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('naics_code', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('naics_code', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('naics_name', 'has-error') }} "> 
                                        {{ Form::label('naics_name', 'Address Line 3',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('naics_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('naics_name', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('naics_sector_name', 'has-error') }} "> 
                                        {{ Form::label('naics_sector_name', 'City Name',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('naics_sector_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('naics_sector_name', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('naics_internal_sector_name', 'has-error') }} "> 
                                        {{ Form::label('naics_internal_sector_name', 'Postal Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('naics_internal_sector_name', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('naics_internal_sector_name', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('naics_lookup', 'has-error') }} "> 
                                        {{ Form::label('naics_lookup', 'Province State Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('naics_lookup', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('naics_lookup', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('naics_prohibited', 'has-error') }} "> 
                                        {{ Form::label('naics_prohibited', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('naics_prohibited', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('naics_prohibited', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('name_holding_but_not_holding_company', 'has-error') }} "> 
                                        {{ Form::label('name_holding_but_not_holding_company', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('name_holding_but_not_holding_company', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('name_holding_but_not_holding_company', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('naics_def_comm', 'has-error') }} "> 
                                        {{ Form::label('naics_def_comm', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('naics_def_comm', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('naics_def_comm', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('accepts_donations_flag', 'has-error') }} "> 
                                        {{ Form::label('accepts_donations_flag', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('accepts_donations_flag', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('accepts_donations_flag', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('registered_charity_flag', 'has-error') }} "> 
                                        {{ Form::label('registered_charity_flag', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('registered_charity_flag', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('registered_charity_flag', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('charity_def_comm', 'has-error') }} "> 
                                        {{ Form::label('charity_def_comm', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('charity_def_comm', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('charity_def_comm', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('review_eligible', 'has-error') }} "> 
                                        {{ Form::label('review_eligible', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('review_eligible', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('review_eligible', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('duplicate_cif_different_branches', 'has-error') }} "> 
                                        {{ Form::label('duplicate_cif_different_branches', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('duplicate_cif_different_branches', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('duplicate_cif_different_branches', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                     <div class="form-group {{ $errors->first('at_least_1', 'has-error') }} "> 
                                        {{ Form::label('at_least_1', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('at_least_1', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('at_least_1', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                     <div class="form-group {{ $errors->first('same_name_different_cif', 'has-error') }} "> 
                                        {{ Form::label('same_name_different_cif', 'Address Country Code',array('class'=>'col-sm-3 control-label')) }} 
                                        <div class="col-sm-5">
                                        {{ Form::text('same_name_different_cif', null, array('id'=>'cif','class' => 'form-control')) }}
                                        {{ $errors->first('same_name_different_cif', '<span class="error">:message</span>') }} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                {{ Form::submit('Update', array('class' => 'btn btn-success submit')) }}
                                {{ link_to_route('customer.index', 'Cancel', null, array('class' => 'btn btn-danger cancel')) }}
                                            <!-- {{ Form::submit('Submit', array('class' => 'btn btn-success submit')) }} -->
                                
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


-----------------------------------------------end------------------------

-------------------excel controller-------------

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Region;
use App\Branch;
class ExcelController extends Controller
{
    //
    public function importExport()
    {
        $data = \App\Customer::orderBy('id','DESC')->paginate(5);
        return view('importExport',compact('data'));
    }
    function createTrackReviewTable($id)
    {
        $data = array(
                'customer_id' => $id
            );
        $track_id = \DB::table('track_reviews')->insertGetId($data);
    }
    function getRegionID($tables, $column, $values)
    {
        $val_br_name = $values[0];
        $val_reg_name = $values[1];

        //region
        $record = \DB::table('regions')->where('region_name',$val_reg_name)->count();
        //print_r($record);
        if($record > 0)
        {
            $data =Region::where('region_name',$val_reg_name)->pluck('id');
            $region_id = $data[0];
        }
        else
        {
             $data = array(
                'region_name' => $val_reg_name,
                'region_code' => ""
            );
            $region_id = \DB::table('regions')->insertGetId($data);
        }

        //branch
        $record = \DB::table('branch')->where('branch_name',$val_br_name)->where('region_id',$region_id)->count();
        //print_r($record);
        if($record > 0)
        {
            $data =Branch::where('branch_name',$val_br_name)->where('region_id',$region_id)->pluck('id');
            $branch_id = $data[0];
        }
        else
        {
             $data = array(
                'branch_name' => $val_br_name,
                'branch_code' => "",
                'region_id' =>$region_id
            );
            $branch_id = \DB::table('branch')->insertGetId($data);
        }
        return $branch_id;
    }

    function getcolumnsvaluesfromexcel($value_ex, $value_tbl, $nonpersonal_csv_data)
    {
        $excelcolumn = array();
        $columns = array();
        $tables = array();
        $values = array();
        foreach ($nonpersonal_csv_data as $key_csv => $value_csv) 
        {
            $all_tables = $nonpersonal_csv_data[$key_csv][1];
            if($value_tbl == $all_tables)
            {
                $excelcolumn[$key_csv] = $nonpersonal_csv_data[$key_csv][0];
                $columns[] = $nonpersonal_csv_data[$key_csv][2];
                $tables[] = $all_tables;

                $val = $value_ex[$excelcolumn[$key_csv]];
                $values[] = $val;
            }
        }
        return array($columns, $values);
    }
    function getForiegnkeys($fnkey_cols,$foreignkeys)
    {
        $new_fnkeys_cols = array();
        $fkey_values = array();
        foreach ($fnkey_cols as $key_fc => $value_fc) 
        {
            $new_fnkeys_cols[$value_fc]=str_replace("_id","",$value_fc);
        }
        foreach ($foreignkeys as $key_fr => $value_fr) 
        {
            foreach ($new_fnkeys_cols as $key_fnr => $value_fnr) 
            {
                if($key_fr == $value_fnr)
                    $fkey_values[$key_fnr] = $value_fr;
            }
        }
        return $fkey_values;
     }
    function getInsertedID($tables, $column, $values)
    {
        //print_r($tables);
        //print_r($values);
        /*$column = "'" . implode ( "', '", $column ) . "'";
        $column = explode(', ', $column);*/
        $data= array_combine($column, $values); 
        //print_r($data);   
        $table = addslashes($tables);
        $id = \DB::table($table)->insertGetId($data);
        //print_r($id);
        return $id;

    }
    public function importExcel(Request $request)
    {
        
        $this->validate($request, [
          'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $parent_tables = ['address', 'account', 'average_money', 'broker', 'dao', 'intended_use','loan_lending',
                     'residence', 'review', 'metrics', 'third_party', 'non_personal_review','branch'];  # parents tables

        $child_tables1 = ['non_personal'];
        $child_tables2 = ['customer'];
        $file = public_path('file/db_map_nonpersonal.csv');

        $nonpersonal_csv_data = $this->csvToArray($file);
        //print_r($nonpersonal_csv_data);exit;

        $path = $request->file('select_file')->getRealPath();

        
        //$data->first()->keys()->toArray() it gives the header of excel
        $nonpersonal_excel_data = Excel::selectSheets('Non_Personal')->load($path, function($reader){
            $reader->setDateFormat('Y-m-d');
            //$reader->ignoreEmpty();
            //$reader->formatDates(false);
        })->get();

        /*$personal_excel_data = Excel::selectSheets('Personal')->load($path, function($reader){
            $reader->setDateFormat('Y-m-d');
            //$reader->ignoreEmpty();
            //$reader->formatDates(false);
        })->get();
        print_r($personal_excel_data);exit;
       */
        if($nonpersonal_excel_data->count() > 0)
        {
          foreach($nonpersonal_excel_data->toArray() as $key_ex => $value_ex)
          {
            //print_r($value_ex['accountbranchdesc']);//3 values of this column
            $foreignkeys = array();
            foreach ($parent_tables as $key_tbl => $value_tbl) 
            {
                $columns = array();
                $values = array();

                list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_tbl, $nonpersonal_csv_data);
                //print_r($columns);
                /*foreach ($nonpersonal_csv_data as $key_csv => $value_csv) 
                {
                    $all_tables = $nonpersonal_csv_data[$key_csv][1];
                    if($value_tbl == $all_tables)
                    {
                        $excelcolumn[$key_csv] = $nonpersonal_csv_data[$key_csv][0];
                        $columns[] = $nonpersonal_csv_data[$key_csv][2];
                        $tables[] = $all_tables;

                        $val = $value_ex[$excelcolumn[$key_csv]];
                        $values[] = $val;
                    }
                }*/

                if($value_tbl == 'branch')
                {
                    $f_id = $this->getRegionID($value_tbl, $columns, $values);
                    //print_r("region");
                }
                else
                {
                    $f_id = $this->getInsertedID($value_tbl, $columns, $values);
                    //print_r($f_id);
                }
                $foreignkeys[$value_tbl] = $f_id;
            }
            //print_r($foreignkeys);

            foreach ($child_tables1 as $key_ch => $value_ch) 
            {
                $columns = array();
                $values = array();

                list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_ch, $nonpersonal_csv_data);
                //print_r($columns);
                if($value_ch == 'non_personal')
                {
                    $fnkey_cols = ['residence_id', 'review_id', 'non_personal_review_id', 'third_party_id', 'average_money_id', 'intended_use_id'];
                    $fkey_values = array();

                    $fkey_values = $this->getForiegnkeys($fnkey_cols,$foreignkeys);
                    /*foreach ($fnkey_cols as $key_fc => $value_fc) {

                         $new_fnkeys_cols[$value_fc]=str_replace("_id","",$value_fc);
                    }
                    foreach ($foreignkeys as $key_fr => $value_fr) 
                    {
                        foreach ($new_fnkeys_cols as $key_fnr => $value_fnr) 
                        {
                            if($key_fr == $value_fnr)
                                $fkey_values[$key_fnr] = $value_fr;
                        }
                    }*/
                    //print_r($fkey_values);
                    foreach ($fkey_values as $key => $value) {

                        array_push($columns, $key);
                        array_push($values, $value);
                    }
                    //print_r($columns);
                    //print_r($values);

                    $f_id = $this->getInsertedID($value_ch, $columns, $values);
                    $foreignkeys['account_type'] = $f_id;
                }
            }
            //for non personal table
            foreach ($child_tables2 as $key_ch => $value_ch) 
            {
                $columns = array();
                $values = array();

                list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_ch, $nonpersonal_csv_data);
                //print_r($columns);
                if($value_ch == 'customer')
                {
                    $fnkey_cols = ['metrics_id', 'loan_lending_id', 'broker_id', 'dao_id', 'address_id','branch_id','account_id','account_type_id'];
                    $fkey_values = array();

                    $fkey_values = $this->getForiegnkeys($fnkey_cols,$foreignkeys);
                    //print_r($fkey_values);
                    foreach ($fkey_values as $key => $value) {

                        array_push($columns, $key);
                        array_push($values, $value);
                    }
                    array_push($columns, 'account_type');
                    array_push($values, 'non_personal');
                    //print_r($columns);
                    //print_r($values);

                    $f_id = $this->getInsertedID($value_ch, $columns, $values);
                    //$foreignkeys[$value_ch] = $f_id;
                    //print_r("success");
                    $track_id=$this->createTrackReviewTable($f_id);
                }
            }
          }
      }
    //exit;
    return redirect()->route('customer.index')
                        ->with('success','Data Added');
    }
            

    //csv to array conversion
    public function getimportcsv()
    {
        
        return view('importcsv');
    }
    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        $i = 0;
        if (($handle = fopen($filename, 'r')) !== false)
        {
            
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                $num = count($row);
                    if($i == 0){
                        $i++;
                        continue; 
                     }
               /* if (!$header)
                    $header = $row;
                else
                    $data[] = $row;
                    // $data[] = array_combine($header, $row);*/
                for ($c=0; $c < $num; $c++) {
                $data[$i][] = $row [$c];
             }
             $i++;
            }
            fclose($handle);
        }
       // print_r($data);
       // exit;
        return $data;
    }

    public function importCsv()
    {
        
          ini_set('memory_limit','256M');
        $data = Excel::selectSheets('nonpersonal')->load('file\review_data.xlsx', function($reader) {
                $results = $reader->get();
                //$reader->select(array('firstname', 'lastname'))->get();
                print_r($results);
            });
        exit;

        $file = public_path('file/db_map_nonpersonal.csv');
        

        $customerArr = $this->csvToArray($file);
        //dd(count($customerArr));exit;
        $excelcolumn = array();
        $tables = array();
        $databasecolumn = array();

        for ($i = 0; $i < count($customerArr); $i++)
        {
            for($j=0; $j< count($customerArr[$i]); $j++)
            {
                if($j == 0)
                {
                    $excelcolumn[$i] = $customerArr[$i][$j];
                }
                elseif ($j == 1)
                {
                    $tables[$i] = $customerArr[$i][$j];
                }
                elseif ($j == 2) 
                {
                    $databasecolumn[$i] = $customerArr[$i][$j];
                }
            }
        }
            print_r($databasecolumn);
        //print("hi");
        print_r("\n");
        

        exit;
        return 'Jobi done or what ever';    
            
    }
}


------------------------end----------------------


---------------extra-------------

---------------------close------------