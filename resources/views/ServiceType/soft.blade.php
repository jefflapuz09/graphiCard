@extends('layouts.admin')

@section('content')
    <div > 

    </div>

    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Service Subcategory
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
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
                                        <a href="{{ url('/ServiceTypeReactivate', $posts->id) }}" onclick="return reacForm()" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                            <i class="fa fa-recycle" aria-hidden="true"></i>
                                        </a>
                                </td>
                            </tr>
                
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/ServiceType') }}';" id="showDeactivated"> Show records</label>
                    </div>
        </div>
    </div>
    </div>

     

@endsection

@section('script')
<script>
        

        $(document).ready(function() {

        } );

        function reacForm(){
            var x = confirm("Are you sure you want to reactivate this record?");
            if (x)
              return true;
            else
              return false;
         }
 

    </script>
@stop


   