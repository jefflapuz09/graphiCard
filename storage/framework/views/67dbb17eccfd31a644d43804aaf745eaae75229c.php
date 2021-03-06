<?php $__env->startSection('content'); ?>
    <div > 

    </div>

    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Post
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All post information are displayed here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                    <th width="120px">Post Details</th>
                                    <th>Author</th>
                                    <th width="200px">Image</th>
                                    <th>Featured Post</th>
                                    <th width="300px">Actions</th>
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
                                <td><?php echo e($posts->firstName); ?> <?php echo e($posts->middleName); ?> <?php echo e($posts->lastName); ?></td>
                                <td><img class="img-responsive" src="<?php echo e(asset($posts->image)); ?>" style="max-width:200px; max-height:200px;"></td>
                                <td>
                                        <?php if($posts->isFeatured == 0): ?>
                                        Featured Post
                                        <?php elseif($posts->isFeatured == 1): ?>
                                        Default Post 
                                        <?php endif; ?>
                                </td>
                                <td> 
                
                                  
                                        <a href="<?php echo e(url('/PostReactivate',$posts->id)); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                            <i class="fa fa-recycle" aria-hidden="true"></i>
                                        </a>
                                </td>
                            </tr>
                
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/Post')); ?>';" id="showDeactivated"> Show records</label>
                    </div>
        </div>
    </div>
    </div>

  
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>