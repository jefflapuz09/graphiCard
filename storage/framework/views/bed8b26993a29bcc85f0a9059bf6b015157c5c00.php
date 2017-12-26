<?php $__env->startSection('contents'); ?>
<div class="container bg-light" style="margin-top:100px;">

  <div class="row">
    <div class="col-md-4">
      <div class="carousel-item active" style="background-image: url('<?php echo e(asset('img/banner1.jpg')); ?>')">
            <div class="carousel-caption d-none d-md-block">
              <!-- <h3>First Slide</h3>
              <p>This is a description for the first slide.</p> -->
            </div>
          </div>
    </div>
    <div class="col-md-8">
    </div>
  </div>

  <!-- Portfolio Item Row -->
  <div class="row">
    <div class="col-md-8">
      <h3 class="my-3">Project Description</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
      <h3 class="my-3">Project Details</h3>
      <ul>
        <li>Lorem Ipsum</li>
        <li>Dolor Sit Amet</li>
        <li>Consectetur</li>
        <li>Adipiscing Elit</li>
      </ul>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>