@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    <div class="container-fluid">
    <div>
        <h3>Package</h3>
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
    <form action="{{ url('/PackageStore') }}" method="post">
    <div class="row">
        <div class="col-lg-6"> 
            
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" placeholder="Package Name" value="" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="">Price:</label>
                <input type="text" placeholder="Price" value="" class="form-control" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="">Description:</label>
                <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"></textarea>
            </div>
            <div class="pull-right">
                <button type="reset" class="btn btn-success">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div> 
    <div class="col-lg-6 e">
            <p class="add-one lead">Package Inclusion <-Please click to add</p> 
            <div class="form-group  dynamic-element row">
                    <div class="form-group col-md-6">
                    <label for="sel2">Service Subcategory</label>
                    <select  class="select form-control" required id="sel2" name="itemId[]">
                            <option value="0" disabled>Please select service type</option>
                        @foreach($pack as $posts)
                           
                            <option value="{{ $posts->id }}">{{ $posts->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group col-md-4">
                            <label for="inputEmail4">Quantity</label>
                            <input type="text" class="form-control" name="qty[]" id="inputEmail4" placeholder="Quantity">
                            
                    </div>
                    <div class="form-group col-md-2">
                            <label for="inputEmail4">Action</label>
                            <a class="btn btn-sm btn-danger delete" href="#">x</a>
                    </div>
            </div>
    </div>

    </div>
    </div>
</form>
@endsection

@section('script')
<script src="{{ asset('js/jquery.inputmask.bundle.js') }}"></script>
<script>

    $(document).ready(function(){
        $("#price").inputmask('currency', {
            rightAlign: true
          });
    });

        $('.add-one').click(function(){
            $('.dynamic-element').first().clone().appendTo('.e');
            attach_delete();
          });
          
          
          //Attach functionality to delete buttons
          function attach_delete(){
            $('.delete').off();
            $('.delete').click(function(){
              console.log("click");
              $(this).closest('.dynamic-element').remove();
            });
          }
</script>
@stop