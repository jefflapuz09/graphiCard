<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top:20px;">
        <div class="card bg-faded">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card bg-dark text-white text-center">
                        <h5 class="text-white pt-2 text-center">Customer Information</h5>
                        <p class="lead">Customer: <br> <?php echo e($post->Customer->firstName); ?> <?php echo e($post->Customer->middleName); ?> <?php echo e($post->Customer->lastName); ?></p>
                        <p class="lead">Gender: </br> <?php if($post->Customer->gender == 1): ?>Male <?php else: ?> Female <?php endif; ?></p>
                        <p class="lead">Address: </br> <?php echo e($post->Customer->street); ?> <?php echo e($post->Customer->brgy); ?> <?php echo e($post->Customer->city); ?></p>
                        <p class="lead">Contact Number: </br> <?php echo e($post->Customer->contactNumber); ?></p>
                        <p class="lead">Email Address: </br> <?php $__currentLoopData = $post->Customer->User; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($user->email); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="p-1 m-3 border border-dark border-top-0 border-bottom-0 border-right-0">
                            <p class="lead m-0"> Order </p>
                    </div>
                    <div class="card mr-3">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>