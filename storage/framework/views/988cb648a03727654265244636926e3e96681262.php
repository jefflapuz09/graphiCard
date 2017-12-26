<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
     <div>
        <h3>Customer</h3>
     </div>
     <?php if($errors->any()): ?>
     <div class="alert alert-danger">
           <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
     </div>
     <?php endif; ?>    
    <div class="row">
    
    <div class="col-lg-6"> 
        
                    
       
        <form action="<?php echo e(url('/CustomerStore')); ?>" method="post">

        <?php echo e(csrf_field()); ?>

            
            <div class="form-group">
            <label for="">First Name:</label>
            <input type="text" placeholder="First Name" value=""  class="form-control" name="firstName" id="name">
            </div>
            <div class="form-group">
            <label for="">Middle Name:</label>
            <input type="text" placeholder="Middle Name" value=""  class="form-control" name="middleName" id="name">
            </div>
            <div class="form-group">
            <label for="">Last Name:</label>
            <input type="text" placeholder="Last Name" value=""  class="form-control" name="lastName" id="name">
            </div>
            <div class="form-group">
            Gender: 
                <label class="radio-inline">
                <input type="radio" value="1" checked name="gender">Male
                </label>
                <label class="radio-inline">
                <input type="radio" value="2" name="gender">Female
                </label>
            </div>
            <div class="form-group">
            <label for="">Contact Number:</label>
            <input type="text" placeholder="Contact Number" value="" class="form-control" name="contactNumber" id="name">
            </div>
           
        
    </div> 
    <div class="col-lg-6" style="margin-top:40px;">
            <div class="form-group">
            <label for="">Email Address:</label>
            <input type="text" placeholder="Email Address" value="" class="form-control" name="emailAddress" id="name">
            </div>
            <div class="form-group">
            <label for="">Street No./Bldg No.:</label>
            <input type="text" placeholder="Street No./Bldg No." value="" class="form-control" name="street" id="name">
            </div>
            <div class="form-group">
            <label for="">Brgy No./Subd.:</label>
            <input type="text" placeholder="Brgy No./Subd." value="" class="form-control" name="brgy" id="name">
            </div>
            <div class="form-group">
            <label for="">City:</label>
            <input type="text" placeholder="City" value="" class="form-control" name="city" id="name">
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
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>