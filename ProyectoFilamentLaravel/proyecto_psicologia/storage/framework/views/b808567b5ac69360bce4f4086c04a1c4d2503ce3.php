<?php $attributes = $attributes->exceptProps([
    'columns' => 1,
    'schema' => [],
]); ?>
<?php foreach (array_filter(([
    'columns' => 1,
    'schema' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $columnsClasses = [
        '',
        'grid-cols-1 lg:grid-cols-1',
        'grid-cols-1 lg:grid-cols-2',
        'grid-cols-1 lg:grid-cols-3',
        'grid-cols-1 lg:grid-cols-4',
        'grid-cols-1 lg:grid-cols-5',
        'grid-cols-1 lg:grid-cols-6',
        'grid-cols-1 lg:grid-cols-7',
        'grid-cols-1 lg:grid-cols-8',
        'grid-cols-1 lg:grid-cols-9',
        'grid-cols-1 lg:grid-cols-10',
        'grid-cols-1 lg:grid-cols-11',
        'grid-cols-1 lg:grid-cols-12',
    ][$columns]
?>

<?php if(count($schema)): ?>
    <div <?php echo e($attributes); ?>>
        <div class="grid gap-6 <?php echo e($columnsClasses); ?>">
            <?php $__currentLoopData = $schema; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($component->render()); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\Administrador\OneDrive\Escritorio\Grado Superior\2ºDAW\OTROS\Filament\Proyecto1\proyecto_psicologia\vendor\filament\filament\packages\forms\src/../resources/views/components/form.blade.php ENDPATH**/ ?>