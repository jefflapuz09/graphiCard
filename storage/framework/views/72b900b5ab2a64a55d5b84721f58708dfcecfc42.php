<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
    <div class="container-fluid">
    <div>
        <h3>Package</h3>
    </div>
    <?php if($errors->any()): ?>
        <script type="text/javascript">
            toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong!")
        </script>             
    <?php endif; ?>
     <?php if(session('error')): ?>
        <script type="text/javascript">
            toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
        </script>
    <?php endif; ?>
    <form action="<?php echo e(url('/PackageEdit',$post->id)); ?>" method="post">
    <div class="row">
        <div class="col-lg-6"> 
            
            <?php echo e(csrf_field()); ?>

            <input type="hidden" value="<?php echo e($post->id); ?>" name="hidid">
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" placeholder="Package Name" value="<?php echo e($post->name); ?>" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="">Price:</label>
                <input type="text" placeholder="Price" value="<?php echo e($post->price); ?>" class="form-control" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="">Description:</label>
                <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"><?php echo e($post->description); ?></textarea>
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
                    <?php $__currentLoopData = $post->Inclusion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="del">
                        <td>
                            <select  class="select form-control" required id="sel2" name="itemId[]">
                                <option value="0" disabled>Please select service type</option>
                            <?php $__currentLoopData = $pack; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                                <option value="<?php echo e($posts->id); ?>" <?php if($inclusion->ItemPack->id == $posts->id): ?> selected="selected"<?php endif; ?>><?php echo e($posts->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" value="<?php echo e($inclusion->qty); ?>" name="qty[]" id="inputEmail4" placeholder="Quantity">
                            <input type="text" value="<?php echo e($inclusion->id); ?>" name="inc[]">
                        </td>
                        <td><a class="btn btn-sm btn-danger delete" href="#">x</a></td>
                    </tr>     
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </tbody>
            </table>
    </div>

    </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/jquery.inputmask.bundle.js')); ?>"></script>
<script>

       

    $(document).ready(function(){
        $("#price").inputmask('currency', {
            rightAlign: true
          });
        attach_delete();
        $('.add-one').click(function(){
            table.row.add(["<select  class='select form-control' required id='sel2' name='itemId[]'><?php $__currentLoopData = $pack; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value='<?php echo e($posts->id); ?>'><?php echo e($posts->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>", "<input type='text' class='form-control' name='qty[]' placeholder='Quantity'>", "<a class='btn btn-sm btn-danger delete' href='#'>x</a>"]).draw( false );
            
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>