<?php $__env->startSection('contents'); ?>
    <div class="container">
        <div style="margin-top:100px;">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="" style="padding:40px;">
                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">Bank Deposit<br>
                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">Paypal
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 bg-dark">
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>