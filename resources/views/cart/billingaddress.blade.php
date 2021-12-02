
@extends('layouts.app')

@section('content')
      <div class="selform_area">
                <br>
                @if(Session::has('error'))
<div class="container-fluid">
   <div class="alert alert-danger" width="100%">
     <span>{{Session::get('error')}}</span>
     </div>
     </div>
   @endif
                <h2 class="text-center"><b>Billing</b></h2>
                <div class="container">
                <p class="item-purchased">Item Purchased costs $ {{number_format($newesttotal,2)}}. <small></small> </p>
                <img src="favicon/favicon.ico" class="img-responsive" style="width: 55%; height: 10px;" alt="">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                        <form method="POST" action="{{ route('paynow') }}" id="paymentForm">
                {{ csrf_field() }}


    <input type="hidden" name="amount" value="{{$newesttotal}}" />
     <input type="hidden" name="payment_method" value="both" />
     <input type="hidden" name="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email : 'guestuser@gmail.com' }}" />


<input type="hidden" name="lastname" value=".{{ \Carbon\Carbon::now()->format('YmdHis').Str::random(2) }}" />
      <input type="hidden" name="country" value="NG" />
       <input type="hidden" name="currency" value="NGN" />

       <input type="hidden" name="delivery" value="{{ $delivery }}" />
       <div class="col-md-8">
                        <h3 class="text-center text-danger">Billing Address</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name" class="form-label"><strong>Name</strong></label>
                                 <input type="text" class="form-control" id="name" name="firstname" value="{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label"><strong>Address</strong></label>
                                 <input type="text" class="form-control" id="address" name="address" value="{{ isset(Auth::user()->address) ? Auth::user()->address : '' }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="optional_address" class="form-address"><strong>Address 2 (Optional)</strong></label>
                            <input type="text" name="optional_address" id="optional_address" class="form-control">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="tel" class="form-label"><strong>Telephone Number</strong></label>
                                <input type="tel" class="form-control" id="tel" name="phonenumber" value="{{ isset(Auth::user()->tel) ? Auth::user()->tel : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="gender" class="form-label"><strong>Gender</strong></label>
                                <select class="form-control form-select" id="gender" name="gender" required>
                                @if($user = Auth::user())

    <option @if(Auth::user()->gender == 'm')  selected @endif  value="m">Male</option>
                                <option  @if(Auth::user()->gender == 'f')  selected @endif   value="f" >Female</option>
@else
<option   value="m">Male</option>
                                <option  value="f" >Female</option>
@endif


                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="state" class="form-label"><strong>State</strong></label>
                            <input type="text" name="state" id="state" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="city" class="form-label"><strong>City</strong></label>
                            <input type="text" name="city" id="city" class="form-control">
                        </div>

                        {{-- <div class="form-row">


 <div class="form-group col-md-5">
 <label for="" class="form-label">Add comment(s) Below</label>

 <textarea placeholder="Comment Box" cols="30" rows="5" name="commentbox"></textarea>

 </div>


</div> --}}


                        <br>

                        <h2 class="text-center text-danger">Card Billing Info</h2>
                        <div class="form-group">
                            <label for="payment_type" class="form-label"><strong>Payment Type</strong></label>
                            <select name="payment_type" id="payment_type" class="form-select">
                                <option value="">-- Select One --</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="debit_card">Debit card</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="card_name" class="form-label"><strong>Name on Card</strong></label>
                            <input type="text" name="card_name" id="card_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="card_number" class="form-label"><strong>Card Number</strong></label>
                            <input type="text" name="card_number" id="card_number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="expiration_month" class="form-label"><strong>Expiration Month</strong></label>
                            <select name="expiration_month" id="expiration_month" class="form-select">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expiration_year" class="form-label"><strong>Expiration Year</strong></label>
                            <select name="expiration_year" id="expiration_year" class="form-select">
                                @for ($year = date('Y');$year<=date('Y')+5;$year++)   
                                <option value="{{ $year }}"> {{ $year }}</option>   
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cvv" class="form-label"><strong>CVV</strong></label>
                            <input type="text" name="cvv" id="cvv" class="form-control @error('cvv') is-invalid @enderror">
                            @error('cvv')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <span class="text-danger"><b>Should not be more than 3 characters.</b></span>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-submit">Pay Now</button>
                        <br><br>
                    </div>
                    </form>
                    </div>

                    <div class="col-md-3">
                        <br>
                        <div class="box" style=" background-color: whitesmoke;">
                           <p class="text-white">YOUR PRICE</p>
                           <h2 class="text-dark text-center" style="padding: 10px;">Total Price  <br>  <span class="text-danger"><b>$ {{number_format($newesttotal,2)}}</b></span></h2>
                           <br>
                        </div>
                    </div>
                  </div>
                </div>
            </div>




            @endsection
