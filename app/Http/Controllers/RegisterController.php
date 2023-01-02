<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Helpers\ApiFormater;
use Exception;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //membuat generate request token
        $credentials = $request->only('email', 'password');

        $token = auth()->attempt($credentials);


        if($token){

            // return response()->json(compact('user', 'token'));

            //menggunakan adding meta
            return (new UserResource($request->user()))
                ->additional(['meta' => [
                    'token' => $token,
                ]]);

            ApiFormater::createApi(200, 'User Berhasil Register', $token);

        }else{

            return ApiFormater::createApi(400, 'Data Gagal Diinput');
        }

    }
}
