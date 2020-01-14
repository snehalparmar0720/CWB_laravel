<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Region;
use App\Branch;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::select('customer.*','customer.id as cid','trk.*','br.*','region_name')->where('customer.account_type', 'personal')->join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id')->join('track_reviews as trk','trk.customer_id','=','customer.id')->orderBy('customer.id','DESC')->paginate(10);
       
        
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

       /*print_r($datas['branch_name']);
       exit;*/
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
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('address_review_track'=>'1'));
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
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('id_review_track'=>'1'));
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
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('noc_review_track'=>'1'));
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
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('occupation_review_track'=>'1'));
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
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('employer_review_track'=>'1'));
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
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('pefp_pep_review_track'=>'1'));
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
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('third_party_review_track'=>'1'));
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
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('intended_use_review_track'=>'1'));
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
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('average_money_review_track'=>'1'));
            }
            break;

            case 'metrics':
            
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('metrics_review_track'=>'1'));
            break;

            case 'cwb':
            
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('cwb_review_track'=>'1'));
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


    public function getPDeficiency()
    {
        
        //address review
        $rating1 = \DB::table('personal')
                 ->join('review as rv','rv.id','=','personal.review_id')
                 ->select('address_review', \DB::raw('count(*) as address_review_total'))
                 ->groupBy('address_review')
                 ->havingRaw('address_review = 1')
                 ->get();
        $rating2 = \DB::table('personal')
                 ->join('review as rv','rv.id','=','personal.review_id')
                 ->select('address_review', \DB::raw('count(*) as address_review_total'))
                 ->groupBy('address_review')
                 ->havingRaw('address_review = 2')
                 ->get();
        $rating3 = \DB::table('personal')
                 ->join('review as rv','rv.id','=','personal.review_id')
                 ->select('address_review', \DB::raw('count(*) as address_review_total'))
                 ->groupBy('address_review')
                 ->havingRaw('address_review = 3')
                 ->get();
        $address_review_rating1=0;
        $address_review_rating2=0;
        $address_review_rating3=0;
        if(count($rating1)>0)
            $address_review_rating1 = $rating1[0]->address_review_total;
        if(count($rating2)>0)
            $address_review_rating2 = $rating2[0]->address_review_total;
        if(count($rating3)>0)
            $address_review_rating3 = $rating3[0]->address_review_total;

        //ID review
        $id_rating1 = \DB::table('personal_review')
                 ->select('id_review', \DB::raw('count(*) as id_review_total'))
                 ->groupBy('id_review')
                 ->havingRaw('id_review = 1')
                 ->get();
        $id_rating2 = \DB::table('personal_review')
                 ->select('id_review', \DB::raw('count(*) as id_review_total'))
                 ->groupBy('id_review')
                 ->havingRaw('id_review = 2')
                 ->get();
        $id_rating3 = \DB::table('personal_review')
                 ->select('id_review', \DB::raw('count(*) as id_review_total'))
                 ->groupBy('id_review')
                 ->havingRaw('id_review = 3')
                 ->get();
        $id_review_rating1=0;
        $id_review_rating2=0;
        $id_review_rating3=0;
        if(count($id_rating1)>0)
            $id_review_rating1 = $id_rating1[0]->id_review_total;
        if(count($id_rating2)>0)
            $id_review_rating2 = $id_rating2[0]->id_review_total;
        if(count($id_rating3)>0)
            $id_review_rating3 = $id_rating3[0]->id_review_total;

        //noc review
        $noc_rating1 = \DB::table('personal_review')
                 ->select('noc_r', \DB::raw('count(*) as noc_review_total'))
                 ->groupBy('noc_r')
                 ->havingRaw('noc_r = 1')
                 ->get();
        $noc_rating2 = \DB::table('personal_review')
                 ->select('noc_r', \DB::raw('count(*) as noc_review_total'))
                 ->groupBy('noc_r')
                 ->havingRaw('noc_r = 2')
                 ->get();
        $noc_rating3 = \DB::table('personal_review')
                 ->select('noc_r', \DB::raw('count(*) as noc_review_total'))
                 ->groupBy('noc_r')
                 ->havingRaw('noc_r = 3')
                 ->get();
        $noc_review_rating1=0;
        $noc_review_rating2=0;
        $noc_review_rating3=0;
        if(count($noc_rating1)>0)
            $noc_review_rating1 = $noc_rating1[0]->noc_review_total;
        if(count($noc_rating2)>0)
            $noc_review_rating2 = $noc_rating2[0]->noc_review_total;
        if(count($noc_rating3)>0)
            $noc_review_rating3 = $noc_rating3[0]->noc_review_total;      
       // print_r($id_rating1);exit;

        //occupation review
        $occupation_rating1 = \DB::table('personal_review')
                 ->select('occupation_review', \DB::raw('count(*) as occupation_review_total'))
                 ->groupBy('occupation_review')
                 ->havingRaw('occupation_review = 1')
                 ->get();
        $occupation_rating2 = \DB::table('personal_review')
                 ->select('occupation_review', \DB::raw('count(*) as occupation_review_total'))
                 ->groupBy('occupation_review')
                 ->havingRaw('occupation_review = 2')
                 ->get();
        $occupation_rating3 = \DB::table('personal_review')
                 ->select('occupation_review', \DB::raw('count(*) as occupation_review_total'))
                 ->groupBy('occupation_review')
                 ->havingRaw('occupation_review = 3')
                 ->get();
        $occupation_review_rating1=0;
        $occupation_review_rating2=0;
        $occupation_review_rating3=0;
        if(count($occupation_rating1)>0)
            $occupation_review_rating1 = $occupation_rating1[0]->occupation_review_total;
        if(count($occupation_rating2)>0)
            $occupation_review_rating2 = $occupation_rating2[0]->occupation_review_total;
        if(count($occupation_rating3)>0)
            $occupation_review_rating3 = $occupation_rating3[0]->occupation_review_total;

        //pefp review
        $pefp_rating1 = \DB::table('personal_review')
                 ->select('pefp_review', \DB::raw('count(*) as pefp_review_total'))
                 ->groupBy('pefp_review')
                 ->havingRaw('pefp_review = 1')
                 ->get();
        $pefp_rating2 = \DB::table('personal_review')
                 ->select('pefp_review', \DB::raw('count(*) as pefp_review_total'))
                 ->groupBy('pefp_review')
                 ->havingRaw('pefp_review = 2')
                 ->get();
        $pefp_rating3 = \DB::table('personal_review')
                 ->select('pefp_review', \DB::raw('count(*) as pefp_review_total'))
                 ->groupBy('pefp_review')
                 ->havingRaw('pefp_review = 3')
                 ->get();
        $pefp_review_rating1=0;
        $pefp_review_rating2=0;
        $pefp_review_rating3=0;
        if(count($pefp_rating1)>0)
            $pefp_review_rating1 = $pefp_rating1[0]->pefp_review_total;
        if(count($pefp_rating2)>0)
            $pefp_review_rating2 = $pefp_rating2[0]->pefp_review_total;
        if(count($pefp_rating3)>0)
            $pefp_review_rating3 = $pefp_rating3[0]->pefp_review_total;

        //pep review
        $pep_rating1 = \DB::table('personal_review')
                 ->select('pep_review', \DB::raw('count(*) as pep_review_total'))
                 ->groupBy('pep_review')
                 ->havingRaw('pep_review = 1')
                 ->get();
        $pep_rating2 = \DB::table('personal_review')
                 ->select('pep_review', \DB::raw('count(*) as pep_review_total'))
                 ->groupBy('pep_review')
                 ->havingRaw('pep_review = 2')
                 ->get();
        $pep_rating3 = \DB::table('personal_review')
                 ->select('pep_review', \DB::raw('count(*) as pep_review_total'))
                 ->groupBy('pep_review')
                 ->havingRaw('pep_review = 3')
                 ->get();
        $pep_review_rating1=0;
        $pep_review_rating2=0;
        $pep_review_rating3=0;
        if(count($pep_rating1)>0)
            $pep_review_rating1 = $pep_rating1[0]->pep_review_total;
        if(count($pep_rating2)>0)
            $pep_review_rating2 = $pep_rating2[0]->pep_review_total;
        if(count($pep_rating3)>0)
            $pep_review_rating3 = $pep_rating3[0]->pep_review_total;

        //third_party review
        $third_party_rating1 = \DB::table('personal_review')
                 ->select('third_party', \DB::raw('count(*) as third_party_review_total'))
                 ->groupBy('third_party')
                 ->havingRaw('third_party = 1')
                 ->get();
        $third_party_rating2 = \DB::table('personal_review')
                 ->select('third_party', \DB::raw('count(*) as third_party_review_total'))
                 ->groupBy('third_party')
                 ->havingRaw('third_party = 2')
                 ->get();
        $third_party_rating3 = \DB::table('personal_review')
                 ->select('third_party', \DB::raw('count(*) as third_party_review_total'))
                 ->groupBy('third_party')
                 ->havingRaw('third_party = 3')
                 ->get();
        $third_party_review_rating1=0;
        $third_party_review_rating2=0;
        $third_party_review_rating3=0;
        if(count($third_party_rating1)>0)
            $third_party_review_rating1 = $third_party_rating1[0]->third_party_review_total;
        if(count($third_party_rating2)>0)
            $third_party_review_rating2 = $third_party_rating2[0]->third_party_review_total;
        if(count($third_party_rating3)>0)
            $third_party_review_rating3 = $third_party_rating3[0]->third_party_review_total;

        //intended_use review
        $intended_use_rating1 = \DB::table('personal_review')
                 ->select('intended_use', \DB::raw('count(*) as intended_use_review_total'))
                 ->groupBy('intended_use')
                 ->havingRaw('intended_use = 1')
                 ->get();
        $intended_use_rating2 = \DB::table('personal_review')
                 ->select('intended_use', \DB::raw('count(*) as intended_use_review_total'))
                 ->groupBy('intended_use')
                 ->havingRaw('intended_use = 2')
                 ->get();
        $intended_use_rating3 = \DB::table('personal_review')
                 ->select('intended_use', \DB::raw('count(*) as intended_use_review_total'))
                 ->groupBy('intended_use')
                 ->havingRaw('intended_use = 3')
                 ->get();
        $intended_use_review_rating1=0;
        $intended_use_review_rating2=0;
        $intended_use_review_rating3=0;
        if(count($intended_use_rating1)>0)
            $intended_use_review_rating1 = $intended_use_rating1[0]->intended_use_review_total;
        if(count($intended_use_rating2)>0)
            $intended_use_review_rating2 = $intended_use_rating2[0]->intended_use_review_total;
        if(count($intended_use_rating3)>0)
            $intended_use_review_rating3 = $intended_use_rating3[0]->intended_use_review_total;




        return view('accounts.personal.personal_deficiency',compact('address_review_rating1','address_review_rating2','address_review_rating3','id_review_rating1','id_review_rating2','id_review_rating3','noc_review_rating1','noc_review_rating2','noc_review_rating3','occupation_review_rating1','occupation_review_rating2','occupation_review_rating3','pefp_review_rating1','pefp_review_rating2','pefp_review_rating3','pep_review_rating1','pep_review_rating2','pep_review_rating3','third_party_review_rating1','third_party_review_rating2','third_party_review_rating3','intended_use_review_rating1','intended_use_review_rating2','intended_use_review_rating3'));
    }

    public function getAddressReview()
    {
        

        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where('customer.'.$column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        $data = $data->join('address as add','add.id','=','customer.address_id')
        ->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('review as rw','rw.id','=','pr.review_id')
        ->join('residence as res','res.id','=','pr.residence_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','add.*','pr.*','rw.*','region_name','trk.*','res.*','rw.address_review as addressreview','trk.address_review_track as trk_address_review')
        ->where('customer.account_type', 'personal')
        ->orderBy('br.id')
        ->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')->orderBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.addressreview',compact('data','branch'));
    }

    public function postAddressReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        $npr_track = 0;
        if($request['address_def_comm'][$check])
        {
            $np_track = \DB::table('residence')->where('id',$request['residence_id'][$check])->update(
                array(
                    'address_def_comm'=>$request['address_def_comm'][$check]
                ));

        }
        if($request['address_review'][$check])
        {
            $npr_track = \DB::table('review')->where('id',$request['review_id'][$check])->update(array('address_review'=>$request['address_review'][$check]));

        }
        if($np_track == '1' || $npr_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('address_review_track'=>'1'));
// print_r($d);exit;
        }
        // exit;
        return redirect()->route('address_review_personal')
                        ->with('success_msg','review saved successfully');

    }
     //ID review
    public function getIDReview()
    {
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where($column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        $data = $data->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('personal_review as prr','prr.id','=','pr.personal_review_id')
        ->join('identification as idnt','idnt.id','=','pr.identification_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','pr.*','region_name','trk.*','trk.id_review_track as trk_id_review','idnt.*','prr.*')
        ->where('customer.account_type', 'personal')->orderBy('br.id')->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.idreview',compact('data','branch'));
    }

    public function postIDReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        if($request['id_review'][$check])
        {
            $np_track = \DB::table('personal_review')->where('id',$request['personal_review_id'][$check])->update(
                array(
                    'id_review'=>$request['id_review'][$check]
                ));

        }
        
        if($np_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('id_review_track'=>'1'));
        }
        return redirect()->route('id_review_personal')
                        ->with('success_msg','review saved successfully');
    }

    //occupation
    public function getOccupationReview()
    {
        return view('errors.504');
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where($column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        $data = $data->join('address as add','add.id','=','customer.address_id')
        ->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('review as rw','rw.id','=','pr.review_id')
        ->join('residence as res','res.id','=','pr.residence_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','add.*','pr.*','rw.*','region_name','trk.*','res.*','rw.address_review as addressreview','trk.address_review as trk_address_review')
        ->where('customer.account_type', 'personal')->orderBy('br.id')->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.addressreview',compact('data','branch'));
    }

    public function postOccupationReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        $npr_track = 0;
        if($request['address_def_comm'][$check])
        {
            $np_track = \DB::table('residence')->where('id',$request['residence_id'][$check])->update(
                array(
                    'address_def_comm'=>$request['address_def_comm'][$check]
                ));

        }
        if($request['address_review'][$check])
        {
            $npr_track = \DB::table('review')->where('id',$request['review_id'][$check])->update(array('address_review'=>$request['address_review'][$check]));

        }
        if($np_track == '1' || $npr_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('address_review'=>'1'));
        }
        return redirect()->route('address_review_personal')
                        ->with('success_msg','review saved successfully');

    }
    //third party
    public function getThirdPartyReview()
    {
        return view('errors.504');
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where($column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        $data = $data->join('address as add','add.id','=','customer.address_id')
        ->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('review as rw','rw.id','=','pr.review_id')
        ->join('residence as res','res.id','=','pr.residence_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','add.*','pr.*','rw.*','region_name','trk.*','res.*','rw.address_review as addressreview','trk.address_review as trk_address_review')
        ->where('customer.account_type', 'personal')->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.addressreview',compact('data','branch'));
    }

    public function postThirdPartyReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        $npr_track = 0;
        if($request['address_def_comm'][$check])
        {
            $np_track = \DB::table('residence')->where('id',$request['residence_id'][$check])->update(
                array(
                    'address_def_comm'=>$request['address_def_comm'][$check]
                ));

        }
        if($request['address_review'][$check])
        {
            $npr_track = \DB::table('review')->where('id',$request['review_id'][$check])->update(array('address_review'=>$request['address_review'][$check]));

        }
        if($np_track == '1' || $npr_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('address_review'=>'1'));
        }
        return redirect()->route('address_review_personal')
                        ->with('success_msg','review saved successfully');

    }
    //metrics
    public function getMetricsReview()
    {
        return view('errors.504');
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where($column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        $data = $data->join('address as add','add.id','=','customer.address_id')
        ->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('review as rw','rw.id','=','pr.review_id')
        ->join('residence as res','res.id','=','pr.residence_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','add.*','pr.*','rw.*','region_name','trk.*','res.*','rw.address_review as addressreview','trk.address_review as trk_address_review')
        ->where('customer.account_type', 'personal')->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.addressreview',compact('data','branch'));
    }

    public function postMetricsReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        $npr_track = 0;
        if($request['address_def_comm'][$check])
        {
            $np_track = \DB::table('residence')->where('id',$request['residence_id'][$check])->update(
                array(
                    'address_def_comm'=>$request['address_def_comm'][$check]
                ));

        }
        if($request['address_review'][$check])
        {
            $npr_track = \DB::table('review')->where('id',$request['review_id'][$check])->update(array('address_review'=>$request['address_review'][$check]));

        }
        if($np_track == '1' || $npr_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('address_review'=>'1'));
        }
        return redirect()->route('address_review_personal')
                        ->with('success_msg','review saved successfully');

    }
    //employer
    public function getEmployerReview()
    {
        return view('errors.504');
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where($column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        $data = $data->join('address as add','add.id','=','customer.address_id')
        ->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('review as rw','rw.id','=','pr.review_id')
        ->join('residence as res','res.id','=','pr.residence_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','add.*','pr.*','rw.*','region_name','trk.*','res.*','rw.address_review as addressreview','trk.address_review as trk_address_review')
        ->where('customer.account_type', 'personal')->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.addressreview',compact('data','branch'));
    }

    public function postEmployerReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        $npr_track = 0;
        if($request['address_def_comm'][$check])
        {
            $np_track = \DB::table('residence')->where('id',$request['residence_id'][$check])->update(
                array(
                    'address_def_comm'=>$request['address_def_comm'][$check]
                ));

        }
        if($request['address_review'][$check])
        {
            $npr_track = \DB::table('review')->where('id',$request['review_id'][$check])->update(array('address_review'=>$request['address_review'][$check]));

        }
        if($np_track == '1' || $npr_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('address_review'=>'1'));
        }
        return redirect()->route('address_review_personal')
                        ->with('success_msg','review saved successfully');

    }
    //intended use
    public function getIntendedUseReview()
    {
        return view('errors.504');
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where($column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        $data = $data->join('address as add','add.id','=','customer.address_id')
        ->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('review as rw','rw.id','=','pr.review_id')
        ->join('residence as res','res.id','=','pr.residence_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','add.*','pr.*','rw.*','region_name','trk.*','res.*','rw.address_review as addressreview','trk.address_review as trk_address_review')
        ->where('customer.account_type', 'personal')->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.addressreview',compact('data','branch'));
    }

    public function postIntendedUseReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        $npr_track = 0;
        if($request['address_def_comm'][$check])
        {
            $np_track = \DB::table('residence')->where('id',$request['residence_id'][$check])->update(
                array(
                    'address_def_comm'=>$request['address_def_comm'][$check]
                ));

        }
        if($request['address_review'][$check])
        {
            $npr_track = \DB::table('review')->where('id',$request['review_id'][$check])->update(array('address_review'=>$request['address_review'][$check]));

        }
        if($np_track == '1' || $npr_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('address_review'=>'1'));
        }
        return redirect()->route('address_review_personal')
                        ->with('success_msg','review saved successfully');

    }
    //cwb
    public function getCWBReview()
    {
        return view('errors.504');
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where($column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        $data = $data->join('address as add','add.id','=','customer.address_id')
        ->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('review as rw','rw.id','=','pr.review_id')
        ->join('residence as res','res.id','=','pr.residence_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','add.*','pr.*','rw.*','region_name','trk.*','res.*','rw.address_review as addressreview','trk.address_review as trk_address_review')
        ->where('customer.account_type', 'personal')->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.addressreview',compact('data','branch'));
    }

    public function postCWBReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        $npr_track = 0;
        if($request['address_def_comm'][$check])
        {
            $np_track = \DB::table('residence')->where('id',$request['residence_id'][$check])->update(
                array(
                    'address_def_comm'=>$request['address_def_comm'][$check]
                ));

        }
        if($request['address_review'][$check])
        {
            $npr_track = \DB::table('review')->where('id',$request['review_id'][$check])->update(array('address_review'=>$request['address_review'][$check]));

        }
        if($np_track == '1' || $npr_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('address_review'=>'1'));
        }
        return redirect()->route('address_review_personal')
                        ->with('success_msg','review saved successfully');

    }
    //noc
    public function getNocReview()
    {
        //return view('errors.504');
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where($column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        
        $data = $data->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('noc as nc','nc.id','=','pr.noc_id')
        ->join('personal_review as prr','prr.id','=','pr.personal_review_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','pr.*','region_name','trk.*','nc.*','prr.*')
        ->where('customer.account_type', 'personal')->orderBy('br.id')->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.nocreview',compact('data','branch'));
    }

    public function postNocReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        $npr_track = 0;
        if($request['noc_def_comm'][$check])
        {
            $np_track = \DB::table('noc')->where('id',$request['noc_id'][$check])->update(
                array(
                    'noc_def_comm'=>$request['noc_def_comm'][$check]
                ));

        }
        if($request['noc_r'][$check])
        {
            $npr_track = \DB::table('personal_review')->where('id',$request['personal_review_id'][$check])->update(array('noc_r'=>$request['noc_r'][$check]));

        }
        if($np_track == '1' || $npr_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('noc_review_track'=>'1'));
        }
        return redirect()->route('noc_review_personal')
                        ->with('success_msg','review saved successfully');

    }
    //pefp pep
    public function getPefpPepReview()
    {
        return view('errors.504');
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where($column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        $data = $data->join('address as add','add.id','=','customer.address_id')
        ->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('review as rw','rw.id','=','pr.review_id')
        ->join('residence as res','res.id','=','pr.residence_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','add.*','pr.*','rw.*','region_name','trk.*','res.*','rw.address_review as addressreview','trk.address_review as trk_address_review')
        ->where('customer.account_type', 'personal')->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.addressreview',compact('data','branch'));
    }

    public function postPefpPepReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        $npr_track = 0;
        if($request['address_def_comm'][$check])
        {
            $np_track = \DB::table('residence')->where('id',$request['residence_id'][$check])->update(
                array(
                    'address_def_comm'=>$request['address_def_comm'][$check]
                ));

        }
        if($request['address_review'][$check])
        {
            $npr_track = \DB::table('review')->where('id',$request['review_id'][$check])->update(array('address_review'=>$request['address_review'][$check]));

        }
        if($np_track == '1' || $npr_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('address_review'=>'1'));
        }
        return redirect()->route('address_review_personal')
                        ->with('success_msg','review saved successfully');

    }
    //average money
    public function getAverageMoneyReview()
    {
        return view('errors.504');
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $input_per = '100';
        $data = Customer::join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
        if (!empty($filters) && is_array($filters)) {
            foreach ($filters as $column => $row) {
                if (!empty($column) && !empty($row["value"]) && is_array($row)) {
                    $operator = \Config::get("srtpl.type", 1)[$row["type"]];

                    if($column == 'from_date')
                    {
                        
                        $from_date = 'calendar_date';
                        $value_from_date = $row["value"];
                    }
                    elseif($column == 'to_date')
                    {
                        
                        $to_date = 'calendar_date';
                        $value_to_date = $row["value"];
                    }
                    elseif($column == 'percentage')
                    {
                        $input_per = $row["value"];
                    }
                    else
                    {
                        $data->where($column, $operator, "%{$row["value"]}%");
                    }
                }
            }
            if(!empty($value_from_date) && !empty($value_to_date))
                $data->whereBetween('calendar_date',[$value_from_date,$value_to_date]);
            elseif(!empty($value_from_date))
            $data->where($from_date, 'LIKE',$value_from_date);
            elseif(!empty($value_to_date))
            $data->where($to_date, 'LIKE', $value_to_date);
        }
        if (!empty($sort_order) && is_array($sort_order)) {
            foreach ($sort_order as $column => $direction) {
                $data->orderBy($column, $direction);
            }
        }
        $data = $data->join('address as add','add.id','=','customer.address_id')
        ->join('personal as pr','pr.id','=','customer.account_type_id')
        ->join('review as rw','rw.id','=','pr.review_id')
        ->join('residence as res','res.id','=','pr.residence_id')
        ->join('track_reviews as trk','trk.customer_id','=','customer.id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','br.*','add.*','pr.*','rw.*','region_name','trk.*','res.*','rw.address_review as addressreview','trk.address_review as trk_address_review')
        ->where('customer.account_type', 'personal')->paginate(30);

        $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')
                 ->get();
        foreach ($data1 as $key => $value) {
            $percent = round(($input_per * $value->branch_total) / 100.0);
            $branch[$value->branch_id] = $percent;
        }
       return view('accounts.personal.reviews.addressreview',compact('data','branch'));
    }

    public function postAverageMoneyReview(Request $request)
    {
        // print_r($request->all());exit;
        $check = $request['action'];
        $np_track = 0;
        $npr_track = 0;
        if($request['address_def_comm'][$check])
        {
            $np_track = \DB::table('residence')->where('id',$request['residence_id'][$check])->update(
                array(
                    'address_def_comm'=>$request['address_def_comm'][$check]
                ));

        }
        if($request['address_review'][$check])
        {
            $npr_track = \DB::table('review')->where('id',$request['review_id'][$check])->update(array('address_review'=>$request['address_review'][$check]));

        }
        if($np_track == '1' || $npr_track == '1')
        {
            $d = \DB::table('track_reviews')->where('customer_id',$request['cust_id'][$check])->update(array('address_review'=>'1'));
        }
        return redirect()->route('address_review_personal')
                        ->with('success_msg','review saved successfully');

    }

}
