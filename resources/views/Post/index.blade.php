@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>


    <div > 
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

    </div>

        <div class="card" style="border:1px solid black; margin:10px;">
        <div class="card-header" style="background:maroon; color:white;">
                Post
                <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All post information are displayed here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
        </div>
        <div class="card-block">
            <div class="container mt-3 mb-3">
                    <div class="pull-right" style="margin-bottom:15px;"> 
                            <a href="{{ url('/PostCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                                New Post
                            </a>
                        </div>
                    <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="120px">Post Details</th>
                                    <th>Author</th>
                                    <th width="200px">Image</th>
                                    <th>Featured Post</th>
                                    <th width="150px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($post as $posts)
                                <tr>
                                    <td>
                                        <li>{{ $posts->category }}</li>
                                        <li>{{ $posts->type }}</li>
                                        <li>{{ $posts->item }}</li>
                                    </td>
                                    <td>{{$posts->firstName}} {{$posts->middleName}} {{$posts->lastName}}</td>
                                    <td><img class="img-responsive" src="{{ asset($posts->image)}}" style="max-width:200px; max-height:200px;"></td>
                                    <td>
                                        @if($posts->isFeatured == 0)
                                        Featured Post
                                        @elseif($posts->isFeatured == 1)
                                        Default Post 
                                        @endif
                                    </td>
                                    <td> 
                                        @if((Auth::user()->role)==1)
                                            @if($posts->isDraft == 0)
                                                <a href="{{ url('/PostEdit',$posts->id) }}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('/PostDraft',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Publish Post">
                                                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('/PostDeactivate',$posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate Post">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            @elseif($posts->isDraft == 1)
                                                <a href="{{ url('/prodDescription',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Show Post">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('/PostUnpub',$posts->id) }}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Unpublish Post">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('/PostDeactivate',$posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate Post">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                        @elseif((Auth::user()->role)==2)
                                            @if($posts->isDraft == 0)
                                            <a href="{{ url('/PostEdit',$posts->id) }}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            @elseif($posts->isDraft == 1)
                                            <p class="lead">Only administrators can alter the published post.</p>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                    
                            @endforeach
                            </tbody>
                        </table>
                        <div class="form-group pull-right">
                                <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/PostSoft') }}';" id="showDeactivated"> Show deactivated records</label>
                        </div>
            </div>
        </div>
        </div>

     


@endsection

@section('script')
    
@stop

   