<?php $__env->startSection('content'); ?>
     <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($posts->id); ?></td>
                <td><?php echo e($posts->name); ?></td>
                <td><?php echo e($posts->description); ?></td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<script>
        $(document).ready(function() {
          $('#example').DataTable( {
              "scrollX": true
          } );
        } );

    </script>
<?php $__env->stopSection(); ?>


   
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>