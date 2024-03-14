@extends('layouts.app')
@section('categoryView')
    <div class="row row-cols-1 row-cols-md-3 g-4" style="max-width: 75%; margin:0% auto;">
        @forelse ($data as $product)
            <div class="col">
                <div class="card h-100 mt-4" style="cursor: pointer">
                    <a href="{{ $product['id'] }}/viewProduct">
                        <img src="{{ asset("images/{$product['image']}") }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                    
                            <h5 class="card-title text-decoration-none mt-0 ">{{ $product['name'] }}</h5>
                        
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional
                            content. This content is a little bit longer.</p>
                        <div class="star text-center">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <h6 class="card-text text-decoration-none" style="color:green"><small class="text-muted">1k+
                                bought in
                                the last month</small></h6>
                        <h3 class="fw-bold" style="display: inline;">
                            <small>Rs.&nbsp;{{ $product['discounted_price'] }}</small>
                        </h3><br>
                        <h6>List Price :<small
                                class="text-decoration-line-through">Rs.&nbsp;{{ $product['list_price'] }}</small></p>
                            <p><small class="px-lg-2 pt-1 pb-1" style="background-color: rgb(12, 181, 12);">Save
                                    11%</small>&nbsp;with coupon (some size/colors)</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="mt-4">
                <p>There are no products</p>
            </div>
        @endforelse
    </div>
@endsection
