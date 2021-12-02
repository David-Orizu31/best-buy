
@extends('layouts.app')

@section('content')

@include('flash::message')

@if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <br>
          <div class="container">
              <h3>Cart</h3>


            <h5>{{ Cart::count() }} item(s) in Shopping Cart</h5>
              <br>

              <div class="table-responsive">
               <table class="table table-bordered" style="padding-bottom: 0px !important;">
                <tr class="table-row text-center">
                  <th>ITEM</th>
                  <th>QUANTITY</th>
                  <th>UNIT PRICE</th>
                  <th>SUB-TOTAL</th>
                </tr>
                @foreach (Cart::content() as $item)

                <tr class="table-row">

                  <td>
                    <div class="row">
                    <div class="col-md-4">

                      <img src="{{ $item->options->image}}" alt="" width="100%" class="img-responsive cart-image">
                  </div>
                  <div class="col-md-8">
                      <br>
                      <p class="cart-details">{{ $item->name }}</p>
                  </div>
                  </div>
                  </td>

                  <td class="text-center">
                       <div class="product_count">



<select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="{{ $item->model->product_quantity }}">
        @for ($i = 1; $i < $item->model->product_quantity + 1 ; $i++)
            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
        @endfor
</select>
</div>
</td>

                  <td>
                    <p class="cart-details text-center"><b>{{ presentPrice($item->price) }}</b></p>
                  </td>

                  <td>
                    <p class="cart-details text-center"><b>{{ presentPrice($item->subtotal) }}</b></p>
                  </td>

                  <td>

        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST" class="text-center">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i>Remove</button>
            </form>
</td>
                </tr>
                @endforeach

               </table>
               </div>


              <div class="container text-right">
              <h6><b>Total :</b> <span style="font-size: 23px; margin-left: 15px;" class="text-danger">{{ presentPrice($withoutTax) }}</span></h6>
                <br>
                <h6><b>Tax :</b> <span style="font-size: 23px; margin-left: 15px;" class="text-danger">{{  ($tax) }}</span></h6>
                <br>
                <h6><b>Final Total :</b> <span style="font-size: 23px; margin-left: 15px;" class="text-danger">{{  ($totalPrice) }}</span></h6>
                <br>

                </div>
                        <br>
                  <br>

          </div>
         <div class="container row">
         <div class="col-md-4 offset-md-2">
         @if (!empty($urllink))
                        <a class="btn btn-danger text-white" href="{{$urllink}}">Continue Shopping</a>

                        @else
                        <a class="btn btn-danger text-white" href="{{URL::previous()}}">Continue Shopping</a>
                        @endif
</div>
 
<div class="col-md-3 offset-md-3">
                <!-- <div class="form-check form-check-inline">

                    <p><b>Deliver to me:</b></p>
                </div>
                <small>This Charge is without Deivery. You will be Charged an extra $ 500 if you want your item Delivered</small> -->
                <form action="{{ route('cart.billing') }}" method="POST">
                    {{ csrf_field() }}
                    {{-- @foreach (Cart::content() as $item)
                    @if ($loop->first)
                    <input type="hidden" name="companyid" value="{{$item->model->company_id }}">
                     @endif

                    @endforeach --}}
                <!-- <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="yes" >
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="no" checked>
                    <label class="form-check-label" for="inlineRadio2">No</label>
                  </div> -->

<button type="submit" class="btn btn-danger text-white">Review</button>

</form>
</div>
         </div>


           @endsection



            @section('extra-js')

            <!-- important for ajax quantity to work-->



<script src="{{ asset('js/app.js') }}"></script>

<script>
        (function(){

            const classname = document.querySelectorAll('.quantity')

            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {

                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {

                        quantity: this.value,

                        productQuantity: productQuantity
                    })
                    .then(function (response) {

                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {

                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>

@endsection
