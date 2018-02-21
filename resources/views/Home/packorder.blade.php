@extends('layouts.master')

@section('contents')

<div class="container mt-5">
    <div class="container">
            <div class="col-sm-12 p-1 mb-0" style="margin-top:70px;">
                    <div class="mt-3">
                        <h3>{{$post->name}}</h3>
                    </div>
                </div>
        <hr class="colorgraph">     
            <form action="{{ url('/customer/cartPack/'.$post->id) }}" method="post" files="true" enctype="multipart/form-data">           
        <div class="row">
            {{csrf_field()}}
            <div class="col-sm-8 mt-3 card">
                @foreach($post->Inclusion as $inclusion)
                    <p class="lead p-3">{{$inclusion->ItemPack->name}}({{$inclusion->qty}})</p>
                    <input type="hidden" value="{{$inclusion->ItemPack->name}}" name="packItem[]">
                @endforeach
                <div class="form-group">
                    <label>QUANTITY</label>
                    <input type="number" name="qty" class="form-control-a">
                </div>
                <div class="form-group">
                        <label>JOB DESCRIPTION</label>
                        <textarea class="form-control" required rows="5" id="jobDesc" placeholder="Type your job description here, such as what your theme is, what design you want or the text to be written" name="jobDesc"></textarea>
                </div>
            </div>
            <div class="col-sm-4 mt-3 card bg-faded">
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
                {{--  endcol4  --}}
            </div>
            <div class="pull-right">
                <button class="btn btn-danger" type="submit">ADD TO CART</button>
            </div>
        </form>
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