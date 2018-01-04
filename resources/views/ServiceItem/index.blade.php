@extends('layouts.admin')

@section('content')
    <div> 
        <h3>Service Item</h3>
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
            <a href="{{ url('/ItemCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div>
    </div>
    
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Subcategory</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($post as $posts)
            <tr>
                <td>{{$posts->Subcategory->name}}</td>
                <td>{{$posts->name}}</td>
                <td>{{$posts->description}}</td>
                <td>

                        <a href="{{ url('/ItemEdit',$posts->id) }}" onclick="return updateForm()" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('/ItemDeactivate', $posts->id) }}" onclick="return deleteForm()" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/ItemSoft') }}';" id="showDeactivated"> Show deactivated records</label>
    </div>

@endsection

@section('script')
<script>
        
                function updateForm(){
                    var x = confirm("Are you sure you want to alter this record?");
                    if (x)
                      return true;
                    else
                      return false;
                 }
        
                 function deleteForm(){
                    var x = confirm("Are you sure you want to deactivate this record? All items included in this record will also be deactivated.");
                    if (x)
                      return true;
                    else
                      return false;
                 }
        
            </script>
@stop


   