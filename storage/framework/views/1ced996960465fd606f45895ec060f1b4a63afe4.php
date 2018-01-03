<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">
  <ol class="breadcrumbs breadcrumb-arrow" width="100%">
    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
    <li><a href="<?php echo e(url('/ServiceItem', $post->ServiceCategory->id)); ?>"><?php echo e($post->ServiceCategory->name); ?></a></li>
    <li class="" style=""><a href="<?php echo e(url('/ServiceItem', $post->ServiceCategory->id)); ?>"><?php echo e($post->ServiceType->name); ?></a></li>
    <li class="active" style=""><span><b><?php echo e($post->Item->name); ?></b></span></li>
  </ol>
  <div class="row" style="padding:10px;">
    <div class="col-md-7 form-line" style="margin-top:50px;">
      <!-- <h1 class="mt-4 mb-3" style="text-align:center"><?php echo e($post->ServiceType->name); ?></h1> -->
      <div align="center"><img class="img-responsive" style="max-height:100%; max-width:100%;" src="<?php echo asset($post->image)?>" height="400px"  alt="No image available"></div>
      <div class="pull-right" style="margin-right:35px; margin-top:10px;">
         <small> <?php echo e($post->User->name); ?> - 
          <?php echo e(date('F j, Y - H:i:s',strtotime($post->updated_at))); ?> </small>
      </div>
      <h2 class="mt-4 mb-3">Description</h2>
      <div class=""><?php echo $post->details?></div>
      <div class="pull-right">
          <a href="" data-toggle="modal" data-target="#myModal"><button class="btn btn-link" style="font-size:15pt; color:black; text-decoration:none; border:1px solid black;"><i class="fa fa-heart-o" aria-hidden="true"></i> Give us a Review! > </button></a>
      </div>
    </div>

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">

    <div class="col-md-5">
      <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
      <section id="contact" style="background:url('<?php echo e(asset('img/grey-pattern.png')); ?>'); width:100%; padding:10px; margin-bottom:20px; ">
        <div class="form-area" style="background-image: url('<?php echo e(asset('img/grey-pattern.jpg')); ?>');">  
          <form role="form" method="post" action="<?php echo e(url('/InquirySend')); ?>" id="inquiry-form">

            <?php echo e(csrf_field()); ?>

            <br style="clear:both">
            <h2 class="section-header" style="margin-bottom: 25px; text-align: center; font-family: 'Oleo Script', cursive; color:maroon">Inquire Now</h2>
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" maxlength="140" rows="7"></textarea>
            </div>
            <div class="float-right">
              <button type="submit" class="btn btn-link submit" style="color:maroon; hover:text-underline:none;"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
            </div>
            <div style="clear:both ">
          </form>
        </div>
      </section>
    </div>

  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><i class="fa fa-smile-o" aria-hidden="true"></i> Give us a Review</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
             <form action="<?php echo e(url('/ReviewStore')); ?>" method="post" enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="itemId" value="<?php echo e($post->Item->id); ?>">
                <div class="form-group">
                  <label for=""><b>Your Name</b></label>
                  <input type="text" placeholder="Name" value="" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                  <label for=""><b>Your comments</b></label>
                  <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"></textarea>
                </div>
                <div class="form-group">
                  <div data-role="rangeslider">
                    <label for="price-max"><b>Rate us! ( 1-5 ) </b></label>
                    <input type="range"  name="rating" id="price-max" value="3" min="1" max="5">
                  </div>
                </div>
                <div class="pull-right">
                  <button type="submit" class="btn btn-link" style="font-size:13pt; color:black; text-decoration:none; border:1px solid black;">Submit</button>
                </div>
              </form>
        </div>
      </div>
  
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    var customers = [
      'a','b','c','d'
  ];    

  $(document).ready(function(){
    $('#fname').keyup(function(){
      $('#fname').autocomplete({source: customers});
    });
  });

  
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>