<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\validator;
use App\Models\User;
class AdminController extends Controller
{
   public function register(Request $request){

    $validator =Validator::make($request->all(),[
        'nama'=>'required',
        'email'=>'required|email|unique:user,email',
        'password'=>'required|min:8',
        'confirmation_password'=>'required|same:password',
        'role'=>'required|in:admin,user',
        'status'=>'required|in:aktif,non-aktif',
        'email_validate'=>'required|email',

    ]);

    if($validator->fails()){
        return messageError($validator->messages()->toArray());
    }

    $user =$validator->validated();

    User::create($user);
    return response()->json([
        "data"=>[
            'msg'=> "berhasil login",
            'nama'=>$user['nama'],
            'email'=>$user['email'],
            'role'=>$user['role'],
        ]
        ],200);
   }
}
