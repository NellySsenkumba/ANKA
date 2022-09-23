<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $participants=Participant::all();
        $products=Product::all();
        return view('Admin.index',['participants'=>$participants,'products'=>$products]);
    }

    public function participant(){
        $participants=Participant::all();
        $products=Product::all();
        return view('Admin.participants',['participants'=>$participants,'products'=>$products]);
    }
    
}
