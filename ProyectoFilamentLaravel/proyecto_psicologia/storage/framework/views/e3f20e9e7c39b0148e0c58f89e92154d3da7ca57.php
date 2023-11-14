<?php $attributes = $attributes->exceptProps([
    'color' => 'white',
    'disabled' => false,
    'href' => null,
    'size' => 'base',
    'type' => 'button',
]); ?>
<?php foreach (array_filter(([
    'color' => 'white',
    'disabled' => false,
    'href' => null,
    'size' => 'base',
    'type' => 'button',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $colorClasses = [
        'danger' => 'border-transparent bg-danger-600 text-white hover:bg-danger-700 focus:ring-danger-200',
        'primary' => 'border-transparent bg-primary-600 text-white hover:bg-primary-700 focus:ring-primary-200',
        'white' => 'border-gray-300 bg-white text-gray-800 hover:bg-gray-100 focus:ring-primary-200',
    ][$color];

    $disabledClasses = $disabled ? 'opacity-25 cursor-not-allowed' : '';

    $sizeClasses = [
        'base' => 'text-sm py-2 px-4',
        'small' => 'text-xs py-1 px-3',
    ][$size];

    $classes = "cursor-pointer font-medium border rounded transition duration-200 shadow-sm focus:ring focus:ring-opacity-50 {$colorClasses} {$disabledClasses} {$sizeClasses}";
?>

<?php if (! ($href)): ?>
    <button type="<?php echo e($type); ?>" <?php echo e($attributes->merge(['class' => $classes, 'disabled' => $disabled])); ?>>
        <?php echo e($slot); ?>

    </button>
<?php else: ?>
    <a href="<?php echo e($href); ?>" <?php echo e($attributes->merge(['class' => $classes, 'disabled' => $disabled])); ?>>
        <?php echo e($slot); ?>

    </a>
<?php endif; ?>
<?php /**PATH C:\Users\Administrador\OneDrive\Escritorio\Grado Superior\2ºDAW\OTROS\Filament\Proyecto1\proyecto_psicologia\vendor\filament\filament\src/../resources/views/components/button.blade.php ENDPATH**/ ?>