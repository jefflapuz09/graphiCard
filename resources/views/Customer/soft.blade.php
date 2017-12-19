@extends('layouts.admin')

@section('content')
    <div > 
        <h3>Customer</h3>
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
                        <a href="{{ url('/CustomerReactivate',$posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                Reactivate
                        </a>
                 
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/Customer') }}';" id="showDeactivated"> Show records</label>
    </div>
<script>
        

        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );

          
        } );

    </script>
@endsection


   