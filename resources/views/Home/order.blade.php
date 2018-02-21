@extends('layouts.master')

@section('contents')

<div class="container mt-5" >
    @foreach($post->item as $itemq)

    @endforeach

    <form action="{{ url('/customer/cart/'.$post->id.'/'.$itemq->id) }}" method="post" files="true" enctype="multipart/form-data">
        <div class="col-sm-12 p-1 mb-0" style="margin-top:70px;">
            <div class="mt-3">
                <h3>{{$post->name}}</h3>
            </div>
        </div>
        <hr class="colorgraph">
        <div class="row">
            {{ csrf_field() }}
            <div class="col-sm-8 card mb-0" >
                <div class="m-3">
                    @foreach($post->item as $item)
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <h5> VARIANT</h5> 
                        </div>
                        <div class="col-md-9 mt-3">
                            <select class="form-control-a select2">
                                @foreach($variant as $var)  
                                <option value="{{$var->id}}" @if($var->id == $item->id) selected="selected" @endif>{{$var->name}}</option>
                                @endforeach
                            </select>
                        </div><!--end col9-->
                    </div><!--row end-->
                    @if(Auth::guest())

                    @else
                    <input type="hidden" name="variant" value="{{$item->id}}"/>
                    <input type="hidden" name="custId" value="{{Auth::user()->Customer->id}}"/>
                    @endif
                    @endforeach
                    <br>
                    <h5>ORDER SPECIFICATIONS</h5>

                    @foreach($post->Attributes as $attribute)
                    <div class="row ml-3">
                        <div class="col-md-4">
                            <b>{{$attribute->attributeName}}</b>
                            <input type="hidden" value="{{$attribute->attributeName}}" name="attributeName[]">
                            <br><br>
                        </div>
                        <div class="col-md-8">
                            <select id="att" name="choiceDesc[]">
                                <?php $array = explode(',',$attribute->choiceDescription);?>
                                @foreach($array as $a)
                                <option value="{{$a}}"> {{$a}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endforeach

                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <h5> QUANTITY</h5> 
                        </div>
                        <div class="col-md-9 mt-3">
                            <input type="number" class="form-control-a" style="" id="qty" name="qty" required > 
                        </div><!--end col9-->
                    </div><!--row end-->

<!-- <div class="row">
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
</div> -->

<div class="mt-3">
    <div class="form-group">
        <h5>ORDER DESCRIPTION</h5>
        <textarea class="form-control" required rows="5" id="jobDesc" placeholder="Type your job description here, such as what your theme is, what design you want or the text to be written" name="jobDesc"></textarea>
    </div>
</div>
</div>
</div>
<div class="col-sm-4 card bg-faded mb-0">
    <h5 class="mt-4">ORDER DESIGN</h5>
    <div class="nav flex-column text-left mt-1 pl-5">
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" id="inlineRadio1" value="1" name="choice"> Pick a color
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" id="inlineRadio2" value="2" name="choice"> Upload your own Design
            </label>
        </div>
    </div>
    <div class="form-group d-none" id="upload" style="margin-top:10px; border:1px solid black; padding:10px" >
        <center><img class="img-responsive" id="pic" src="{{ URL::asset('img/grey-pattern.png')}}" style="max-width:300px; background-size: contain" /></center>
        <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
        <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
    </div>
    <div id="colorpickdiv">
        <div class="container mt-5">
            <input type="text" class="form-control-a jscolor"  id="colorpick" onkeypress="return runScript(this.jscolor,event)" onchange="update(this.jscolor)" value="7A0000" name="choiceDescription" placeholder="Separated by comma">
            <div id="rect" class="mx-auto mt-3 mb-3" style="border:1px solid gray; width:500px; max-width:300px; height:100px;"></div>
            <input type="text" class="form-control-a"  id="a" name="color[]" >
            <input type="text" class="form-control-a"  id="b" name="color[]" >
            <input type="text" class="form-control-a"  id="c" name="color[]" >
        </div>
    </div>
</div>
</div>
<div class="row mt-0">
    <div class="col-sm-6 card bg-faded">
        <h5 class="mt-2">SAMPLE IMAGE:</h5>
        @foreach($post->post as $post)
        <img src="{{ asset($post->image) }}" class="mx-auto mb-3 img-responsive" width="100%" height="300px">
        @endforeach
    </div>
    <div class="col-sm-6 card bg-faded">
        <h5 class="mt-2">PRODUCT DESCRIPTION </h5>
        <p></p>
        <h5 class="mt-2">RATINGS:
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
        No ratings yet.</h5>
        @endif
        <button type="button" id="modal" data-toggle="modal" data-target="#myModal" class="mt-5 btn btn-danger btn-lg" style=""><i class="fa fa-shopping-cart"></i> Add to Cart</button>
    </div>
</div>

<!-- <div class="row mt-0">
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

            </div>
            <div class="card col-sm-8">
                <div class="row">
                    <h5 class="mt-2 pl-5">RATINGS:
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
                    No ratings yet.</h5>
                    @endif
                </div>
                <button type="button" id="modal" data-toggle="modal" data-target="#myModal" class="mt-5 btn btn-danger btn-lg">Add to Cart</button>
            </div>
        </div>
    </div>
</div> -->

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