@extends('dashboard.navbar')

@section('title', 'Corpers Market | Change Password')

@section('content')

<div class="container-fluid">
@if(Session::has('success'))
   <div class="alert alert-success" width="100%">
     <span>{{Session::get('success')}}</span>
     <span class="closebtn">&times;</span> 
     </div>
   @endif
   @if(Session::has('error'))
   <div class="alert alert-danger" width="100%">
     <span>{{Session::get('error')}}</span>
     <span class="closebtn">&times;</span> 
     </div>
   @endif
   </div>

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
            <h1 class="m-0">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/overview">Dashboard</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="dash-area">
        <div class="card">
            <div class="card-area">
<form action="{{route('dashboard.changepass')}}" method="post">
    @csrf
    <div class="container">
        <div class="col-md-6">
            <div class="form-group">
                <label for="old_password" class="form-label"><h5>Old Password :</h5></label>
                <input type="password" data-toggle="password" name="old_password" id="old_password" class="form-control pwd  @error('old_password') is-invalid @enderror" placeholder="Enter Current Password" required>
                @error('old_password')
                               <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
            </div>
            <div class="form-group">
            <label for="new_password" class="form-label"><h5>New Password :</h5></label>
                <input type="password" data-toggle="password" name="new_password" id="new_password" class="form-control pwd  @error('new_password') is-invalid @enderror" placeholder="Enter New Password" required>
                @error('new_password')
                               <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
            </div>
            <div class="form-group">
            <label for="confirm_password" class="form-label"><h5>Confirm New Password :</h5></label>
                <input type="password" data-toggle="password" name="confirm_password" id="confirm_password" class="form-control pwd  @error('confirm_password') is-invalid @enderror" placeholder="Confirm New Password" required>
                @error('confirm_password')
                               <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
            </div>
            </div>
        <br>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Update Password</button>
      </div>
    </div>
    </form>
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