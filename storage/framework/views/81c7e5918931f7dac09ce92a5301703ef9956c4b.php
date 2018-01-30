<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
    <div > 
        <?php if(session('success')): ?>
        <script type="text/javascript">
            toastr.success(' <?php echo session('success'); ?>', 'Success!')
        </script>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <script type="text/javascript">
                toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
            </script>
        <?php endif; ?>

    </div>

    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Orders
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All list of orders are found here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Items - Quantity</th>
                                <th>Date Ordered</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($posts->Customer->firstName); ?> <?php echo e($posts->Customer->middleName); ?> <?php echo e($posts->Customer->lastName); ?></td>
                                <td>
                                    <?php $__currentLoopData = $posts->Request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($request->itemName); ?>(<?php echo e($request->quantity); ?>pcs)</li>
                                        <li><?php echo e($request->orderDescription); ?></li>
                                        <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e(Carbon\Carbon::parse($posts->created_at)->diffForHumans()); ?></td>
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
                                <td>
                                    <?php if($posts->status <= 3): ?>
                                        <a href="<?php echo e(url('/OrderView/'.$posts->id)); ?>" class="btn btn-primary">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/ServiceTypeSoft')); ?>';" id="showDeactivated"> Show past order records</label>
                    </div>
        </div>
    </div>
    </div>

     


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
        

        function updateForm(){
            var x = confirm("Are you sure you want to alter this record?");
            if (x)
              return true;
            else
              return false;
         }

         function deleteForm(){
            var x = confirm("Are you sure you want to deactivate this record? All items included in this record will also be deactivated.");
            if (x)
              return true;
            else
              return false;
         }

    </script>
<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>