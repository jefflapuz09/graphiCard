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
    <form action="{{ url('/PackageEdit',$post->id) }}" method="post">
    <div class="row">
        <div class="col-lg-6"> 
            
            {{ csrf_field() }}
            <input type="hidden" value="{{$post->id}}" name="hidid">
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" placeholder="Package Name" value="{{$post->name}}" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="">Price:</label>
                <input type="text" placeholder="Price" value="{{$post->price}}" class="form-control" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="">Description:</label>
                <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc">{{$post->description}}</textarea>
            </div>
            <div class="pull-right">
                <button type="reset" class="btn btn-success">Clear</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div> 
    <div class="col-lg-6 e">
            <p class="add-one lead">Package Inclusion <-Please click to add</p> 
            <table id="example" class="display dynamic" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($post->Inclusion as $inclusion)
                    <tr class="del">
                        <td>
                            <select  class="select form-control" required id="sel2" name="itemId[]">
                                <option value="0" disabled>Please select service type</option>
                            @foreach($pack as $posts)
                               
                                <option value="{{ $posts->id }}" @if($inclusion->ItemPack->id == $posts->id) selected="selected"@endif>{{ $posts->name }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" value="{{$inclusion->qty}}" name="qty[]" id="inputEmail4" placeholder="Quantity">
                            <input type="text" value="{{$inclusion->id}}" name="inc[]">
                        </td>
                        <td><a class="btn btn-sm btn-danger delete" href="#">x</a></td>
                    </tr>     
                    @endforeach 
                </tbody>
            </table>
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
        attach_delete();
        $('.add-one').click(function(){
            table.row.add(["<select  class='select form-control' required id='sel2' name='itemId[]'>@foreach($pack as $posts)<option value='{{ $posts->id }}'>{{ $posts->name }}</option>@endforeach", "<input type='text' class='form-control' name='qty[]' placeholder='Quantity'>", "<a class='btn btn-sm btn-danger delete' href='#'>x</a>"]).draw( false );
            
            attach_delete();
          });
          
          
          //Attach functionality to delete buttons
          function attach_delete(){
            $('.delete').off();
            $('.delete').click(function(){
              console.log("click");
              table.row($(this).parents('tr')).remove().draw( false );
            });
          }
        });
</script>
@stop