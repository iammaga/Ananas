<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth');

            return response(['user' => $user, 'token' => $token->plainTextToken]);
        }
 
        return response(['message' => "User not found"]);
    }
}
