<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Participant;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $products=Product::all();
        return view('Customer.index',["products"=>$products]);
    }

    public function participants(){
        $participants=Participant::all();
        return view('Customer.participants',['participants'=>$participants]);
    }

}
