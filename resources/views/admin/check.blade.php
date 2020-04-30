@extends('admin.layouts.adminApp')
@extends('admin.layouts.admin-side')
@section('content')
<form method="post"  enctype="multipart/form-data" style="margin: auto;width: 50%" action="{{url('/admin/action/')}}">
			@csrf
			<div class="form-group">
				<label>Company Name:</label>
				<input disabled type="text" value="{{$vendor->company_name}}" name="company_name" class="form-control">
			</div>
			<div class="form-group">
				<label>About Us:</label>
				<p>{!! $vendor->about_us !!}</p>
			</div>
			<div class="form-group">
				<label>State:</label>
				<select disabled class="form-control">
					<option>{{$vendor->state->state_name}}</option>
				</select>
			</div>
			<input type="hidden" name="id" value="{{$vendor->id}}">
			<div class="form-group">
				<label>City:</label>
				<select disabled class="form-control">
					<option value="">{{$vendor->city->city_name}}</option>
				</select>
				
			</div>
			<div class="form-group">
				<label>Address:</label>
				<input disabled type="text" value="{{$vendor->address}}" name="address" class="form-control">
			</div>
			<div class="form-group">
				<label>Mobile No:</label>
				<input disabled type="text" value="{{$vendor->mobile}}" name="mobile" class="form-control">
			</div>
			<div class="form-group">
				<label>Type of Meals:</label>
				<select disabled multiple="multiple">
					@foreach($meals as $meal)
				@php
				$x=0
				@endphp
				@foreach($foods as $food)
				@if($meal->id==$food)
				<!-- <div class="checkbox"> -->
					<option type="checkbox" name="meal_type[]" value="{{$meal->id}}" checked>&nbsp;&nbsp;{{$meal->type}}</option>
				<!-- </div> -->
				@php
				$x=1
				@endphp
				@endif
				@endforeach
				@if($x!==1)
				<!-- <div class="checkbox"> -->
					<label><option type="checkbox" name="meal_type[]" value="{{$meal->id}}">&nbsp;&nbsp;{{$meal->type}}</option>
				<!-- </div> -->
				@endif
				@endforeach
				</select>
			</div>
			<!-- <div class="form-group">
				<label>Landline:</label>
				<input type="text" name="landline" class="form-control">
			</div> -->
			<div class="form-group">
				<label>Pincode:</label>
				<input type="text" disabled value="{{$vendor->pincode}}" name="pincode" class="form-control">
			</div>
			<div class="form-group">
				<label>Website (if any):</label>
				<input type="text" disabled value="{{$vendor->website}}" name="website" class="form-control">
			</div>
			<div class="form-group">
				<label>Logo:</label>
				<img src="{{asset('/public/images/'.$vendor->logo)}}" width=50% height=50%>
			</div>
			<div class="form-group">
				<label>Contact Person</label>
				<input disabled value="{{$vendor->contact_person}}" class="form-control" type="text" name="contact_person">
				
			</div>
			<div class="form-group">
				<label>Off Days:</label>
				<input disabled type="text" value="{{$vendor->off_days}}" name="off_days" class="form-control">
			</div>
				<div class="row">
					<div class="col-6">
						<input type="submit" name="status" value="approve" class="btn btn-success">
					</div>
					<br>
					<br><br>
					<div class="col-6">
						<input type="submit" name="status" value="reject" class="btn btn-danger">
					</div>
				</div>	
		</form>

@endsection