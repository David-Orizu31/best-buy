@extends('dashboard.navbar')

@section('title', 'Corpers Market | Add New Items')

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
            <h1 class="m-0">Add Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/overview">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Items</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="dash-area">
<div class="card">
    <div class="card-header">
        <h5><b>Add Items you'll Love to sell</b></h5>
    </div>
    <div class="card-body">
        <form action="{{route('dashboard.saveitems')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <div class="form-group">
              <label for="item_name" class="form-label"><strong>Item Name</strong></label>
              <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Item Name" required>
            </div>
            <div class="form-group">
              <label for="image" class="form-label"><strong>Image</strong></label>
              <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="images" class="form-label"><strong>Images</strong></label>
              <input type="file" name="images[]" id="images" class="form-control" required multiple>
            </div>
            <div class="form-group">
              <label for="item_description" class="form-label"><strong>Item Description</strong></label>
              <textarea name="item_description" id="item_description" cols="30" rows="5" class="form-control" placeholder="Item Description" required></textarea>
            </div>
            <div class="form-group">
              <label for="item_quantity" class="form-label"><strong>Item Quantity</strong></label>
              <input type="number" name="item_quantity" id="item_quantity" class="form-control" placeholder="Item Quantity" required>
            </div>
            <div class="form-group">
              <label for="item_price" class="form-label"><strong>Item Price</strong></label>
              <input type="text" name="item_price" id="item_price" class="form-control" placeholder="Item Price (No Currency Symbol)" required>
            </div>
            <div class="form-group">
              <label for="category_id" class="form-label"><strong>Item Category</strong></label>
              <select name="category_id" id="category_id" class="form-control" required>
                <option value="category_id" selected disabled>Select Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Add</button>
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