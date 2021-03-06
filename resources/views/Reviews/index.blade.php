@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{ asset('js/jquery.min.js') }}"></script>
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
            Customer Reviews
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All customer reviews are displayed here by item."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
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
                            <td>{{$posts->Customer->firstName}} {{$posts->Customer->middleName}} {{$posts->Customer->lastName}}</td>
                            <td>{{$posts->Item->name}}</td>
                            <td>
                                    

                                {{$posts->rating}}
                            </td>
                            <td>{{$posts->description}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    </div>




@endsection


@section('script')
   
@stop


   