<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use Auth;
use Validator;
use  App\Models\Seller;
use  App\Models\Buyer;

//api url:: localhost:8000/api/createRegistration

class UserController extends Controller
{
	public function register(Request $request){
        $data = $request->all();
 
        $validation = Validator::make($data,[
            'fname' => ['required', 'string', 'max:100'],
            'lname' => ['required', 'string', 'max:100'],
            'profileImage' => ['image','mimes:jpeg,png,jpg,gif','max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phonenumber' => ['required', 'numeric', 'min:5', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],
            'usertype' => ['required']
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success'=>false,
                'error'=>$validation->errors(),
                'data' =>[
                ],

                ],400);
        } else {
            if ($request->hasFile('profileImage')) { 
            $image = $request->file('profileImage');
            $data['profileImage'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/profileImage/');
            $image->move($destinationPath,$data['profileImage']);
            } else {
                $data['profileImage']='';
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

			return response()->json( [ 
				'success'=>true, 
				'message'=>'Registration is Successfull', 
				'data'=>$user_info
				], 201);
        }

    }
}
