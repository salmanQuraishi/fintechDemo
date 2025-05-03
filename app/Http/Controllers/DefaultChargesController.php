<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultChargesController extends Controller
{
    
    public function index(){

        return view('default-charges.index');
    }
}
