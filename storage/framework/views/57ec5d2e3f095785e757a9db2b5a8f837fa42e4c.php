<?php $__env->startSection('contents'); ?>
<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">
    <ol class="breadcrumbs breadcrumb-arrow" width="100%">
      <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
      <li><a href="<?php echo e(url('/')); ?>"><?php echo e($post->category); ?></a></li>
      <li class="active" style=""><span><?php echo e($post->type); ?></span></li>
    </ol>
  <h1 class="mt-4 mb-3">
    <?php echo e($post->type); ?>

  </h1>
  <div class="row">
    <div class="col-md-8">
      <img class="img-fluid" style="max-height:300px; max-width:500px;" src="<?php echo asset($post->image)?>" height="200px" width="" alt="" title="<?php echo e($post->type); ?>">
      <h1 class="mt-4 mb-3">Description</h1>
      <?php echo $post->details?>
    </div>

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <div class="col-md-4">
      <div class="form-area">  
        <form role="form">
          <br style="clear:both">
          <h3 style="margin-bottom: 25px; text-align: center; font-family: 'Oleo Script', cursive;">Inquire Now</h3>
          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Contact Number" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
          </div>

          <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
        </form>
      </div>

    </div>

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>