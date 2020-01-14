<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::count();
        $j = \App\Joint::count();
        $np = \App\Non_personal::count();
        $p = \App\Personal::count();
        return view('home',compact('customers','j','np','p'));
    }
}
