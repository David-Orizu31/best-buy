@extends('layouts.app')
@section('title', 'Welcome to the Best Buy')
@section('content')

<div class="values-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="other-banner-text">
                 <h1 class="text-white">Our Values</h1>
                 <h5 class="text-white">Take a view of the norms we uphold in the Best Buy</h5>
                </div>
               </div>
            </div>
          </div>
        </div>

        <div class="container">
          <br><br>
          <div class="row">
            <div class="col-md-6">
              <h2><b>Our Values</b></h2>
              <div class="other-text-area">
              <p> We are passionate about what we do in our company. We make sure all transactions done are fair and transparent, they are all done with integrity. We carry out so many ideas in our work.
              </p>
            </div>
            </div>

            <div class="col-md-6">
              <br>
              <div data-aos="fade-left" data-aos-duration="2000">
              <img src="{{asset('img/fashion-values.jpg')}}" alt="our-mission" class="img img-fluid">
            </div>
            </div>
          </div>

          <br>
          <p class="mission-text"><b>Here are Some of our core values in the Best Buy:</b></p>
          <ul class="mission-list">
              <li><span class="text-danger">Passion is key:</span> we are passionate in everything we undertake.</li>
              <li><span class="text-danger">Keep it surprising:</span> we encourage and develop wild big ideas; our ambition is to make a difference</li>
              <li><span class="text-danger">Learning by doing:</span> we believe in trial and error; we trust our gut feeling and emotions</li>
              <li><span class="text-danger">Celebrate life:</span> we work hard, but we only do things that give us energy</li>
              <li><span class="text-danger">Permanent questioning:</span> we stay alert; we challenge ourselves; there is no status quo</li>
              <li><span class="text-danger">Integrity:</span> we are uncompromising about our integrity and are driven by an interest in the world and our customers</li>
          </ul>
        </div>

@endsection