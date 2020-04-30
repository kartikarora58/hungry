@extends('vendor.layouts.vendorApp')
@extends('vendor.layouts.vendor-side')
@section('content')
<div class="container">
	<div class="row">	
			@if ($errors->any())
   			 <div class="alert alert-danger">
        		<ul>
            		@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            		@endforeach
        		</ul>
    		 </div>
			@endif
		<form style="width: 50%;margin: auto">
			@csrf
			<div class="form-group">
				<label>Company Name:</label>
				<input type="text" name="company_name" value="{{$vendor->company_name}}" class="form-control">
			</div>
			<div class="form-group">
				<label>About Us:</label>
				<textarea class="form-control mytextarea" rows="5" value="" name="about">{!! $vendor->about_us !!}</textarea>
			</div>

			<div class="form-group">
				<label>State:</label>
				<select id="state" name="state" class="form-control">
					<option value="">Select State</option>
					@foreach($states as $state)
					@if($state->id==$vendor->state_id)
					<option value="{{$state->id}}" selected>{{$state->state_name}}</option>
					@endif
					<option value="{{$state->id}}">{{$state->state_name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>City:</label>
				<select id="city" name="city" class="form-control">
					<option value="">Select City</option>
					<option value="{{$vendor->city_id}}" selected>{{$vendor->city->city_name}}</option>
				</select>
				
			</div>
			<div class="form-group">
				<label>Address:</label>
				<input type="text" value="{{$vendor->address}}" name="address" class="form-control">
			</div>
			<div class="form-group">
				<label>Mobile No:</label>
				<input type="text" value="{{$vendor->mobile}}" name="mobile" class="form-control">
			</div>
			<div class="form-group">
				<label>Type of Meals:</label>
				@foreach($meals as $meal)
				@php
				$x=0
				@endphp
				@foreach($foods as $food)
				@if($meal->id==$food)
				<div class="checkbox">
					<label><input type="checkbox" name="meal_type[]" value="{{$meal->id}}" checked>&nbsp;&nbsp;{{$meal->type}}</label>
				</div>
				@php
				$x=1
				@endphp
				@endif
				@endforeach
				@if($x!==1)
				<div class="checkbox">
					<label><input type="checkbox" name="meal_type[]" value="{{$meal->id}}">&nbsp;&nbsp;{{$meal->type}}</label>
				</div>
				@endif
				@endforeach
			</div>
			<!-- <div class="form-group">
				<label>Landline:</label>
				<input type="text" name="landline" class="form-control">
			</div> -->
			<div class="form-group">
				<label>Pincode:</label>
				<input type="text" value="{{$vendor->pincode}}" name="pincode" class="form-control">
			</div>
			<div class="form-group">
				<label>Website (if any):</label>
				<input type="text" value="{{$vendor->website}}" name="website" class="form-control">
			</div>
			<div class="form-group">
				<label>Logo:</label>
				<input type="file" name="logo" class="form-control">
				<img src="{{asset('/public/images/'.$vendor->logo)}}" width="200" height="200">
			</div>
			<div class="form-group">
				<label>Contact Person</label>
				<input value="{{$vendor->contact_person}}" class="form-control" type="text" name="contact_person">
				
			</div>
			<div class="form-group">
				<label>Off Days:</label>
				<input type="text" value="{{$vendor->off_days}}" name="off_days" class="form-control">
			</div>
			
			<input type="submit" class="form-control btn btn-success" name="submit">	
		</form>
	</div>
</div>

<script>
	$(document).ready(function(){
		$.ajaxSetup({
			headers:{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			}
		});
		$('#state').change(function()
		{
			var state_id=$(this).val();

			if(state_id)
			{
				$.get('/hungry/vendor/fetchCity/'+ state_id,function(data){
					//console.log(data);
					$('#city').empty();
					$.each(data,function(index,value){
						$('#city').append('<option value='+value.id+'>'+value.city_name+'</option>');
					});
				});
			}
			else
			{
				$('#city').empty();
				$('#city').append('<option>'+'Select City'+'</option>');
			}
		});
	});
</script>
@endsection