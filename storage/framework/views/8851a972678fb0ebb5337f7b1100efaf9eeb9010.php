<?php $__env->startSection('contents'); ?>

<div class="container" style="margin-top:80px;">
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
                        <p class="card-text">Customer Description</p>
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
                          <p class="card-text">Customer Description</p>
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
                            <p class="card-text">Customer Description</p>
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
                                <p class="card-text">Customer Description</p>
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
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>