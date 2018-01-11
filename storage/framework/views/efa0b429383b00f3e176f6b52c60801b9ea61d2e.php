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
        Inquiries
  </div>
  <div class="card-block">
    <div class="container mt-3 mb-3">
            <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date Inquired</th>
                            <th>Name</th>
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
                    <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/admin')); ?>';" id="showDeactivated"> Back to Dashboard</label>
                </div>
    </div>
  </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>