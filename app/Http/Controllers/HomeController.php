<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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
           $id = $user->id;
           $buyer =User::find($id)->buyers;
        
            return view('merchant.buyer',compact('buyer'));
        } elseif ($user->usertype==2){ 
            $id = $user->id;
            $seller =User::find($id)->sellers;

            return view('merchant.seller',compact('seller'));
       } else {
           return "Please Select type";
       }
    }
}
