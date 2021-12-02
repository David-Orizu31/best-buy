@extends('layouts.app')
@section('title', 'Welcome to the Best Buy')
@section('content')

<div class="contact-banner">
          <div class="container">
            <div class="row">
              <div class="col-md-5">
                <div class="other-banner-text">
                   <h1 class="text-white">Contact Us</h1>
                   <h5 class="text-white">You can reach us through any of the options provided below.</h5>
                  </div>
                 </div>
              </div>
            </div>
          </div>

          @if(Session::has('success'))
          <div class="container-fluid">
             <div class="alert alert-success" width="100%">
               <span>{{Session::get('success')}}</span>
               </div>
               </div>
             @endif

          <br><br>
          <div class="container">
              <h2><b>Contact Us</b></h2>
              <div class="row">
                  <div class="col-md-8">
                    <form action="/sendmail" method="post">
                        @csrf
                        <p class="text-danger"><b>Send a message to us now and we'll give you feedback.</b></p>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control form-input text-dark" placeholder="Name" required>
                           </div>
                          </div>
                          <div class="col-sm-6">
                           <div class="form-group2">
                            <input type="email" name="email" id="email" class="form-control form-input text-dark" placeholder="Email" required>
                            </div>
                          </div>
                        </div>
         
                        <br>
                        <div class="row">
                         <div class="col-sm-6">
                           <div class="form-group">
                           <input type="tel" name="phone" id="tel" class="form-control form-input text-dark" placeholder="Phone Number" required>
                         </div>
                         </div>
                         <div class="col-sm-6">
                           <div class="form-group2">
                           <input type="text" name="address" id="address" class="form-control form-input text-dark" placeholder="Address" required>
                         </div>
                         </div>
                       </div> 
         
                       <br>
                       <div class="row">
                         <div class="col-sm-12">
                           <div class="form-group">
                           <input type="text" name="subject" id="subject" class="form-control form-input text-dark" placeholder="Subject" required>
                         </div>
                         </div>
                       </div>
                       
                       <br>
                       <div class="row">
                         <div class="col-sm-12">
                           <div class="form-group">
                           <textarea name="message" id="message" cols="30" rows="4" class="form-control form-input text-dark" placeholder="Enter Message" required></textarea>
                           </div>
                         </div>
                       </div>
         
                       <br>
                       <div class="d-grid">
                         <button class="btn btn-submit" type="submit">Submit</button>
                       </div>
                      </form>
                  </div>
                  <div class="col-md-4">
                     <div class="container contact-row-2">
                         <h3><b>Address</b></h3>
                         <p class="contact-text"><span class="text-danger"><i class="fas fa-home"></i></span> - 230 Calle Federico Costa.</p>
                         <p class="contact-text"><span class="text-danger"><i class="fas fa-envelope"></i></span> - support@thebestbuy.com</p>
                         <p class="contact-text"><span class="text-danger"><i class="fas fa-phone"></i></span> - (787) 760-4700</p>
                     </div>
                  </div>
              </div>
          </div>

          @endsection