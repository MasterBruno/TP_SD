<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Devmunity | <?php echo e(isset($titulo) ? $titulo : 'API'); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Style -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <?php $__env->startSection('estilos'); ?>
    <?php echo $__env->yieldSection(); ?>

</head>
<body>
    <?php echo $__env->yieldContent('content'); ?>

    <div class="container">
        <?php echo $__env->yieldContent('content-main'); ?>
    </div>

    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <?php $__env->startSection('scripts'); ?>
    <?php echo $__env->yieldSection(); ?>
</body>
</html><?php /**PATH /var/www/resources/views/base.blade.php ENDPATH**/ ?>