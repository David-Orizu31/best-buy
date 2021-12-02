@extends('dashboard.navbar')

@section('title', 'Corpers Market | Account Profile')

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
            <h1 class="m-0">Account Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/overview">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="dash-area">
        <div class="card">
            <div class="card-area">
            <form method="POST" action="{{ route('dashboard.editprofile') }}">
                        @csrf
                        <br>
                        <input type="hidden" name="position" value="buyer">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="name">Name</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{Auth::user()->name}}" required>

                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                            <div class="form-group col-md-5 offset-md-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{Auth::user()->email}}" readonly required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="address">Address</label>
                                 <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{Auth::user()->address}}" required>

                                 @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            <div class="form-group col-md-5 offset-md-2">
                                <label for="tel">Telephone Number</label>
                                <input type="tel" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" value="{{Auth::user()->tel}}" required>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-5  ">
                                <label for="gender">Gender</label>
                                <select name="gender" id="" class="form-control" required>
                                    <option value="m" {{(Auth::user()->gender=== 'm') ? 'Selected' : ''}}>Male</option>
                                    <option value="f" {{(Auth::user()->gender=== 'f') ? 'Selected' : ''}}>Female</option>
                                </select>

                            </div>

                            <div class="form-group col-md-5 offset-md-2">
                        <label for="name">Closest Popular Place</label>
                        <input type="text" class="form-control @error('landmark') is-invalid @enderror" id="name" name="landmark" value="{{Auth::user()->landmark}}" required>

                        @error('landmark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                            </div>





                    <!-- <div class="form-group col-md-5 offset-md-2">

                    </div> -->


                      <!-- <div class="form-group col-md-5 offset-md-2">
                        <label for="file">Upload Photo</label>
                        <input type="file" class="form-control-file" name="image" id="file" value="{{Auth::user()->image}}">
                    </div> -->

                      <button class="btn btn-success offset-md-11" type="submit">Submit</button>
                    </form>
            </div>
        </div>
    </div>

    <br><br><br>
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