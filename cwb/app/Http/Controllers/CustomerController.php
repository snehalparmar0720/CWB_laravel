<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Region;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $filters = \Input::get("filter", array());
        $sort_order=\Input::get("sort_order",array());
        $data = Customer::where('deleted','0')->join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id');
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
                    // $data->where($column, 'LIKE', "%{$row["value"]}%");
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
        $data = $data->paginate(50);
        //print_r($data);
        // $data = Customer::select('customer.*','trk.*')->join('track_reviews as trk','trk.customer_id','=','customer.id')->orderBy('customer.id','DESC')->paginate(5);
       // ->join('regions', 'regions.id', '=', 'branch.region_id')
        
        return view('customer.index',compact('data'));
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
        
        $data = Customer::where('id',$id)->pluck('account_type');
            $account_type = $data[0];
        //print_r($account_id);exit;
        if($account_type == 'personal')
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
            return view('customer.personal',compact('datas'));
        }
        elseif($account_type == 'non_personal')
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
            return view('customer.nonpersonal',compact('datas'));

        }
        elseif ($account_type == 'joint') 
        {
            $datas = Customer::join('account as ac','ac.id','=','customer.account_id')
            ->join('branch as br','br.id','=','customer.branch_id')
            ->join('address as add','add.id','=','customer.address_id')
            ->join('dao as d','d.id','=','customer.dao_id')
            ->join('broker as bk','bk.id','=','customer.broker_id')
            ->join('loan_lending as lo','lo.id','=','customer.loan_lending_id')
            ->join('metrics as ms','ms.id','=','customer.metrics_id')
            ->join('joint as jnt','jnt.id','=','customer.account_type_id')
            ->join('residence as res','res.id','=','jnt.residence_id')
            ->join('review as rw','rw.id','=','jnt.review_id')
            ->join('joint_review as jntr','jntr.id','=','jnt.joint_review_id')
            ->join('pefp_pep as pfp','pfp.id','=','jnt.pefp_pep_id')
            ->join('employer as emp','emp.id','=','jnt.employer_id')
            ->join('occupation as occ','occ.id','=','jnt.occupation_id')
            ->join('noc as nc','nc.id','=','jnt.noc_id')
            ->join('identification as idnt','idnt.id','=','jnt.identification_id')
            ->select('customer.*','customer.id as cust_id','customer.cif as c_cif','ac.account_number','br.*','add.*','d.*','bk.*','lo.*','ms.*','jnt.*','ac.*','res.*','rw.*','jntr.*','pfp.*','emp.*','occ.*','nc.*','idnt.*')
            ->where('customer.account_type', 'joint')
            ->where('customer.id', $id)->first();
            return view('customer.joint',compact('datas'));
        }
        else
            return view('customer.index',compact('datas'));
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
        //
        $file = public_path('file/review_non_personal.csv');
        $review_data = $this->csvToArray($file);
        $review_table = array();
        $columns = array();
        $tables = array();
        $values = array();
       
        foreach ($review_data as $key_csv => $value_csv) 
            {
                $review_table[] = $review_data[$key_csv][0];
                if($review_data[$key_csv][0] == $request['action'])
                {
                    $tables[] = $review_data[$key_csv][2];
                    $columns[] = $review_data[$key_csv][3];
                }
            }
            foreach ($columns as $key => $value) {
                foreach ($request->all() as $re_key => $re_value) {
                   if ($value == $re_key) {
                       $values[] = $re_value;
                   }
                }
            }


        switch ($request['action']) {
        case 'address':
            foreach ($tables as $key => $value) 
            {
               if($value == 'address')
               {
                $address_columns[] = $columns[$key];
                $address_values[] = $values[$key];
                $address_id = $request['address_id'];
                $address_table = $value;
               }
               if($value == 'residence')
               {
                $residence_columns[] = $columns[$key];
                $residence_values[] = $values[$key];
                $residence_id = $request['residence_id'];
                $residence_table = $value;
               }
               if($value == 'review')
               {
                $review_columns[] = $columns[$key];
                $review_values[] = $values[$key];
                $review_id = $request['review_id'];
                $review_table = $value;
               }
            }
            $address_track = $this->editThisTableData($address_table,$address_columns,$address_values,$address_id);
            $residence_track = $this->editThisTableData($residence_table,$residence_columns,$residence_values,$residence_id);
            $review_track = $this->editThisTableData($review_table,$review_columns,$review_values,$review_id);

            if($residence_track == '1' && $review_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('address_review_track'=>'1'));
            }
            break;

        case 'naics':
            foreach ($tables as $key => $value) 
            {
               if($value == 'non_personal')
               {
                $np_columns[] = $columns[$key];
                $np_values[] = $values[$key];
                $np_id = $request['account_type_id'];
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
           // print_r($np_track);
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('naics_review_track'=>'1'));
            }
            break;

        case 'charity':
            foreach ($tables as $key => $value) 
            {
               if($value == 'non_personal')
               {
                $np_columns[] = $columns[$key];
                $np_values[] = $values[$key];
                $np_id = $request['account_type_id'];
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
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('charity_review_track'=>'1'));
            }
            break;
        case 'thirdparty':
           
            foreach ($tables as $key => $value) 
            {
               if($value == 'third_party')
               {
                $np_columns[] = $columns[$key];
                $np_values[] = $values[$key];
                $np_id = $request['third_party_id'];
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
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('third_party_review_track'=>'1'));
            }
            break;
        case 'intendeduse':
            foreach ($tables as $key => $value) 
            {
               if($value == 'intended_use')
               {
                $np_columns[] = $columns[$key];
                $np_values[] = $values[$key];
                $np_id = $request['intended_use_id'];
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
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('intended_use_review_track'=>'1'));
            }
            break;

            case 'averagemoney':
            foreach ($tables as $key => $value) 
            {
               if($value == 'average_money')
               {
                $np_columns[] = $columns[$key];
                $np_values[] = $values[$key];
                $np_id = $request['average_money_id'];
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
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('average_money_review_track'=>'1'));
            }
            break;

            case 'nonpersonal':
            foreach ($tables as $key => $value) 
            {
               /*if($value == 'non_personal')
               {
                $np_columns[] = $columns[$key];
                $np_values[] = $values[$key];
                $np_id = $request['account_type_id'];
                $np_table = $value;
               }*/
               if($value == 'non_personal_review')
               {
                $npr_columns[] = $columns[$key];
                $npr_values[] = $values[$key];
                $npr_id = $request['non_personal_review_id'];
                $npr_table = $value;
               }
            }
            //$np_track = $this->editThisTableData($np_table,$np_columns,$np_values,$np_id);
            $npr_track = $this->editThisTableData($npr_table,$npr_columns,$npr_values,$npr_id);
            //print_r($np_track);
            if($npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('non_personal_review_track'=>'1'));
            }
            break;

            case 'metrics':
            foreach ($tables as $key => $value) 
            {
               if($value == 'metrics')
               {
                $np_columns[] = $columns[$key];
                $np_values[] = $values[$key];
                $np_id = $request['metrics_id'];
                $np_table = $value;
               }
               /*if($value == 'non_personal_review')
               {
                $npr_columns[] = $columns[$key];
                $npr_values[] = $values[$key];
                $npr_id = $request['non_personal_review_id'];
                $npr_table = $value;
               }*/
            }
            $np_track = $this->editThisTableData($np_table,$np_columns,$np_values,$np_id);
            //$npr_track = $this->editThisTableData($npr_table,$npr_columns,$npr_values,$npr_id);
            //print_r($np_track);
            if($np_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('metrics_review_track'=>'1'));
            }
            break;

            case 'cwb':
            //  print_r($values);
            // exit;
            foreach ($tables as $key => $value) 
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
            if($np_track == '1' && $npr_track == '1')
            {
                $d = \DB::table('track_reviews')->where('customer_id',$id)->update(array('cwb_review_track'=>'1'));
            }
            break;
        }
        //print_r("In Main Edit");
        //print_r($request->all());
        return redirect()->route('customer.index')
                        ->with('success','data updated successfully');
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
