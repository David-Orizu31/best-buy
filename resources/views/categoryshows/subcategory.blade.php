@extends('layouts.app')
@section('title', 'Welcome to the Best Buy')
@section('content')

@foreach($subcatitemname as $subcatname)
        <div class="fashionsub-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="other-banner-text">            
                 <h1 class="text-white">{{$subcatname->subcat_name}}</h1>
                 <h5 class="text-white">{{$subcatname->subcat_name}} of different kinds are available shop now.</h5>
                </div>
               </div>
            </div>
          </div>
        </div>
@endforeach

<div class="container">
            <br>


            <br>
            @foreach($subcatitemname as $subcatname)
            <h3 class="text-center"><b>{{$subcatname->subcat_name}}</b></h3>
            @endforeach
            <br>
            <div class="row">
                @foreach($subcatitems as $subcatitem)
                <div class="col-md-2">
                  <div align="center">
                  <a href="{{ route('products.show',   $subcatitem->product_id  ) }}"  style="text-decoration:none;">
                    <div class="card img-card">
                     <img src="{{ ProductImage($subcatitem->image)}}" alt="{{$subcatitem->product_id}}" class="img img-fluid">
                     <div class="overlay">
                      <div class="text">
                        <span><b><i class="fas fa-cart-plus"></i></b></span>
                      </div>
                    </div>
                    </div>
                    <div class="product-price">
                      <p>{{\Illuminate\Support\Str::limit($subcatitem->product_name, 80)}}</p>
                      @if($subcatitem->rating == 5)
              <span class="text-warning rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
              </span>
              @elseif($subcatitem->rating == 4.5)
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
                      <p class="text-dark"><b>$ {{number_format($subcatitem->product_price, 2)}}</b></p>
                    </div>
</a>
                  </div>
                </div>
                  @endforeach
                </div>

        </div>

@endsection