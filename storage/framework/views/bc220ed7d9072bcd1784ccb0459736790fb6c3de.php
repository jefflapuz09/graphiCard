<?php $__env->startSection('contents'); ?>



<?php $__currentLoopData = $mod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(count($post->Post)!=0): ?>
<div class="container" style="background:; margin-top:100px;">
  <!-- Portfolio Section -->

  <div class="container">
    <ol class="breadcrumbs breadcrumb-arrow">
      <li><a href="#"><?php echo e($post->name); ?></a></li>
      <li class="active" style=""><span>See More</span></li>
    </ol>
  </div>

  <div class="container">
        <section class="" id="portfolio"> 
          <div class="container">
                <div class="row">
                        <?php $__currentLoopData = $post->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                                <div class="col-md-3 col-sm-6 portfolio-item">
                                <a class="portfolio-link"  href="<?php echo e(url('/prodDescription',$item->id)); ?>">
                                    <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-flag fa-3x"></i>
                                    </div>
                                    </div>
                                    <img class="img-responsive" style="max-width:100%; max-height:100%;" height="200px" src="<?php echo e(asset($item->image)); ?>" alt="">
                                </a>
                                <div class="portfolio-caption">
                                    <h4><?php echo e($item->item->name); ?></h4>
                                    <p class="text-muted">See More</p>
                                </div>
                                </div>
                   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            
            </div>
        </section>
    </div>
    

</div>
<?php else: ?>
    <div class="container" style="background:; margin-top:100px;">
        <ol class="breadcrumbs breadcrumb-arrow">
          <li><a href="#"><?php echo e($post->name); ?></a></li>
          <li class="active" style=""><span>See More</span></li>
        </ol>
      </div>

    <div class="container">
        <div class="jumbotron" style="background-color:darkorange; color:white;">
          <div class="col-lg-12" align="center">
            <h1>NO ITEM AVAILABLE!<h1>
            </div>
          </div>
        </div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>