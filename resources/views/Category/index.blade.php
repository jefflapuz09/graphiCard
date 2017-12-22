@extends('layouts.admin')

@section('content')
    <div> 
        <h3>Service Category</h3>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
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
                        <a href="{{ url('/CategoryUpdate',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                Update
                        </a>
                        <a href="{{ url('/CategoryShow',$posts->id) }}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                                Show
                        </a>
                        <a href="{{ url('/CategoryDeac', $posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                                Deactivate
                        </a>
                 
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/CategorySoft') }}';" id="showDeactivated"> Show deactivated records</label>
    </div>
<script>
        

        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );

          
        } );

    </script>
@endsection


   