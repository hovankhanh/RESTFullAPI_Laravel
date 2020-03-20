<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'requires|string',
            'password' => 'required|string'
        ]);

        if(!Auth::attempt($login)){
            return response(['message' =>'invalid login']);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        
        return response(['user' => Auth::user(), 'access_token' => accessToken]);

    }
}
