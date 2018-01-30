<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
<?php if($errors->any()): ?>
<script type="text/javascript">
  toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong!")
</script>            
<?php endif; ?>  
<?php if(session('error')): ?>
<script type="text/javascript">
  toastr.error('<?php echo session('error'); ?>', "There's something wrong!")
</script>
<?php endif; ?>
<?php if(session('success')): ?>
<script type="text/javascript">
  toastr.success('<?php echo session('success'); ?>', 'Success!')
</script>
<?php endif; ?>
<div class="container-fluid" style="margin-top:65px; padding:50px;padding-top: 0px">
  <div class="mt-5">
    <h3>Dashboard</h3>
  </div>
  <hr class="colorgraph"><br>
  <div class="row">
    <div class="col-md-6">
      <h4>Your Personal Information</h4>
      <div class="card">
        <div class="card-block"  style="background:#f72028;">
          <div class="row">
            <div class="col-md-12">
              <div class="container p-3 text-center" >
                <img width="30%" height="40%" src="<?php echo e(asset('img/steve.jpg')); ?>">
              </div>
            </div>
          </div>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center" style="font-size:15pt;padding:5px"><b>
            <?php echo e(Auth::user()->Customer->firstName); ?> <?php echo e(Auth::user()->Customer->middleName); ?> <?php echo e(Auth::user()->Customer->lastName); ?></b></li>
            <li class="list-group-item text-center" style="font-size:15pt;padding:5px"><b>
              <?php echo e(Auth::user()->Customer->street); ?> <?php echo e(Auth::user()->Customer->brgy); ?> <?php echo e(Auth::user()->Customer->city); ?></b></li>
              <li class="list-group-item text-center" style="font-size:15pt;padding:5px"><b>
                <?php echo e(Auth::user()->Customer->contactNumber); ?></b></li>
                <li class="list-group-item text-center" style="font-size:12pt;padding:3px"></li>
              </ul>
              <div>
                <button type="submit" class="btn btn-default submit"><i class="fa fa-pencil" aria-hidden="true"></i>  Edit Info</button>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div>
              <h4>Your Orders</h4>
              <div class="card">
                <div class="card-header" style="background:maroon; color:white;font-weight: bold">
                  Recent Orders
                </div>
                <div class="card-block">
                  <div class="container mt-3 mb-3">
                  <table class="table" cellspacing="2" width="100%" height="100%">
                    <thead>
                      <tr>
                        <th>Items - Quantity</th>
                        <th>Date Ordered</th>
                        <th>Total Price</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(count($post)!=0): ?>
                      <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                          <?php $__currentLoopData = $posts->Request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($request->itemName); ?>(<?php echo e($request->quantity); ?>pcs)</li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e(Carbon\Carbon::parse($posts->created_at)->diffForHumans()); ?></td>
                        <td>
                          <?php if($posts->price == 0): ?>
                          Price not yet set.
                          <?php else: ?> 
                          <?php echo e($posts->price); ?>

                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if($posts->status == 0): ?>
                          Pending
                          <?php elseif($posts->status == 1): ?>
                          Confirmed
                          <?php elseif($posts->status == 2): ?>
                          Finished
                          <?php else: ?> 
                          Released
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php else: ?>
                      <td colspan="4" style="background-color: black;color:white;text-align:center; font-size:15pt"> You have no orders. </td>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><div class="card">
                <div class="card-header" style="background:maroon; color:white;font-weight: bold">
                  Past Orders
                </div>
                <div class="card-block"><div class="container mt-3 mb-3">
                  <table class="table" cellspacing="2" width="100%" height="100%">
                    <thead>
                      <tr>
                        <th>Items - Quantity</th>
                        <th>Date Ordered</th>
                        <th>Total Price</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(count($post1)!=0): ?>
                      <?php $__currentLoopData = $post1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                          <?php $__currentLoopData = $posts->Request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><?php echo e($request->itemName); ?>(<?php echo e($request->quantity); ?>pcs)</li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td><?php echo e(Carbon\Carbon::parse($posts->created_at)->diffForHumans()); ?></td>
                        <td>
                          <?php if($posts->price == 0): ?>
                          Price not yet set.
                          <?php else: ?> 
                          <?php echo e($posts->price); ?>

                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if($posts->status == 0): ?>
                          Pending
                          <?php elseif($posts->status == 1): ?>
                          Confirmed
                          <?php elseif($posts->status == 2): ?>
                          Finished
                          <?php else: ?> 
                          Released
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php else: ?>
                      <td colspan="4" style="background-color: black;color:white;text-align:center; font-size:15pt"> You have no past orders. </td>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>