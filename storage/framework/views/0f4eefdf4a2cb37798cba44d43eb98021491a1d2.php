<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>


    <div > 
        <?php if(session('success')): ?>
        <script type="text/javascript">
            toastr.success(' <?php echo session('success'); ?>', 'Success!')
        </script>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <script type="text/javascript">
                toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
            </script>
        <?php endif; ?>

    </div>

        <div class="card" style="border:1px solid black; margin:10px;">
        <div class="card-header" style="background:maroon; color:white;">
                Post
                <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All post information are displayed here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
        </div>
        <div class="card-block">
            <div class="container mt-3 mb-3">
                    <div class="pull-right" style="margin-bottom:15px;"> 
                            <a href="<?php echo e(url('/PostCreate')); ?>" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                                New Post
                            </a>
                        </div>
                    <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="120px">Post Details</th>
                                    <th>Author</th>
                                    <th width="200px">Image</th>
                                    <th>Featured Post</th>
                                    <th width="150px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <li><?php echo e($posts->category); ?></li>
                                        <li><?php echo e($posts->type); ?></li>
                                        <li><?php echo e($posts->item); ?></li>
                                    </td>
                                    <td><?php echo e($posts->userName); ?></td>
                                    <td><img class="img-responsive" src="<?php echo e(asset($posts->image)); ?>" style="max-width:200px; max-height:200px;"></td>
                                    <td>
                                        <?php if($posts->isFeatured == 0): ?>
                                        Featured Post
                                        <?php elseif($posts->isFeatured == 1): ?>
                                        Default Post 
                                        <?php endif; ?>
                                    </td>
                                    <td> 
                                        <?php if((Auth::user()->role)==1): ?>
                                            <?php if($posts->isDraft == 0): ?>
                                                <a href="<?php echo e(url('/PostEdit',$posts->id)); ?>" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="<?php echo e(url('/PostDraft',$posts->id)); ?>" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Publish Post">
                                                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                                                </a>
                                                <a href="<?php echo e(url('/PostDeactivate',$posts->id)); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate Post">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            <?php elseif($posts->isDraft == 1): ?>
                                                <a href="<?php echo e(url('/prodDescription',$posts->id)); ?>" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Show Post">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="<?php echo e(url('/PostUnpub',$posts->id)); ?>" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Unpublish Post">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                                <a href="<?php echo e(url('/PostDeactivate',$posts->id)); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate Post">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php elseif((Auth::user()->role)==2): ?>
                                            <?php if($posts->isDraft == 0): ?>
                                            <a href="<?php echo e(url('/PostEdit',$posts->id)); ?>" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <?php elseif($posts->isDraft == 1): ?>
                                            <p class="lead">Only administrators can alter the published post.</p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="form-group pull-right">
                                <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/PostSoft')); ?>';" id="showDeactivated"> Show deactivated records</label>
                        </div>
            </div>
        </div>
        </div>

     


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>

   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>