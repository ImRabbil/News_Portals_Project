<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','User logout');
    }
}
