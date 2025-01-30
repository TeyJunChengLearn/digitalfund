<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view("register");
    }
    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|string|unique:users,username|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'user_role',$request->userRole,
        ]);

        return redirect()->route('login.index');
    }
}
