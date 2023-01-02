<?php

namespace App\Http\Controllers;
use App\Http\Resources\UserResource;
use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        //membuat generate request token
        $credentials = $request->only('username', 'password');

        if(!$token = auth()->attempt($credentials)){
            return response()->json(['error' => 'invalid_credentials'], 401);
        };

            // return response()->json(compact('user', 'token'));

            //menggunakan adding meta
        return (new UserResource($request->user()))
                ->additional(['meta' => [
                'token' => $token,
            ]]);

    }
} 
