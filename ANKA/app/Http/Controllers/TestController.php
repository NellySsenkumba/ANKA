<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function login(){
        return view('auth.login2');
    }
    public function register(){
        return view('auth.register2');
    }
}
