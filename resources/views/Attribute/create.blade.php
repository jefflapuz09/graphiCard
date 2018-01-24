@extends('layouts.admin')

@section('styles')
<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
@stop

@section('content')
<script src="{{  asset('vendor/jquery/jquery.min.js')  }}"></script>
<script src="{{  asset('js/toastr.js')  }}"></script>
    <div class="container-fluid">
    <div>
        <h3>Order</h3>
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
    
    <div class="col-lg-6"> 
        

       

        <form action="{{ url('/AttributeStore') }}" method="post">

        {{ csrf_field() }}

            <div class="form-group">
                <label for="sel2">Item</label>
                <select  class="select2 form-control" required id="sel2" name="itemId">
                        <option value="0" disabled>Please select item</option>
                    @foreach($item as $posts)
                    
                        <option value="{{ $posts->id }}">{{ $posts->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                    <label for="sel2">Attribute Name</label>
                    <input type="text" class="form-control" name="attributeName" placeholder="Attribute Name">
            </div>
            <div class="form-group">
                    <label for="sel2">Choice Description</label>
                    <input type="text" class="form-control" name="choiceDescription" placeholder="Separated by comma" data-role="tagsinput">
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
    <Script>
        $(document).ready(function(){
            $(".s").tagsinput('items')
            
        });
            
    </script>
@stop