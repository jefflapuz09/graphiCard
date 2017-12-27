<?php $__env->startSection('content'); ?>
<div class="row">

        <div class="col-md-8">
         
          <img class="img-fluid" style="max-height:300px; max-width:500px;" src="<?php echo asset($post->image)?>" alt="">

          <h3 class="my-3">Project Description</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
          <h3 class="my-3">Post Details</h3>
          <?php echo $post->details  ?>
        </div>

       
        
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>