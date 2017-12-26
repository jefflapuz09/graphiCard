<?php $__env->startSection('content'); ?>
    <div > 
        <h3>Post</h3>
        <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="<?php echo e(url('/PostCreate')); ?>" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div>
    </div>

     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="120px">Post Details</th>
                <th width="200px">Image</th>
                <th>Details</th>
                <th width="300px">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <li><?php echo e($posts->category); ?></li>
                    <li><?php echo e($posts->type); ?></li>
                </td>
                <td><img class="img-responsive" src="<?php echo e(asset($posts->image)); ?>" style="max-width:200px; max-height:200px;"></td>
                <td><?php echo $posts->details  ?></td>
                <td> 

                    <?php if($posts->isDraft == 0): ?>
                        <a href="<?php echo e(url('/PostEdit',$posts->id)); ?>" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                Update
                        </a>
                        <a href="<?php echo e(url('/PostDraft',$posts->id)); ?>" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Publish Post">
                                Publish Post
                        </a>
                         <a href="<?php echo e(url('/PostDeactivate',$posts->id)); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate Post">
                                Deactivate Post
                        </a>
                    <?php elseif($posts->isDraft == 1): ?>
                        <a href="<?php echo e(url('/PostShow',$posts->id)); ?>" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Show Post">
                                Show Post
                        </a>
                         <a href="<?php echo e(url('/PostDeactivate',$posts->id)); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate Post">
                                Deactivate Post
                        </a>
                    <?php endif; ?>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/PostSoft')); ?>';" id="showDeactivated"> Show deactivated records</label>
    </div>
    
<script>
        
        
        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );

          
        } );

    </script>
<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>