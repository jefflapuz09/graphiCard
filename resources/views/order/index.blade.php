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
            Orders
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All list of orders are found here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Items - Quantity</th>
                                <th>Date Ordered</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($post as $posts)
                            <tr>
                                <td>{{$posts->Customer->firstName}} {{$posts->Customer->middleName}} {{$posts->Customer->lastName}}</td>
                                <td>
                                    @foreach($posts->Request as $request)
                                        <li>{{$request->itemName}}({{$request->quantity}}pcs)</li>
                                        <li>{{$request->orderDescription}}</li>
                                        <br>
                                    @endforeach
                                </td>
                                <td>{{ Carbon\Carbon::parse($posts->created_at)->diffForHumans() }}</td>
                                <td>
                                    @if($posts->status == 0)
                                        Pending
                                    @endif
                                <td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/ServiceTypeSoft') }}';" id="showDeactivated"> Show past order records</label>
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


   