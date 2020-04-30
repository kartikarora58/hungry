<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('/public/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('/public/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- Favicons -->
  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="apple-touch-icon" href="images/icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Stylesheets -->
  <link href="{{ asset('/public/css/app.css') }}" rel="stylesheet"> <!-- bootstrap done -->
  <link rel="stylesheet" href="{{asset('/public/css/plugins.css')}}"><!---done -->
  <link rel="stylesheet" href="{{asset('/public/css/style.css')}}"><!--done-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/css/image.css')}}">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <!-- Cusom css -->
 <link rel="stylesheet" href="{{asset('/public  /css/custom.css')}}"><!-- done -->
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <!-- Modernizer js -->
 <script src="{{asset('/public  /js/modernizr-3.5.0.min.js')}}"></script>

</head>

<body id="page-top">
<header class="htc__header bg--white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-sm-4 col-md-6 order-1 order-lg-1">
                            <div class="logo">
                                <a href="#">
                                    <img  src="{{asset('/public/images/logo.png')}}" style="width: 130%;" alt="logo images">
                                </a>
                            </div>
                        </div>
                        <div  class="col-lg-9 col-sm-4 col-md-2 order-3 order-lg-2">
                            <div style="margin-left: 10%" class="main__menu__wrap">
                                <nav class="main__menu__nav d-none d-lg-block">
                                    <ul class="mainmenu">
                                        <li class="drop"><a href="{{url('/home')}}">Home</a></li>
                                        <!-- <li><a href="about-us.html">About</a></li> -->
                                        <!-- <li><a href="gallery.html">Gallery</a></li> -->
                                        <!-- <li class="drop"><a href="blog-mesonry.html">Blog</a>
                                            <ul class="dropdown__menu">
                                                <li><a href="blog-mesonry.html">Blog Mesonry</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                        <!-- <li class="drop"><a href="#">Pages</a>
                                            <ul class="dropdown__menu">
                                                <li><a href="service.html">Service</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="checkout.html">Checkout Page</a></li>
                                                <li><a href="contact.html">Contact Page</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="{{url('/listing')}}">Listing</a></li>
                                        <li><a href="{{url('/contact')}}">Contact</a></li>
                                        @if(Auth::guest('web'))
                                        <li class="nav-item">
                                            <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                        @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                        @endif
                                        @else
                                        <li class="drop"><a href="#">{{Auth::user()->name}}</a>
                                        <ul class="dropdown__menu" aria-labelledby="navbarDropdown">
                                        <li><a href="{{url('/user/home')}}">Dashboard</a></li>
                                        <li><a  href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                            </li>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                        </ul>
                                    </li>
                                        @endguest

                                    </ul>
                                </nav>
                                
                                
                                
                            </div>
                        </div>
                        @if(Auth::check('web'))
                        <div class="col-lg-1 col-sm-4 col-md-4 order-2 order-lg-3">
                            <div class="header__right d-flex justify-content-end">
                                 
                                <div class="shopping__cart">
                                    <a  href="{{url('/cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></i></a>
                                    
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- Mobile Menu -->
                    <div class="mobile-menu d-block d-lg-none"></div>
                    <!-- Mobile Menu -->
                </div>
            </div>
        </header>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">User Dashboard </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/user/order_status')}}">
          <i class="fas fa-user-edit"></i>
          <span>Current Order Status</span></a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="{{url('/vendor/create/menu')}}">
          <i class="far fa-eye"></i>
          <span>Create/Update Menu</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fa fa-comments"></i>
          <span>Queries</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
   
       <div class="py-4">
                @yield('content')
            </div>
 </body>
 <script type="text/javascript" src="{{asset('/public/js/image.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="{{asset('/public   /js/plugins.js')}}"></script><!-- done -->
        <script src="{{asset('/public   /js/active.js')}}"></script><!-- done -->
 
    <!-- Bootstrap core JavaScript-->
  <script src="{{asset('/public/vendor/jquery/jquery.min.js')}}"></script>
  <!-- <script src="{{asset('/public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->

  <!-- Core plugin JavaScript-->
  <script src="{{asset('/public/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('/public/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('/public/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="{{asset('/public/js/demo/chart-area-demo.js')}}"></script> -->
  <!-- <script src="{{asset('/public/js/demo/chart-pie-demo.js')}}"></script> -->
  </html>