@extends('layouts.app')
@section('main')
<div class="row">
    <div class="d-flex justify-content-between">
        <h5><i class="bi bi-journal-richtext"></i>&nbsp;Product details</h5>
        <a href="products/insertProduct" class="btn btn-primary"><i class="bi bi-plus-circle"></i> New Product</a>
    </div>
    <div class="col-md-12 table-responsive mt-3">
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Image</th>
                <th>Product</th>
                <th>M.R.P</th>
                <th>Selling</th>
                <th>Action</th>
            </tr>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><img src="shopping.jpeg" alt="image"></td>
                    <td><a href="viewproduct.html">Samsung</a></td>
                    <td>Rs. 25000</td>
                    <td>Rs. 22000</td>
                    <td>
                        <a href="/editProduct.html" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><img src="shopping.jpeg" alt="image"></td>
                    <td>Samsung</td>
                    <td>Rs. 25000</td>
                    <td>Rs. 22000</td>
                    <td>
                        <a href="#" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><img src="shopping.webp" alt="image"></td>
                    <td>Samsung</td>
                    <td>Rs. 25000</td>
                    <td>Rs. 22000</td>
                    <td>
                        <a href="#" class="btn btn-dark"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
@endsection