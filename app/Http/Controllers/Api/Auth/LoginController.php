<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Trait\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiTrait;

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->errorMessage('Wrong email or password', 401);
        }
        $request->session()->regenerate();
        // For post man and phone dev
        $user  = User::where('email', $request->email)->first();
        $token = $user->createToken($user->id)->plainTextToken;
        $data  = [
            "token" => $token
        ];
        return $this->returnData('data', $data, 'Logged in');
    }
}
