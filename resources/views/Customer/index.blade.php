@extends('layouts.admin')

@section('content')
    <div > 
        <h3>Customer</h3>
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="{{ url('/CustomerCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div>
    </div>
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
                <th>Name</th>
                <th>Gender</th>
                <th>Contact Information</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($post as $posts)
            <tr>
               
                <td>{{ $posts->firstName }} {{ $posts->middleName }} {{ $posts->lastName }}</td>
                <td>
                @if($posts->gender == 1)
                    Male 
                @elseif($posts->gender == 2)
                    Female
                @endif  
                </td>
                <td>
                    <li>Contact Number: {{ $posts->contactNumber }}</li>
                    <li>Email Address: {{ $posts->emailAddress }}</li>
                </td>
                <td>{{ $posts->street }} {{ $posts->brgy }} {{ $posts->city }}</td>
                <td> 
                        <a href="{{ url('/CustomerUpdate',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('/CustomerShow',$posts->id) }}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('/CustomerDeac', $posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                 
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/CustomerSoft') }}';" id="showDeactivated"> Show deactivated records</label>
    </div>
<script>
        

        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true,
              responsive: true
          } );

          
        } );

    </script>
@endsection


   