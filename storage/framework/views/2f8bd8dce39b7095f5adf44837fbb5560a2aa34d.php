<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
<?php if($errors->any()): ?>
<script type="text/javascript">
  toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong!")
</script>            
<?php endif; ?>  
<?php if(session('error')): ?>
<script type="text/javascript">
  toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
</script>
<?php endif; ?>
<?php if(session('success')): ?>
<script type="text/javascript">
  toastr.success(' <?php echo session('success'); ?>', 'Success!')
</script>
<?php endif; ?>
<div class="container" style="margin-top:65px;">
  <div class="mt-5">
    <h3>Dashboard</h3>
  </div>
  <hr class="colorgraph"><br>
  <div class="row">
    <div class="col-md-6" style="background-color: #ed008c">
      <h4>Customer Information</h4> 
      <br>
      <div class="card">
          <div class="card-block"  style="background:#de0c14;">
              <div class="container p-3 text-center" >
                  <h4 class="card-title text-white" style="font-size:25pt;"><img width="70%" height="50%" src="<?php echo e(asset('img/steve.jpg')); ?>"></h4>
              </div>
          </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item text-center" style="font-size:15pt;padding:5px"><b>
                  <?php echo e(Auth::user()->Customer->firstName); ?> <?php echo e(Auth::user()->Customer->middleName); ?> <?php echo e(Auth::user()->Customer->lastName); ?></b></li>
              <li class="list-group-item text-center" style="font-size:12pt;padding:3px"></li>
          </ul>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row" style="height:50px; background-color: #fef200">
        <h4>Order Information</h4>
      </div>
      <div class="row" style="height:50px; background-color: #000000">
        <h4>Order History</h4>
      </div>
      <div class="row" style="height:50px; background-color: #00adef">
        <h4>Reviews Posted</h4>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>