@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
<link href="{{ asset('css/fontawesome-stars.css') }}" rel="stylesheet"> 
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
        toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong!")
    </script>              
    @endif  
    @if(session('error'))
    <script type="text/javascript">
        toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
    </script>
    @endif
    <div class="row">
        <div class="col-md-6"> 
            <form action="{{ url('/FeedbackEdit', $post->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div align="center" class="checkbox">
                    <label>
                        @if($post->isSelected == 0)
                        <input type="checkbox" name="isSelected" value="0">
                        @else
                        <input type="checkbox" checked name="isSelected" value="0">
                        @endif
                        <b>Selected Post</b>
                        <button type="button" class="ml-1 btn btn-outline-dark btn-sm" data-toggle="popover" title="Selected Post" data-html="true" data-content="Ticking the box will let the customer feedback be displayed on the landing page of the website. If not, it will be just displayed on the default page."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
                    </label>
                </div>
                <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px; padding-right: 0px" >
                    <center><img class="img-fluid" id="pic" src="{{ URL::asset($post->image)}}" style="max-width:200px; background-size: contain" /></center>
                </div>
            </div> 
            <div class="col-md-6"> 
                <div class="form-group">
                    <label for="">Customer Name:</label></br>
                    <select class="select2 form-control" name="customerId" style="width: 100%" disabled="">
                        @foreach($customer as $cust)
                        <option value="{{ $cust->id }}" @if($cust->id == $post->customerId)selected="selected"@else""@endif>{{$cust->firstName}} {{$cust->middleName}} {{$cust->lastName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Description:</label>
                    <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc" disabled>{{$post->description}}</textarea>
                </div>
                <div class="form-group">
                    <div class="card-body">
                        <span class="social-box">
                            <label for="price-max">Rating:</label>
                            <?php $round = round($post->rating);?>
                            <select id="star" class="starrating" disabled>
                                <option value="1" @if($round == 1) selected = "selected" @else "" @endif>1</option>
                                <option value="2" @if($round == 2) selected = "selected" @else "" @endif>2</option>
                                <option value="3" @if($round == 3) selected = "selected" @else "" @endif>3</option>
                                <option value="4" @if($round == 4) selected = "selected" @else "" @endif>4</option>
                                <option value="5" @if($round == 5) selected = "selected" @else "" @endif>5</option>
                            </select>             
                        </span>
                    </div>
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary"> Update </button>
                </div>
            </form>
        </div> 
    </div>
</div>


@endsection
@section('script')
<script src="{{ asset('js/jquery.barrating.min.js') }}"></script>
<script>
    $( document ).ready(function() {
        $('#star').barrating({
         theme: 'fontawesome-stars',
         readonly: true
     });

        $('.meron').barrating('set', 5);
    });
</script> 
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