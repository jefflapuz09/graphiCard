<?php $__env->startSection('styles'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-md-4">
            <?php $orderID = str_pad($post->id, 7, '0', STR_PAD_LEFT); ?>
            <p class="lead m-0"> <b> ORD#<big><span style="color:red"><?php echo $orderID?></span></big></b></p>
        </div>
        <div class="col-md-4">
            <p class="lead m-0"> <b> STATUS : <big>
                <?php if($post->status == 0): ?>
                <span style="color:red">PENDING</span>
                <?php elseif($post->status == 1): ?>
                <span style="color:green">CONFIRMED</span>
                <?php elseif($post->status == 2): ?>
                <span style="color:blue">FINISHED</span>
                <?php else: ?> 
                Released
                <?php endif; ?>
            </big></b></p>
        </div>
        <div class="col-md-4">
            <div class="pull-right">
                <?php if($post->status == 0): ?>
                <a href="" class="mr-0 btn btn-primary">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Mail
                </a>
                <?php endif; ?>
                <?php if($post->status <= 2): ?>
                <a href="<?php echo e(url('/OrderUpdate/'.$post->id)); ?>" class="m-2 ml-0 btn btn-primary">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <hr class="colorgraph"><br>  
        <div class="bg-faded col-md-12">

    <div class="row">
            <div class="col-md-5">
                <div class="card  text-center">
                    <div class="card-block p-2 mb-3" style="background:#f61919;">
                        <h5 class="text-white pt-2 text-center">Customer Information</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-left" style="font-size:15pt;padding:5px"><b>Name:   </b><?php echo e($post->Customer->firstName); ?> <?php echo e($post->Customer->middleName); ?> <?php echo e($post->Customer->lastName); ?></li>
                        <li class="list-group-item text-left" style="font-size:15pt;padding:5px"><b>Gender:  </b><?php if($post->Customer->gender == 1): ?>Male <?php else: ?> Female <?php endif; ?></li>
                        <li class="list-group-item text-left" style="font-size:15pt;padding:5px"><b>Address: </b><?php echo e($post->Customer->street); ?> <?php echo e($post->Customer->brgy); ?> <?php echo e($post->Customer->city); ?></li>
                        <li class="list-group-item text-left" style="font-size:15pt;padding:5px"><b>Contact Number: </b><?php echo e($post->Customer->contactNumber); ?></li>
                        <li class="list-group-item text-left" style="font-size:15pt;padding:5px"><b>Email Address: </b><?php $__currentLoopData = $post->Customer->User; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($user->email); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></li>
                    </ul>
                </div>
                <?php if(count($post->request[0]->image)): ?>
                <div class="card mt-2 mb-4">
                    <?php $__currentLoopData = $post->request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img class="img-responsive col-md-12" src="<?php echo e(asset($req->image)); ?>" width="200px">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-sm-7">
                <div class="card  text-center">
                    <div class="card-block p-2 mb-3" style="background:#f61919;">
                        <h5 class="text-white pt-2 text-left">Order Inclusions</h5>
                    </div>
                    <table class="table">
                        <thead class="text-dark" style="color:black;">
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
                <div class="card  text-center">
                    <div class="card-block p-2 mb-3" style="background:#f61919;">
                        <h5 class="text-white pt-2 text-left">Order Design</h5>
                    </div>
                    <table class="table">
                        <thead class="text-dark" style="background:;">
                            <tr>
                                <th>Product</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $post->Request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($request->itemName); ?></td>
                                <td><?php echo e($request->quantity); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!--container-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>