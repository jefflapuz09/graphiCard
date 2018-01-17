<?php $__env->startSection('style'); ?>
<style>
  @import  url('https://fonts.googleapis.com/css?family=Poiret+One');
  @import  url('https://fonts.googleapis.com/css?family=Montserrat');
  </style>
  <style>
      
      .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('<?php echo e(asset('img/Preloader_3.gif')); ?>') center no-repeat #fff;
      }
  
       .titleload{
        position: relative;
        left:0;
        right:0;
        top: 100px;
  
      }
  </style>
  <link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
<?php if(count($postcat)!=0): ?>
<?php $__currentLoopData = $postcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container" style="background:; margin-top:85px;">
  <!-- Portfolio Section -->

  <div class="container">
    <ol class="breadcrumbs breadcrumb-arrow wow fadeInUp">
      <li><a href="<?php echo e(url('/ServiceItem', $cat->id)); ?>"><span style="color:white;" ><?php echo e($cat->name); ?></span></a></li>
      <li class="active"><span style="color:white;"><b>See More</b></span></li>
    </ol>
  </div>

</div>
<?php if(count($cat->Post) > 0): ?> 

<div class="container">
  <section class="" id="portfolio">
    <div class="container">

      <div class="row">
        <?php $__currentLoopData = $cat->Post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 col-sm-6 portfolio-item wow fadeInUp">
          <a class="portfolio-link"  href="<?php echo e(url('/prodDescription/'.$post->id.'/'.$post->typeId.'/'.$post->itemId)); ?>">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                  <h4 style="font-family: 'Poiret One', cursive; color:white;"><?php echo e($post->Item->name); ?></h4> 
                  
                    
              </div>
            </div>
            <img class="img-responsive" style="max-width:100%; max-height:100%;" height="300px" src="<?php echo e(asset($post->image)); ?>" alt="">
          </a>
          <div class="portfolio-caption">
            
            
            <?php if(count($post->Item->RateItem)!=0): ?>
              <?php
                  $count = count($post->Item->RateItem);
                  $sum = 0;
                  foreach($post->Item->RateItem as $r)
                  {
                    $sum += $r->rating;
                  }
                  $ave = $sum/$count;
              ?>

              <?php $newave = round($ave);
              ?>
              <select id="" class="starrating" disabled>
                <option value="1" <?php if(1 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>1</option>
                <option value="2" <?php if(2 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>2</option>
                <option value="3" <?php if(3 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>3</option>
                <option value="4" <?php if(4 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>4</option>
                <option value="5" <?php if(5 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>5</option>
              </select>
              <ul class="social-network2 social-circle2">
                <?php if(count($sns)!=0): ?>
                  <li><a target="_blank" href="https://www.facebook.com/share.php?u=<?php echo e($sns->facebook); ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo e($sns->twitter); ?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="<?php echo e($sns->messenger); ?>" class="icoTwitter" title="Messenger"><i class="fa mssngr-messenger"></i></a></li>
                <?php endif; ?>
              </ul> 
            <?php else: ?>
            <p class="text-muted">No ratings yet.</p>
            <ul class="social-network2 social-circle2">
                <?php if(count($sns)!=0): ?> 
              <li><a target="_blank" href="https://www.facebook.com/share.php?u=<?php echo e($sns->facebook); ?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo e($sns->twitter); ?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="<?php echo e($sns->messenger); ?>" class="icoTwitter" title="Messenger"><i class="fa mssngr-messenger"></i></a></li>
              </ul> 
              <?php endif; ?>
            <?php endif; ?>
            
          </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </section>


  <?php else: ?>  
  <div class="container">
    <div class="jumbotron wow fadeInUp" style="background-color:darkorange; color:white;">
      <div class="col-lg-12" align="center">
        <h1>NO FEATURED POST!<h1>
        </div>
      </div>
    </div>

    <?php endif; ?>

  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>

  <div class="jumbotron wow fadeInUp" style="background-color:#ff3030; color:white;">
    <div class="col-lg-12" align="center">
      <h1>NO SERVICE CATEGORY AVAILABLE!<h1>
      </div>
    </div>

    <?php endif; ?>
    <!-- /.row -->


    <!-- /.row -->



    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
    
    <script src="<?php echo e(asset('js/wow.js')); ?>"></script>
    <script>
        $( document ).ready(function() {
 
          new WOW().init();
          $( ".se-pre-con" ).delay().fadeOut("slow");
          $('.starrating').barrating({
            
            theme: 'fontawesome-stars',
            readonly: true
          });

          $('.meron').barrating('set', 5);
          
          
          

      });
    </script>  

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>