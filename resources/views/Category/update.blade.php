@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop


@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
   <div class="container-fluid">
        <div>
                <h3>Service Category</h3>
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
        
        <form action="{{ url('/CategoryEdit', $post->id) }}" method="post">

        {{ csrf_field() }}
            <div class="form-group">
                <div align="center" class="checkbox">
                <label>
                  <input type="checkbox" @if($post->isFeatured == 0) checked @else @endif name='isFeatured' value="0">
                  <b>Featured Navigation Menu</b>
                  <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="popover" title="Featured Menu" data-html="true" data-content="Ticking the box will let the category be displayed on the navigation bar."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
                </label>
                </div>
            </div>
            <div class="form-group">
            <label for="">Name:</label>
            <input type="text"   value="{{ $post->name }}" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="">Description:</label>
            <textarea class="form-control"  rows="5" name="description" id="desc">{{ $post->description }}</textarea>
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