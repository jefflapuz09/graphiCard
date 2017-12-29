<?php $__env->startSection('content'); ?>
<div > 
    <h3>Inquiries</h3>
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
</div>

<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date Inquired</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($posts->id); ?></td>
            <td><?php echo e(\Carbon\Carbon::parse($posts->created_at)->format('F m,Y')); ?></td>
            <td><?php echo e($posts->name); ?></td>
            <td><?php echo e($posts->email); ?></td>
            <td><?php echo e($posts->subject); ?></td>
            <td> 
                <a href="<?php echo e(url('/InquiryView',$posts->id)); ?>" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View Inquiry">
                    <i class="fa fa-eye" aria-hidden="true"></i> View Inquiry
                </a>
            </td>
        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="form-group pull-right">
    <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/admin')); ?>';" id="showDeactivated"> Show unread inquiries</label>
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