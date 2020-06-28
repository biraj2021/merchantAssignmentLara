<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('buyer');
        //$this->middleware('seller');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() { //echo "Hy"; die;
        $user=Auth::user();
        //echo"<pre>";print_r($user); exit;
        if($user->usertype==1){ //echo "Hello"; die;
            return view('merchant.buyer',compact('user'));
        } elseif ($user->usertype==2){ //echo "Hello"; die;
            return view('merchant.seller',compact('user'));
       } else {
           return "Please Select type";
       }
    }
}
