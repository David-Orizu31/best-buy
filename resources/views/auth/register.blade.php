@extends('layouts.app')

@section('content')

          <div class="selform_area">
            <br>
            <div class="col-md-6 mx-auto">
                <div class="panel-area">
                <br>
            <h2 class="text-center">Sign Up</h2>
                <h3 class="text-center text-danger">Register with us</h3>
            <div class="container">

            <!-- <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom: 1px solid black !important;">
                <li class="nav-item">
                  <a class="nav-link active tab-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sign Up</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link tab-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Seller's Sign Up</a>
                </li>

              </ul> -->
              <!-- <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> -->
                <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="position" value="buyer">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Name</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" required>

                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <br>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your Email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>



                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="address">Address</label>
                                 <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Full Address">

                                 @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <br>
                            <div class="form-group">
                                <label for="tel">Telephone Number</label>
                                <input type="tel" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" placeholder="Insert Phone Number">

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                    </div>

                    <div class="form-row">
                    <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>

                            </div>
                            <br>

                            </div>

                    <div class="form-row">
                    <div class="form-group">
                        <label for="name">Closest Popular Place</label>
                        <input type="text" class="form-control @error('landmark') is-invalid @enderror" id="name" name="landmark" placeholder="Popular Place Close to Residence">

                        @error('landmark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <br>


                    <div class="form-group">

                        <label for="password">Password</label>
                    <input type="password" data-toggle="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Insert Password" required autocomplete="new-password">

                    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <br>

                    <div class="form-group">


                                <label for="password_confirm">Password Confirm</label>
                        <input type="password" data-toggle="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirm" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation">

                        @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <br>





                    <!-- <div class="form-group col-md-5 offset-md-2">

                    </div> -->


                      <!-- <div class="form-group col-md-5 offset-md-2">
                        <label for="file">Upload Photo</label>
                        <input type="file" class="form-control-file" name="image" id="file">
                    </div> -->
                      </div>

                      <div class="d-grid">
                      <button class="btn btn-submit" type="submit">Submit</button>
</div>
<br>
                    </form>
                <!-- </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> -->
                {{-- <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <br>
                        <input type="hidden" name="position" value="seller">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="name">Company Name</label>
                                 <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your company name">
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            <div class="form-group col-md-5 offset-md-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your Email">

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
                                 <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Full Address">

                                 @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            <div class="form-group col-md-5 offset-md-2">
                                <label for="tel">Telephone Number</label>
                                <input type="tel" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" placeholder="Insert Phone Number">


                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="name">Closest Popular Place</label>
                        <input type="text" class="form-control @error('landmark') is-invalid @enderror" id="landmark" name="landmark" placeholder="Popular Place Close to your location">

                        @error('landmark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                      <div class="form-group col-md-5 offset-md-2">
                        <label for="file">Upload Company Logo</label>
                        <input type="file" class="form-control-file" name="image" id="file">
                    </div>





                      </div>

                      <div class="form-row">
                      <div class="form-group col-md-5  ">
                          <div class="row">

                              <label for="password">Subdomain <small style="color:red">Do not us space or special characters</small></label>
                              <div class="col-md-6">
                        <input type="text" class="form-control @error('subdomain') is-invalid @enderror" id="subdomain" name="subdomain" placeholder="your company name" required autocomplete="new-password">

                        @error('subdomain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-md-6">
<h2>.kaedoors.com </h2>



                              </div>
                          </div>

</div>

                    </div>


                      <div class="form-row">
                      <div class="form-group col-md-5  ">
                        <label for="password">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Insert Password" required autocomplete="new-password">

                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
</div>
                                <div class="form-group col-md-5 offset-md-2">

                                <label for="password_confirm">Password Confirm</label>
                        <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirm" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation">

                        @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    </div>
                      <button class="btn btn-submit offset-md-11" type="submit">Submit</button>
                    </form>
                </div>
              </div>  --}}

              </div>
</div>
</div>


        </div>

        <style>
             .panel-area {
               border: 2px solid #c81432;
               border-radius: 7px;
             }
           </style>
@endsection
