@extends('admin.layouts.adminApp')
@extends('admin.layouts.admin-side')
@section('content')
<div class="container">
    <form style="width: 50%;margin: auto" method="post" action="{{url('/admin/cities')}}">
      @csrf
      <div class="form-group">
        <select name="state_id" style="width: 25%;margin: auto" class="form-control">
          <option>Select State</option>
          @foreach($states as $state)
          <option value="{{$state->id}}">{{$state->state_name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Enter name of city:</label>
        <input type="text" name="city_name" class="form-control">
      </div>
     <input type="submit" name="submit" class="form-control btn btn-primary">
    </form>
    
</div>  
  
@endsection
