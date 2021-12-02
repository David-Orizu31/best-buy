@extends('layouts.app')
@section('title', 'Welcome to the Best Buy')
@section('content')

@foreach($mainitemname as $mainname)
@if($mainname->id == 1)
<div class="gifts-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="other-banner-text">
                 <h1 class="text-white">{{$mainname->maincat_name}}</h1>
                 <h5 class="text-white">{{$mainname->maincat_name}} of different kinds are available shop now.</h5>
                </div>
               </div>
            </div>
          </div>
        </div>
        @elseif($mainname->id == 2)
        <div class="jewelry-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="other-banner-text">
                 <h1 class="text-white">{{$mainname->maincat_name}}</h1>
                 <h5 class="text-white">{{$mainname->maincat_name}} of different kinds are available shop now.</h5>
                </div>
               </div>
            </div>
          </div>
        </div>
        @else
        <div class="fashion-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="other-banner-text">
                 <h1 class="text-white">{{$mainname->maincat_name}}</h1>
                 <h5 class="text-white">{{$mainname->maincat_name}} items of different kinds are available shop now.</h5>
                </div>
               </div>
            </div>
          </div>
        </div>
        @endif
@endforeach

<div class="container">
            <br>


            <br>
            @foreach($mainitemname as $mainname)
            <h3 class="text-center"><b>{{$mainname->maincat_name}}</b></h3>
            @endforeach
            <br>
            <div class="row">
                @foreach($mainitems as $mainitem)
                <div class="col-md-2">
                  <div align="center">
                  <a href="{{ route('products.show',   $mainitem->product_id  ) }}"  style="text-decoration:none;">
                    <div class="card img-card">
                     <img src="{{ ProductImage($mainitem->image)}}" alt="{{$mainitem->product_id}}" class="img img-fluid">
                     <div class="overlay">
                      <div class="text">
                        <span><b><i class="fas fa-cart-plus"></i></b></span>
                      </div>
                    </div>
                    </div>
                    <div class="product-price">
                      <p>{{\Illuminate\Support\Str::limit($mainitem->product_name, 80)}}</p>
                      @if($mainitem->rating == 5)
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
              </span>
              @elseif($mainitem->rating == 4.5)
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
                      <p class="text-dark"><b>$ {{number_format($mainitem->product_price, 2)}}</b></p>
                    </div>
</a>
                  </div>
                </div>
                  @endforeach
                </div>


        </div>

@endsection