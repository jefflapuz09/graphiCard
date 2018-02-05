@extends('layouts.master')

@section('contents')

<div class="container mt-5" >
    @foreach($post->item as $itemq)

    @endforeach
 
    <form action="{{ url('/customer/cart/'.$post->id.'/'.$itemq->id) }}" method="post">
    <div class="col-sm-12 card bg-dark p-1 mb-0" style="margin-top:70px;">
        <p class="lead text-white mt-2 ml-5">{{$post->name}}</p>
    </div>
    <hr class="colorgraph">
    <div class="row">
            {{ csrf_field() }}
        <div class="col-sm-8 card mb-0" >
            <div class="m-3">
                @foreach($post->item as $item)
            <h5 class="mt-3"> Variant:</h5> 
            <select class="form-control-a select2">
                @foreach($variant as $var)  
                    <option value="{{$var->id}}" @if($var->id == $item->id) selected="selected" @endif>{{$var->name}}</option>
                @endforeach
            </select>
            @if(Auth::guest())

            @else
            <input type="hidden" name="variant" value="{{$item->id}}"/>
            <input type="hidden" name="custId" value="{{Auth::user()->Customer->id}}"/>
            @endif
            <hr>
                @endforeach
            <p class="lead text-primary">Product Specification</p>
            <div class="row">
                <div class="col-sm-4">
                    @foreach($post->Attributes as $attribute)
                    {{$attribute->attributeName}}
                    <input type="hidden" value="{{$attribute->attributeName}}" name="attributeName">
                    @endforeach<br><br>
                    <label class="control-label" for="att">Quantity:</label>
                    <input type="number" required class="form-control-a mt-3" style="" id="qty" name="qty"> 
                </div>
                <div class="col-sm-8">
                    <select class="select2" id="att" name="choiceDesc"> 
                    @foreach($post->Attributes as $attribute)
                    <?php $array = explode(',',$attribute->choiceDescription);?>
                    @foreach($array as $a)
                    <option value="{{$a}}"> {{$a}} </option>
                    @endforeach
                   
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-5">
                 <div class="form-group">
                <label for="" class="">Order Description:</label>
                <textarea class="form-control" required rows="5" id="jobDesc" placeholder="Type your job description here. Such as what date do you need it?" name="jobDesc"></textarea>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-4 card bg-faded mb-0">
                <ul class="nav flex-column text-center mt-5">
                        <li class="nav-item">
                                <input type="radio" class="form-check-input" value="1" name="choice">Pick a Color
                        </li>
                        <li class="nav-item">
                                <input type="radio" class="form-check-input" checked value="2" name="choice">Upload your own Design
                        </li>
                </ul>
            <div class="form-group d-none" id="upload" style="margin-top:10px; border:1px solid black; padding:10px" >
                <center><img class="img-responsive" id="pic" src="{{ URL::asset('img/grey-pattern.png')}}" style="max-width:300px; background-size: contain" /></center>
                <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
                <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
            </div>
            <div id="colorpickdiv">
                <div class="container mt-5">
                    <input type="text" class="form-control-a jscolor"  id="colorpick" onkeypress="return runScript(this.jscolor,event)" onchange="update(this.jscolor)" value="7A0000" name="choiceDescription" placeholder="Separated by comma">
                    <div id="rect" class="mx-auto mt-3 mb-3" style="border:1px solid gray; width:500px; max-width:300px; height:100px;"></div>
                    <input type="text" class="form-control-a"  id="a" name="choiceDescription" >
                    <input type="text" class="form-control-a"  id="b" name="choiceDescription" >
                    <input type="text" class="form-control-a"  id="c" name="choiceDescription" >
                </div>
            </div>
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
    </div>

{{--  modal  --}}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header" style="background:darkred;">
              <h5 class="modal-title text-white" id="exampleModalLabel">Product Order</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <hr class="colorgraph">
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
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      {{--  endofmodal  --}}

</form>
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
                $('#colorpickdiv').addClass('d-none');
                $('#upload').removeClass('d-none');
                document.getElementById('rect').style.backgroundColor = '#7A0000';

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

                $("input:radio[name=choice]").click(function() {
                    var value = $(this).val();
                    if(value == 1)
                    {
                        $('#upload').addClass('d-none');
                        $('#colorpickdiv').removeClass('d-none');
                    }
                    else
                    {
                        $('#colorpickdiv').addClass('d-none');
                        $('#upload').removeClass('d-none');
                        
                    }
                });
            });

            function update(jscolor) {
                document.getElementById('rect').style.backgroundColor = '#' + jscolor;
            }

            function runScript(jscolor, e) {
                if (e.keyCode == 13) {
                    var a = $('#colorpick').val();
                    if($('#a').val() == '')
                    {
                        document.getElementById('a').style.backgroundColor = '#' + a;
                        $('#a').val(a);
                    }
                    else if($('#b').val() == '')
                    {
                        document.getElementById('b').style.backgroundColor = '#' + a;
                        $('#b').val(a);
                    }
                    else if($('#c').val() == '')
                    {
                        document.getElementById('c').style.backgroundColor = '#' + a;
                        $('#c').val(a);
                    }
                    else
                    {
                        document.getElementById('a').style.backgroundColor = 'white';
                        $('#a').val('');
                        document.getElementById('b').style.backgroundColor = 'white';
                        $('#b').val('');
                        document.getElementById('c').style.backgroundColor = 'white';
                        $('#c').val('');
                    }
                }
            }
    </script>
@stop