<?php $__env->startSection('style'); ?>
<style>
@import  url('https://fonts.googleapis.com/css?family=Poiret+One');
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>



<?php $__currentLoopData = $mod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(count($post->Post)!=0): ?>
<div class="container" style="background:; margin-top:100px;">
  <!-- Portfolio Section -->
<!-- <ol class="breadcrumbs breadcrumb-arrow" width="100%">
<li><a href="#"><?php echo e($post->name); ?></a></li>
<li class="active" style=""><span>See More</span></li>
</ol> -->
<div class="mt-5">
  <h3><?php echo e($post->name); ?></h3>
</div>
<hr class="colorgraph"><br>
<div class="container">
  <section class="" id="portfolio"> 
    <div class="container">
      <div class="row">
        <?php $__currentLoopData = $post->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="<?php echo e(url('/prodDescription/'.$item->id.'/'.$item->typeId.'/'.$item->itemId)); ?>">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <h5 style="font-family: 'Poiret One', cursive; color:white;"><?php echo e($item->item->name); ?></h4>
                </div>
              </div>
              <img class="img-responsive" style="max-width:100%; max-height:100%;" height="200px" src="<?php echo e(asset($item->image)); ?>" alt="">
            </a>
            <div class="portfolio-caption">
              <?php $price = $post->price + $item->item->price; ?>
            P<?php echo e(number_format($price,2)); ?>

              <?php if(count($item->item->RateItem)!=0): ?>
              <?php
              $count = count($item->item->RateItem);
              $sum = 0;
              foreach($item->item->RateItem as $r)
              {
                $sum += $r->rating;
              }
              $ave = $sum/$count;
              ?>

              <?php $newave = round($ave);
              ?>
              <select id="example" disabled>
                <option value="1" <?php if(1 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>1</option>
                <option value="2" <?php if(2 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>2</option>
                <option value="3" <?php if(3 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>3</option>
                <option value="4" <?php if(4 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>4</option>
                <option value="5" <?php if(5 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>5</option>
              </select>
              <ul class="social-network2 social-circle2">
                <?php if(count($sns)!=0): ?>
                <li><a target="_blank" href="<?php echo e($sns->facebook); ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="<?php echo e($sns->twitter); ?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <!-- <li><a target="_blank" href="<?php echo e($sns->messenger); ?>" class="icoTwitter" title="Messenger"><i class="fa mssngr-messenger"></i></a></li> -->
                <li><a target="_blank" href="<?php echo e($sns->messenger); ?>" class="icoTwitter" title="Messenger"><i data-icon="a" class="fa"></i></a></li>
                <?php else: ?>
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                <?php endif; ?>
              </ul>	
              <br>
              <a href="" class="mt-2 btn btn-danger text-white">Order now</a>
              <?php else: ?>
              <p class="text-muted">No ratings yet.</p>
              <ul class="social-network2 social-circle2">

                <?php if(count($sns)!=0): ?>
                <li><a target="_blank" href="<?php echo e($sns->facebook); ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="<?php echo e($sns->twitter); ?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="<?php echo e($sns->messenger); ?>" class="icoTwitter" title="Messenger"><i data-icon="a" class="fa"></i></a></li>
                <?php else: ?>
                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                <?php endif; ?>
              </ul>
              <br>
              <a href="<?php echo e(url('/cartPost/'.$item->typeId.'/'.$item->itemId)); ?>" class="mt-2 btn btn-danger text-white">Order now</a>
              <?php endif; ?>
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

  <?php $__env->startSection('script'); ?>
  <script>
    $('#example').barrating({

      theme: 'fontawesome-stars',
      readonly: true
    });

  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>