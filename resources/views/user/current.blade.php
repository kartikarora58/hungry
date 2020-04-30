@extends('user.layouts.user-side')
@section('content')
<div class="container">
	<div class="row">
        @if(empty($meals))
            <h2 style="margin: auto" class="alert alert-info">There is no current order</h2>
        @else
		<div class="order-details-wrapper" style="margin:auto;width: 80%">
                                    <h2>your order</h2>
                                    <div class="order-details">
                                        
                                        <form action="#" method="post">
                                        	@csrf

                                            <ul>
                                                <li><p class="strong">product</p><p class="strong">total</p></li>
                                                @php
                                                $total=0
                                                @endphp
                                                @php
                                                $i=0
                                                @endphp
                                                @foreach($meals as $meal)
                                                <li><p>{{$meal->meal_name}} x {{$quantity[$i]}}</p><p><i class="fa fa-inr" aria-hidden="true"></i>{{$quantity[$i]*$meal->price}}</p></li>
                                                @php
                                                $total+=$meal->price*$quantity[$i]
                                                @endphp
                                                @php
                                                $i+=1
                                                @endphp
                                                @endforeach
                                                <li><p class="strong">cart subtotal</p><p class="strong"><i class="fa fa-inr" aria-hidden="true"></i>{{$total}}</p></li>
                                                <li><p class="strong">Shipping Address</p><p>
                                                    <label>{{$address}}</label>
                                                </p></li>
                                                <li><p class="strong">Payment Mode</p>
                                                    @if($order->payment_status==0)
                                                        <p>Cash on Delivery</p>
                                                    @else
                                                        <p>Online Payment</p>
                                                    @endif
                                                </li>
                                                <li><p class="strong">Order Status</p><p>@if($order->order_status==0)
                                                	Waiting for confirmation from {{$vendor_name}}
                                                @else
                                                	{{$vendor_name}} rejected your order
                                                @endif
                                                </p></li>
                                                <li><p class="strong">order total</p><p class="strong"><i class="fa fa-inr" aria-hidden="true"></i>{{$total}}</p></li>
                                                
                                            </ul>
                                            	
                                        </form>
                                        
                                    </div>
                                </div>
                                @endif
		
	</div>
</div>
<br>
@endsection