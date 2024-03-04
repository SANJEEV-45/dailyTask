<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = ProductModel::get();
        return view('products.index',['products'=>$products]);
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

        $imageName = time().".".$request->image->extension();
        $request->image->move(public_path('products'),$imageName);

        $product = new ProductModel;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->MRP = $request->MRP;
        $product->price = $request->price;
        $product->save();
        return back()->withSuccess("Product details added Successfully");
    }

    public function view($id)
    {
        $product = ProductModel::where('id',$id)->first();
        return view('products.viewProduct',['product'=>$product]);
    }
    public function edit($id)
    {
        $product = ProductModel::where('id',$id)->first();
        return view('products.editProduct',['product'=>$product]);
    }
    public function update($id,Request $request)
    {
        $product = ProductModel::where('id',$id)->first();
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'MRP'=>'required | numeric',
            'price'=>'required | numeric',
            'image'=>'nullable | mimes:png,jpg,jpeg,png | max:10000'
        ]);

        if($request->image){   
            $imageName = time().".".$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->MRP = $request->MRP;
        $product->price = $request->price;
        $product->save();
        return back()->withSuccess("Product details updated Successfully");
    }
    public function delete($id)
    {
        $product = ProductModel::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess("Product deleted Successfully");
    }
}

