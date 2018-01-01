@extends('layouts.admin')

@section('content')
<div > 
    <h3>Inquiries</h3>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
</div>

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
    <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='{{ url('/admin') }}';" id="showDeactivated"> Show unread inquiries</label>
</div>

<script>


    $(document).ready(function() {
      $('#example').DataTable( {
          "scrollX": true
      } );


  } );

</script>
@endsection

