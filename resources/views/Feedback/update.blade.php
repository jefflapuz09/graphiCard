@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    <div class="container-fluid">
    <div>
        <h3>Customer Feedback</h3>
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
        

       

        <form action="{{ url('/FeedbackEdit', $post->id) }}" method="post" enctype="multipart/form-data">

        {{ csrf_field() }}
                <div class="form-group">
                            <div align="center" class="checkbox">
                            <label>
                                @if($post->isSelected == 1)
                              <input type="checkbox" name="isSelected" value="0">
                                @else
                              <input type="checkbox" checked name="isSelected" value="0">
                                @endif
                              <b>Selected Post</b>
                              <button type="button" class="ml-1 btn btn-outline-dark btn-sm" data-toggle="popover" title="Selected Post" data-html="true" data-content="Ticking the box will let the customer feedback be displayed on the landing page of the website. If not, it will be just displayed on the default page."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
                            </label>
                            </div>
                        </div>
            <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
                <center><img class="img-responsive" id="pic" src="{{ URL::asset($post->image)}}" style="max-width:300px; background-size: contain" /></center>
                <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
                <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>
            <div class="form-group">
                  <label for="">Customer Name:</label></br>
                  <select class="select2 form-control" name="customerId" style="width: 100%">
                    @foreach($customer as $cust)
                      <option value="{{ $cust->id }}" @if($cust->id == $post->customerId)selected="selected"@else""@endif>{{$cust->firstName}} {{$cust->middleName}} {{$cust->lastName}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc">{{$post->description}}</textarea>
            </div>
            <div class="form-group">
                    <div data-role="rangeslider">
                        <label for="price-max">Rating:</label>
                        <input type="range"  name="rating" id="price-max" value="{{$post->rating}}" min="1" max="5">
                   </div>
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
<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#pic')
                        .attr('src', e.target.result)
                        .width(300);
                    };
                reader.readAsDataURL(input.files[0]);
            }
            }

</script>
@stop