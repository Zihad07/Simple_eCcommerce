<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
//        dd('hello');
        return view('index',['products'=>Product::paginate(2)]);
    }
}
