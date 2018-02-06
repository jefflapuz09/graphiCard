<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<style>
.btn-outline-secondary {
  color: #272626;
  background-color: transparent;
  background-image: none;
  border-color: #272626;
}

.btn-outline-secondary:hover {
  color: white;
  background-color: #f72028;
  border-color: black;
  font-weight: bold;
}

.btn-outline-secondary:focus, .btn-outline-secondary.focus {
  box-shadow: 0 0 0 0.2rem rgba(134, 142, 150, 0.5);
}

.btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
  color: #868e96;
  background-color: transparent;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<div class="container">
    <div class="container" class="p-5" style="margin-top:80px;">
        <div class="mt-5">
            <h3> Packages</h3>
        </div>
    </div>
    <hr class="colorgraph">
    <div class="row">
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-4">
            <div class="card" style="width: 20rem;">
                <div class="card-block"  style="background:#de0c14;">
                    <div class="container p-3 text-center" >
                        <h4 class="card-title text-white" style="font-size:25pt;"><?php echo e($posts->name); ?></h4>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center" style="font-size:15pt;color:red;padding:5px"><b>₱ <?php echo e($posts->price); ?></b></li>
                    <?php $__currentLoopData = $posts->Inclusion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclusion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item text-center" style="font-size:12pt;padding:3px"><?php echo e($inclusion->ItemPack->name); ?> (<?php echo e($inclusion->qty); ?><?php if($inclusion->qty <= 1): ?> pc. <?php else: ?> pcs. <?php endif; ?>)</li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="card-block" style="padding:3px">
                    <div class="container text-center"  style="padding-bottom:10px">
                        <a href="" data-toggle="modal" data-target="#modal" class="mt-2 btn btn-outline-secondary"> Order now </a>
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