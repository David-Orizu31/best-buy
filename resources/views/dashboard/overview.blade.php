@extends('dashboard.navbar')

@section('title', 'Corpers Market | Account Overview')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Account Overview</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/overview">Dashboard</a></li>
              <li class="breadcrumb-item active">My Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="dash-area">
       <div class="card">
          <div class="card-area">
              <div class="row">
                  <div class="col-md-6">
                     <div class="card">
                         <div class="card-header">
                            <span class="text-success">ACCOUNT DETAILS</span>
                            <a href="/dashboard/edit-profile" class="edit-account"><i class="fas fa-edit"></i></a>
                          </div>
                          <div class="card-body">
                            <h5 class="name">{{Auth::user()->name}}</h5>
                            <p>{{Auth::user()->email}}</p>
                            <br>
                            <a href="#" class="text-success">CHANGE PASSWORD</a>
                          </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                  <div class="card">
                         <div class="card-header">
                            <span class="text-success">WALLET BALANCE</span>
                          </div>
                          <div class="card-body">
                            <h3><i class="fas fa-wallet text-success"></i> ₦ 0.00</h3>
                          </div>
                     </div>
                  </div>
              </div>
          </div>
       </div>

       <br><br>
       <div class="card">
       <div class="card-header">
       <h4>Transaction History</h4>
       </div>
       <div class="card-body">
       <div class="table-responsive">
           <table class="table table-hover bg-secondary">
               <thead>
                   <tr align="center">
                       <th>Item</th>
                       <th>Quantity</th>
                       <th>Unit Price</th>
                       <th>Sub Total</th>
                       <th>Total</th>
                   </tr>
               </thead>
               <tbody>
                   <tr align="center">
                       <td style="max-width: 200px;"></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                   </tr>
               </tbody>
           </table>
       </div>
       </div>
       </div>

    </div>

    <br><br>
    <div class="dash-area">
        <div class="card">
            <div class="card-header">
                <h5><b>High Demands</b></h5>
            </div>
            <div class="card-body">
        <div class="featured">
              @foreach($highdemands as $highdemand)
                <div>
                  <a href="{{ route('products.show',   $highdemand->product_id  ) }}" class="slider-link text-dark">
                   <div class="image-slider" align="center">
                      <img src="{{ Voyager::image($highdemand->image)}}" alt="" width="200px" height="200px" class="img-responsive">
                      <p class="item-featuring text-center">{{$highdemand->product_name}} <br>
                        <span><b>₦ {{number_format($highdemand->product_price, 2)}}</b></span> -
                        <span><b>{{$highdemand->company->company_name}}</b></span></p>
                  </div>
                  </a>

                </div>
@endforeach
        </div>
        </div>
    </div>

    <br><br>
    <div class="card">
            <div class="card-header">
                <h5><b>Cart Items</b></h5>
            </div>
            <div class="card-body">
        <div class="featured">
              @foreach(Cart::content() as $item)
                <div>
                  <a href="{{ route('products.show',   $highdemand->product_id  ) }}" class="slider-link text-dark">
                   <div class="image-slider" align="center">
                      <img src="{{ $item->options->image}}" alt="" width="200px" height="200px" class="img-responsive">
                      <p class="item-featuring text-center">{{ $item->name }} <br>
                        <span><b>{{ presentPrice($item->subtotal) }}</b></span> -
                        <span><b>{{$highdemand->company->company_name}}</b></span></p>
                  </div>
                  </a>

                </div>
                @endforeach
        </div>
        </div>
    </div>
</div>

@endsection