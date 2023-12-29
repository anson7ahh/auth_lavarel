<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;



class authentication extends Controller
{


    public function login(Request $request)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $userdetail = Auth::user();

            $user = User::find($userdetail->id);

            $token = $user->createToken('myApp')->accessToken;

            return response()->json(['token' => $token], 200);
        }
        return response()->json('The account does not exist', 400);
    }
    public function getUserDetail()
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            return Response(['data' => $user], 200);
        }
        return Response(['data' => 'Unauthorized'], 401);
    }
}
