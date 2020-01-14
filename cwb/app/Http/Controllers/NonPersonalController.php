<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class NonPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::select('customer.*','customer.id as cid','trk.*')->where('customer.account_type', 'non_personal')->join('track_reviews as trk','trk.customer_id','=','customer.id')->orderBy('customer.id','DESC')->paginate(10);
       // ->join('regions', 'regions.id', '=', 'branch.region_id')
        
        return view('accounts.nonpersonal.index',compact('data'));
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
        ->join('non_personal as np','np.id','=','customer.account_type_id')
        ->join('residence as res','res.id','=','np.residence_id')
        ->join('review as rw','rw.id','=','np.review_id')
        ->join('non_personal_review as npr','npr.id','=','np.non_personal_review_id')
        ->join('third_party as tp','tp.id','=','np.third_party_id')
        ->join('average_money as am','am.id','=','np.average_money_id')
        ->join('intended_use as iu','iu.id','=','np.intended_use_id')
        ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','ac.account_number','br.*','add.*','d.*','bk.*','lo.*','ms.*','np.*','ac.*','res.*','rw.*','npr.*','tp.*','am.*','iu.*')
        ->where('customer.account_type', 'non_personal')
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
        return view('accounts.nonpersonal.edit',compact('datas','addressline1check','customercitynamelegal','postalcodelegal','provincestatecodelegal','totalaccountcount'));
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
        $np_track = 0;
        $npr_track = 0;
        switch ($request['action']) {
        case 'address':
            $np_track = 0;
            $npr_track = 0;
            //$data = array_combine($columns, $values);
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

        case 'naics':
            $np_track = 0;
            $npr_track = 0;
            if($request['naics_def_comm'] )
            {
                $np_track = \DB::table('non_personal')->where('id',$request['account_type_id'])->update(
                    array(
                        'naics_def_comm'=>$request['naics_def_comm']
                    ));

            }
            if($request['naics_r'])
            {
                $npr_track = \DB::table('non_personal_review')->where('id',$request['non_personal_review_id'])->update(array('naics_r'=>$request['naics_r']));

            }

            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('naics_review_track'=>'1'));
            }
            break;

        case 'charity':
            $np_track = 0;
            $npr_track = 0;
            if($request['charity_def_comm'] )
            {
                $np_track = \DB::table('non_personal')->where('id',$request['account_type_id'])->update(
                    array(
                        'charity_def_comm'=>$request['charity_def_comm']
                    ));

            }
            if($request['charity_r'])
            {
                $npr_track = \DB::table('non_personal_review')->where('id',$request['non_personal_review_id'])->update(array('charity_r'=>$request['charity_r']));

            }
            if($np_track == '1' || $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('charity_review_track'=>'1'));
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

            case 'nonpersonal':
            $np_track = 0;
            $npr_track = 0;
            if($request['signers_review'])
            {
                $npr_track = \DB::table('non_personal_review')->where('id',$request['non_personal_review_id'])->update(array('signers_review'=>$request['signers_review']));

            }
            if($npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('non_personal_review_track'=>'1'));
            }
            break;

            case 'metrics':
            /*foreach ($tables as $key => $value) 
            {
               if($value == 'metrics')
               {
                $np_columns[] = $columns[$key];
                $np_values[] = $values[$key];
                $np_id = $request['metrics_id'];
                $np_table = $value;
               }
               if($value == 'non_personal_review')
               {
                $npr_columns[] = $columns[$key];
                $npr_values[] = $values[$key];
                $npr_id = $request['non_personal_review_id'];
                $npr_table = $value;
               }
            }
            $np_track = $this->editThisTableData($np_table,$np_columns,$np_values,$np_id);
            //$npr_track = $this->editThisTableData($npr_table,$npr_columns,$npr_values,$npr_id);
            //print_r($np_track);
            if($np_track == '1')
            {*/
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('metrics_review_track'=>'1'));
        
            break;

            case 'cwb':
            //  print_r($values);
            // exit;
            /*foreach ($tables as $key => $value) 
            {
               if($value == 'review')
               {
                $np_columns[] = $columns[$key];
                $np_values[] = $values[$key];
                $np_id = $request['review_id'];
                $np_table = $value;
               }
               if($value == 'non_personal_review')
               {
                $npr_columns[] = $columns[$key];
                $npr_values[] = $values[$key];
                $npr_id = $request['non_personal_review_id'];
                $npr_table = $value;
               }
            }
            $np_track = $this->editThisTableData($np_table,$np_columns,$np_values,$np_id);
            $npr_track = $this->editThisTableData($npr_table,$npr_columns,$npr_values,$npr_id);
            //print_r($np_track);
            if($np_track == '1' || $npr_track == '1')
            {*/
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('cwb_review_track'=>'1'));
            break;
        }
        //print_r("In Main Edit");
        //print_r($request->all());
        return redirect()->route('nonpersonal.index')
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

    public function getNPDeficiency()
    {
        
        //address review
        $rating1 = \DB::table('non_personal')
                 ->join('review as rv','rv.id','=','non_personal.review_id')
                 ->select('address_review', \DB::raw('count(*) as address_review_total'))
                 ->groupBy('address_review')
                 ->havingRaw('address_review = 1')
                 ->get();
        $rating2 = \DB::table('non_personal')
                 ->join('review as rv','rv.id','=','non_personal.review_id')
                 ->select('address_review', \DB::raw('count(*) as address_review_total'))
                 ->groupBy('address_review')
                 ->havingRaw('address_review = 2')
                 ->get();
        $rating3 = \DB::table('non_personal')
                 ->join('review as rv','rv.id','=','non_personal.review_id')
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

        //naics review
        $naics_rating1 = \DB::table('non_personal_review')
                 ->select('naics_r', \DB::raw('count(*) as naics_review_total'))
                 ->groupBy('naics_r')
                 ->havingRaw('naics_r = 1')
                 ->get();
        $naics_rating2 = \DB::table('non_personal_review')
                 ->select('naics_r', \DB::raw('count(*) as naics_review_total'))
                 ->groupBy('naics_r')
                 ->havingRaw('naics_r = 2')
                 ->get();
        $naics_rating3 = \DB::table('non_personal_review')
                 ->select('naics_r', \DB::raw('count(*) as naics_review_total'))
                 ->groupBy('naics_r')
                 ->havingRaw('naics_r = 3')
                 ->get();
        $naics_review_rating1=0;
        $naics_review_rating2=0;
        $naics_review_rating3=0;
        if(count($naics_rating1)>0)
            $naics_review_rating1 = $naics_rating1[0]->naics_review_total;
        if(count($naics_rating2)>0)
            $naics_review_rating2 = $naics_rating2[0]->naics_review_total;
        if(count($naics_rating3)>0)
            $naics_review_rating3 = $naics_rating3[0]->naics_review_total;

        //charity review
        $charity_rating1 = \DB::table('non_personal_review')
                 ->select('charity_r', \DB::raw('count(*) as charity_review_total'))
                 ->groupBy('charity_r')
                 ->havingRaw('charity_r = 1')
                 ->get();
        $charity_rating2 = \DB::table('non_personal_review')
                 ->select('charity_r', \DB::raw('count(*) as charity_review_total'))
                 ->groupBy('charity_r')
                 ->havingRaw('charity_r = 2')
                 ->get();
        $charity_rating3 = \DB::table('non_personal_review')
                 ->select('charity_r', \DB::raw('count(*) as charity_review_total'))
                 ->groupBy('charity_r')
                 ->havingRaw('charity_r = 3')
                 ->get();
        $charity_review_rating1=0;
        $charity_review_rating2=0;
        $charity_review_rating3=0;
        if(count($charity_rating1)>0)
            $charity_review_rating1 = $charity_rating1[0]->charity_review_total;
        if(count($charity_rating2)>0)
            $charity_review_rating2 = $charity_rating2[0]->charity_review_total;
        if(count($charity_rating3)>0)
            $charity_review_rating3 = $charity_rating3[0]->charity_review_total;      
       // print_r($naics_rating1);exit;

         //third_party review
        $third_party_rating1 = \DB::table('non_personal_review')
                 ->select('third_party', \DB::raw('count(*) as third_party_review_total'))
                 ->groupBy('third_party')
                 ->havingRaw('third_party = 1')
                 ->get();
        $third_party_rating2 = \DB::table('non_personal_review')
                 ->select('third_party', \DB::raw('count(*) as third_party_review_total'))
                 ->groupBy('third_party')
                 ->havingRaw('third_party = 2')
                 ->get();
        $third_party_rating3 = \DB::table('non_personal_review')
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
        $intended_use_rating1 = \DB::table('non_personal_review')
                 ->select('intended_use', \DB::raw('count(*) as intended_use_review_total'))
                 ->groupBy('intended_use')
                 ->havingRaw('intended_use = 1')
                 ->get();
        $intended_use_rating2 = \DB::table('non_personal_review')
                 ->select('intended_use', \DB::raw('count(*) as intended_use_review_total'))
                 ->groupBy('intended_use')
                 ->havingRaw('intended_use = 2')
                 ->get();
        $intended_use_rating3 = \DB::table('non_personal_review')
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

        //ownership_structure review
        $ownership_structure_rating1 = \DB::table('non_personal_review')
                 ->select('ownership_structure', \DB::raw('count(*) as ownership_structure_review_total'))
                 ->groupBy('ownership_structure')
                 ->havingRaw('ownership_structure = 1')
                 ->get();
        $ownership_structure_rating2 = \DB::table('non_personal_review')
                 ->select('ownership_structure', \DB::raw('count(*) as ownership_structure_review_total'))
                 ->groupBy('ownership_structure')
                 ->havingRaw('ownership_structure = 2')
                 ->get();
        $ownership_structure_rating3 = \DB::table('non_personal_review')
                 ->select('ownership_structure', \DB::raw('count(*) as ownership_structure_review_total'))
                 ->groupBy('ownership_structure')
                 ->havingRaw('ownership_structure = 3')
                 ->get();
        $ownership_structure_review_rating1=0;
        $ownership_structure_review_rating2=0;
        $ownership_structure_review_rating3=0;
        if(count($ownership_structure_rating1)>0)
            $ownership_structure_review_rating1 = $ownership_structure_rating1[0]->ownership_structure_review_total;
        if(count($ownership_structure_rating2)>0)
            $ownership_structure_review_rating2 = $ownership_structure_rating2[0]->ownership_structure_review_total;
        if(count($ownership_structure_rating3)>0)
            $ownership_structure_review_rating3 = $ownership_structure_rating3[0]->ownership_structure_review_total;

        //owners_on_system review
        $owners_on_system_rating1 = \DB::table('non_personal_review')
                 ->select('owners_on_system', \DB::raw('count(*) as owners_on_system_review_total'))
                 ->groupBy('owners_on_system')
                 ->havingRaw('owners_on_system = 1')
                 ->get();
        $owners_on_system_rating2 = \DB::table('non_personal_review')
                 ->select('owners_on_system', \DB::raw('count(*) as owners_on_system_review_total'))
                 ->groupBy('owners_on_system')
                 ->havingRaw('owners_on_system = 2')
                 ->get();
        $owners_on_system_rating3 = \DB::table('non_personal_review')
                 ->select('owners_on_system', \DB::raw('count(*) as owners_on_system_review_total'))
                 ->groupBy('owners_on_system')
                 ->havingRaw('owners_on_system = 3')
                 ->get();
        $owners_on_system_review_rating1=0;
        $owners_on_system_review_rating2=0;
        $owners_on_system_review_rating3=0;
        if(count($owners_on_system_rating1)>0)
            $owners_on_system_review_rating1 = $owners_on_system_rating1[0]->owners_on_system_review_total;
        if(count($owners_on_system_rating2)>0)
            $owners_on_system_review_rating2 = $owners_on_system_rating2[0]->owners_on_system_review_total;
        if(count($owners_on_system_rating3)>0)
            $owners_on_system_review_rating3 = $owners_on_system_rating3[0]->owners_on_system_review_total;

        //confirmed_existence review
        $confirmed_existence_rating1 = \DB::table('non_personal_review')
                 ->select('confirmed_existence', \DB::raw('count(*) as confirmed_existence_review_total'))
                 ->groupBy('confirmed_existence')
                 ->havingRaw('confirmed_existence = 1')
                 ->get();
        $confirmed_existence_rating2 = \DB::table('non_personal_review')
                 ->select('confirmed_existence', \DB::raw('count(*) as confirmed_existence_review_total'))
                 ->groupBy('confirmed_existence')
                 ->havingRaw('confirmed_existence = 2')
                 ->get();
        $confirmed_existence_rating3 = \DB::table('non_personal_review')
                 ->select('confirmed_existence', \DB::raw('count(*) as confirmed_existence_review_total'))
                 ->groupBy('confirmed_existence')
                 ->havingRaw('confirmed_existence = 3')
                 ->get();
        $confirmed_existence_review_rating1=0;
        $confirmed_existence_review_rating2=0;
        $confirmed_existence_review_rating3=0;
        if(count($confirmed_existence_rating1)>0)
            $confirmed_existence_review_rating1 = $confirmed_existence_rating1[0]->confirmed_existence_review_total;
        if(count($confirmed_existence_rating2)>0)
            $confirmed_existence_review_rating2 = $confirmed_existence_rating2[0]->confirmed_existence_review_total;
        if(count($confirmed_existence_rating3)>0)
            $confirmed_existence_review_rating3 = $confirmed_existence_rating3[0]->confirmed_existence_review_total;

         //record_of_directors review
        $record_of_directors_rating1 = \DB::table('non_personal_review')
                 ->select('record_of_directors', \DB::raw('count(*) as record_of_directors_review_total'))
                 ->groupBy('record_of_directors')
                 ->havingRaw('record_of_directors = 1')
                 ->get();
        $record_of_directors_rating2 = \DB::table('non_personal_review')
                 ->select('record_of_directors', \DB::raw('count(*) as record_of_directors_review_total'))
                 ->groupBy('record_of_directors')
                 ->havingRaw('record_of_directors = 2')
                 ->get();
        $record_of_directors_rating3 = \DB::table('non_personal_review')
                 ->select('record_of_directors', \DB::raw('count(*) as record_of_directors_review_total'))
                 ->groupBy('record_of_directors')
                 ->havingRaw('record_of_directors = 3')
                 ->get();
        $record_of_directors_review_rating1=0;
        $record_of_directors_review_rating2=0;
        $record_of_directors_review_rating3=0;
        if(count($record_of_directors_rating1)>0)
            $record_of_directors_review_rating1 = $record_of_directors_rating1[0]->record_of_directors_review_total;
        if(count($record_of_directors_rating2)>0)
            $record_of_directors_review_rating2 = $record_of_directors_rating2[0]->record_of_directors_review_total;
        if(count($record_of_directors_rating3)>0)
            $record_of_directors_review_rating3 = $record_of_directors_rating3[0]->record_of_directors_review_total;

         //directors_on_system review
        $directors_on_system_rating1 = \DB::table('non_personal_review')
                 ->select('directors_on_system', \DB::raw('count(*) as directors_on_system_review_total'))
                 ->groupBy('directors_on_system')
                 ->havingRaw('directors_on_system = 1')
                 ->get();
        $directors_on_system_rating2 = \DB::table('non_personal_review')
                 ->select('directors_on_system', \DB::raw('count(*) as directors_on_system_review_total'))
                 ->groupBy('directors_on_system')
                 ->havingRaw('directors_on_system = 2')
                 ->get();
        $directors_on_system_rating3 = \DB::table('non_personal_review')
                 ->select('directors_on_system', \DB::raw('count(*) as directors_on_system_review_total'))
                 ->groupBy('directors_on_system')
                 ->havingRaw('directors_on_system = 3')
                 ->get();
        $directors_on_system_review_rating1=0;
        $directors_on_system_review_rating2=0;
        $directors_on_system_review_rating3=0;
        if(count($directors_on_system_rating1)>0)
            $directors_on_system_review_rating1 = $directors_on_system_rating1[0]->directors_on_system_review_total;
        if(count($directors_on_system_rating2)>0)
            $directors_on_system_review_rating2 = $directors_on_system_rating2[0]->directors_on_system_review_total;
        if(count($directors_on_system_rating3)>0)
            $directors_on_system_review_rating3 = $directors_on_system_rating3[0]->directors_on_system_review_total;

         //signers_review review
        $signers_rating1 = \DB::table('non_personal_review')
                 ->select('signers_review', \DB::raw('count(*) as signers_review_total'))
                 ->groupBy('signers_review')
                 ->havingRaw('signers_review = 1')
                 ->get();
        $signers_rating2 = \DB::table('non_personal_review')
                 ->select('signers_review', \DB::raw('count(*) as signers_review_total'))
                 ->groupBy('signers_review')
                 ->havingRaw('signers_review = 2')
                 ->get();
        $signers_rating3 = \DB::table('non_personal_review')
                 ->select('signers_review', \DB::raw('count(*) as signers_review_total'))
                 ->groupBy('signers_review')
                 ->havingRaw('signers_review = 3')
                 ->get();
        // print_r(count($signers_review_rating1));exit;
        $signers_review_rating1=0;
        $signers_review_rating2=0;
        $signers_review_rating3=0;

        if(count($signers_rating1) > 0)
            $signers_review_rating1 = $signers_rating1[0]->signers_review_total;
        if(count($signers_rating2)>0)
            $signers_review_rating2 = $signers_rating2[0]->signers_review_total;
        if(count($signers_rating3)>0)
            $signers_review_rating3 = $signers_rating3[0]->signers_review_total;

         //anticipated_acct_activities review
        $anticipated_acct_activities_rating1 = \DB::table('non_personal_review')
                 ->select('anticipated_acct_activities', \DB::raw('count(*) as anticipated_acct_activities_review_total'))
                 ->groupBy('anticipated_acct_activities')
                 ->havingRaw('anticipated_acct_activities = 1')
                 ->get();
        $anticipated_acct_activities_rating2 = \DB::table('non_personal_review')
                 ->select('anticipated_acct_activities', \DB::raw('count(*) as anticipated_acct_activities_review_total'))
                 ->groupBy('anticipated_acct_activities')
                 ->havingRaw('anticipated_acct_activities = 2')
                 ->get();
        $anticipated_acct_activities_rating3 = \DB::table('non_personal_review')
                 ->select('anticipated_acct_activities', \DB::raw('count(*) as anticipated_acct_activities_review_total'))
                 ->groupBy('anticipated_acct_activities')
                 ->havingRaw('anticipated_acct_activities = 3')
                 ->get();
        $anticipated_acct_activities_review_rating1=0;
        $anticipated_acct_activities_review_rating2=0;
        $anticipated_acct_activities_review_rating3=0;
        if(count($anticipated_acct_activities_rating1)>0)
            $anticipated_acct_activities_review_rating1 = $anticipated_acct_activities_rating1[0]->anticipated_acct_activities_review_total;
        if(count($anticipated_acct_activities_rating2)>0)
            $anticipated_acct_activities_review_rating2 = $anticipated_acct_activities_rating2[0]->anticipated_acct_activities_review_total;
        if(count($anticipated_acct_activities_rating3)>0)
            $anticipated_acct_activities_review_rating3 = $anticipated_acct_activities_rating3[0]->anticipated_acct_activities_review_total;

       


        return view('accounts.nonpersonal.nonpersonal_deficiency',compact('address_review_rating1','address_review_rating2','address_review_rating3','naics_review_rating1','naics_review_rating2','naics_review_rating3','charity_review_rating1','charity_review_rating2','charity_review_rating3','ownership_structure_review_rating1','ownership_structure_review_rating2','ownership_structure_review_rating3','owners_on_system_review_rating1','owners_on_system_review_rating2','owners_on_system_review_rating3','confirmed_existence_review_rating1','confirmed_existence_review_rating2','confirmed_existence_review_rating3','third_party_review_rating1','third_party_review_rating2','third_party_review_rating3','intended_use_review_rating1','intended_use_review_rating2','intended_use_review_rating3','record_of_directors_review_rating1','record_of_directors_review_rating2','record_of_directors_review_rating3','directors_on_system_review_rating1','directors_on_system_review_rating2','directors_on_system_review_rating3','signers_review_rating1','signers_review_rating2','signers_review_rating3','anticipated_acct_activities_review_rating1','anticipated_acct_activities_review_rating2','anticipated_acct_activities_review_rating3'));
    }
}
