@extends('layouts.admin')

@section('content')
    <div> 
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
        
    </div>
    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Customer Feedback
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All of the deactivated customer feedbacks are displayed here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Rating</th>
                                <th>Featured Post</th>
                                <th>Post Status</th>
                                <th>Action</th>
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
                                        @if($posts->isSelected == 1)
                                        Featured Post
                                        @elseif($posts->isSelected == 0)
                                        Default Post 
                                        @endif
                                </td>
                                <td>
                                    @if($posts->isPublish == 0)
                                    Not yet posted
                                    @else
                                    Posted
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/FeedbackReactivate', $posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                        <i class="fa fa-recycle" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                   
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/Feedback') }}';" id="showDeactivated"> Back to Feedbacks table</label>
                    </div>
        </div>
    </div>
    </div>
     

@endsection
@section('script')
    
@stop


   