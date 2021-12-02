@extends('layouts.app')
@section('title', 'Restaurants')
@section('content')


<div class="banner-banner text-center">
              <!-- <img src="img/delivery-banner.jpg" alt="" class="img-responsive"> -->
              <div class="banner-link">
              <h1 class="text-white">MENU</h1>
              <p class="text-white">Home | {{$products->company_name}}</p>
              </div>
          </div>

          <a href="https://api.whatsapp.com/send?phone=2348184751332&text=Digital%20Roah%20Services" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
            </a>


            <div class="container">
                <br>

                <h2 class="text-center header">{{$products->company_name}}</h2>

                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="full-menu">
                            <a href="/featured" class="menu-item"><div class="row">
                                <div class="col-md-4">
                                <img src="../img/full-menu.jpg" alt="" width="100%" style="max-width: 100px !important;" class="img-responsive">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="menu-name">Featured Menu</h5>
                                </div>
                                </div></a>
                        </div>

                        <br><br>
                    <div class="other-menus">
                    @include('companyproducts.sidebar')

                    </div>

                    </div>

                    <div class="col-md-8">
                       <br><br>


                       <h3 class="text-center">{{$products->company_name}}</h3>
                       <br><br>

                       @foreach(array_chunk($products->products->all(), 3) as $rows)

                       <div class="row">
                           @foreach($rows as $row)
                        <div class="col-md-4">
                            <a href="{{ route('products.show',   $row->product_id  ) }}" class="menu-item menu-itemdown">
                            <img src="{{ productImage($row->image)}}" alt="{{$row->product_name}}" width="90%" height="180px" class="img-responsive">
                            <p class="menu-product text-center">{{$row->product_name}}</p>
                            <p class="cart-details text-center"><b>₦ {{number_format($row->product_price, 2)}}</b></p>
                            </a>
                        </div>
                        @endforeach
                    </div>
@endforeach




                    </div>
                </div>
            </div>




    @endsection
