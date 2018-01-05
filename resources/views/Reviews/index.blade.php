@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    <div> 
        <h3>Customer Reviews</h3>
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

    </div>
    
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Item</th>
                <th>Rating</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody>
            @foreach($post as $posts)
            <tr>
                <td>{{$posts->name}}</td>
                <td>{{$posts->Item->name}}</td>
                <td>
                        

                       {{$posts->rating}}
                </td>
                <td>{{$posts->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/FeedbackSoft') }}';" id="showDeactivated"> Show deactivated records</label>
    </div>
    


@endsection


@section('script')
   
@stop


   