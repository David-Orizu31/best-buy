@extends('layouts.app')
@section('title', 'Welcome to the Best Buy')
@section('content')

<div class="history-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="other-banner-text">
                 <h1 class="text-white">Our History</h1>
                 <h5 class="text-white">Know more about how The Best Buy came into existence.</h5>
                </div>
               </div>
            </div>
          </div>
        </div>

        <div class="container">
            <br><br>
            <div class="row">
              <div class="col-md-6">
                <h2><b>Our History</b></h2>
                <div class="other-text-area">
                <p> The Best Buy began it's operation on the 25th of February 2012 at  Calle Federico Costa which is presently it's headquaters.
                    The Firm was discovered by <span class="italic">Charles Jonathan</span> who is an experienced Marketer and Fashion Designer.
                    The name "<b>The Best Buy</b>" was given by him because as a marketer he feels it's not all about persuading your clients to buy your product but
                    providing a visible evidence to ignite their level of confidence and assurance of that product. The Firm just started with only 20 employees but 
                    presently, we have over 1000 workers in The Best Buy.
                </p>
              </div>
              </div>
              <div class="col-md-6">
                <br>
                <div data-aos="zoom-in-up" data-aos-duration="2200">
                <img src="{{asset('img/our-history.jpg')}}" alt="our-mission" class="img img-fluid">
              </div>
              </div>
            </div>
        </div>

@endsection