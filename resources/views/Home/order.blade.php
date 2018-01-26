@extends('layouts.master')

@section('contents')

<div class="container mt-5">
    <div class="col-sm-12 card bg-dark p-1 mb-0" style="margin-top:70px;">
        <p class="lead text-white mt-2 ml-5">{{$post->name}}</p>
    </div>
    <hr class="colorgraph">
    <div class="row">
        <div class="col-sm-8 card bg-faded mb-0">
            <div class="m-3">
                @foreach($post->item as $item)
            <h5 class="mt-3"> Variant:  {{ $item->name }} </h5>
            <hr>
                @endforeach
            <p class="lead text-primary">Product Specification</p>
            <div class="row">
                <div class="col-sm-4">
                    @foreach($post->Attributes as $attribute)
                    {{$attribute->attributeName}}
                    @endforeach<br><br>
                    <label class="control-label" for="att">Quantity:</label>
                    <input type="number" class="form-control-a mt-3" style="" id="qty"> 
                </div>
                <div class="col-sm-8">
                    <select class="select2" id="att"> 
                    @foreach($post->Attributes as $attribute)
                    <?php $array = explode(',',$attribute->choiceDescription);?>
                    @foreach($array as $a)
                    <option> {{$a}} </option>
                    @endforeach
                   
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-5">
                 <div class="form-group">
                <label for="" class="">Order Description:</label>
                <textarea class="form-control" rows="5" id="jobDesc" placeholder="Type your job description here. Such as what date do you need it?" name="description"></textarea>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-4 card bg-faded mb-0">
            <div class="text-center"><p class="lead mt-3">Upload your design (Optional)</p></div>
            <form>
            <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
                <center><img class="img-responsive" id="pic" src="{{ URL::asset('img/grey-pattern.png')}}" style="max-width:300px; background-size: contain" /></center>
                <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
                <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
            </div>
            </form>
        </div>
    </div>
    <div class="row mt-0">
        <div class="col-sm-6 card bg-faded">
            <p class="lead mt-3">Delivery Option</p>
            <div class="card bg-faded">
                <ul class="list-group">
                    <li class="list-group-item">
                        &emsp;<label name="optionsRadios"><input type="radio" class="form-check-input" name="optionsRadios">Pick-up</label>
                    </li>
                    <li class="list-group-item">
                        &emsp;<label name="optionsRadios"><input type="radio" class="form-check-input" name="optionsRadios" checked>Courier</label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
               <div class="card col-sm-4">
                    <p class="lead mt-2 text-center">Image:</p>
                    @foreach($post->post as $post)
                        <img src="{{ asset($post->image) }}" class="mx-auto mb-3 img-responsive" width="150px" height="150px">
                   @endforeach
               </div>
               <div class="card col-sm-4 text-center">
                    <p class="lead mt-5">Ratings:</p>
                    @if(count($item->RateItem)!=0)
                        <?php 
                        $count = count($item->RateItem);
                        $sum = 0;
                        
                        foreach($item->RateItem as $rate)
                        {
                            $sum += $rate->rating;
                        }
                            $ave = $sum/$count;
                            $newave = round($ave);
                        ?>
                        <select id="" class="starrating" disabled>
                            <option value="1" @if(1 == $newave) selected = "selected" @else "" @endif>1</option>
                            <option value="2" @if(2 == $newave) selected = "selected" @else "" @endif>2</option>
                            <option value="3" @if(3 == $newave) selected = "selected" @else "" @endif>3</option>
                            <option value="4" @if(4 == $newave) selected = "selected" @else "" @endif>4</option>
                            <option value="5" @if(5 == $newave) selected = "selected" @else "" @endif>5</option>
                        </select>
                    @else
                        <p class="lead">No ratings yet.</p>
                    @endif
                </div>
                <div class="card col-sm-4">
                    <button type="button" id="modal" data-toggle="modal" data-target="#myModal" class="mt-5 btn btn-danger btn-lg">Add to Cart</button>
               </div>
            </div>
       </div>
    </div class="row">
</div>

{{--  modal  --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Product Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <p class="lead">
                    Product Type: {{$post2->name}}<br>
                    @foreach($post2->item as $item)Product Variant: {{$item->name}}@endforeach
                    <br>
                    @foreach($post2->Attributes as $attribute)
                    {{$attribute->attributeName}}:
                    @endforeach
                    <span id="sizeName"></span><br>
                    Quantity: <span id="quan"></span>
                    <br><br>
                    Job Order Description:<br>
                    <span id="job"></span>
                    <br>
                    Delivery Option:<br> <span id="delivery"></span>
                </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
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

            $(document).ready(function(){
                $('.starrating').barrating({

                theme: 'fontawesome-stars',
                readonly: true
                });

                $('#modal').on('click',function(){
                    var x = $('#att option:selected').text();
                    $('#sizeName').text(x);
                    var y = $("input[name='optionsRadios']:checked").parent('label').text();
                    $('#delivery').text(y);
                    var z = $('#jobDesc').val();
                    $('#job').text(z);
                    var a = $('#qty').val();
                    $('#quan').text(a);
                })
            });
    </script>
@stop