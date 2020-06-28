<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected function redirectTo(){
        $user = Auth::user();
        if($user->usertype==1){
            return 'buyer';
       } else if($user->usertype==2) {
           return  'seller';
       } else {
           return 'merchant/login'; 
       }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
