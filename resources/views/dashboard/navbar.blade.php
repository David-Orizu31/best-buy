<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('ADMINLTE-master/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('ADMINLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('ADMINLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('ADMINLTE-master/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('ADMINLTE-master/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('ADMINLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('ADMINLTE-master/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('ADMINLTE-master/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- Dashboard Styles -->
  <link rel="stylesheet" href="{{asset('ADMINLTE-master/styles.css')}}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{ asset('slick-1.8.1/slick-1.8.1/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('slick-1.8.1/slick-1.8.1/slick/slick.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('ADMINLTE-master/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <select class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
<option value="0" selected disabled>Search</option>
                                              <option value="abia">Abia</option>
                                              <option value="adawama">Adawama</option>
                                              <option value="akwa-ibom">Akwa Ibom</option>
                                              <option value="anambra">Anambra</option>
                                              <option value="bauchi">Bauchi</option>
                                              <option value="bayelsa">Bayelsa</option>
                                              <option value="benue">Benue</option>
                                              <option value="borno">Borno</option>
                                              <option value="cross-river">Cross River</option>
                                              <option value="delta">Delta</option>
                                              <option value="ebonyi">Ebonyi</option>
                                              <option value="edo">Edo</option>
                                              <option value="ekiti">Ekiti</option>
                                              <option value="enugu">Enugu</option>
                                              <option value="fct">Federal Capital Territory (FCT)</option>
                                              <option value="gombe">Gombe</option>
                                              <option value="imo">Imo</option>
                                              <option value="jigawa">Jigawa</option>
                                              <option value="kaduna">Kaduna</option>
                                              <option value="kano">Kano</option>
                                              <option value="katsina">Katsina</option>
                                              <option value="kebbi">Kebbi</option>
                                              <option value="kogi">Kogi</option>
                                              <option value="kwara">Kwara</option>
                                              <option value="lagos">Lagos</option>
                                              <option value="nassarawa">Nassarawa</option>
                                              <option value="niger">Niger</option>
                                              <option value="ogun">Ogun</option>
                                              <option value="ondo">Ondo</option>
                                              <option value="osun">Osun</option>
                                              <option value="oyo">Oyo</option>
                                              <option value="plateau">Plateau</option>
                                              <option value="rivers">Rivers</option>
                                              <option value="sokoto">Sokoto</option>
                                              <option value="taraba">Taraba</option>
                                              <option value="yobe">Yobe</option>
                                              <option value="zamfara">Zamfara</option>                  
              </select>
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/recently-viewed">
          <i class="fas fa-shopping-cart"></i>
          <span class="badge badge-danger navbar-badge">{{Cart::count()}}</span>
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">4</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">4 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <span class="message-seen"><i class="fas fa-circle"></i></span>Welcome to Coppers Market
            <span class="float-right text-muted text-sm">Seen</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          <span class="message-seen"><i class="fas fa-circle"></i></span>Premium Offers at Corpers Market
            <span class="float-right text-muted text-sm">Seen</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <span class="message-unseen"><i class="fas fa-circle"></i></span>Corpers Market Christmas Offers
            <span class="float-right text-muted text-sm">Unread</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <span class="message-unseen"><i class="fas fa-circle"></i></span>Cheap Logdes in Lagos
            <span class="float-right text-muted text-sm">Unread</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="/dashboard/messages" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" role="button" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();" title="logout">
          <i class="fas fa-power-off"></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard/overview" class="brand-link">
      <!-- <img src="{{asset('ADMINLTE-master/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light"><b>Corpers Market</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('ADMINLTE-master/dist/img/profile-mj.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard/overview" class="nav-link {{ request()->is('dashboard/overview') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/dashboard/orders" class="nav-link {{ request()->is('dashboard/orders') ? 'active' : ''}}">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/dashboard/messages" class="nav-link {{ request()->is('dashboard/messages') ? 'active' : ''}}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Messages
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/dashboard/coupon" class="nav-link {{ request()->is('dashboard/coupon') ? 'active' : ''}}">
              <i class="nav-icon fas fa-gift"></i>
              <p>
                Coupon
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/dashboard/add-items" class="nav-link {{ request()->is('dashboard/add-items') ? 'active' : ''}}">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Add Items
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/dashboard/view-items-added" class="nav-link {{ request()->is('dashboard/view-items-added') ? 'active' : ''}}">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                View Added Items
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/dashboard/recently-viewed" class="nav-link {{ request()->is('dashboard/recently-viewed') ? 'active' : ''}}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Cart Items
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/edit-profile" class="nav-link {{ request()->is('dashboard/edit-profile') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/changepass" class="nav-link {{ request()->is('dashboard/changepass') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="/dashboard/contact-support" class="nav-link {{ request()->is('dashboard/contact-support') ? 'active' : ''}}">
              <i class="nav-icon fas fa-comment-alt"></i>
              <p>
                Contact Support
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @yield('content')


    </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Corpers Market</a>.</strong>
    All rights reserved.
    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('ADMINLTE-master/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('ADMINLTE-master/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('ADMINLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('ADMINLTE-master/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('ADMINLTE-master/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('ADMINLTE-master/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('ADMINLTE-master/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('ADMINLTE-master/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('ADMINLTE-master/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('ADMINLTE-master/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('ADMINLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('ADMINLTE-master/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('ADMINLTE-master/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('ADMINLTE-master/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('ADMINLTE-master/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('ADMINLTE-master/dist/js/pages/dashboard.js')}}"></script>

<script defer src="https://use.font-awesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
       <script src="{{ asset('password/js/show-password.min.js') }}"></script>

<script src="{{ asset('select/selectize.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('select/selectize.bootstrap3.min.css') }}" />
    <script>
          $('select').selectize({
              sortField: 'text'
          });
          </script>

<script src="{{ asset('slick-js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('slick-js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('slick-1.8.1/slick-1.8.1/slick/slick.min.js') }}"></script>

    <script>
     $('.banner-area').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });

        $('.featured').slick({
  centerMode: true,
  autoplay: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
    </script>
</body>
</html>
