<?php $__env->startSection('content'); ?>
    <div> 
        <h3>Customer Feedback</h3>
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
             <?php endif; ?>
        <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="<?php echo e(url('/FeedbackCreate')); ?>" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div>
    </div>
    
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Rating</th>
                <th>Featured Post</th>
                <th>Posted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($posts->name); ?></td>
                <td><img class="img-responsive" src="<?php echo e(asset($posts->image)); ?>" style="max-width:200px; max-height:200px;"></td>
                <td>
                    <?php for($i = 0; $i < $posts->rating; $i++): ?>
                    <span class="fa fa-star checked"></span>
                    <?php endfor; ?>
                </td>
                <td>
                        <?php if($posts->isSelected == 0): ?>
                        Featured Post
                        <?php elseif($posts->isSelected == 1): ?>
                        Default Post 
                        <?php endif; ?>
                </td>
                <td>
                    <?php if($posts->isPublish == 1): ?>
                    Not yet posted
                    <?php else: ?>
                    Posted
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo e(url('/FeedbackReactivate', $posts->id)); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/Feedback')); ?>';" id="showDeactivated"> Show records</label>
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