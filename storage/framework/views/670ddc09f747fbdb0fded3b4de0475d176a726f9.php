<?php $__env->startSection('content'); ?>
    <div > 
    </div>

    <div class="card" style="border:1px solid black; margin:10px;">
    <div class="card-header" style="background:maroon; color:white;">
            Service Category
            <button type="button" class="pull-right btn btn-outline-light btn-sm" data-toggle="popover" title="Help" data-html="true" data-content="All deactivated service category information are displayed here."><i class="fa fa-question-circle" aria-hidden="true"></i></button>
    </div>
    <div class="card-block">
        <div class="container mt-3 mb-3">
                <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                                <tr>
                                    <th>Bank</th>
                                    <th>Account Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($posts->bank); ?></td>
                                    <td><?php echo e($posts->accountName); ?></td>
                                    <td> 
                                            <a href="<?php echo e(url('/BankReactivate', $posts->id)); ?>"  onclick="return reacForm()"  type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Reactivate record">
                                                <i class="fa fa-recycle" aria-hidden="true"></i>
                                                </a>
                                    </td>
                                </tr>
                    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                    </table>
                    <div class="form-group pull-right">
                            <label class="checkbox-inline"><input type="checkbox" onclick="document.location='<?php echo e(url('/Bank')); ?>';" id="showDeactivated"> Show Records</label>
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