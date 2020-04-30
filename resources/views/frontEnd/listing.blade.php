@extends('user.layouts.userApp')
@section('content')
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<div class="container">
  <div style="width: 50%;margin: auto" class="form-group">
        <select id="state" name="state" class="form-control">
          <option value="all">Select State</option>
          @foreach($states as $state)
          <option value="{{$state->id}}">{{$state->state_name}}</option>
          @endforeach
        </select>
      </div>
      <br>
      <div style="width: 50%;margin:auto" class="form-group">
        <select id="city_id" name="city" class="form-control">
          <option value="all">Select City </option>
        </select>
        
      </div>
      <br>
      <div style="width: 50%;margin: auto;" class="form-group">
      <a href="#"   class="btn btn-success form-control" id="submit">Submit</a></div>
  <br>
	<table style="width: 100%" class="table table-striped table-condensed table-hover table-light" id="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Phone No</th>
				<th>Detail</th>
			</tr>
		</thead>
	</table>
</div>
<script>
       	$(document).ready(function(){
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
         
               $('#table').DataTable({
			         responsive:true,
               processing:true,
               scrollX:100,
               serverSide:true,
               ajax: 
               {
                url:'{{ url('data') }}',
                type:'GET',
                data:function(d)
                {
                  d.city_id=$('#city_id').val();
                  d.state_id=$('#state').val();
                }
              },
               
               columns: [
                        
                        {data: 'company_name', name: 'company_name' },
                        {data: 'address', name: 'address'},
                        {data:'mobile',name:'mobile'},
                        {data: 'action',name:'action',orderable:false}

                     ]
            });
         
         // $('#submit').click(function(){
         //$('#table').DataTable().draw(true);


         $('#state').change(function()
          {
          var state_id=$(this).val();

        if(state_id)
        {
        $.get('/hungry/fetchCity/'+ state_id,function(data){
          //console.log(data);
          $('#city_id').empty();
          $('#city_id').append('<option value="all">All</option>');
          $.each(data,function(index,value){
            $('#city_id').append('<option value='+value.id+'>'+value.city_name+'</option>');
          });
        });
        }
      else
        {
        $('#city_id').empty();
        $('#city_id').append('<option>'+'Select City'+'</option>');
        }
    });
         $('#submit').click(function(){
         $('#table').DataTable().draw(true);
  });
  // });
     });
    </script>
@endsection