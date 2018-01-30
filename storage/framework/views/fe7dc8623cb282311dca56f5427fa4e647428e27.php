<?php $__env->startSection('content'); ?>
    <div class="container" style="margin-top:20px;">
        <div class=" bg-faded">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card  text-center">
                        <div class="card-block p-2 mb-3" style="background:#252525;">
                                <h5 class="text-white pt-2 text-center">Customer Information</h5>
                        </div>
                        
                        <p class="lead">Customer: <br> <?php echo e($post->Customer->firstName); ?> <?php echo e($post->Customer->middleName); ?> <?php echo e($post->Customer->lastName); ?></p>
                        <p class="lead">Gender: </br> <?php if($post->Customer->gender == 1): ?>Male <?php else: ?> Female <?php endif; ?></p>
                        <p class="lead">Address: </br> <?php echo e($post->Customer->street); ?> <?php echo e($post->Customer->brgy); ?> <?php echo e($post->Customer->city); ?></p>
                        <p class="lead">Contact Number: </br> <?php echo e($post->Customer->contactNumber); ?></p>
                        <p class="lead">Email Address: </br> <?php $__currentLoopData = $post->Customer->User; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($user->email); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="p-1 m-3 border border-dark border-top-0 border-bottom-0 border-right-0">
                            <p class="lead m-0"> Order: <big><span style="color:red">0000000<?php echo e($post->id); ?></span></big></p>
                    </div>
                    <div class="mr-3">
                        <div class="">
                            <div class="col-sm-12">
                                <div class="mt-3 pull-left">
                                    Status: 
                                    <?php if($post->status == 0): ?>
                                    Pending
                                    <?php elseif($post->status == 1): ?>
                                        Confirmed
                                    <?php elseif($post->status == 2): ?>
                                        Finished
                                    <?php else: ?> 
                                        Released
                                    <?php endif; ?>
                                </div>
                                <div class="pull-right">
                                    <?php if($post->status == 0): ?>
                                        <a href="" class="mr-0 btn btn-primary">
                                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if($post->status <= 2): ?>
                                        <a href="<?php echo e(url('/OrderUpdate/'.$post->id)); ?>" class="m-2 ml-0 btn btn-primary">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <table class="table mt-5">
                                <thead class="text-white" style="background:darkred;">
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $post->Request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($request->itemName); ?></td>
                                            <td><?php echo e($request->quantity); ?></td>
                                            <td><?php echo e($request->orderDescription); ?></td>
                                            <td><?php echo e($request->remarks); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>