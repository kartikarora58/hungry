<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Hungry Tiffins</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
 <script src="{{asset('/public  /js/modernizr-3.5.0.min.js')}}"></script><!-- done -->
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Add your site or application content here -->
	
	<!-- <div class="fakeloader"></div> -->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Start Header Area -->
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
            <!-- End Mainmenu Area -->
            <div>
                @yield('content')
            </div>
            <div  class="container-fluid"  style="background-color: black;">
  <br>
  <br>
  <div class="row" style="margin: auto;width: 85%">
    <div class="col-md-6" style="">
      <h4 style="color: white">About us</h4>
      <br>
      <p style="color: #ACB1AC;margin: auto">Hungry Tiffins is a web portal where vendors dealing in tiffin services can promote their
business online. The only requirement is to register and create profile by giving some basic
information about their business.
After that their details will be authenticated by our administrator and once verified their listing
will be made visible on our portal.
This portal will be of great ease to the customers. They can visit our portal and find various
vendors. They will get complete details of the vendors including their address, phone number,
email, meals they are providing and price of meals. Customers can select various meal packages
and book their order online and even can make online payment.</p><br><br>
  </div>
  <!-- <div class="vl"></div> -->
  <div class="col-md-3">
    <h3 style="color: white">Follow Us on</h3><br>
    <div class="row">
    <div class="col">
    <span style="color: white;font-size: 150%" class="fa fa-facebook-official" area-hidden="true">&nbsp;&nbsp;&nbsp;<a href="#" style="color: #ACB1AC;text-decoration: none;font-size: 80%">Facebook</a></span><br><br>
    <span style="color: white;font-size: 150%" class="fa fa-instagram" area-hidden="true">&nbsp;&nbsp;&nbsp;<a href="#" style="color: #ACB1AC;text-decoration: none;font-size: 80%">Instagram</a></span><br><br>
    <span style="color: white;font-size: 150%" class="fa fa-twitter" area-hidden="true">&nbsp;&nbsp;&nbsp;<a href="#" style="color: #ACB1AC;text-decoration: none;font-size: 80%">Twitter</a></span><br><br>
  </div>
  <div class="col">
    <span style="color: white;font-size: 150%" class="fa fa-google-plus" area-hidden="true">&nbsp;&nbsp;&nbsp;<a href="#" style="color: #ACB1AC;text-decoration: none;font-size: 80%">Google</a></span><br><br>
    <span style="color: white;font-size: 150%" class="fa fa-pinterest-p" area-hidden="true">&nbsp;&nbsp;&nbsp;<a href="#" style="color: #ACB1AC;text-decoration: none;font-size: 80%">Pinterest</a></span><br><br>
  </div>
</div>
<br>
<br>
</div>
  <div class="col-md-3">
  <h3 style="color: white">Subscribe to our newsletter</h3> <br> 
  <div class="contact_grid_right">
        <form>
          <div class="form-group">
            <input type="email" style="color: white;background-color: #363736"  name="email" class="form-control" placeholder="Enter your E-mail">
          </div>
          <input type="submit" class="btn btn-success" style="width: 100%" name="submit" class="form-control">
        </form>
      </div>
      <br>
      <br>
  </div>
  <br>
  <br>
</div>
<p style="color: #ACB1AC" align="center">Copyright &copy; 2020-Hungry Tiffins.<br>All rights reserved.</p> 
<br>

</div> 
                <!-- Login Form -->

        <!-- starting of footer area -->
        <!-- End Footer Area -->
        <!-- Login Form -->
       
        <!-- JS Files -->
        <script type="text/javascript" src="{{asset('/public/js/image.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="{{asset('/public   /js/plugins.js')}}"></script><!-- done -->
        <script src="{{asset('/public   /js/active.js')}}"></script><!-- done -->
</body>
</html>