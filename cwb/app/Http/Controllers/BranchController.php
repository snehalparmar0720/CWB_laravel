<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Region;


class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       /*$branches = Branch::select('branch.*','regions.region_name')
        ->join('regions', 'regions.id', '=', 'branch.region_id')
        ->paginate(25);*/

        $branches = Branch::paginate(25);

      
        return view('branch.index',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions= Region::pluck('region_name', 'id');
        //print($regions);exit;
        return view('branch.create',compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print(request('region_id'));exit;
        $this->validate($request, [
                'branch_name'=>'required',
                'region_id' =>'not_in:0'
            ]);
        Branch::create([
            'branch_name' => request('branch_name'),
            'branch_code' => request('branch_code'),
            'region_id' => request('region_id')
        ]);
        return redirect()->route('branch.index')
                        ->with('success','Branch created successfully');
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
        //
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
}
