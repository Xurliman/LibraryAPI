<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponser;

    public function login(LoginUserRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user or $user->password != $request->password) {
            return "Credentials not match, 401";
        }
        $user['token'] = $user->createToken('API Token')->plainTextToken;
        return response($user);
    }

    public function logout()
    {
        auth()->user()->tokens->delete();

        return response([
            'message' => 'Tokens Revoked'
        ]);
    }

    public function getme(Request $request){
        $user = $request->user();
        return $user;
    }
}
