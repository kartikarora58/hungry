@extends('user.layouts.userApp')
@section('content')
 <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
      .parallax {
  /* The image used */
  background-image: url("{{asset('/public/images/food.jpg')}}");

  /* Set a specific height */
  min-height: 1500px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.parallax2 {
  /* The image used */
  background-image: url("{{asset('/public/images/food.jpg')}}");

  /* Set a specific height */
  min-height: 500px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.parallax3 {
  /* The image used */
  background-image: url("{{asset('/public/images/background.jpeg')}}");

  /* Set a specific height */
  min-height: 500px; 

  /* Create the parallax scrolling effect */
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
#why{
	color: black;
}
  
  </style>
<!-- carousel start -->
	<div style="margin-top: -20px" id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('/public/images/1.png')}}" alt="Los Angeles" width="auto" height="100">
    </div>
    <div class="carousel-item">
      <img src="{{asset('/public/images/2.png')}}" width="auto" height="100">
    </div>
    <div class="carousel-item">
      <img src="{{asset('/public/images/3.png')}}" alt="New York" width="auto" height="100">
    </div>
  </div>
  <div class="carousel-item active">
      <img src="{{asset('/public/images/4.png')}}" alt="Los Angeles" width="auto" height="100">
    </div>

  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- carousel ends -->
<!-- parallax -->
<!-- <div class="parallax"></div> -->
<!-- end parallax -->
 <section class="fd__service__area bg-image--2 section-padding--xlg parallax3"  style="background-image: url({{asset('/public/images/background.jpeg')}})">
            <div class="container">
                <div class="service__wrapper bg--white">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="section__title service__align--left">
                                <p>The process of our service</p>
                                <h2 class="title__line">How it work</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mt--30">
                        <!-- Start Single Service -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="service">
                                <div class="service__title">
                                    <div class="ser__icon">
                                        <img src="{{asset('/public/images/icon1.png')}}" alt="icon image">
                                    </div>
                                    <h2><a href="#">Choose Vendor</a></h2>
                                </div>
                                <div class="service__details">
                                    <p>Select vendor on the basis of location and type of meals they are providing.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Service -->
                        <!-- Start Single Service -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="service">
                                <div class="service__title">
                                    <div class="ser__icon">
                                        <img src="{{asset('/public/images/icon2.png')}}" alt="icon image">
                                    </div>
                                    <h2><a href="#">Select meal,you love to eat</a></h2>
                                </div>
                                <div class="service__details">
                                    <p>Select your choice of meal.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Service -->
                        <!-- Start Single Service -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="service">
                                <div class="service__title">
                                    <div class="ser__icon">
                                        <img src="{{asset('/public/images/icon3.png')}}" alt="icon image">
                                    </div>
                                    <h2><a href="#">Delivery</a></h2>
                                </div>
                                <div class="service__details">
                                    <p>Delivery Begins !!!!</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Service -->
                    </div>
                </div>
            </div>
        </section>
<!-- <div style="background-image: url({{asset('/public/images/veggie.jpeg')}});"  class="slider__area slider--one parallax2">
            <div class="slider__activation--1">
                
                <div class="slide fullscreen bg-image--1">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="slider__content">
                                    <div class="slider__inner">
                                        <h2 style="color: #FF4233">Hungry Tiffins</h2>
                                        <h1 style="color: #FF4233">food delivery & service</h1>
                                        <div class="slider__input">
                                            <input type="text" placeholder="Type Place, City.Division">
                                           
                                            <div class="src__btn">
                                                <a href="#">Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div> -->
 <!-- process of service -->

        <!-- <div class="parallax"></div> -->
        <!-- why hungry tiffins -->
        <div class="container-fluid fd__service__area bg-image--2 section-padding--xlg parallax" style="background-image: url({{asset('/public/images/food.jpg')}})">
        	<br>
        	<br>
        	<br>
        	<br>
        	<br>
        	<br>
        	<div class="service__wrapper container" style="background-color:white">
        	<div class="row">
        		<h2 style="margin: auto;color: #D32B1D;">Why Hungry Tiffins</h2>
        	</div>
        	<br>
        	<br>
        	<br>
        	<div class="row">
        		<div class="col-sm-6">
        			<div class="row">
        				<div class="col-md-4">
        					<img src="{{asset('/public/images/ikon1.jpeg')}}">
        					
        				</div>
        				<div class="col-md-8">
        					<h4 style="color: #D32B1D">Ghar Ka Khana</h4>
        					<br>
        					<p id="why">Delicious Home Style food with minimal oil / masalas.</p>
        				</div>
        		
        			</div>
        			<br>
        			<div class="row">
        				<div class="col-md-4">
        					<img src="{{asset('/public/images/ikon2.jpeg')}}">
        					
        				</div>
        				<div class="col-md-8">
        					<h4 style="margin: auto;color: #D32B1D">Amazing variety</h4>
        					<br>
        					<p id="why">You will love the variety coz at Hungry Tiffins - No dish is repeated All Month!!</p>
        				</div>
        				
        			</div>
        			<br>
        			<div class="row">
        				<div class="col-md-4">
        					<img src="{{asset('/public/images/ikon3.jpeg')}}">
        					
        				</div>
        				<div class="col-md-8">
        					<h4 style="margin: auto;color: #D32B1D">Easy Ordering</h4>
        					<br>
        					<p id="why">Ordering your meal on the Hungry Tiffins Website will take less than 2 mins!!.</p>
        				</div>
        			</div>
        			
        		</div>
        		<div class="col-sm-6">
        			<div class="row">
        				<div class="col-md-4">
        					<img src="{{asset('/public/images/ikon4.jpeg')}}">
        					
        				</div>
        				<div class="col-md-8">
        					<h4 style="margin: auto;color: #D32B1D">Short Trial</h4>
        					<br>
        					<p id="why">You can try the delicious Hungry Tiffins! meals for 1 week to
know what every one is raving about!</p>
        				</div>
        				
        			</div>
        			<br>
        			<div class="row">
        				<div class="col-md-4">
        					<img src="{{asset('/public/images/ikon5.jpeg')}}">
        					
        				</div>
        				<div class="col-md-8">
        					<h4 style="margin: auto;color: #D32B1D">Simple Cancellation System
</h4>
     					<br>
        					<p id="why">Cancelling your meal will take seconds & a credit for cancelled
meal will be provided to your wallet.</p>
        				</div>
        				
        			</div>
        			<br>
        			<div class="row">
        				<div class="col-md-4">
        					<img src="{{asset('/public/images/ikon6.jpeg')}}">
        					
        				</div>
        				<div class="col-md-8">
        					<h4 style="margin: auto;color: #D32B1D">My Account</h4>
        					<br>
        					<p id="why">Manage your orders - Cancellations, Order Renewals, Shares etc
within seconds.</p>
        				</div>
        			</div>

        			
        		</div>
        		
        	</div>
        	
        </div>
        </div>
        <!-- end of why hungry tiffins -->

 <!-- process of service ends -->
@endsection