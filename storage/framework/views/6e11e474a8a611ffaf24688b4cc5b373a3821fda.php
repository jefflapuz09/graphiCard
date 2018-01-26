<?php $__env->startSection('contents'); ?>

<div class="container">
        <ol class="breadcrumbs breadcrumb-arrow" style="margin-top:80px;">
          <li><a href="#">Packages</a></li>
          <li class="active" style=""><span>See More</span></li>
        </ol>
        <hr class="colorgraph">
        <div class="row">
            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4">
                    <div class="card" style="width: 20rem; border-color:darkred;">
                        <div class="card-block"  style="background:darkred;">
                            <div class="container p-3 text-center">
                                <h4 class="card-title text-white"><?php echo e($posts->name); ?></h4>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center" style="font-size:30pt;">₱<?php echo e($posts->price); ?></li>
                            <?php $__currentLoopData = $posts->Inclusion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item text-center"><?php echo e($inclusion->ItemPack->name); ?> (<?php echo e($inclusion->qty); ?><?php if($inclusion->qty <= 1): ?> pc. <?php else: ?> pcs. <?php endif; ?>)</li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="card-block">
                            <div class="container p-3 text-center">
                                    <a href="" data-toggle="modal" data-target="#modal" class="mt-2 btn btn-primary text-white">Order now</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
</div>
    


<div class="modal fade" id="modal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-white" style="background:darkred;">
              <h5 class="modal-title">Package Information</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <hr class="colorgraph">
                <p class="lead">
                     <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    Package Name: <?php echo e($posts->name); ?><br><br>
                    Items: <br>
                    <?php $__currentLoopData = $posts->Inclusion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($inclusion->ItemPack->name); ?> (<?php echo e($inclusion->qty); ?><?php if($inclusion->qty <= 1): ?> pc. <?php else: ?> pcs. <?php endif; ?>)<br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <br>Price: ₱<?php echo e($posts->price); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>