@extends('layouts.admin')

@section('content')
<div class="container">
<div > 
    <h3>Dashboard</h3>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
</div>
</div>

<div id="accordion">
        
          <div class="card" style="border-color:maroon;">
            <div class="card-header" style="background-color:maroon;">
              <a class="card-link" style="color:white;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Inquiry
              </a>
            </div>
            <div id="collapseOne" class="collapse">
                    <div class="card-body">
                            <table id="example" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date Inquired</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($post as $posts)
                                        <tr>
                                            <td>{{ $posts->id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($posts->created_at)->format('F m,Y')}}</td>
                                            <td>{{ $posts->name }}</td>
                                            <td>{{ $posts->email }}</td>
                                            <td>{{ $posts->subject }}</td>
                                            <td> 
                                                <a href="{{ url('/InquiryView',$posts->id) }}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View Inquiry">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View Inquiry
                                                </a>
                                            </td>
                                        </tr>
                                
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group pull-right">
                                    <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/PostSoft') }}';" id="showDeactivated"> Show deactivated records</label>
                                </div>
                                </div>
                    </div>
            </div>
          </div>      
</div>
 
<div class="container" style="margin-top:20px;">
<div id="accordion2">
        
          <div class="card" style="border-color:maroon;">
            <div class="card-header" style="background-color:maroon;">
              <a class="card-link" style="color:white;" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                Feedback
              </a>
            </div>
            <div id="collapseTwo" class="collapse">
                    <div class="card-body">
                            <table id="example2" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Rating</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($post as $posts)
                                        <tr>
                                            <td>{{$posts->name}}</td>
                                            <td><img class="img-responsive" src="{{ asset($posts->image)}}" style="max-width:200px; max-height:200px;"></td>
                                            <td>
                                                @for ($i = 0; $i < $posts->rating; $i++)
                                                <span class="fa fa-star checked"></span>
                                                @endfor
                                            </td>
                                            <td>
                                                <a href="{{ url('/FeedbackUpdate',$posts->id) }}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ url('/FeedbackDeactivate', $posts->id) }}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                               
                                    </tbody>
                                </table>
                                <div class="form-group pull-right">
                                        <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/FeedbackSoft') }}';" id="showDeactivated"> Show deactivated records</label>
                                </div>
                        </div>
                    </div>
            </div>
</div> 
</div>     


<script>


    $(document).ready(function() {
      $('#example').DataTable( {
          "scrollX": true
      } );

      $('#example2').DataTable( {
        "scrollX": true
    } );
  } );

</script>
@endsection


