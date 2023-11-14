<?php $attributes = $attributes->exceptProps([
    'title',
]); ?>
<?php foreach (array_filter(([
    'title',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<h2 <?php echo e($attributes->merge(['class' => 'text-center text-2xl md:text-3xl leading-tight font-medium'])); ?>><?php echo e(__($title)); ?></h2>
<?php /**PATH C:\Users\Administrador\OneDrive\Escritorio\Grado Superior\2ºDAW\OTROS\Filament\Proyecto1\proyecto_psicologia\vendor\filament\filament\src/../resources/views/components/branding/auth.blade.php ENDPATH**/ ?>