<?php $__env->startSection('content'); ?>
    <div > 
        <h3>Customer</h3>
        <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
        <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="<?php echo e(url('/CustomerCreate')); ?>" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div>
    </div>
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
               
                <th>Name</th>
                <th>Gender</th>
                <th>Contact Information</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
               
                <td><?php echo e($posts->firstName); ?> <?php echo e($posts->middleName); ?> <?php echo e($posts->lastName); ?></td>
                <td>
                <?php if($posts->gender == 1): ?>
                    Male 
                <?php elseif($posts->gender == 2): ?>
                    Female
                <?php endif; ?>  
                </td>
                <td>
                    <li>Contact Number: <?php echo e($posts->contactNumber); ?></li>
                    <li>Email Address: <?php echo e($posts->emailAddress); ?></li>
                </td>
                <td><?php echo e($posts->street); ?> <?php echo e($posts->brgy); ?> <?php echo e($posts->city); ?></td>
                <td> 
                        <a href="<?php echo e(url('/CustomerUpdate',$posts->id)); ?>" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Update record">
                                Update
                        </a>
                        <a href="<?php echo e(url('/CustomerShow',$posts->id)); ?>" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                                Show
                        </a>
                        <a href="<?php echo e(url('/CustomerDeac', $posts->id)); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate record">
                                Deactivate
                        </a>
                 
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/CustomerSoft')); ?>';" id="showDeactivated"> Show deactivated records</label>
    </div>
<script>
        

        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );

          
        } );

    </script>
<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>