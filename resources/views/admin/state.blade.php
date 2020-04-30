@extends('admin.layouts.adminApp')
@extends('admin.layouts.admin-side')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
            <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Add State
    </button>

  <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Add State</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

        <!-- Modal body -->
            <div class="modal-body">
             <form method="post" action="{{url('/admin/states')}}">
                @csrf
                 <div class="form-group">
                     <label>Enter name of State:</label><input value="" required type="text" name="state_name" class="form-control">
                 </div>
                 <input type="submit" hidden name="submit" id="submit">
             </form>
            </div>

        <!-- Modal footer -->
            <div class="modal-footer">
            <button align="left" class="btn btn-success" id="click">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
        </div>
     </div>
   </div>
   <br>
     <div  style="width: 50%;margin: auto" class="row">
      <table class="table table-striped table-hover">
        <tr>
          <!-- <th>S.No</th> -->
          <th>State Name</th>
          <th style="text-align: center;" colspan="2">Actions</th>
        </tr>
        @php
        $i=0
        @endphp
        @foreach($states as $state)
          <tr>
            <!-- <td>{{++$i}}.</td> -->
            <td>{{$state->state_name}}</td>
            <td style="text-align: center"><button data-toggle="modal" data-target="#stateEdit" href="#" class="fa fa-pencil-square-o text text-secondary state_id" value="{{$state->id}}" style="font-size: 200%;text-decoration: none;border: none;background: none;outline: none"></button></td>
            <!-- modal starts  -->
                <div class="modal fade" id="stateEdit">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="{{url('/admin/state/update')}}">
                @csrf
              <input type="hidden" name="_method" value="patch">
                 <div class="form-group">
                     <label>Update name of State:</label><input id="updateState" value="" required type="text" name="state_name" class="form-control">
                     <input type="hidden" name="id" id="id">
                 </div>
                 <input type="submit" hidden  name="submit" id="submit2">
             </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button align="left" class="btn btn-success" id="click2">Update</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
            <!-- modal ends -->
            <td><a href="{{url('/admin/state_delete/'.$state->id)}}"  class="fa fa-trash-o text text-danger" style="font-size: 200%"></a></td>
          </tr>
        @endforeach
      </table>
      {{$states->links()}}
    </div>
    
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
            $('#click').click(function(){
                $('#submit').click();
              //  console.log("hello");
            });
             $('#click2').click(function(){
                $('#submit2').click();
              //  console.log("hello");
            });
            $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
    });
            $('.state_id').click(function(){
                var id=$(this).val();
                $.get('/hungry/admin/state/update/'+id,function(data){
                    console.log(data);
                    $('#updateState').val(data.state_name);
                    $('#id').val(data.id);
                });
            });
        });
    </script>
  
@endsection
