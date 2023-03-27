<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ExtraController extends Controller
{
    public function English(){
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang','english');
        return redirect()->back();
    
    }
    public function Hindi(){
        Session::get('lang');
        Session::forget('lang');
        Session::put('lang','hindi');
        return redirect()->back();
        
    }
}
