<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
//use Redirect;
class registrationController extends Controller
{
    
    use RegistersUsers;

    public function __construct() {
        $this->middleware('guest');
    }
    public function showRegistrationForm(){
        return view('merchant.register');
    }
    public function create(Request $request){
        $data = $request->all();
        self::validate($request, [
            'fname' => ['required', 'string', 'max:100'],
            'lname' => ['required', 'string', 'max:100'],
            'profileImage' => ['image','mimes:jpeg,png,jpg,gif','max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phonenumber' => ['required', 'numeric', 'min:5', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'usertype' => ['required']
        ]);

        if ($request->hasFile('profileImage')) { 
            $image = $request->file('profileImage');
            $data['profileImage'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/profileImage/');
            $image->move($destinationPath,$data['profileImage']);
            
        }    
        $user = User::create([
            'email' => $data['email'],
            'phonenumber' => $data['phonenumber'],
            'password' => Hash::make($data['password']),
            'usertype' => ($data['usertype']),
        ]);
        $user_info = [
            'user_id'=>$user->id,
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'image' => $data['profileImage'],
        ]; 
        
        switch($request->usertype){ 
            case 1:
                $buyer = Buyer::create($user_info);
            break;
            case 2:
            $seller = Seller::create($user_info);
            break;  
            default:
            return "Something went to wrong";
        }
    return redirect('/merchant/login')->with('success','Profile created successfully.');
    }

    

    
}
