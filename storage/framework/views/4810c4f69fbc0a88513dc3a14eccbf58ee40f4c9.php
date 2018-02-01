<?php $__env->startSection('contents'); ?>
    <div class="container" style="margin-top:100px;">
        <form action="<?php echo e(url('/customer/cart/checkout')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

        <div class="card bg-faded">
                <table class="table">
                        <thead>
                          <tr class="bg-dark text-white">
                            <th>Product</th>
                            <th>Specification</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($posts->name); ?>

                                </td>
                                <td>
                                    <li><?php echo e($posts->options->attributeName); ?></li>
                                    <li><?php echo e($posts->options->choice); ?></li>
                                    <li><?php echo e($posts->options->description); ?></li> 
                                </td>
                                <td><input type="number" value="<?php echo e($posts->qty); ?>" style="width:100px"/></td>
                                <td><?php $ans = $posts->qty * $posts->price; $ans2 = $ans + $posts->options->base_price * $posts->qty?><?php echo e(number_format($ans2,2)); ?></td>
                                <td>
                                    <a href="<?php echo e(url('/customer/cart/'.$posts->rowId.'/remove')); ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove from cart">
                                        <i class="fa fa-close" aria-hidden="true"></i>
                                    </a>
                                </td>
                            <tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                 </table>
        </div>
                <div class="col-sm-12">
                    <div class="pull-right">
                        <a href="#" data-toggle="modal" data-target="#modal" class="btn btn-primary">Proceed to Checkout</a>
                    </div>
                </div>
        
        
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <input type="hidden" value="<?php echo e(Auth::user()->Customer->id); ?>" name="customerId">
        <input type="hidden" value="<?php echo e($post2->options->attributeName); ?>:<?php echo e($posts->options->choice); ?>" name="spec">
        <input type="hidden" value="<?php echo e($post2->options->description); ?>" name="description[]"> 
        <input type="hidden" value="<?php echo e($post2->qty); ?>" name="qty[]"> 
        <input type="hidden" value="<?php echo e($post2->name); ?>" name="item[]"> 

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <div class="modal fade" id="modal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-white" style="background:darkred;">
                      <h5 class="modal-title">Cart Content</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <hr class="colorgraph">
                      <h1>Order Inclusion</h1>
                      Customer Name:  <?php echo e(Auth::user()->Customer->firstName); ?> <?php echo e(Auth::user()->Customer->middleName); ?> <?php echo e(Auth::user()->Customer->lastName); ?><Br><br>
                      Product(/s): <br>
                      <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($item->name); ?> (<?php echo e($item->qty); ?>) <br>
                        <?php echo e($item->options->attributeName); ?> <?php echo e($item->options->choice); ?> <br>
                        Job Order: <?php echo e($item->options->description); ?> <br><br>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <div class="form-group">
                        Remarks:
                        <textarea class="form-control" required rows="5" id="jobDesc" placeholder="Type your job description here. Such as what date do you need it?" name="remarks"></textarea>
                        </div>

                        <span style="color:red;">Note:</span><br>Price may vary depending on the customer's request.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>   
                    </div>
                  </div>
                </div>
              </div>
        
            </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>