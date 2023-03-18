<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\log;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthController extends Controller
{
    public function register(Request $request){

        $validator=Validator::make($request->all(),[
        'nama' =>'required',//nama harus diisi
        'email' =>'required|email|unique:user,email',//nama harus diisi
        'password' =>'required|min:8',//nama harus diisi
        'confirmation_password' =>'required|same:password'
        ]);


        if($validator->fails()) {
            return messageError($validator->messages()->toArray());
        }

            $user = $validator->validate();

            User::create($user);

            $payload = [
                'nama' => $user['nama'],
                'role' => 'user',
                'iat' => now()->timestamp,//waktu dibuat token
                'exp' => now()->timestamp + 7200 //waktu token kadaluarsa (setelah dibuat token)
            ];

            $token = JWT::encode($payload, env('JWT_SECRET_KEY'), 'HS256');

            return response()->json([
                'data' => [
                    'message' => 'Successful registration',
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'role' => 'user'
                ],
                'token' => "Bearer {$token}"
            ], 200);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return messageError($validator->messages()->toArray());
        }

        if (Auth::attempt($validator->validate())){
            $payload = [
                'nama' => Auth::user()->nama,
                'role' => Auth::user()->role,
                'iat' => now()->timestamp,
                'exp' => now()->timestamp + 7200
            ];

            $token = JWT::encode($payload, env('JWT_SECRET_KEY'), 'HS256');

            log::create([
                'module' => 'login',
                'action' => ' login akun',
                'useraccess' => Auth::user()->email
            ]);

            return response()->json([
                "data" => [
                    'msg' => "berhasil login ",
                    'nama' => Auth::user()->nama,
                    'email' => Auth::user()->email,
                    'role' => Auth::user()->role,
                ],
                "token" => "Bearer {$token}"
            ], 200);
        }
    }

}





