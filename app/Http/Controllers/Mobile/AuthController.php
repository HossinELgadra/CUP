<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;
    public function Mobilelogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        // if (!auth()->attempt($request->only(['email', 'password']))) {
        //     return $this->error('Invalid credentials', $request, 401);
        // }
     $user = User::where('email', $request->email)->first();
    
        if ($user) {
            return $this->success([
                'user' => $user,
                'token' => $user->createToken('Api Token of ')->plainTextToken
            ], 'User logged in successfully', 200);
        } else {
            return $this->error('Invalid credentials', 'Invalid credentials', 401);
        }
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return $this->success(null, 'User logged out successfully', 200);
    }
}
