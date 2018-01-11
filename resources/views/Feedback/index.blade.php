@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    <div> 
        @if(session('success'))
        <script type="text/javascript">
            toastr.success(' <?php echo session('success'); ?>', 'Success!')
        </script>
        @endif
        @if(session('error'))
            <script type="text/javascript">
                toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
            </script>
        @endif
        <!-- <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="{{ url('/FeedbackCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div> -->
    </div>
    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Customer Feedbacks
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All customer feedbacks are displayed here. In order for the selected feedback to be displayed on the website, update the record and tick the box that says selected post."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $posts)
                            <tr>
                                <td>{{$posts->Customer->firstName}} {{$posts->Customer->middleName}} {{$posts->Customer->lastName}}</td>
                                <td><img class="img-responsive" src="{{ asset($posts->image)}}" style="max-width:200px; max-height:200px;"></td>
                                <td>
                                        {{$posts->rating}}
                                </td>
                                <td>
                                        @if($posts->isSelected == 0)
                                        Default Post
                                        @elseif($posts->isSelected == 1)
                                        Featured Post 
                                        @endif
                                </td>
                                <td>
                                    @if($posts->isPublish == 1)
                                    Posted
                                    @else
                                    Not posted
                                    @endif
                                </td>
                                <td>
                                    @if($posts->isPublish == 0)
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
        </div>
    </div>
    </div>
     

@endsection
@section('script')
    
@stop


   