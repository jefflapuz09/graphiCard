<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
    <div> 
        <?php if(session('success')): ?>
        <script type="text/javascript">
            toastr.success(' <?php echo session('success'); ?>', 'Insert Success')
        </script>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <script type="text/javascript">
                toastr.error(' <?php echo session('error'); ?>', "There's something wrong")
            </script>
        <?php endif; ?>

    </div>
    

    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Users
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All deactivated user information are displayed here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <div class="pull-right" style="margin-bottom:15px;"> 

                    </div>
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                        </thead>
                        <tbody>
                                <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->Employee->firstName); ?> <?php echo e($user->Employee->middleName); ?> <?php echo e($user->Employee->lastName); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>
                                        <?php if($user->role==1): ?>
                                        Administrator
                                        <?php elseif($user->role==2): ?>
                                        Contributor
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                            <a href="<?php echo e(url('/UserReactivate', $user->id)); ?>" onclick="return reacForm()" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                                <i class="fa fa-recycle" aria-hidden="true"></i>
                                            </a>
                                    </td>
                                </tr>
                    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox"  onclick="document.location='<?php echo e(url('/Utilities')); ?>';" id="showDeactivated"> Back to Utilities</label>
                    </div>
        </div>
    </div>
    </div>

     
   

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
        
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