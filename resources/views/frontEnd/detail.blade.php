@extends('user.layouts.userApp')
@section('content')
<div class="container">
                <div class="row">
                    <div class="container">
                        <div class="food__menu__container">
                            <div class="food__menu__inner d-flex flex-wrap flex-md-nowrap flex-lg-nowrap">
                                <div class="food__menu__thumb">
                                    <img style="width: 500px" src="{{asset('/public/images/'.$vendor->logo)}}" alt="images">
                                </div>
                                <div class="row">
                                    <div class="food__menu__details col-sm-6">
                                        <div class="food__menu__content">
                                        <h2>{{$vendor->company_name}}</h2>
                                        <div class="product-action-wrap">
                                            <div class="prodict-statas"><span>Address-{{$vendor->address}},{{$vendor->city->city_name}},{{$vendor->state->state_name}}</span></div>  
                                        </div>
                                        <div class="product-action-wrap">
                                            <div class="prodict-statas"><span>Pincode:{{$vendor->pincode}}</span></div>  
                                            </div>
                                        <div class="product-action-wrap">
                                            <div class="prodict-statas"><span>Email:{{$vendor->email}}</span></div>  
                                        </div>
                                        <div class="product-action-wrap">
                                            <div class="prodict-statas"><span>Contact Person:{{$vendor->contact_person}}</span></div>  
                                        </div>
                                        <div class="product-action-wrap">
                                            <div class="prodict-statas"><span>Phone Number:{{$vendor->mobile}}</span></div>  
                                        </div>
                                        </div>
                                    </div>
                                    <div class="food__menu__details col-sm-6">
                                        <div class="food__menu__content">
                                        
                                        <div class="product-action-wrap">
                                            <div style="margin-top:16%" class="prodict-statas"><span>Type of meals provided:
                                                @foreach($meals as $meal)
                                                @if($meal==1)
                                                Vegetarian, 
                                                @else
                                                Non_vegetarian
                                                @endif
                                                @endforeach
                                            </span></div>
                                             <div class="product-action-wrap">
                                                @if($vendor->website!=null)
                                            <div class="prodict-statas"><span>Website:{{$vendor->website}}</span></div>
                                            @else
                                            <div class="prodict-statas"><span>Website:N.A</span></div>
                                            @endif  
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Product Descrive Area -->
                            <div class="menu__descrive__area">
                                <div class="menu__nav nav nav-tabs" role="tablist">
                                    <a class="active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab">Description</a>
                                    <a id="nav-breakfast-tab" data-toggle="tab" href="#nav-breakfast" role="tab">Menu</a>
                                </div>
                                <!-- Start Tab Content -->
                                <div class="menu__tab__content tab-content" id="nav-tabContent">
                                    <!-- Start Single Content -->
                                    <div class="single__dec__content fade show active" id="nav-all" role="tabpanel">
                                        <p>{!!$vendor->about_us!!}</p>
                                    </div>
                                    <!-- End Single Content -->
                                    <!-- Start Single Content -->
                                    <div class="single__dec__content fade" id="nav-breakfast" role="tabpanel">
                                        <div class="review__wrapper">
                                            <div class="col-lg-12">
                        <div class="fd__tab__content tab-content" id="nav-tabContent">
                            <!-- Start Single Content -->
                            <div class="food__list__tab__content tab-pane fade show active" id="nav-all" role="tabpanel">
                                <!-- Start Single Food -->
                                @foreach($menus as $menu)
                                <div class="single__food__list d-flex wow ">
                                    <div class="food__list__thumb">
                                            <img id="myImg" class="myImg" src="{{asset('/public/images/'.$menu->menu_image)}}" style="width: 90%;margin: auto" alt="Menu Image not available">
                                              <div id="myModal" class="modal">
                                                <span class="close">&times;</span>
                                                <img class="modal-content" src="#" id="img01">
                                                <div id="caption"></div>
                                              </div>
                                    </div>
                                    <div style="width: 100%" class="food__list__inner d-flex align-items-center justify-content-between">
                                        <div class="food__list__details">
                                            <h2><a href="menu-details.html">{{$menu->meal_name}}</a></h2>
                                            <p>{!! $menu->description !!}</p>
                                            <div class="list__btn">
                                                <a class="food__btn grey--btn theme--hover" href="{{url('/add-to-cart/'.$menu->id)}}" >Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="food__rating">
                                            <div class="list__food__prize">
                                                <span>&#8377;&nbsp;{{$menu->price}}</span>
                                            </div>
                                            <ul class="rating">
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li><i class="zmdi zmdi-star"></i></li>
                                                <li class="rating__opasity"><i class="zmdi zmdi-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content -->
                                </div>
                                <!-- End Tab Content -->
                            </div>
                            <!-- End Product Descrive Area -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="popupal__menu">
                                    <h4>Popular Menu</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row mt--30">
                            <!-- Start Single Product -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="beef_product">
                                    <div class="beef__thumb">
                                        <a href="menu-details.html">
                                            <img src="images/beef/1.jpg" alt="beef images">
                                        </a>
                                    </div>
                                    <div class="beef__hover__info">
                                        <div class="beef__hover__inner">
                                            <span>Special</span>
                                            <span>offer</span>
                                        </div>
                                    </div>
                                    <div class="beef__details">
                                        <h4><a href="menu-details.html">Beef Burger</a></h4>
                                        <ul class="beef__prize">
                                            <li class="old__prize">$30</li>
                                            <li>$30</li>
                                        </ul>
                                        <p>erve armesan may be added to the top of apLem ip, consectetur</p>
                                        <div class="beef__cart__btn">
                                            <a href="cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="beef_product">
                                    <div class="beef__thumb">
                                        <a href="menu-details.html">
                                            <img src="images/beef/2.jpg" alt="beef images">
                                        </a>
                                    </div>
                                    <div class="beef__details">
                                        <h4><a href="menu-details.html">Beef Burger</a></h4>
                                        <ul class="beef__prize">
                                            <li class="old__prize">$30</li>
                                            <li>$30</li>
                                        </ul>
                                        <p>erve armesan may be added to the top of apLem ip, consectetur</p>
                                        <div class="beef__cart__btn">
                                            <a href="cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <!-- Start Single Product -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="beef_product">
                                    <div class="beef__thumb">
                                        <a href="menu-details.html">
                                            <img src="images/beef/3.jpg" alt="beef images">
                                        </a>
                                    </div>
                                    <div class="beef__hover__info">
                                        <div class="beef__hover__inner">
                                            <span>Special</span>
                                            <span>offer</span>
                                        </div>
                                    </div>
                                    <div class="beef__details">
                                        <h4><a href="menu-details.html">Beef Burger</a></h4>
                                        <ul class="beef__prize">
                                            <li class="old__prize">$30</li>
                                            <li>$30</li>
                                        </ul>
                                        <p>erve armesan may be added to the top of apLem ip, consectetur</p>
                                        <div class="beef__cart__btn">
                                            <a href="cart.html">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                    </div>
                </div>
            </div>
@endsection