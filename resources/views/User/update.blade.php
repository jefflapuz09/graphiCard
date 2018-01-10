@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    <div class="container-fluid">
    <div>
        <h3>User</h3>
    </div>
    @if ($errors->any())
        <script type="text/javascript">
            toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong")
        </script>          
    @endif  
    @if(session('error'))
        <script type="text/javascript">
            toastr.error(' <?php echo session('error'); ?>', "There's something wrong")
        </script>
    @endif
    <div class="row">
    
    <div class="col-lg-6"> 
        

       

        <form action="{{ url('/UserUpdate',$user->id) }}" method="post">

        {{ csrf_field() }}
        
            <div class="form-group">
                <label for="sel1">Role:</label>
                <button type="button" class="mb-2 pull-right btn btn btn-outline-dark btn-sm" data-toggle="popover" title="Role Description" data-html="true" data-content="<b>Administrators</b> can perform every task available through the dashboard. <br><br> While, the <b>Contributors</b> permission to access all of the content. <b>Contributors</b> can make a draft and update changes but not able to publish."><i class="fa fa-question-circle" aria-hidden="true"></i></button>                
                <select class="select2 form-control" name="role" id="sel1">
                  <option value='1' @if($user->role == 1) selected = "selected" @endif>Administrator</option>
                  <option value='2' @if($user->role == 2) selected = "selected" @endif>Contributor</option>
                </select>
              </div>
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text" placeholder="Name" value="{{$user->name}}" class="form-control" name="name">
            </div>
            <div class="form-group">
            <label for="">Email:</label>
            <input type="email" placeholder="Email" value="{{$user->email}}" class="form-control" name="email">
            </div>
            <div class="form-group">
            <label for="">Password:</label>
            <input type="password" placeholder="Password" value="" class="form-control" name="password">
            </div>
            <div class="form-group">
            <label for="">Confirm Password:</label>
            <input type="password" placeholder="Confirm Password" value="" class="form-control" name="password_confirmation">
            </div>
            <div class="pull-right">
            <button type="reset" class="btn btn-success">Clear</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div> 
    </div>
    </div>
@endsection

@section('script')


@stop