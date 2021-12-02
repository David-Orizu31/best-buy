@extends('layouts.app')
@section('title', 'Welcome to the Best Buy')
@section('content')

<div class="mission-banner">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="other-banner-text">
                 <h1 class="text-white">Our Mission</h1>
                 <h5 class="text-white">Take a look at our Mission Statement and understand our Aims and objectives.</h5>
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
            </div>
            <div class="col-md-6">
              <br>
              <div data-aos="fade-left" data-aos-duration="1800">
              <img src="{{asset('img/mission.jpg')}}" alt="our-mission" class="img img-fluid">
            </div>
            </div>
          </div>

          <br>
          <p class="mission-text"><b>These are our mission statements as follows :</b></p>
          <ul class="mission-list">
              <li>We look forward to the distribution of our products across every market segment globally.</li>
              <li>The Hapiness of our Customers are our priority. We want your hapiness after services have been rendered.</li>
              <li>We want our products to reach abandoned areas of the world that actually needs them.</li>
          </ul>
          </div>


@endsection