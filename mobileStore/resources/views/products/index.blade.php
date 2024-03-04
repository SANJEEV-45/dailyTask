@extends('layouts.app')
@section('main')
<div class="row">
    <div class="d-flex justify-content-between">
        <h5><i class="bi bi-journal-richtext"></i>&nbsp;Product details</h5>
        <a href="products/insertProduct" class="btn btn-primary"><i class="bi bi-plus-circle"></i> New Product</a>
    </div>
    <div class="col-md-12 table-responsive mt-3">
        <table class="table table-bordered ">
            <tr>
                <th>S.No</th>
                <th>Image</th>
                <th>Product</th>
                <th>M.R.P</th>
                <th>Selling</th>
                <th>Action</th>
            </tr>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="products/{{$product->image}}" alt="image"></td>
                    <td><a href="products/{{$product->id}}/viewProduct">{{$product->name}}</a></td>
                    <td>{{$product->MRP}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="products/{{$product->id}}/editProduct" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                        <a href="products/{{$product->id}}/deleteProduct" onclick="return confirm('Are you sure you want to Delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection