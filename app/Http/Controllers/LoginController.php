<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("login");
    }

    public function login(request $request){
        // dd($request->all());
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('landing.index'); // Adjust to your intended route
        }

        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ]);
    }
}
