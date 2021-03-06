@extends('layouts.admin')

@section('content')
    <div > 
    </div>

    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Service Category
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All deactivated service category information are displayed here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                                <tr>
                                    <th>Bank</th>
                                    <th>Account Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($post as $posts)
                                <tr>
                                    <td>{{ $posts->bank }}</td>
                                    <td>{{ $posts->accountName }}</td>
                                    <td> 
                                            <a href="{{ url('/BankReactivate', $posts->id) }}"  onclick="return reacForm()"  type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                                <i class="fa fa-recycle" aria-hidden="true"></i>
                                                </a>
                                    </td>
                                </tr>
                    
                            @endforeach
                            </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox" onclick="document.location='{{ url('/Bank') }}';" id="showDeactivated"> Show Records</label>
                    </div>
        </div>
    </div>
    </div>

     

   

@endsection

@section('script')
<script>
        
        function reacForm(){
            var x = confirm("Are you sure you want to reactivate this record?");
            if (x)
              return true;
            else
              return false;
         }


    </script>
@stop


   