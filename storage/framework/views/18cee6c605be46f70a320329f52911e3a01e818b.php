<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
    <div class="container-fluid">
    <?php if($errors->any()): ?>
        <script type="text/javascript">
            toastr.error(' <?php echo implode('', $errors->all(':message')) ?>', "There's something wrong!")
        </script>          
    <?php endif; ?>  
    <?php if(session('error')): ?>
        <script type="text/javascript">
            toastr.error(' <?php echo session('error'); ?>', "There's something wrong!")
        </script>
    <?php endif; ?>
    <div class="row">
            
            <div class="col-lg-6"> 
                
                            
               
                <form action="<?php echo e(url('/UserUpdate',$user->id)); ?>" method="post">
        
                <?php echo e(csrf_field()); ?>

                     <input type="hidden" value="<?php echo e($user->Employee->id); ?>" name="hidid">
                    <h4>Employee Information</h4>
                    <div class="form-group">
                    <label for="">First Name:</label>
                    <input type="text" placeholder="First Name" value="<?php echo e($user->Employee->firstName); ?>"  class="form-control" name="firstName" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">Middle Name:</label>
                    <input type="text" placeholder="Middle Name" value="<?php echo e($user->Employee->middleName); ?>"  class="form-control" name="middleName" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">Last Name:</label>
                    <input type="text" placeholder="Last Name" value="<?php echo e($user->Employee->lastName); ?>"  class="form-control" name="lastName" id="name">
                    </div>
                    <div class="form-group">
                    Gender: 
                        <label class="radio-inline">
                        <input type="radio" value="1" <?php if($user->Employee->gender == 1): ?> checked <?php endif; ?> name="gender">Male
                        </label>
                        <label class="radio-inline">
                        <input type="radio" value="2" <?php if($user->Employee->gender == 2): ?> checked <?php endif; ?> name="gender">Female
                        </label>
                    </div>
                    <div class="form-group">
                    <label for="">Contact Number:</label>
                    <input type="text" placeholder="Contact Number" value="<?php echo e($user->Employee->contactNumber); ?>" class="form-control" name="contactNumber" id="name">
                    </div>
                   
                
            </div> 
            <div class="col-lg-6" style="margin-top:0px;">
                    <div class="form-group">
                    <label for="">Email Address:</label>
                    <input type="email" placeholder="Email Address" value="<?php echo e($user->email); ?>" class="form-control" name="email" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">Street No./Bldg No.:</label>
                    <input type="text" placeholder="Street No./Bldg No." value="<?php echo e($user->Employee->street); ?>" class="form-control" name="street" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">Brgy No./Subd.:</label>
                    <input type="text" placeholder="Brgy No./Subd." value="<?php echo e($user->Employee->brgy); ?>" class="form-control" name="brgy" id="name">
                    </div>
                    <div class="form-group">
                    <label for="">City:</label>
                    <input type="text" placeholder="City" value="<?php echo e($user->Employee->city); ?>" class="form-control" name="city" id="name">
                    </div>
                    
            </div>
            
            </div>
    
            <hr>
    
            <div class="row">
                <div class="col-lg-6">
                        <h4>Account Information</h4>
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" placeholder="" value="" class="form-control" name="password" id="name">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password:</label>
                            <input type="password" placeholder="" value="" class="form-control" name="password_confirmation" id="name">
                        </div>
                        <div class="form-group">
                                <label for="">Role:</label>
                        <select  class="select2 form-control" required id="sel2" name="role">
                            <option value="0" disabled>Please Select Role  Type</option> 
                            <option value="1" <?php if($user->role == 1): ?> selected = "selected" <?php endif; ?>>Administrator</option>
                            <option value="2" <?php if($user->role == 2): ?> selected = "selected" <?php endif; ?>>Contributor</option>
                        </select>
                         </div>
                        <div class="pull-right">
                        <button type="reset" class="btn btn-success">Clear</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
            </form>
            </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>