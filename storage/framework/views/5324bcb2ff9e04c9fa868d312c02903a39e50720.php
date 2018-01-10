<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
    <div> 
        <?php if(session('success')): ?>
        <script type="text/javascript">
            toastr.success(' <?php echo session('success'); ?>', 'Insert Success')
        </script>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <script type="text/javascript">
                toastr.error(' <?php echo session('error'); ?>', "There's something wrong")
            </script>
        <?php endif; ?>
        <!-- <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="<?php echo e(url('/FeedbackCreate')); ?>" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div> -->
    </div>
    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Customer Feedbacks
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All of the customer feedbacks are displayed here. In order for the selected feedback be displayed on the website. Please update the record and tick the box that says selected post."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
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
                                <th>Posted</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($posts->Customer->firstName); ?> <?php echo e($posts->Customer->middleName); ?> <?php echo e($posts->Customer->lastName); ?></td>
                                <td><img class="img-responsive" src="<?php echo e(asset($posts->image)); ?>" style="max-width:200px; max-height:200px;"></td>
                                <td>
                                        <?php echo e($posts->rating); ?>

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
                                    <?php if($posts->isPublish == 1): ?>
                                    <a href="<?php echo e(url('/FeedbackUpdate',$posts->id)); ?>" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo e(url('/FeedbackPost',$posts->id)); ?>" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Publish Post">
                                        <i class="fa fa-clipboard" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo e(url('/FeedbackDeactivate', $posts->id)); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <?php else: ?>
                                    <a href="<?php echo e(url('/FeedbackUpdate',$posts->id)); ?>" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo e(url('/FeedbackUnpublish',$posts->id)); ?>" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Unpublish Post">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                    <a href="<?php echo e(url('/FeedbackDeactivate', $posts->id)); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/FeedbackSoft')); ?>';" id="showDeactivated"> Show deactivated records</label>
                    </div>
        </div>
    </div>
    </div>
     

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>