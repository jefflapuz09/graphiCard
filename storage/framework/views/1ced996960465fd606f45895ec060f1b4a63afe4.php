<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/bars-1to10.css')); ?>" rel="stylesheet"> 
<link href="<?php echo e(asset('css/comment.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>

<div class="container-fluid bg-light" style="margin-top:100px; padding:20px;">
    <?php if(session('success')): ?>
    <script type="text/javascript">
        toastr.success(' <?php echo session('success'); ?>', 'Insert Success')
    </script>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <script type="text/javascript">
            toastr.error(" <?php echo session('error'); ?>", "There's something wrong")
        </script>
    <?php endif; ?>
    <?php if($errors->any()): ?>
    <script type="text/javascript">
          toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong")
      </script>   
    <?php endif; ?>
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
      <div class="row" style="">
      <div class="col-md-6" style="margin-top:10px;">
        <div class="text-center">
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
          <select id="example" disabled>
            <option value="1" <?php if(1 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>1</option>
            <option value="2" <?php if(2 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>2</option>
            <option value="3" <?php if(3 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>3</option>
            <option value="4" <?php if(4 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>4</option>
            <option value="5" <?php if(5 == $newave): ?> selected = "selected" <?php else: ?> "" <?php endif; ?>>5</option>
          </select>
        <?php else: ?>
        <p class="text-muted">No ratings yet.</p>
        <?php endif; ?>
        </div>
      </div>
      
      <div class="col-md-6" style="margin-top:10px;">
        <div class="text-center text-muted">
         <small> <?php echo e($post->User->name); ?> - 
          <?php echo e(date('F j, Y - H:i:s',strtotime($post->updated_at))); ?> </small>
         </div>
      </div>
      </div>
      <div class="row">
        <?php $__currentLoopData = $ranPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-2">
            <a href="<?php echo e(url('/prodDescription/'.$ran->id.'/'.$ran->typeId.'/'.$ran->itemid)); ?>"><img src="<?php echo asset($ran->image)?>" alt="..." class="img-thumbnail" style="max-height:100px;"></a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      
      <h2 class="mt-3 mb-2">Description</h2>
      <div class=""><?php echo $post->details?></div>
      <div class="pull-right mt-5">
          <a href="" data-toggle="modal" data-target="#myModal"><button class="btn btn-link" style="font-size:15pt; color:black; text-decoration:none; border:1px solid black;"><i class="fa fa-heart-o" aria-hidden="true"></i> Give us a Review! > </button></a>
      </div>
      
      <div class="container mt-5"> 
            <div class="row">
            <!-- Contenedor Principal -->
              <div class="comments-container">
              <div class="text-center"><h1>Reviews</h1></div>
          
              <ul id="comments-list" class="comments-list">

              <?php if(count($reviewcom)!=0): ?>
              <?php $__currentLoopData = $reviewcom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                  <div class="comment-main-level">
                    <!-- Avatar -->

                    <!-- Contenedor del Comentario -->
                    <div class="comment-box">
                      <div class="comment-head">
                        <h6 class="comment-name"><?php echo e($rev->Name); ?></h6>
                        <span><?php echo e(Carbon\Carbon::parse($rev->creat)->diffForHumans()); ?></span>
                      </div>
                      <div class="comment-content">
                        <?php echo e($rev->description); ?>

                      </div>
                    </div>
                  </div>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
              <li>
                  <div class="comment-main-level">
                    <div class="comment-box">
                      <div class="comment-head">
                        <h6 class="comment-name"><a href="http://creaticode.com/blog">Agustin Ortiz</a></h6>
                        <span>20 minutes</span>
                      </div>
                      <div class="comment-content">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                      </div>
                    </div>
                  </div>
                </li>
              <?php endif; ?>
                
          
              </ul>
            </div>
            </div>
          </div>
    </div>

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">

    <div class="col-md-5">
      <section id="contact" style="background:url('<?php echo e(asset('img/grey-pattern.png')); ?>'); width:100%; padding:10px; margin-top:20px;">
        <div class="form-area" style="background-image: url('<?php echo e(asset('img/grey-pattern.jpg')); ?>');">  
          <form role="form" method="post" action="<?php echo e(url('/InquirySend')); ?>" id="inquiry-form">

            <?php echo e(csrf_field()); ?>

            <br style="clear:both">
            <h2 class="section-header" style="margin-bottom: 25px; text-align: center; font-family: 'Oleo Script', cursive; color:maroon">Inquire Now</h2>
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter Mobile No." required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Enter Your Message" maxlength="140" rows="7"></textarea>
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
                  <label for="">Customer Name:</label><div class="pull-right"><button type="button" class="btn btn-success btn-sm mb-2 ml-2" data-toggle="modal" title="New Customer" data-dismiss="modal" data-target="#myModal2"><i class="fa fa-plus" aria-hidden="true"></i></button></div></br>
                  <select class="select2 form-control" name="customerId" style="width: 100%">
                    <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cust->id); ?>"><?php echo e($cust->firstName); ?> <?php echo e($cust->middleName); ?> <?php echo e($cust->lastName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Your comments</label>
                  <textarea class="form-control" rows="5" placeholder="Description" name="description" id="desc"></textarea>
                </div>
                <div class="form-group">
                  <div data-role="rangeslider">
                    <label for="price-max">Rate us! ( 1-5 )</label>
                    <select id="rate" name="rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
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

  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Customer Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
    
    <div class="col-lg-6"> 
        
                    
       
        <form action="<?php echo e(url('/CustomerWebStore')); ?>" method="post">

        <?php echo e(csrf_field()); ?>

            
            <div class="form-group">
            <label for="">First Name:</label>
            <input type="text" placeholder="First Name" value=""  class="form-control" name="firstName" id="name">
            </div>
            <div class="form-group">
            <label for="">Middle Name:</label>
            <input type="text" placeholder="Middle Name" value=""  class="form-control" name="middleName" id="name">
            </div>
            <div class="form-group">
            <label for="">Last Name:</label>
            <input type="text" placeholder="Last Name" value=""  class="form-control" name="lastName" id="name">
            </div>
            <div class="form-group">
            Gender: 
                <label class="radio-inline">
                <input type="radio" value="1" checked name="gender">Male
                </label>
                <label class="radio-inline">
                <input type="radio" value="2" name="gender">Female
                </label>
            </div>
            <div class="form-group">
            <label for="">Contact Number:</label>
            <input type="text" placeholder="Contact Number" value="" class="form-control" name="contactNumber" id="name">
            </div>
           
        
            </div> 
            <div class="col-lg-6" style="margin-top:0px;">
                    <div class="form-group">
                    <label for="">Email Address:</label>
                    <input type="text" placeholder="Email Address" value="" class="form-control" name="emailAddress" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">Street No./Bldg No.:</label>
                    <input type="text" placeholder="Street No./Bldg No." value="" class="form-control" name="street" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">Brgy No./Subd.:</label>
                    <input type="text" placeholder="Brgy No./Subd." value="" class="form-control" name="brgy" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">City:</label>
                    <input type="text" placeholder="City" value="" class="form-control" name="city" id="name">
                    </div>
                    <div class="pull-right">
                    <button type="reset" class="btn btn-success">Clear</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script>


  $(document).ready(function(){

    
      $('#example').barrating({
        
        theme: 'fontawesome-stars',
        readonly: true
      });
  
      $('#rate').barrating({
        theme: 'bars-1to10'
      });
    });
  
 

  
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>