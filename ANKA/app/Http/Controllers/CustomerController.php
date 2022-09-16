<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){
        return view('Customer.index');
    }

    public function participants(){
        return view('Customer.participants');
    }

    public function test(){
        return view('Customer.test');
    }
}
