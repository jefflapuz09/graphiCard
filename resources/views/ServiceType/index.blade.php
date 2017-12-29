@extends('layouts.admin')

@section('content')
    <div > 
        <h3>Subcategory</h3>
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
         @endif
        <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="{{ url('/ServiceTypeCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Item
            </a>
        </div>
    </div>
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Service Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($post as $posts)
            <tr>
                <td>{{ $posts->id }}</td>
                <td>{{ $posts->category }}</td>
                <td>{{ $posts->name }}</td>
                <td>{{ $posts->description }}</td>
                <td> 
                        <a href="{{ url('/ServiceTypeUpdate',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <!-- <a href="{{ url('/ServiceTypeShow',$posts->id) }}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Show Record">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a> -->
                        <a href="{{ url('/ServiceTypeDeac', $posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                 
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/ServiceTypeSoft') }}';" id="showDeactivated"> Show deactivated records</label>
    </div>
<script>
        

        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );

          
        } );

    </script>
@endsection


   