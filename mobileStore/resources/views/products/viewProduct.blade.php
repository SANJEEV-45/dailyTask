@extends('layouts.app')
@section('main')
<div class="container mt-5">
    <div class="row">
        <h5><i class="bi bi-file-earmark-fill"></i>&nbsp;View Product</h5>
        <hr>
        <nav>
            <ol class="breadcrumb ">
                <li class="breadcrumb-item "><a href="/">Homepage</a></li>
                <li class="breadcrumb-item active">View product</li>
            </ol>
        </nav>
        <div class="card d-flex flex-row">
            <img src="/products/{{$product->image}}" alt="{{$product->name}}" class="card-image-top">
            <div class="card-body">
                <h4 class="card-title fw-bold">{{$product->name}}</h4>
                <p class="card-text text-secondary">{{$product->description}}</p>
                <p class=" fw-bold">M.R.P <small class="text-decoration-line-through text-danger">Rs.&nbsp;{{$product->MRP}}</small></p>
                <p class="fw-bold ">Selling Price <small class="text-success">Rs.&nbsp;{{$product->price}}</small></p>
            </div>
        </div>
    </div>
</div>
@endsection