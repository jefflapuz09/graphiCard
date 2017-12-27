<?php $__env->startSection('contents'); ?>
<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">

  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">
    <?php echo e($post->type); ?>

  </h1>

  <ol class="breadcrumb" style="background:black;">
    <li class="breadcrumb-item">
      <a href="<?php echo e(url('/')); ?>" style="color:white;">Home</a>
    </li>
    
      <li class="breadcrumb-item active" style="color:white;"><?php echo $post->category?></li>
    <li class="breadcrumb-item active" style="color:white;"><?php echo $post->type?></li>
  </ol> 

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-8">
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