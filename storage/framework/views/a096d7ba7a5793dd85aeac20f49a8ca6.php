<?php $__env->startComponent('mail::message'); ?>
# Verify Your Email

Hello <?php echo e($admin->name); ?>,

Please click the button below to verify your email address:

<?php $__env->startComponent('mail::button', ['url' => $verificationUrl]); ?>
Verify Email
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\xampp\htdocs\Tailor-Pro\resources\views/emails/verify-email.blade.php ENDPATH**/ ?>