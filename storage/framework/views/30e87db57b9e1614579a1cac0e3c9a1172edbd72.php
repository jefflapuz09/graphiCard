<?php $__env->startSection('contents'); ?>

<div class="container mt-5" >
    <?php $__currentLoopData = $post->item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
    <form action="<?php echo e(url('/customer/cart/'.$post->id.'/'.$itemq->id)); ?>" method="post">
    <div class="col-sm-12 card bg-dark p-1 mb-0" style="margin-top:70px;">
        <p class="lead text-white mt-2 ml-5"><?php echo e($post->name); ?></p>
    </div>
    <hr class="colorgraph">
    <div class="row">
            <?php echo e(csrf_field()); ?>

        <div class="col-sm-8 card mb-0" >
            <div class="m-3">
                <?php $__currentLoopData = $post->item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h5 class="mt-3"> Variant:</h5> 
            <select class="form-control-a select2">
                <?php $__currentLoopData = $variant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <option value="<?php echo e($var->id); ?>" <?php if($var->id == $item->id): ?> selected="selected" <?php endif; ?>><?php echo e($var->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if(Auth::guest()): ?>

            <?php else: ?>
            <input type="hidden" name="variant" value="<?php echo e($item->id); ?>"/>
            <input type="hidden" name="custId" value="<?php echo e(Auth::user()->Customer->id); ?>"/>
            <?php endif; ?>
            <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p class="lead text-primary">Product Specification</p>
            <div class="row">
                <div class="col-sm-4">
                    <?php $__currentLoopData = $post->Attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($attribute->attributeName); ?>

                    <input type="hidden" value="<?php echo e($attribute->attributeName); ?>" name="attributeName">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>
                    <label class="control-label" for="att">Quantity:</label>
                    <input type="number" required class="form-control-a mt-3" style="" id="qty" name="qty"> 
                </div>
                <div class="col-sm-8">
                    <select class="select2" id="att" name="choiceDesc"> 
                    <?php $__currentLoopData = $post->Attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $array = explode(',',$attribute->choiceDescription);?>
                    <?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($a); ?>"> <?php echo e($a); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <center><img class="img-responsive" id="pic" src="<?php echo e(URL::asset('img/grey-pattern.png')); ?>" style="max-width:300px; background-size: contain" /></center>
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
                    <?php $__currentLoopData = $post->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e(asset($post->image)); ?>" class="mx-auto mb-3 img-responsive" width="150px" height="150px">
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </div>
               <div class="card col-sm-4 text-center">
                    <p class="lead mt-5">Ratings:</p>
                    <?php if(count($item->RateItem)!=0): ?>
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
                            <option value="1" <?php if(1 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>1</option>
                            <option value="2" <?php if(2 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>2</option>
                            <option value="3" <?php if(3 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>3</option>
                            <option value="4" <?php if(4 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>4</option>
                            <option value="5" <?php if(5 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>5</option>
                        </select>
                    <?php else: ?>
                        <p class="lead">No ratings yet.</p>
                    <?php endif; ?>
                </div>
                <div class="card col-sm-4">
                    <button type="button" id="modal" data-toggle="modal" data-target="#myModal" class="mt-5 btn btn-danger btn-lg">Add to Cart</button>
               </div>
            </div>
       </div>
    </div>


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
                        Product Type: <?php echo e($post2->name); ?><br>
                        <?php $__currentLoopData = $post2->item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>Product Variant: <?php echo e($item->name); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br>
                        <?php $__currentLoopData = $post2->Attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($attribute->attributeName); ?>:
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
      

</form>
</div>


    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>