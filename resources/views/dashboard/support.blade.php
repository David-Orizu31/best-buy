@extends('dashboard.navbar')

@section('title', 'Corpers Market | Contact Support')

@section('content')

@if(Session::has('success'))
<div class="container-fluid">
   <div class="alert alert-success" width="100%">
   <span class="closebtn">&times;</span> 
     <span>{{Session::get('success')}}</span>
     </div>
     </div>
   @endif

   <script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>

<style>
    .closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}

.alert {
    opacity: 1;
  transition: opacity 0.6s;
}
</style>

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Contact Support</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/overview">Dashboard</a></li>
              <li class="breadcrumb-item active">Contact Support</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="dash-area">
    <div class="card">
        <div class="card-header">
            <h5><b>Contact Support</b></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <h4 class="text-success"><i class="fas fa-phone"></i>  Contact Form</h4>
                    <br>
                    <form action="/sendmail" method="POST">
                        @csrf
                       <div class="form-group">
                           <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                       </div>
                       <div class="form-group">
                           <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}" readonly required>
                       </div>
                       <div class="form-group">
                           <input type="phone" name="phone" id="phone" class="form-control" placeholder="Your Phone Number" required>
                       </div>
                       <div class="form-group">
                           <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject of Topic" required>
                       </div>
                       <div class="form-group">
                           <textarea name="message" id="message" cols="30" rows="6" class="form-control" placeholder="Enter Message" required></textarea>
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-outline-success btn-block">Send</button>
                       </div>
                    </form>
                </div>
                <div class="col-md-5 offset-md-2">
                <h4 class="text-success"><i class="fas fa-user"></i>  General Information</h4>
                <br>
                <h6><b>Our Office</b></h6>
                <p>No 25 Ajekuta Ikeja Market Lagos State</p>
                <br>
                <h6><b>Operational Address</b></h6>
                <p>No 30 Lekki Tall Gate Lagos State</p>
                <br>
                <h6><b>Customer Service</b></h6>
                <p>No 25 Ajekuta </p>
                </div>
            </div>
        </div>
    </div>
    
    <br><br>
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