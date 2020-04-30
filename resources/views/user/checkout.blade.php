@extends('user.layouts.userApp')
@section('content')
 <div class="container">
    <div class="row">
        <div class="order-details-wrapper" style="margin: 2%">
                                    <h2>your order</h2>
                                    <div class="order-details">
                                        <form action="{{url('/checkout')}}" method="post">
                                            @csrf

                                            <ul>
                                                <li><p class="strong">product</p><p class="strong">total</p></li>
                                                @php
                                                $total=0
                                                @endphp
                                                @foreach($carts as $cart)
                                                <li><p>{{$cart->menu->meal_name}} x {{$cart->quantity}}</p><p><i class="fa fa-inr" aria-hidden="true"></i>{{$cart->menu->price*$cart->quantity}}</p></li>
                                                @php
                                                $total+=$cart->menu->price*$cart->quantity
                                                @endphp
                                                @endforeach
                                                <li><p class="strong">cart subtotal</p><p class="strong"><i class="fa fa-inr" aria-hidden="true"></i>{{$total}}</p></li>
                                                <li><p class="strong">Shipping Address</p><p>
                                                    <label>{{$user->address}}</label>
                                                </p></li>
                                                <li><p class="strong">Select Payment Method<p>
                                                    <input type="radio" checked="checked" name="payment_method" value="cash">Cash On Delivery<br>
                                                    <input type="radio" name="payment_method" value="online">Credit/Debit Card/Net Banking  
                                                </p></li>
                                                <li><p class="strong">order total</p><p class="strong"><i class="fa fa-inr" aria-hidden="true"></i>{{$total}}</p></li>
                                                <li><button class="food__btn">place order</button></li>
                                            </ul>
                                            <input type="hidden" name="price" value="{{$total}}">
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                        </form>
                                    </div>
                                </div>
        
    </div>
</div>
@endsection
