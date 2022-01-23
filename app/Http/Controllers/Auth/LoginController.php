<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login()
    {
        return Auth::check() ? redirect()->route('administration.homepage') : view('pages.administration.login');
    }
    
    public function attempt(Request $request)
    {

        $request->validate(
            [
            'email' => 'required|string|email',
            'password' => 'required|string',
            ]
        );

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('administration.homepage');
        }

        return redirect()->route('administration.login')->withErrors('Ops! You have entered invalid credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('home');
    }
}
