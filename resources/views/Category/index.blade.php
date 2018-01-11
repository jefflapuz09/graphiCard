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
       
    </div>
    
    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Service Category
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All service categories are listed here. It also shows if a certain category is on the navigation bar or not."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <div class="pull-right" style="margin-bottom:15px;"> 
                        <a href="{{ url('/CategoryCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                            New Service Category
                        </a>
                    </div>
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Navigation Bar</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($post as $posts)
                            <tr>
                                <td>{{ $posts->name }}</td>
                                <td>{{ $posts->description }}</td>
                                <td>
                                    @if($posts->isFeatured == 0)
                                        On navigation bar
                                    @else 
                                        Not selected
                                    @endif

                                </td>
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
        </div>
    </div>
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

