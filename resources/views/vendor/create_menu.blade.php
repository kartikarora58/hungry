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
		<form style="margin: auto;width: 50%" enctype="multipart/form-data" action="{{url('/vendor/create/menu')}}" method="post">
			@csrf
			<div class="form-group">
				<select name="time" class="form-control">
					<option value=" ">Select meal timings</option>
					@foreach($times as $time)
					<option value="{{$time->id}}">{{$time->time}}</option>
					@endforeach
				</select>
			</div>
			
			<div class="form-group">
				<select name="meal_type" class="form-control">
					<option value=" ">Select type of meal</option>
					@foreach($meals as $meal)
					<option value="{{$meal->id}}">{{$meal->type}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Meal Name:</label>
				<input type="text" name="meal_name" class="form-control">
				
			</div>
			<div class="form-group">
				<label>Menu Description</label>
				<textarea class="form-control mytextarea" rows="5" name="menu_description"></textarea>
			</div>
			<div class="form-group">
				<label>Upload menu(optional)</label>
				<input type="file" name="menu" class="form-control">
			</div>
			<div class="form-group">
				<label>Price:</label>
				<input type="text" name="price" class="form-control">
			</div>
			<input type="submit" name="submit" value="Submit" class="btn btn-success">
		</form>
		
	</div>
	
</div>
@endsection