@extends('layouts.admin')

@section('content')
    <div> 
        <h3>Customer Feedback</h3>
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
            <a href="{{ url('/FeedbackCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div>
    </div>
    
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($post as $posts)
            <tr>
                <td>{{$posts->name}}</td>
                <td><img class="img-responsive" src="{{ asset($posts->image)}}" style="max-width:200px; max-height:200px;"></td>
                <td>
                    @for ($i = 0; $i < $posts->rating; $i++)
                    <span class="fa fa-star checked"></span>
                    @endfor
                </td>
                <td>
                    <a href="{{ url('/FeedbackReactivate', $posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @endforeach
   
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/Feedback') }}';" id="showDeactivated"> Show records</label>
    </div>
<script>
        

        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );

          
        } );

    </script>
@endsection


   