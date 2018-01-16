@extends('layouts.master')

@section('style')
<link href="{{ asset('css/bars-1to10.css') }}" rel="stylesheet"> 
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop


@section('contents')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
<!-- <style>
#formModal {
left:50%;
outline: none;
}
</style> -->

<div class="container" style="margin-top:80px;">
  <ol class="breadcrumbs breadcrumb-arrow" width="100%">
    <li class="" style=""><a href="{{ url('/ServiceItem') }}">Frequently Asked Questions</a></li>
    <li class="active" style=""><span><b></b></span></li>
  </ol>
  <div id="accordion" role="tablist">
    @foreach ($faqs as $f)
    <div class="card">
      <div class="card-header" role="tab" id="heading{{$f -> id}}">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapse{{$f -> id}}" role="button" aria-expanded="true" aria-controls="collapse{{$f -> id}}">
            {{$f->question}}
          </a>
        </h5>
      </div>

      <div id="collapse{{$f -> id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$f -> id}}" data-parent="#accordion">
        <div class="card-body">
          <?php echo $f->answer?>
        </div>
      </div>
    </div>
    @endforeach
  </div><!--END ACCORDION-->

</div>
@endsection

@section('script')
<script src="{{ asset('js/jquery.barrating.min.js') }}"></script>
<script>
  $( document ).ready(function() {
    $('#example').barrating({
      theme: 'bars-1to10'
    });
    $('.starrating').barrating({

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