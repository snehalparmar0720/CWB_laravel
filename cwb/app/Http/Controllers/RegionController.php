<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Branch;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $regions = Region::paginate(25);
       return view('region.index',compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('region.create');
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
        print($request);exit;   
        $this->validate($request, [
            'region_name' => 'required',
            'region_code' => 'required',
        ]);
        Region::create($request->all());
        return redirect()->route('region.index')
                        ->with('success','Region created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regions = Region::find($id);
        return view('region.show',compact('regions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $regions = Region::find($id);
        return view('region.edit',compact('regions'));
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
         $this->validate($request, [
            'region_name' => 'required',
            'region_code' => 'required',
        ]);
        Region::find($id)->update($request->all());
        return redirect()->route('region.index')
                        ->with('success','Region updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Region::find($id)->delete();
        return redirect()->route('region.index')
                        ->with('success','Region deleted successfully');
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
                    /*if($i == 0){
                        $i++;
                        continue; 
                     }*/
                if (!$header)
                    $header = $row;
                else
                   // $data[] = $row;
                       // $data[] = array_combine($header, $row);
                for ($c=0; $c < $num; $c++) {
                $data[$i][] = $row [$c];}
             
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
        
        /*print_r("hi");
        exit;*/
        $regions = Region::pluck('region_name', 'id')->toArray();
        $branch = Branch::pluck('branch_name', 'id')->toArray();
        $branch_region = Branch::pluck('region_id', 'id')->toArray();
        // print_r($branch);exit;

        ini_set('memory_limit','256M');

        $file = public_path('file/cwb_branch.csv');
        
        $branch_name = array();
        $region_code = array();
        $region_name = array();
        $csv_data = $this->csvToArray($file);
        //print_r($csv_data);exit;
         if(!empty($csv_data)){
            $regions_insert = array();
            $branch_insert = array();

            foreach ($csv_data as $key_csv => $value_csv) 
            {
                $branch_name = $csv_data[$key_csv][0];
                $region_code = $csv_data[$key_csv][1];
                $region_name = $csv_data[$key_csv][2];

                if (in_array($region_name, $regions))
                {
                    $data =Region::where('region_name',$region_name)->pluck('id');
                    $region_id = $data[0];
                    //continue;
                }
                else
                {
                    $regions_insert = ['region_name' => $region_name, 'region_code' => $region_code];
                    $region_id = \DB::table('regions')->insertGetId($regions_insert);
                }
                
                if (!(in_array($branch_name, $branch) && in_array($region_id, $branch_region)))
                {
                    $branch_insert = ['branch_name' => $branch_name,'region_id' => $region_id];
                    $branch_id = \DB::table('branch')->insertGetId($branch_insert);
                }

               array_push($regions, $region_name);
               array_push($branch, $branch_name);
               array_push($branch_region, $region_id);
            }
        }
     return redirect()->route('region.index')
                        ->with('success_msg','Regions and Branches added successfully');            
    }
}
