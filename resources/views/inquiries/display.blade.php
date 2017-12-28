@extends('layouts.admin')
@section('content')

<h3 class="my-3">Inquiry Details</h3>
<br>
<div class="row">
    <div class="container">
        <form method="post" action="{{ url('/InquiryUpdate',$post->id) }}" id="inquiry-form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6 form-line"> 
                    <div class="form-group">
                        <label for="exampleInputUsername"><b>Sender Name</b></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail"><b>Email Address</b></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $post->email }}" disabled>
                    </div>  
                    <div class="form-group">
                        <label for="telephone"><b>Contact Number</b></label>
                        <input type="tel" class="form-control" id="contact_number" name="contact_number" value="{{ $post->contact_number }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for ="description"><b>Subject</b></label>
                        <input type="tel" class="form-control" id="subject" name="subject" value="{{ $post->subject }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for ="description"><b>Message</b></label>
                        <textarea  class="form-control" id="message" name="message" disabled>{{ $post->message }}</textarea>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" name="status" value="1" class="status" onclick="enableBtn(this.value)"> Already responded to the inquiry? Mark as <b>READ?</b></label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit pull-right" id="btnSubmit" disabled><i class="fa fa-paper-plane" aria-hidden="true"></i>  Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
function enableBtn(){
$(document).ready(function(){
    var val = $("input[name='status']:checked").val();
    if(val=="1"){
      $("#btnSubmit").prop('disabled',false);
    }
    else{
      $("#btnSubmit").prop('disabled',true);  
    }
});
}
</script>
@endsection