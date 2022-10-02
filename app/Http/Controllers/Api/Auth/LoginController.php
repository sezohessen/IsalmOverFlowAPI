<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Trait\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ApiTrait;

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->errorMessage('Wrong email or password', 401);
        }
        $request->session()->regenerate();
    }

    public function authUser(Request $request)
    {
        return $this->returnData('data', $request->user(),'user');
    }
}
