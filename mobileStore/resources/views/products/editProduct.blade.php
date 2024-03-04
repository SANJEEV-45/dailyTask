@extends('layouts.app')
@section('main')
<div class="row">
    <h5 class="bi bi-pencil-square">&nbsp;Edit product</h5>
    <hr>
    <nav>
        <ol class="breadcrumb ">
            <li class="breadcrumb-item "><a href="/">Homepage</a></li>
            <li class="breadcrumb-item active">Edit product</a></li>
        </ol>
    </nav>
    <div class="col-md-6">
        <form action="/products/{{$product->id}}/updateProduct" method="post" id="productForm" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row mb-3">
                <div class="row-md-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{$product->name}}" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif" placeholder="Enter product name" name="name" id="name" >
                </div> 
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="MRP" class="form-label">MRP</label>
                    <input type="text" value="{{$product->MRP}}" placeholder="Enter the M.R.P" name="MRP" class="form-control @if($errors->has('MRP')) {{'is-invalid'}} @endif" id="MRP">
                </div> 
                <div class="col-md-6">
                    <label for="SP" class="form-label" >Selling Price</label>
                    <input type="text" value="{{$product->price}}" placeholder="Enter selling price" name="price" id="price" class="form-control @if($errors->has('price')) {{'is-invalid'}} @endif" id="SP">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="Desc" class="form-label" >Description</label>
                    <textarea name="description" id="description" class="form-control @if($errors->has('description')) {{'is-invalid'}} @endif" id="desc">{{$product->description}}</textarea>
                </div> 
            </div>
            <div class="row mb-3">
                <div class="row-md-12">
                    <label for="image" class="form-label" >Image</label>
                    <input type="file" name="image" class="text form-control" id="image">
                </div> 
            </div>
            <button type="submit" class="btn btn-dark">Update Product</button>
        </form>
    </div>
</div>
@endsection