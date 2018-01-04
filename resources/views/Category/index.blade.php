@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    <div> 
        <h3>Service Category</h3>
            @if(session('success'))
                <script type="text/javascript">
                    toastr.success(' <?php echo session('success'); ?>', 'Insert Success')
                </script>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                <script type="text/javascript">
                    toastr.error(' <?php echo session('error'); ?>', "There's something wrong")
                </script>
            </div>
             @endif
        <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="{{ url('/CategoryCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div>
    </div>
    
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($post as $posts)
            <tr>
                <td>{{ $posts->id }}</td>
                <td>{{ $posts->name }}</td>
                <td>{{ $posts->description }}</td>
                <td> 
                        <a href="{{ url('/CategoryUpdate', $posts->id) }}" onclick="return updateForm()" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('/CategoryDeac', $posts->id) }}"  onclick="return deleteForm()" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                 
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/CategorySoft') }}';" id="showDeactivated"> Show deactivated records</label>
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

