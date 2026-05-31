<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('web/images/logo.png')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name')); ?> | Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('app/dist/css/sweetalert.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/dist/css/sweetalert-overrides.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('app/dist/css/login.css?v=1.0')); ?>">
    <script type="text/javascript">
        var base_url = "<?php echo e(url('/')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";
    </script>
</head>
<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class=" alignText">
            <img class="animation__shake logo" src="<?php echo e(asset('app/dist/img/logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>">
        </div>
        <div class="signup login-show">
            <form method="post">
                <?php echo csrf_field(); ?>
                <label for="chk" aria-hidden="true">Login</label>
                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="invalid-feedback" role="alert"><strong><?php echo e($error); ?></strong></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <input type="text" name="username" class=" <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="username" required placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password" required class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <button class="login-btn">Login</button>
            </form>
        </div>

        <div class="login register-show">
            <form method="post">
                <?php echo csrf_field(); ?>
                <label for="chk" aria-hidden="true">Forgot Password</label>
                <input type="text" placeholder="Email" name="forgot_username" id="forgot_username">
                <input class="login-btn" type="button" value="Submit" id="forgot_password_btn">
            </form>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo e(asset('app/dist/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/dist/js/sweetalert-init.js')); ?>"></script>
    <script src="<?php echo e(url('app/dist/js/custom.js?v=1.0')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\Pentacodes.Marketing\Desktop\LaravelProjects\2025\Medwe\resources\views/app/auth/login.blade.php ENDPATH**/ ?>