@extends('admin.layouts.adminApp')
@extends('admin.layouts.admin-side')
@section('content')
@if($vendors->isEmpty())
	<div class="alert alert-info">
		<h1 style="text-align: center">No Pending Records</h1>
	</div>
@else
<table class="table table-striped table-hover" align="center" style="width: 50%">
	<thead>
		<tr>
			<th>S.No</th>
			<th>Company Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@php
		$i=0
		@endphp
		@foreach($vendors as $vendor)
			<tr>
				<td>{{++$i}}</td>
				<td>{{$vendor->company_name}}</td>
				<td><a href="{{url('/admin/check/'.$vendor->id)}}" class="btn btn-primary" style="color: white">View Detail</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
@endif
@endsection