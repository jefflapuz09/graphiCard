@extends('layouts.admin')

@section('content')
    <div > 
        <h3>Service Category</h3>
        <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="{{ url('/CategoryCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div>
    </div>
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($post as $posts)
            <tr>
                <td>{{ $posts->id }}</td>
                <td>{{ $posts->name }}</td>
                <td>{{ $posts->description }}</td>
                <td> 
                        <a href="{{ url('/CategoryReactivate', $posts->id) }}"  onclick="return reacForm()"  type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                            <i class="fa fa-recycle" aria-hidden="true"></i>
                        </a>
                 
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox" onclick="document.location='{{ url('/Category') }}';" id="showDeactivated"> Show records</label>
    </div>

   
<script>
        

        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );
        } );

        function reacForm(){
            var x = confirm("Are you sure you want to reactivate this record?");
            if (x)
              return true;
            else
              return false;
         }


    </script>
@endsection


   