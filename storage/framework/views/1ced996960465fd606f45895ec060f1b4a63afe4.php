<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/bars-1to10.css')); ?>" rel="stylesheet"> 
<link href="<?php echo e(asset('css/comment.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>

<div class="card-body rgba-grey-slight z-depth-2" style="margin-top:100px; padding:20px;">
    <?php if(session('success')): ?>
    <script type="text/javascript">
        toastr.success(' <?php echo session('success'); ?>', 'Success!')
    </script>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <script type="text/javascript">
            toastr.error(" <?php echo session('error'); ?>", "There's something wrong!")
        </script>
    <?php endif; ?>
    <?php if($errors->any()): ?>
    <script type="text/javascript">
          toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong!")
      </script>   
    <?php endif; ?>
  <ol class="breadcrumbs breadcrumb-arrow" width="100%">

    <li class="" style=""><a href="<?php echo e(url('/ServiceItem', $post->ServiceCategory->id)); ?>"><?php echo e($post->ServiceType->name); ?></a></li>
    <li class="active" style=""><span><b><?php echo e($post->Item->name); ?></b></span></li>
  </ol>
  <div class="row" style="padding:10px;">
    <div class="col-md-7 form-line" style="margin-top:;">
        <div class="card card-cascade wider reverse">
            <div class="view overlay hm-white-slight">
                <img class="img-responsive" style="max-height:100%; max-width:100%;" src="<?php echo asset($post->image)?>" alt="Wide sample post image">
                <a>
                <div class=""></div>
                </a>
            </div>
    
            <!--Post data-->
            <div class="card-body text-center">
                <h2>
                <a class="font-bold deep-orange-text"><?php echo e($post->Item->name); ?></a>
                </h2>
                <p>Written by
                <a><?php echo e($post->User->name); ?></a>, <?php echo e(Carbon\Carbon::parse($post->updated_at)->diffForHumans()); ?></p>
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
              <div class="excerpt mt-5">
                  <p class="text-center lead"><?php echo $post->details?></p>
              </div>
                
            </div>
            <!--Post data-->
            </div>
    
            <!--Excerpt-->
            <div class="row">
                <?php $__currentLoopData = $ranPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-2">
                    <a href="<?php echo e(url('/prodDescription/'.$ran->id.'/'.$ran->typeId.'/'.$ran->itemId)); ?>"><img src="<?php echo asset($ran->image)?>" alt="..." class="img-thumbnail" style="max-height:100px;"></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <hr class="mb-5 mt-4">
            <div class="container mt-5"> 
                <div class="row">
                <!-- Contenedor Principal -->
                  <div class="comments-container">
                  <div class="row">
                  <div class="col-sm-7">
                  <h1>Reviews</h1>
                  </div>
                  <div class="col-sm-5">
                      <a href="" data-toggle="modal" data-target="#myModal"><button class="mt-3 btn btn-primary pull-right" style="font-size:12pt; color:black; text-decoration:none;"><i class="fa fa-heart-o" aria-hidden="true"></i> Give us a Review! > </button></a>
                  </div>
                  </div>
                  
              
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
                  
                  <?php endif; ?>
                    
              
                  </ul>
                </div>
                </div>
              </div>

              
  
    </div>

    <div class="col-md-5">
        <div class="card-body red darken-4 z-depth-2" >
            <!-- Form contact -->
            <form method="post" action="<?php echo e(url('/InquirySend')); ?>">
                <h2 class="text-center py-4 font-bold font-up white-text">Inquiry Form</h2>
                <?php echo e(csrf_field()); ?>

                <div class="md-form">
                    <i class="fa fa-user prefix white-text"></i>
                    <input type="text" required class="white-text" id="form32" name="name" class="form-control">
                    <label for="form32" class="white-text">Your name</label>
                </div>
                <div class="md-form">
                    <i class="fa fa-envelope prefix white-text"></i>
                    <input type="text" required class="white-text" id="form22" name="email" class="form-control">
                    <label for="form22"  class="white-text">Your email</label>
                </div>
                <div class="md-form">
                    <i class="fa fa-envelope prefix white-text"></i>
                    <input type="text" required class="white-text" id="form22" name="contact_number" class="form-control">
                    <label for="form22"  class="white-text">Your Mobile No.</label>
                </div>
                <div class="md-form">
                    <i class="fa fa-tag prefix white-text"></i>
                    <input type="text" required class="white-text" id="form322" name="subject" class="form-control">
                    <label for="form342" class="white-text">Subject</label>
                </div>
                <div class="md-form">
                    <i class="fa fa-pencil prefix white-text"></i>
                    <textarea type="text" required id="form82" name="message" class="md-textarea white-text" style="height: 100px"></textarea>
                    <label for="form82" class="white-text">Your message</label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger btn-lg">Send</button>
                </div>
            </form>
            <!-- Form contact -->
        </div>
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
                  <button type="submit" class="btn btn-danger" style="font-size:13pt; color:black; text-decoration:none; border:1px solid black;">Submit</button>
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
<script src="<?php echo e(asset('js/mdb.min.js')); ?>"></script>
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