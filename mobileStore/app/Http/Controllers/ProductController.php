<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');
    }

    public function insertProduct(){
        return view('products.insertProduct');
    }
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'MRP'=>'required | numeric',
            'price'=>'required | numeric',
            'image'=>'required | mimes:png,jpg,jpeg,png | max:10000'
        ]);
    }
}

