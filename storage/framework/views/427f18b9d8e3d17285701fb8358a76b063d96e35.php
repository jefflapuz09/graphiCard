<?php $__env->startSection('content'); ?>
    <div > 
    </div>

    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Customer
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
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
                                        <a href="<?php echo e(url('/CustomerReactivate',$posts->id)); ?>" onclick="return reacForm()" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                            <i class="fa fa-recycle" aria-hidden="true"></i>
                                        </a>
                                 
                                </td>
                            </tr>
                
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/Customer')); ?>';" id="showDeactivated"> Show records</label>
                    </div>
        </div>
    </div>
    </div>

    
<script>
        

        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );
        } );

        function reacForm(){
            var x = confirm("Are you sure you want to reactivate this record?");
            if (x)
              return true;
            else
              return false;
         }

    </script>
<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>