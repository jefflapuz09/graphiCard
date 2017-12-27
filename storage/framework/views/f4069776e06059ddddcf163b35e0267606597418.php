<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
    
            <div>
                <h3>Post</h3>
            </div>
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                  <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
            </div>
            <?php endif; ?> 
            <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>
    <div class="row">
    
    <div class="col-lg-6"> 
       
        <form action="<?php echo e(url('/PostUpdate', $post->id)); ?>" method="post" enctype="multipart/form-data">

        <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <div align="center" class="checkbox">
                <label>
                  <?php if($post->isFeatured == 0): ?>
                  <input type="checkbox" checked name="isFeatured" value="0">
                  <?php elseif($post->isFeatured == 1): ?>
                  <input type="checkbox" name="isFeatured" value="0">
                  <?php endif; ?>
                  <b>Featured Post</b>
                </label>
                </div>
            </div>
            <div class="form-group">
            <b><label for="sel2">Service Category</label></b>
            <select class="form-control" id="sel2" name="categoryId">
                    <option value="0">Please Select Service Category</option>
                <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <option value="<?php echo e($posts->id); ?>" 
                    <?php if($post->categoryId == $posts->id): ?>
                    selected = "selected"
                    <?php else: ?>
                    ""
                    <?php endif; ?>
                    ><?php echo e($posts->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
            <div class="form-group">
            <b><label for="sel2">Item</label></b>
            <select class="form-control" id="sel2" name="typeId">
                    <option value="0">Please Select Service Type</option>
                <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <option value="<?php echo e($types->id); ?>"
                    <?php if($post->typeId == $types->id): ?>
                    selected = "selected"
                    <?php else: ?> 
                    ""
                    <?php endif; ?>
                    ><?php echo e($types->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
             <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px; padding-bottom: 20px;" >
                <center><img class="img-responsive" id="pic" src="<?php echo URL::asset( $post->image )?>" style="max-width:300px; background-size: contain" /></center>
                <b><label style="margin-top:20px;" for="exampleInputFile">Photo Upload</label></b>
                <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                <!-- small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small> -->
            </div>
            
    </div> 
    <div class="col-lg-6" style="margin-top:;">
            <div class="form-group">
            <b><label for="">Description</label></b>
            <textarea class="form-control" rows="5" placeholder="details" name="details" id="details"><?php echo e($post->details); ?></textarea>
            </div>
            <div class="pull-right">
            <button type="reset" class="btn btn-success">Clear</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
    </div>
    </form>
    </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'details' );

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>