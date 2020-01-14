<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\User;
use App\Customer;
use DB;
class ReportController extends Controller
{
    public function getReport()
    {
    	/*$data = Customer::where('deleted','0')->join('branch as br','br.id','=','customer.branch_id')->join('regions', 'regions.id', '=', 'br.region_id')->all();*/
    	/*$users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
			      ->title("Monthly new Register Users")
			      ->elementLabel("Total Users")
			      ->dimensions(1000, 500)
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);
        return view('chart',compact('chart'));*/
/*
         $data1 = Customer::select(\DB::raw('count(*) as branch_total'),'branch_id')->where('account_type','personal')->groupBy('branch_id')->orderBy('branch_id')
                 ->get();

         $rating1 = \DB::table('personal')
                 ->join('review as rv','rv.id','=','personal.review_id')
                 ->select('address_review', \DB::raw('count(*) as address_review_total'))
                 ->groupBy('address_review')
                 // ->havingRaw('address_review = 1')
                 ->get();
"""""https://stackoverflow.com/questions/57924938/how-to-use-sum-and-groupby-in-laravel-consoletvs-charts

        //print_r($users);exit;
    	$customers= Customer::count();*/


        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::create('bar', 'highcharts')
			      ->title("Address Review")
			      ->elementLabel("Total Address Review")
			      ->labels(["PRAIRIE","NORTHERN AB","British Columbia","Corporate Office","Other Line Of Business","EFG"])
			      ->values(["3","5","2","1","3","4"])
			      ->dimensions(1000,500)
			      ->responsive(false);


        return view('chart',compact('chart'));
    	
    }
}
