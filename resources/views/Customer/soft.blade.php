@extends('layouts.admin')

@section('content')
    <div > 
    </div>

    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Customer
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All customer information are displayed here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                               
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Contact Information</th>
                                <th>Address</th>
                                <th>Action</th>
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
                                    <li>Email Address: {{ $posts->User[0]->email }}</li>
                                </td>
                                <td>{{ $posts->street }} {{ $posts->brgy }} {{ $posts->city }}</td>
                                <td> 
                                        <a href="{{ url('/CustomerReactivate',$posts->id) }}" onclick="return reacForm()" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                            <i class="fa fa-recycle" aria-hidden="true"></i>
                                        </a>
                                 
                                </td>
                            </tr>
                
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/Customer') }}';" id="showDeactivated"> Back to Customer records table</label>
                    </div>
        </div>
    </div>
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


   