<?php $__env->startSection('contents'); ?>

<div class="container" style="margin-top:100px;">
    <div class="col-sm-6 mx-auto">
        <div class="">
                <form action="<?php echo e(url('/SearchResult')); ?>" method="post">
                    <div class="input-group col-sm-12" >
                        <?php echo e(csrf_field()); ?>

                        <input type="text" class="form-control"  id="inlineFormInputGroup" name="search" placeholder="Search">
                        <button type="submit" class="btn btn-dark"><i class="fa fa-search" aria-hidden="true"></i></button>
                        
                    </div>
                </form>
        </div>
    </div>
    
        <?php if(session('data')): ?>
            <div class="card mt-5">
                <div class="">
                        <?php $__currentLoopData = Session::get('data'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img class="m-3 img-responsive" style="max-width:100%; max-height:100%;" height="200px" src="<?php echo e(asset($test->image)); ?>" alt="">
                                    </div>
                                    <div class="col-sm-9 mt-5">
                                        <div class="mx-auto" align="center">
                                             <p class="mt- 5lead"><?php echo e($test->item); ?></p>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo e(url('/prodDescription/'.$test->id.'/'.$test->typeId.'/'.$test->itemId)); ?>" class="btn btn-primary"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                    <?php if(session('data')->isEmpty()): ?>
                        <div class="mx-auto mt-1">
                            <p class="lead">The item you search for did not match any item.</p>
                        </div>
                    <?php endif; ?>
            </div>
        <?php endif; ?>
    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>