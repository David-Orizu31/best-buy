<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('The Best Buy', 'The Best Buy') }} @yield('title')</title>
    <meta name="description" content="Shop from your favourite restaurant online and have your item ready before your arrival or delivered to your doorstep!">
    <meta name="keywords" content="jos resaurants, vendors, fast delivery">
    <meta name="robots" content="index, follow" />
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <!-- Bootstrap Styles -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Animate.Css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="{{asset('aos/aos.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}">
    <!-- Font Awesome Js -->
   <script src="{{asset('js/font-awesome.js')}}"></script>
</head>
<body>
<header class="site-header">
    <div class="row">
      <div class="col-sm-6">
     <span class="text-white header-text">We have over 1 million <i class="fas fa-users"></i> people shopping at <b>The Best Buy</b>.</span>
    </div>    
    <div class="col-sm-6">
    @guest
    <div class="auth-btns" align="right">  
                            @if (Route::has('login'))
       <a href="{{ route('login') }}" class="btn btn-login"><b>Login</b></a>
       @endif

@if (Route::has('register'))
       <a href="{{ route('register') }}" class="btn btn-register"><b>Sign Up</b></a>
       @endif
</div>
                        @else
                        <div class="nav-item dropdown">




<a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    {{ Auth::user()->name }}
</a>


<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="align-items: right !important;">

    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</ul>
</div>
@endguest
</div>
      </div>
  </header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/"><h4>The Best Buy</h4></a>
          <button class="navbar-toggler nav-toggle p-0 border-0" type="button" aria-controls="navbarNavDropdown"  data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="bar-top"></span>
            <span class="bar-mid"></span>
            <span class="bar-bot"></span>
          </button>
          <div class="collapse navbar-collapse offset-md-1 nav-area" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{  request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item dropdown nohover">
                <a class="nav-link dropdown-toggle navdrop-toggle {{  request()->is('about-us') ? 'active' : '' }}" href="/about-us" id="navbarDropdown" aria-expanded="false" >
                  About <span class="fas fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu navdrop-menu single" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/about/mission">Our Mission</a></li>
                  <li><a class="dropdown-item" href="/about/values">Our Values</a></li>
                  <li><a class="dropdown-item" href="/about/history">History</a></li>
                  </ul>
              </li>
              @foreach($maincategory as $maincats) 

              <li class="nav-item dropdown nohover">
                <a class="nav-link dropdown-toggle navdrop-toggle {{  request()->is('items/'.$maincats->id) ? 'active' : '' }}" href="/items/{{$maincats->id}}" id="navbarDropdown" aria-expanded="false">
                 {{$maincats->maincat_name}} <span class="fas fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu navdrop-menu single" aria-labelledby="navbarDropdown">
                @foreach($category as $cats)
                @if($cats->parent_id == $maincats->id)
                <li><a class="dropdown-item item-head" href="/sub-items/{{$cats->id}}"><b>{{$cats->cat_name}}</b></a></li>
                {{-- @foreach($subcategories as $subcategory)
                @if($subcategory->cat_id == $cats->id)
                <li><a class="dropdown-item" href="/sub-sub-items/{{$subcategory->id}}">{{$subcategory->subcat_name}}</a></li>
                @endif
                @endforeach --}}
                @endif
                @endforeach
</ul>
</li>

              @endforeach
              <li class="nav-item">
                <a class="nav-link {{  request()->is('new-products') ? 'active' : '' }}" href="/new-products">New Products</a>
              </li>
              <li class="nav-item dropdown nohover">
                <a class="nav-link dropdown-toggle navdrop-toggle {{  request()->is('contact-us') ? 'active' : '' }}" href="/contact-us" id="navbarDropdown" aria-expanded="false">
                  Contact <span class="fas fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu navdrop-menu single" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/faqs">FAQ</a></li>
                  <li><a class="dropdown-item" href="/contact-us">Contact Us</a></li>
                  </ul>
              </li>
            </ul>
            <div class="d-flex">   
              <a href="/cartitems" class="cart-link position-relative">
                <i class="fas fa-shopping-cart"></i>
                <span class="position-absolute top-2 start-100 translate-middle p-0 badge bg-danger" id="cart-count">
                 <small>{{Cart::count()}}</small>
                </span>
              </a>
            </div>
          </div>
        </div>
      </nav>

            @yield('content')


            <br><br>

<footer class="footer-area">
  <br>
  <div class="container">
  <div class="row">
    <div class="col-md-3">
      <h5 class="foot-head"><b>The Best Buy</b></h5>
      <p class="foot-text">The Best Buy is multilingual firm that specialises in the distribution of fashion wears, gift such as gift cards and other gift items, jewelries for both men and women and so on. We are targeting at enabling the distribution of items all over the globe.</p>
    </div>
    <div class="col-md-3">
      <h5 class="foot-head"><b>Nav Links</b></h5>
      <ul class="foot-link">
        <li><a href="/">Home</a></li>
        @foreach($maincategory as $maincats) 
        <li><a href="/items/{{$maincats->id}}">{{$maincats->maincat_name}}</a></li>
        @endforeach
        <li><a href="/about-us">About</a></li>
        <li><a href="/contact-us">Contact</a></li>
        <li><a href="/terms">Terms and Conditions</a></li>
      </ul>

      <h6 class="foot-head2"><a href="/about-us"><b>About</b></a></h6>
      <ul class="foot-link">
        <li><a href="/about/mission">Our Mission</a></li>
        <li><a href="/about/values">Our Values</a></li>
        <li><a href="/about/history">History</a></li>
      </ul>
      
      <h6 class="foot-head2"><a href="/contact-us"><b>Contact</b></a></h6>
      <ul class="foot-link">
        <li><a href="/faqs">FAQ</a></li>
        <li><a href="/contact-us">Contact Us</a></li>
      </ul>
    </div>
    <div class="col-md-6">
      <div class="row">

      <div class="col-sm-6">
      <h5 class="foot-head"><b>Other Collections</b></h5>
      @foreach($maincategory as $maincats) 
      <h6 class="foot-head2"><a href="/items/{{$maincats->id}}"><b>{{$maincats->maincat_name}}</b></a></h6>
      <ul class="foot-link">
      @foreach($category as $cats)
                @if($cats->parent_id == $maincats->id)
        <li><a href="/sub-items/{{$cats->id}}">{{$cats->cat_name}}</a></li>
        @endif
        @endforeach
</ul>
@endforeach
    </div>

    <div class="col-sm-6">

      <h5 class="foot-head"><b>Address Info</b></h5>
      <ul class="address-link">
        <li><a target="_blank" href="https://www.google.com/maps/place/Best+Buy/@18.4248559,-66.0713943,15z/data=!4m2!3m1!1s0x0:0x6723537385974c1d?sa=X&ved=2ahUKEwjM7sKalbz0AhURERQKHc_0BkMQ_BJ6BAhZEAU"><i class="fas fa-home"></i> - 230 Calle Federico Costa</a></li>
        <li><a href="mailto:support@thebestbuy.com"><i class="fas fa-envelope"></i> - support@thebestbuy.com</a></li>
        <li><a href="tel:(787) 760-4700"><i class="fas fa-phone"></i> - (787) 760-4700</a></li>
      </ul>
    </div>

    </div>
    </div>
  </div>
  <div class="social-media text-center">
    <a href="#un" class="media-icons"><i class="fab fa-facebook"></i></a>
    <a href="#un" class="media-icons"><i class="fab fa-twitter"></i></a>
    <a href="#un" class="media-icons"><i class="fab fa-instagram"></i></a>
  </div>
</div>
<br>
<div class="copyright-area text-center text-white">
   <span>Copyright &copy; <span id="copyright">
    <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>
</span> | The Best Buy</span>
</div>
</footer>


<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
<script src="{{asset('js/scripts.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js')}}"></script>
<script>
$(document).ready(function(){
$("#owl-banner").owlCarousel({
loop:true,
autoplay:true,
autoplayTimeout:5000,
items: 1,
nav:true,
navText : ["<i class='fas fa-chevron-left fa-2x'></i>","<i class='fas fa-chevron-right fa-2x'></i>"]
});
});
</script>

<script>
$(document).ready(function(){
  $('.loop').owlCarousel({
center: true,
items:2,
loop:true,
margin:15,
autoplay:true,
autoplayTimeout:3000,
nav:true,
navText : ["<i class='fas fa-chevron-left fa-2x'></i>","<i class='fas fa-chevron-right fa-2x'></i>"],
responsive:{
  600:{
      items:4
  }
}
});
});
</script>

<script src="{{asset('aos/aos.js')}}"></script>
<script>
AOS.init();
</script>
</body>
</html>