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
            toastr.success(' <?php echo session('success'); ?>', 'Insert Success')
        </script>
        @endif
        @if(session('error'))
            <script type="text/javascript">
                toastr.error(' <?php echo session('error'); ?>', "There's something wrong")
            </script>
        @endif

    </div>
    

    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Users
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <div class="pull-right" style="margin-bottom:15px;"> 
                        <a href="{{ url('/UserCreate') }}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                            New Record
                        </a>
                    </div>
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($post as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role==1)
                                        Administrator
                                        @elseif($user->role==2)
                                        Contributor
                                        @endif
                                    </td>
                                    <td>
                                            <a href="{{ url('/UserReactivate', $user->id) }}" onclick="return reacForm()" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                                <i class="fa fa-recycle" aria-hidden="true"></i>
                                            </a>
                                    </td>
                                </tr>
                    
                            @endforeach
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/User') }}';" id="showDeactivated"> Show records</label>
                    </div>
        </div>
    </div>
    </div>

     
   

@endsection

@section('script')
<script>
        
        function reacForm(){
            var x = confirm("Are you sure you want to reactivate this record?");
            if (x)
              return true;
            else
              return false;
         }

    </script>
@stop


   