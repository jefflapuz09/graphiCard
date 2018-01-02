@extends('layouts.admin')

@section('content')
    <div> 
        <h3>Customer Feedbacks</h3>
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
        <!-- <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="{{ url('/FeedbackCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div> -->
    </div>
    
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Rating</th>
                <th>Featured Post</th>
                <th>Posted</th>
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
                        @if($posts->isSelected == 0)
                        Featured Post
                        @elseif($posts->isSelected == 1)
                        Default Post 
                        @endif
                </td>
                <td>
                    @if($posts->isPublish == 1)
                    Not yet posted
                    @else
                    Posted
                    @endif
                </td>
                <td>
                    @if($posts->isPublish == 1)
                    <a href="{{ url('/FeedbackUpdate',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="{{ url('/FeedbackPost',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Publish Post">
                        <i class="fa fa-clipboard" aria-hidden="true"></i>
                    </a>
                    <a href="{{ url('/FeedbackDeactivate', $posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @else
                    <a href="{{ url('/FeedbackUpdate',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    <a href="{{ url('/FeedbackUnpublish',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Unpublish Post">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <a href="{{ url('/FeedbackDeactivate', $posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
   
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/FeedbackSoft') }}';" id="showDeactivated"> Show deactivated records</label>
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


   