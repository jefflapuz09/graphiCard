@extends('layouts.admin')

@section('content')
    <div > 
        <h3>Post</h3>
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
                <th>Details</th>
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

                  
                        <a href="{{ url('/PostReactivate',$posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/Post') }}';" id="showDeactivated"> Show records</label>
    </div>
    
<script>
        
        
        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );

          
        } );

    </script>
@endsection


   