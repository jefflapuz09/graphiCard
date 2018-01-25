@extends('layouts.admin')

@section('content')
    <div > 

    </div>

    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Post
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All post information are displayed here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                    <th width="120px">Post Details</th>
                                    <th>Author</th>
                                    <th width="200px">Image</th>
                                    <th>Featured Post</th>
                                    <th width="300px">Actions</th>
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
                
                                  
                                        <a href="{{ url('/PostReactivate',$posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                            <i class="fa fa-recycle" aria-hidden="true"></i>
                                        </a>
                                </td>
                            </tr>
                
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/Post') }}';" id="showDeactivated"> Show records</label>
                    </div>
        </div>
    </div>
    </div>

  
    
@endsection

@section('script')
    
@stop


   