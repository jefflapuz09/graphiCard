@extends('layouts.admin')

@section('content')
    <div > 
        <h3>Post</h3>
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="{{ url('/PostCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div>
    </div>

     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="120px">Post Details</th>
                <th width="200px">Image</th>
                <th>Description</th>
                <th width="300px">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($post as $posts)
            <tr>
                <td>
                    <li>{{ $posts->category }}</li>
                    <li>{{ $posts->type }}</li>
                </td>
                <td><img class="img-responsive" src="{{ asset($posts->image)}}" style="max-width:200px; max-height:200px;"></td>
                <td><?php echo $posts->details  ?></td>
                <td> 

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
                        <a href="{{ url('/PostShow',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Show Post">
                            <i class="fa fa-eye" aria-hidden="true"></i
                        </a>
                         <a href="{{ url('/PostDeactivate',$posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate Post">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    @endif
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/PostSoft') }}';" id="showDeactivated"> Show deactivated records</label>
    </div>
    
<script>
        
        
        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );

          
        } );

    </script>
@endsection


   