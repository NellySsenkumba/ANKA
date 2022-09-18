<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return view('Customer.participants');
    }

}
