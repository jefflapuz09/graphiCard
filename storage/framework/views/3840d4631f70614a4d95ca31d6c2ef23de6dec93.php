<?php $__env->startSection('content'); ?>
    <div> 
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
        
    </div>
    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Customer Feedback
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All of the deactivated customer feedbacks are displayed here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Rating</th>
                                <th>Featured Post</th>
                                <th>Post Status</th>
                                <th>Action</th>
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
                                        <?php if($posts->isSelected == 1): ?>
                                        Featured Post
                                        <?php elseif($posts->isSelected == 0): ?>
                                        Default Post 
                                        <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($posts->isPublish == 0): ?>
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
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/Feedback')); ?>';" id="showDeactivated"> Back to Feedbacks table</label>
                    </div>
        </div>
    </div>
    </div>
     

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>