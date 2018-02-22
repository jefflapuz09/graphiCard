<?php $__env->startComponent('mail::layout'); ?>

<?php $__env->slot('header'); ?>
<?php $__env->startComponent('mail::header', ['url' => config('app.url'), 'color' => 'red']); ?>
<b style="color:white"><?php echo e($companyInfo->company_name); ?></b>
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>


<!-- Body here -->
<h4>Greetings <?php echo e($mailData->name); ?>,</h4>
<p>Your inquiry message has been received. Graphicard will get back to you immediately. Thank you and have a nice day.</p>

<?php $__env->slot('subcopy'); ?>
<?php $__env->startComponent('mail::subcopy'); ?>
<p>For immediate concerns call us at <?php echo e($companyInfo->contactNumber); ?> or email us at <?php echo e($companyInfo->emailAddress); ?>. </p>
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>

<?php $__env->slot('footer'); ?>
<?php $__env->startComponent('mail::footer'); ?>
© <?php echo e(date('Y')); ?> <?php echo e($companyInfo->company_name); ?>. All rights reserved.
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
