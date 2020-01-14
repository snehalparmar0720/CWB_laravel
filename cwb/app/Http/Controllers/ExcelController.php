<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Region;
use App\Branch;
use App\Personal;
use App\Customer;
class ExcelController extends Controller
{
    //
    public function importExport()
    {
        $data = \App\Customer::orderBy('id','DESC')->paginate(50);
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
    	$val_br_name = trim($values[0]);
    	$val_reg_name = trim($values[1]);

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
    		print_r($val_reg_name);exit;

    		 /*$data = array(
            	'region_name' => $val_reg_name,
            	'region_code' => ""
            );
    		$region_id = \DB::table('regions')->insertGetId($data);*/
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
    	/*	 $data = array(
            	'branch_name' => $val_br_name,
            	'branch_code' => "",
            	'region_id' =>$region_id
            );
    		$branch_id = \DB::table('branch')->insertGetId($data);*/
    	print_r($val_br_name);exit;
    	}
    	return $branch_id;
    }

    function getcolumnsvaluesfromexcel($value_ex, $value_tbl, $csv_data)
    {
    	$excelcolumn = array();
		$columns = array();
		$tables = array();
		$values = array();
    	foreach ($csv_data as $key_csv => $value_csv) 
		{
			$all_tables = $csv_data[$key_csv][1];
			if($value_tbl == $all_tables)
			{
				$excelcolumn[$key_csv] = $csv_data[$key_csv][0];
				$columns[] = $csv_data[$key_csv][2];
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
		$data= array_combine($column, $values);	
		$table = addslashes($tables);
		$id = \DB::table($table)->insertGetId($data);
		return $id;
    }
    public function importExcel(Request $request)
    {
    	/*print_r($request->all());
    	exit;*/
		$rules = array(
           'select_file'  => 'required|mimes:xls,xlsx,xlsm'
        );
        $v1 = \Validator::make(\Input::all(), $rules);
        if ($v1 -> fails())
        {
            $messages = $v1->messages();
            \Session::flash('error_msg', 'please select the file with xls/xlsx extension');
            return redirect()->route('importExport')->withInput()->withErrors($v1);
        }
        else
        {
        	ini_set('memory_limit', '-1');
        	ini_set('max_execution_time', 3000);
        	set_time_limit(3000);
			$non_personal_parent_tables = ['address', 'account', 'average_money', 'broker', 'dao', 'intended_use','loan_lending','residence', 'review', 'metrics', 'third_party', 'non_personal_review','branch'];  # parents tables

	        $np_child_tables1 = ['non_personal'];
	    	$main_table = ['customer'];

	    	$personal_parent_tables = ['address', 'account', 'average_money', 'identification', 'noc', 'intended_use','loan_lending','residence', 'review', 'occupation', 'third_party', 'personal_review','branch','employer','pefp_pep','broker','dao','metrics'];  # parents tables

	        $p_child_tables1 = ['personal'];

	    	$joint_parent_tables = ['address', 'account', 'broker', 'dao','loan_lending','residence', 'review', 'metrics', 'joint_review','branch', 'identification', 'noc', 'occupation','employer','pefp_pep'];  # parents tables

	        $j_child_tables1 = ['joint'];

	    	$np_file = public_path('file/db_map_nonpersonal.csv');
	    	$p_file = public_path('file/db_map_personal.csv');
	    	$j_file = public_path('file/db_map_joint.csv');

		    $nonpersonal_csv_data = $this->csvToArray($np_file);
		    $personal_csv_data = $this->csvToArray($p_file);
		    $joint_csv_data = $this->csvToArray($j_file);

		    $path = $request->file('select_file')->getRealPath();

	        //$data->first()->keys()->toArray() it gives the header of excel
		    $nonpersonal_excel_data = Excel::selectSheets('Non_Personal')->load($path, function($reader){
		    	$reader->setDateFormat('Y-m-d');
		    	//$reader->ignoreEmpty();
		    	//$reader->formatDates(false);
		    })->get();

		    $personal_excel_data = Excel::selectSheets('Personal')->load($path, function($reader){
		    	$reader->setDateFormat('Y-m-d');

		    	//$reader->ignoreEmpty();
		    	//$reader->formatDates(false);
		    })->get();
		    //print_r($personal_excel_data);exit;
		    $joint_excel_data = Excel::selectSheets('Joints')->load($path, function($reader){
		    	$reader->setDateFormat('Y-m-d');
		    	$reader->calculate(false);
		    	//$reader->ignoreEmpty();
		    	//$reader->formatDates(false);
		    })->get();

			//Non Personal Excel file data	       
		   if($nonpersonal_excel_data->count() > 0)
		    {
		      foreach($nonpersonal_excel_data->toArray() as $key_ex => $value_ex)
		      {
		      	$foreignkeys = array();
		      	foreach ($non_personal_parent_tables as $key_tbl => $value_tbl) 
		      	{
		    		$columns = array();
		    		$values = array();

		    		list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_tbl, $nonpersonal_csv_data);
		    		if($value_tbl == 'branch')
		    			$f_id = $this->getRegionID($value_tbl, $columns, $values);
		    		else
		    		{
		    			if($value_tbl == 'address')
						{
						$record = \DB::table('address')->where('cif',$values[0])->count();
					    	if($record != 0)
					    	{
					    		 \Session::flash('error_msg', 'some CIF numbers are already exists so that data is ignored ');
					    		 goto nextitr1;

					    	}
				    	}
			    		$f_id = $this->getInsertedID($value_tbl, $columns, $values);
		    		}
		    		$foreignkeys[$value_tbl] = $f_id;
		      	}
		      	foreach ($np_child_tables1 as $key_ch => $value_ch) 
		      	{
		      		$columns = array();
		    		$values = array();

		    		list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_ch, $nonpersonal_csv_data);
		    		if($value_ch == 'non_personal')
		    		{
		    			$fnkey_cols = ['residence_id', 'review_id', 'non_personal_review_id', 'third_party_id', 'average_money_id', 'intended_use_id'];
	                	$fkey_values = array();

	                	$fkey_values = $this->getForiegnkeys($fnkey_cols,$foreignkeys);
	                	foreach ($fkey_values as $key => $value) {

	                		array_push($columns, $key);
	                		array_push($values, $value);
	                	}
	                	$f_id = $this->getInsertedID($value_ch, $columns, $values);
	                	$foreignkeys['account_type'] = $f_id;
		    		}
		      	}
		      	foreach ($main_table as $key_ch => $value_ch) 
		      	{
		      		$columns = array();
		    		$values = array();

		    		list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_ch, $nonpersonal_csv_data);
		    		if($value_ch == 'customer')
		    		{
		    			$fnkey_cols = ['metrics_id', 'loan_lending_id', 'broker_id', 'dao_id', 'address_id','branch_id','account_id','account_type_id'];
	                	$fkey_values = array();

	                	$fkey_values = $this->getForiegnkeys($fnkey_cols,$foreignkeys);
	                	foreach ($fkey_values as $key => $value) {

	                		array_push($columns, $key);
	                		array_push($values, $value);
	                	}
	                	array_push($columns, 'account_type');
	                	array_push($values, 'non_personal');

	                	$f_id = $this->getInsertedID($value_ch, $columns, $values);
	                	$track_id=$this->createTrackReviewTable($f_id);
		    		}
		      	}
		      nextitr1: }
		  }
		  //personal excel file data 
		 if($personal_excel_data->count() > 0)
		    {
		      foreach($personal_excel_data->toArray() as $key_ex => $value_ex)
		      {
		      	$foreignkeys = array();
		      	foreach ($personal_parent_tables as $key_tbl => $value_tbl) 
		      	{
		    		$columns = array();
		    		$values = array();

		    		list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_tbl, $personal_csv_data);
		    		if($value_tbl == 'branch')
		    			$f_id = $this->getRegionID($value_tbl, $columns, $values);
		    		else
		    		{
		    			if($value_tbl == 'address')
						{
						$record = \DB::table('address')->where('cif',$values[0])->count();
					    	if($record != 0)
					    	{
					    		 \Session::flash('error_msg', 'some CIF numbers are already exists so that data is ignored ');
					    		 goto nextitr2;
					    	}

				    	}
			    			$f_id = $this->getInsertedID($value_tbl, $columns, $values);
		    		}
		    		$foreignkeys[$value_tbl] = $f_id;
		      	}
		      	foreach ($p_child_tables1 as $key_ch => $value_ch) 
		      	{
		      		$columns = array();
		    		$values = array();

		    		list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_ch, $personal_csv_data);
		    		if($value_ch == 'personal')
		    		{
		    			$fnkey_cols = ['residence_id', 'review_id', 'personal_review_id', 'third_party_id', 'average_money_id', 'intended_use_id','occupation_id','employer_id','pefp_pep_id','noc_id','identification_id'];
	                	$fkey_values = array();

	                	$fkey_values = $this->getForiegnkeys($fnkey_cols,$foreignkeys);
	                	foreach ($fkey_values as $key => $value) {

	                		array_push($columns, $key);
	                		array_push($values, $value);
	                	}
	                	$f_id = $this->getInsertedID($value_ch, $columns, $values);
	                	$foreignkeys['account_type'] = $f_id;
		    		}
		      	}
		      	foreach ($main_table as $key_ch => $value_ch) 
		      	{
		      		$columns = array();
		    		$values = array();

		    		list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_ch, $personal_csv_data);
		    		if($value_ch == 'customer')
		    		{
		    			$fnkey_cols = ['metrics_id', 'loan_lending_id', 'broker_id', 'dao_id', 'address_id','branch_id','account_id','account_type_id'];
	                	$fkey_values = array();

	                	$fkey_values = $this->getForiegnkeys($fnkey_cols,$foreignkeys);
	                	foreach ($fkey_values as $key => $value) {

	                		array_push($columns, $key);
	                		array_push($values, $value);
	                	}
	                	array_push($columns, 'account_type');
	                	array_push($values, 'personal');

	                	$f_id = $this->getInsertedID($value_ch, $columns, $values);
	                	$track_id=$this->createTrackReviewTable($f_id);
		    		}
		      	}
		     nextitr2:  }
		  } 
	//joint excel data
		  if($joint_excel_data->count() > 0)
		    {
		      foreach($joint_excel_data->toArray() as $key_ex => $value_ex)
		      {
		      	$foreignkeys = array();
		      	foreach ($joint_parent_tables as $key_tbl => $value_tbl) 
		      	{
		    		$columns = array();
		    		$values = array();

		    		list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_tbl, $joint_csv_data);
		    		if($value_tbl == 'branch')
		    			$f_id = $this->getRegionID($value_tbl, $columns, $values);
		    		else
		    		{
		    			if($value_tbl == 'address')
						{
						$record = \DB::table('address')->where('cif',$values[0])->count();
					    	if($record != 0)
					    	{
					    		 \Session::flash('error_msg', 'some CIF numbers are already exists so that data is ignored ');
					    		 goto nextitr3;
					    	}
				    	}
			    			$f_id = $this->getInsertedID($value_tbl, $columns, $values);
		    		}
		    		$foreignkeys[$value_tbl] = $f_id;
		      	}
		      	foreach ($j_child_tables1 as $key_ch => $value_ch) 
		      	{
		      		$columns = array();
		    		$values = array();

		    		list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_ch, $joint_csv_data);
		    		if($value_ch == 'joint')
		    		{	
		    			$fnkey_cols = ['residence_id', 'review_id', 'joint_review_id','occupation_id','employer_id','pefp_pep_id','noc_id','identification_id'];
	                	$fkey_values = array();

	                	$fkey_values = $this->getForiegnkeys($fnkey_cols,$foreignkeys);
	                	foreach ($fkey_values as $key => $value) {

	                		array_push($columns, $key);
	                		array_push($values, $value);
	                	}
	                	$f_id = $this->getInsertedID($value_ch, $columns, $values);
	                	$foreignkeys['account_type'] = $f_id;
		    		}
		      	}
		      	foreach ($main_table as $key_ch => $value_ch) 
		      	{
		      		$columns = array();
		    		$values = array();

		    		list($columns, $values) = $this->getcolumnsvaluesfromexcel($value_ex, $value_ch, $joint_csv_data);
		    		if($value_ch == 'customer')
		    		{
		    			$fnkey_cols = ['metrics_id', 'loan_lending_id', 'broker_id', 'dao_id', 'address_id','branch_id','account_id','account_type_id'];
	                	$fkey_values = array();

	                	$fkey_values = $this->getForiegnkeys($fnkey_cols,$foreignkeys);
	                	foreach ($fkey_values as $key => $value) {

	                		array_push($columns, $key);
	                		array_push($values, $value);
	                	}
	                	array_push($columns, 'account_type');
	                	array_push($values, 'joint');

	                	$f_id = $this->getInsertedID($value_ch, $columns, $values);
	                	$track_id=$this->createTrackReviewTable($f_id);
		    		}
		      	}
		      nextitr3: }
		  }
	}
	return redirect()->route('customer.index')
                        ->with('success_msg','Excel File Uploaded Successfully');
	}
	      	

    /*//csv to array conversion
    public function getimportcsv()
    {
        
        return view('importcsv');
    }*/
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
	    return $data;
	}

	/*public function importCsv()
	{
	    
  		ini_set('memory_limit','256M');
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
	    print_r("\n");
	    

	    exit;
	    return 'Jobi done or what ever';    
	    	
	}*/

	public function excelExport()
	{
        // $data = Personal::select('cif','sin')->get()->toArray();
        $data = Customer::join('account as ac','ac.id','=','customer.account_id')
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
	        ->get()->toArray();
        return Excel::create('cwb', function($excel) use ($data) {
            $excel->sheet('Personal', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download('xlsx');

        /*return Excel::create('CWB', function($excel)
        {
          $excel->setTitle('Personal');
          $excel->sheet('Personal', function($sheet)
          {
           
        	$data = Customer::join('account as ac','ac.id','=','customer.account_id')
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
	        ->get();

        	
        $sheet->loadView('excelreport.personal', ['data' => $data]);
      });
    })->download('xlsx');*/
    }

}
