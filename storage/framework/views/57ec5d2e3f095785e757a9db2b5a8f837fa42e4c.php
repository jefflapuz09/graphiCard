<?php $__env->startSection('contents'); ?>
<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">
  <ol class="breadcrumbs breadcrumb-arrow" width="100%">
    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
    <li><a href="<?php echo e(url('/')); ?>"><?php echo e($post->ServiceCategory->name); ?></a></li>
    <li class="active" style=""><span><?php echo e($post->ServiceType->name); ?></span></li>
  </ol>
  <div class="row" style="padding:10px;">
    <div class="col-md-7 form-line">
      <h1 class="mt-4 mb-3" style="text-align:center"><?php echo e($post->ServiceType->name); ?></h1>
      <img class="img-fluid" style="max-height:500px; max-width:800px;" src="<?php echo asset($post->image)?>" height="200px" width="100%" alt="No image available">
      <h1 class="mt-4 mb-3">Description</h1>
      <?php echo $post->details?>
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
          <form role="form" method="post" action="<?php echo e(url('/InquirySend')); ?>">

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
              <button type="submit" class="btn btn-default submit" style="color:maroon"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
            </div>
            <div style="clear:both ">
          </form>
        </div>
      </section>
    </div>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>