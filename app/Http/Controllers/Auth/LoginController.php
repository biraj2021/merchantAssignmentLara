<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Http\Controllers\Controller;
//use Illuminate\Validation\ValidationException;
//use Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function username() {
        $login = request()->input('email');
        if(is_numeric($login)){
            $field = 'phonenumber';
        } else if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        }
        request()->merge([$field => $login]);
      return $field;
    }
    
    protected function redirectTo(){
        $user = Auth::user();
        if($user->usertype==1){
            return 'buyer';
       } else if($user->usertype==2) {
           return  'seller';
       } else {
           return view('merchant/login'); 
       }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /*protected function credentials(Request $request) {
        if(is_numeric($request->get('email'))){
          return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
        }
        return $request->only($this->username(), 'password'); 
    }*/

}
