@extends('layouts.app')
@section('title', 'Welcome to the Best Buy')
@section('content')

<div class="menjewel-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="other-banner-text">
                 <h1 class="text-white">New Products</h1>
                 <h5 class="text-white">See New Products that are available shop now</h5>
                </div>
               </div>
            </div>
          </div>
        </div>

        <div class="container">
        <br><br>
        <h2 class="text-center"><b>New Products</b></h2>
        <br>
        <div class="row">
        @foreach($newproducts as $newproduct)
        <div class="col-md-2">
          <div align="center">
          <a href="{{ route('products.show',   $newproduct->product_id  ) }}"  style="text-decoration:none;">
            <div class="card img-card">
             <img src="{{ ProductImage($newproduct->image)}}" alt="{{$newproduct->product_id}}" class="img img-fluid">
             <div class="overlay">
              <div class="text">
              <span><b><i class="fas fa-cart-plus"></i></b></span>
              </div>
            </div>
            </div>
            <div class="product-price">
              <p>{{\Illuminate\Support\Str::limit($newproduct->product_name, 80)}} </p>
              @if($newproduct->rating == 5)
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
              </span>
              @elseif($newproduct->rating == 4.5)
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
              </span>
              @else
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
              </span>
              @endif
              <p class="text-dark"><b>$ {{number_format($newproduct->product_price, 2)}}</b></p>
            </div>
</a>
          </div>
        </div>
          @endforeach
        </div>

      </div>
        

@endsection