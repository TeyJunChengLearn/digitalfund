<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(request $request){
        Auth::logout();
        return redirect()->route('landing.index');
    }
}
