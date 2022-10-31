<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('front.register');
    }

    public function doRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_admin']=0;
        $user = User::create($validated);
        Auth::login($user);
        toast('account created successfully','success','top-right');
        return redirect('/');
    }

    public function login()
    {
        return view('front.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)){
            return redirect()->back()->withErrors(['error-credentials' => 'user email or password is error']);
        }
        toast('logged in successfully','success','top-right');

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        toast('logged out successfully','success','top-right');

        return redirect('/');
    }
}
