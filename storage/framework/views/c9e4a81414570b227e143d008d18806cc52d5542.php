<?php $__env->startSection('content'); ?>
    <div > 
        <h3>Service Type</h3>
        <div class="pull-right" style="margin-bottom:15px;"> 
            <a href="<?php echo e(url('/ServiceTypeCreate')); ?>" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="New record">
                New Record
            </a>
        </div>
    </div>
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Service Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($posts->id); ?></td>
                <td><?php echo e($posts->category); ?></td>
                <td><?php echo e($posts->name); ?></td>
                <td><?php echo e($posts->description); ?></td>
                <td> 
                        <a href="<?php echo e(url('/ServiceTypeReactivate',$posts->id)); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="form-group pull-right">
            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/ServiceType')); ?>';" id="showDeactivated"> Show records</label>
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