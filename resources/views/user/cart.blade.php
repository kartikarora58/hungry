@extends('user.layouts.userApp')
@section('content')
<div class="cart-main-area section-padding--lg bg--white">
    @if($carts->isEmpty())
        <h1 class="alert alert-info">Cart is Empty</h1>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        <form action="{{url('/update')}}" method="post">   
                        @csrf            
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>

                                        <tr class="title-top">
                                            <!-- <th class="product-thumbnail">Image</th> -->
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@php
                                    	$total=0
                                    	@endphp
                                    @foreach($carts as $cart)
                                    
                                        <tr>
                                            <!-- <td class="product-thumbnail"><a href="#"><img src="images/cart/1.jpg" alt="product img" /></a></td> -->
                                            <input type="hidden" name="user_id[]" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="id[]" value="{{$cart->id}}">
                                            <input type="hidden" name="menu_id[]" value="{{$cart->menu->id}}">
                                           
                                            <td class="product-name"><a href="#">{{$cart->menu->meal_name}}</a></td>
                                            <td class="product-price"><span class="amount">{{$cart->menu->price}}</span></td>
                                            <td class="product-quantity"><input type="number" name="quantity[]" value="{{$cart->quantity}}" /></td>
                                            <td class="product-subtotal">{{$cart->quantity*$cart->menu->price}}</td>
                                            <td class="product-remove"><a href="{{url('/cart_delete/'.$cart->id)}}" style="font-size: 200%" class="fa fa-trash text text-danger" aria-hidden="true"></a></td>
                                            @php
                                            $total+=$cart->quantity*$cart->menu->price
                                            @endphp
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        
                        <div class="cartbox__btn">
                            <ul class="d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <!-- <li><a href="#">Coupon Code</a></li> -->
                               <!-- <li><a href="#">Apply Code</a></li> -->
                                <input class="btn btn-secondary" type="submit" name="submit" value="Update Cart">
                                <li><a href="{{url('/shipping')}}" class="btn btn-danger">Check Out</a></li>
                            </ul>
                        </div>
                        </form> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Cart total</li>
                                </ul>
                                <ul class="cart__total__tk">
                                    <li>{{$total}}</li>
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>{{$total}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            @endif
        </div>
@endsection