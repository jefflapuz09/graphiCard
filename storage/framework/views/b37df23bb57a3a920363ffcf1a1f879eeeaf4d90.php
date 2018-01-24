<?php $__env->startSection('style'); ?>
<link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet">
<style>
.btn-outline-secondary {
  color: #272626;
  background-color: transparent;
  background-image: none;
  border-color: #272626;
}

.btn-outline-secondary:hover {
  color: white;
  background-color: #f72028;
  border-color: black;
}

.btn-outline-secondary:focus, .btn-outline-secondary.focus {
  box-shadow: 0 0 0 0.2rem rgba(134, 142, 150, 0.5);
}

.btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
  color: #868e96;
  background-color: transparent;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
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
<?php if(session('success')): ?>
<script type="text/javascript">
    toastr.success(' <?php echo session('success'); ?>', 'Success!')
</script>
<?php endif; ?>
<div class="container" style="margin-top:65px;">
    <div class="container" class="p-5">
        <div class="container" class="p-5">
            <div class="container" class="p-5">
                <div class="mt-5">
                    <h3>Register</h3>
                </div>
                <hr class="colorgraph"><br>
                <h3 class="form-signin-heading">Account Information</h3>
                <form action="<?php echo e(url('/customer/register/post')); ?>" method="post" class="form-register">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Name <span style="color:red">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input class="form-control-a" placeholder="First Name" name="firstName" type="text" autofocus>
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control-a" placeholder="Middle Name" name="middleName" type="text">
                                </div>
                                <div class="col-sm-4">
                                    <input class="form-control-a" placeholder="Last Name" name="lastName" type="text">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Address <span style="color:red">*</span></label>
                      <div class="col-sm-10">
                          <div class="row">
                              <div class="col-sm-5">
                                  <input class="form-control-a" placeholder="Street No./Bldg No.:" name="street" type="text">
                              </div>
                              <div class="col-sm-3">
                                  <input class="form-control-a" id="ex2" placeholder="Brgy No./Subd.:" name="brgy" type="text">
                              </div>
                              <div class="col-sm-4">
                                  <input class="form-control-a" placeholder="City:" name="city" type="text">
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Gender <span style="color:red">*</span></label>
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <select class="form-control-a"  id="gender" name="gender">
                                    <option value="2">Female</option>
                                    <option value="1">Male</option>
                                    <option value="3">Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Contact Number <span style="color:red">*</span></label>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <input class="form-control-a" name="contactNumber" placeholder="Contact Number" type="text">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Email Address <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                        <div class="row">
                            <input class="form-control-a" name="email" placeholder="Email Address" type="email">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Password <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                        <div class="row">
                          <input class="form-control-a" name="password" placeholder="Password" type="password">
                      </div>
                  </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label-sm">Confirm password <span style="color:red">*</span></label>
                <div class="col-sm-9">
                    <div class="row">
                        <input class="form-control-a"  name="password_confirmation" placeholder="Re-enter password" type="password">
                  </div>
              </div>
          </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
        </div>
    </div>
</div>
</div>
</form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>