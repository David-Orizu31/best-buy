@extends('layouts.app')
@section('title', 'Welcome to the Best Buy')
@section('content')

<div class="about-banner">
          <div class="container">
            <div class="row">
              <div class="col-md-5">
                <div class="other-banner-text">
                   <h1 class="text-white">About The Best Buy</h1>
                   <h5 class="text-white">Know more about us our mission, values and how the company came into existence.</h5>
                  </div>
                 </div>
              </div>
            </div>
          </div>

          <br><br>
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h2><b>Our Mission</b></h2>
                <div class="other-text-area">
                <p> Looking at the world today and analyzing the needs of the society presently and in the future, The Best Buy has taken time to write our mission statement. 
                  It's content is based on how we can make more innovative products that can satisfy the needs of our clients.
                </p>
              </div>
              <a href="/about/mission" class="btn btn-learn">Learn more <i class="fas fa-angle-double-right"></i></a>
              </div>
              <div class="col-md-6">
                <br>
                <div data-aos="fade-left" data-aos-duration="1800">
                <img src="img/mission.jpg" alt="our-mission" class="img img-fluid">
              </div>
              </div>
            </div>

            <br><br>
            <div class="row">
              <div class="col-md-6">
                <br>
                <div data-aos="fade-right" data-aos-duration="2000">
                <img src="img/fashion-values.jpg" alt="our-mission" class="img img-fluid">
              </div>
              </div>

              <div class="col-md-6">
                <h2><b>Our Values</b></h2>
                <div class="other-text-area">
                <p> We are passionate about what we do in our company. We make sure all transactions done are fair and transparent, they are all done with integrity. We carry out so many ideas in our work.
                </p>
              </div>
              <a href="/about/values" class="btn btn-learn">Learn more <i class="fas fa-angle-double-right"></i></a>
              </div>
            </div>

            <br><br>
            <div class="row">
              <div class="col-md-6">
                <h2><b>Our History</b></h2>
                <div class="other-text-area">
                <p> The Best Buy began it's operation on the 25th of February 2012 at  Calle Federico Costa which is presently its headquaters.
                  
                </p>
              </div>
              <a href="/about/history" class="btn btn-learn">Learn more <i class="fas fa-angle-double-right"></i></a>
              </div>
              <div class="col-md-6">
                <br>
                <div data-aos="zoom-in-up" data-aos-duration="2200">
                <img src="img/our-history.jpg" alt="our-mission" class="img img-fluid">
              </div>
              </div>
            </div>
          </div>

@endsection