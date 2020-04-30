@extends('user.layouts.userApp')
@section('content')
<div align="center" class="container" style="margin-bottom: 5%">
  <form style="width: 50%;margin-top:2%" method="post" action="{{url('/add-shipping-details')}}">
    @csrf
	@if($users->isEmpty())
	@else
		@foreach($users as $user)
		<input id="radio" class="radio" type="radio" name="address_id" value="{{$user->id}}">{{$user->address}}<br><br>
		@endforeach
	@endif
  <a type="button" id="click" style="font-size: 130%" class="fa fa-plus-square text text-primary" aria-hidden="true" data-toggle="collapse" data-target="#demo">&nbsp;&nbsp;Deliver To some other address</a><br>
  <div id="demo" class="collapse">
      	<div class="form-group">
   		<!-- <label>First Name:</label> -->
   		<input type="text" name="fname" placeholder="Enter First Name" class="form-control detail">
   	</div>
   	<div class="form-group">
   		<!-- <label>Last Name:</label> -->
   		<input type="text" name="lname" placeholder="Enter Last Name" class="form-control detail">
   	</div>
   	<div class="form-group">
   		<!-- <label>Mobile Number</label> -->
   		<input type="text" name="mobile" placeholder="Enter Mobile Number" class="form-control detail">
   	</div>
   	<div class="form-group">
   		<!-- <label>Address:</label> -->
   		<textarea class="form-control detail" style="height: 140px" placeholder="Enter Address" name="address"></textarea>
   	</div>
  </div>
  <br>
  <input type="submit" style="width: 50%" name="submit" value="Next" class="btn btn-success">
  </form>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#click').click(function(){
      var $this=$(this);
      $this.toggleClass('open');
      if($this.hasClass('open'))
      {
        $('.radio').prop('checked',false);
        $('.radio').prop('disabled',true);
        $('.detail').prop('disabled',false);
      }
      else
      {
        $('.radio').prop('disabled',false);
        $('.detail').prop('disabled',true);

      }
    });
  });
</script>
@endsection