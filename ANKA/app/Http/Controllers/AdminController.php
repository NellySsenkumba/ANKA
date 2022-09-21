<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('Admin.index');
    }

    public function participant(){
        $participants=Participant::all();
        return view('Admin.participants',['participants'=>$participants]);
    }
    
}
