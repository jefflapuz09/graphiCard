<?php $__env->startSection('contents'); ?>
<!-- <style>
#formModal {
left:50%;
outline: none;
}
</style> -->

<div class="container" style="margin-top:80px;">
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="lineModalLabel"><i class="fa fa-smile-o" aria-hidden="true"></i> Give us a Feedback! </h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12"> 
              <form action="<?php echo e(url('/FeedbackStore')); ?>" method="post" enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>

                <div class="form-group" style="margin-top:10px; border:1px solid black; padding:10px" >
                  <center><img class="img-responsive" id="pic" src="<?php echo e(URL::asset('img/grey-pattern.png')); ?>" style="max-width:300px; background-size: contain" /></center>
                  <b><label style="margin-top:20px;" for="exampleInputFile">Upload a photo</label></b>
                  <input type="file" class="form-control-file" name="image" onChange="readURL(this)" id="exampleInputFile" aria-describedby="fileHelp">
                </div>
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
                <!-- <div class="pull-left">
                  <div class="form-group">
                    <div align="center" class="checkbox">
                      <label>
                        <input type="checkbox" name="isSelected" value="0">
                        <b>Selected Post</b>
                      </label>
                    </div>
                  </div>
                </div> -->
                <div class="pull-right">
                  <button type="submit" class="btn btn-link" style="font-size:13pt; color:black; text-decoration:none; border:1px solid black;">Submit</button>
                </div>
              </form>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>




  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="pull-left">
          <?php if($errors->any()): ?>
          <div class="alert alert-danger">
            <?php echo e(implode('', $errors->all(':message'))); ?>

          </div>                
          <?php endif; ?>
          <?php if(session('error')): ?>
          <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

          </div>
          <?php endif; ?>

        </div>
        <div class="pull-right">
          <a href="" data-toggle="modal" data-target="#formModal"><button class="btn btn-link" style="font-size:15pt; color:black; text-decoration:none; border:1px solid black;"><i class="fa fa-heart-o" aria-hidden="true"></i> Loved your product? Give us a Feedback! > </button></a>
        </div>
      </div>   
    </div>
  </div>
  <br>
  <div class="row">
    <?php if(count($feed)!=0): ?>
    <?php $__currentLoopData = $feed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-3 mb-4">
      <div class="card card-01">

        <div class="profile-box">
          <h3 class="text-center mb-5" style="color:darkorange;"></h3>
          
          <img class="card-img-top rounded-circle" src="<?php echo e(asset($feedback->image)); ?>" alt="Card image cap">
        </div>
        <div class="card-body text-center">
          <span class="badge-box"><i class="fa fa-user"></i></span>
          <h4 class="card-title"><?php echo e($feedback->name); ?></h4>
          <p class="card-text"><?php echo e($feedback->description); ?></p>
          <span class="social-box">
            <?php for($i = 0; $i < $feedback->rating; $i++): ?>
            <span class="fa fa-star checked"></span>
            <?php endfor; ?>            
          </span>
        </div>
      </div>


    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?> 
    <div class="col-lg-3 mb-4">
      <div class="card card-01">

        <div class="profile-box">
          <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
          
          <img class="card-img-top rounded-circle" src="<?php echo e(asset('img/steve.jpg')); ?>" alt="Card image cap">
        </div>
        <div class="card-body text-center">
          <span class="badge-box"><i class="fa fa-user"></i></span>
          <h4 class="card-title">Customer Name</h4>
          <p class="card-text">Testimonial</p>
          <span class="social-box">

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>

          </span>
        </div>
      </div>
    </div>
    <div class="col-lg-3 mb-4">
      <div class="card card-01">

        <div class="profile-box">
          <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
          
          <img class="card-img-top rounded-circle" src="<?php echo e(asset('img/steve.jpg')); ?>" alt="Card image cap">
        </div>
        <div class="card-body text-center">
          <span class="badge-box"><i class="fa fa-user"></i></span>
          <h4 class="card-title">Customer Name</h4>
          <p class="card-text">Testimonial</p>
          <span class="social-box">

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>

          </span>
        </div>
      </div>
    </div>
    <div class="col-lg-3 mb-4">
      <div class="card card-01">

        <div class="profile-box">
          <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
          
          <img class="card-img-top rounded-circle" src="<?php echo e(asset('img/steve.jpg')); ?>" alt="Card image cap">
        </div>
        <div class="card-body text-center">
          <span class="badge-box"><i class="fa fa-user"></i></span>
          <h4 class="card-title">Customer Name</h4>
          <p class="card-text">Testimonial</p>
          <span class="social-box">

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>

          </span>
        </div>
      </div>
    </div>

    <div class="col-lg-3 mb-4">
      <div class="card card-01">

        <div class="profile-box">
          <h3 class="text-center mb-5" style="color:darkorange;">Customer#</h3>
          
          <img class="card-img-top rounded-circle" src="<?php echo e(asset('img/steve.jpg')); ?>" alt="Card image cap">
        </div>
        <div class="card-body text-center">
          <span class="badge-box"><i class="fa fa-user"></i></span>
          <h4 class="card-title">Customer Name</h4>
          <p class="card-text">Testimonial</p>
          <span class="social-box">

            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>

          </span>
        </div>
      </div>
    </div>
    <?php endif; ?>


  </div>

</div>

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