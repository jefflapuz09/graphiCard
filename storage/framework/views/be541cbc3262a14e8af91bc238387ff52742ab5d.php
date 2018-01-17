<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('css/bars-1to10.css')); ?>" rel="stylesheet"> 
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('contents'); ?>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
<!-- <style>
#formModal {
left:50%;
outline: none;
}
</style> -->

<div class="container" style="margin-top:80px;">
  <ol class="breadcrumbs breadcrumb-arrow" width="100%">
    <li class="" style=""><a href="<?php echo e(url('/ServiceItem')); ?>">Frequently Asked Questions</a></li>
    <li class="active" style=""><span><b></b></span></li>
  </ol>
  <div id="accordion" role="tablist">
    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card">
      <div class="card-header" style="" role="tab" id="heading<?php echo e($f -> id); ?>">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapse<?php echo e($f -> id); ?>" role="button" aria-expanded="true" aria-controls="collapse<?php echo e($f -> id); ?>">
            <?php echo e($f->question); ?>

          </a>
        </h5>
      </div>

      <div id="collapse<?php echo e($f -> id); ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo e($f -> id); ?>" data-parent="#accordion">
        <div class="card-body">
          <?php echo $f->answer?>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div><!--END ACCORDION-->

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/jquery.barrating.min.js')); ?>"></script>
<script>
  $( document ).ready(function() {
    $('#example').barrating({
      theme: 'bars-1to10'
    });
    $('.starrating').barrating({

      theme: 'fontawesome-stars',
      readonly: true
    });

    $('.meron').barrating('set', 5);
  });
</script>  
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#pic')
        .attr('src', e.target.result)
        .width(300);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>