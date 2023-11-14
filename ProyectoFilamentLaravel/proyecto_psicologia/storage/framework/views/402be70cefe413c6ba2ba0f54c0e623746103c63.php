<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(trans('filament::layout.direction') == 'rtl' ? 'rtl' : 'ltr'); ?>" class="antialiased bg-gray-100 js-focus-visible">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(__($title) ?? null); ?> <?php echo e(__($title) ?? false ? '|' : null); ?> <?php echo e(config('app.name')); ?></title>

    <?php echo \Livewire\Livewire::styles(); ?>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Commissioner:wght@200;300;400;500;600;700&amp;family=JetBrains+Mono:ital@0;1&amp;display=swap">
    <link rel="stylesheet" href="<?php echo e(route('filament.asset', [
        'id' => Filament\get_asset_id('/css/filament.css'),
        'path' => 'css/filament.css',
    ])); ?>" />

    <?php $__currentLoopData = \Filament\Filament::getStyles(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(Str::of($path)->startsWith(['http://', 'https://'])): ?>
            <link rel="stylesheet" href="<?php echo e($path); ?>" />
        <?php else: ?>
            <link rel="stylesheet" href="<?php echo e(route('filament.asset', [
                'path' => $path
            ])); ?>">
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo $__env->yieldPushContent('filament-styles'); ?>
</head>

<body class="text-gray-600">
    <?php echo e($slot); ?>


    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.notification','data' => []]); ?>
<?php $component->withName('filament::notification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <script>
        window.filamentConfig = <?php echo json_encode(\Filament\Filament::getScriptData(), 15, 512) ?>;
    </script>

    <script src="<?php echo e(route('filament.asset', [
        'id' => Filament\get_asset_id('/js/filament.js'),
        'path' => 'js/filament.js',
    ])); ?>"></script>

    <?php $__currentLoopData = \Filament\Filament::getScripts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e($path); ?>"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mousetrap/1.6.5/mousetrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mousetrap/1.6.5/plugins/global-bind/mousetrap-global-bind.min.js"></script>

    <?php echo $__env->yieldPushContent('filament-scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Administrador\OneDrive\Escritorio\Grado Superior\2ºDAW\OTROS\Filament\Proyecto1\proyecto_psicologia\vendor\filament\filament\src/../resources/views/components/layouts/base.blade.php ENDPATH**/ ?>