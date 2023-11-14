<?php $attributes = $attributes->exceptProps([
    'errorKey' => null,
    'for' => null,
    'helpMessage' => null,
    'hint' => null,
    'label' => null,
    'labelPrefix' => null,
    'required' => false,
    'columnSpan' => 1,
]); ?>
<?php foreach (array_filter(([
    'errorKey' => null,
    'for' => null,
    'helpMessage' => null,
    'hint' => null,
    'label' => null,
    'labelPrefix' => null,
    'required' => false,
    'columnSpan' => 1,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $columnSpanClass = [
        '',
        'lg:col-span-1',
        'lg:col-span-2',
        'lg:col-span-3',
        'lg:col-span-4',
        'lg:col-span-5',
        'lg:col-span-6',
        'lg:col-span-7',
        'lg:col-span-8',
        'lg:col-span-9',
        'lg:col-span-10',
        'lg:col-span-11',
        'lg:col-span-12',
    ][$columnSpan];
?>

<div class="flex relative <?php echo e($columnSpanClass); ?>">
    <div class="w-full space-y-2">
        <?php if($label || $hint): ?>
            <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                <div class="flex items-center space-x-3">
                    <?php echo e($labelPrefix); ?>


                    <?php if($label): ?>
                        <label for="<?php echo e($for); ?>" class="text-sm font-medium leading-tight">
                            <?php echo e(__($label)); ?>


                            <?php if($required): ?>
                                <sup class="font-medium text-danger-700">*</sup>
                            <?php endif; ?>
                        </label>
                    <?php endif; ?>
                </div>

                <?php if($hint): ?>
                    <div class="font-mono text-xs leading-tight text-gray-500">
                        <?php echo Str::of(__($hint))->markdown(); ?>

                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php echo e($slot); ?>


        <?php if($errorKey): ?>
            <?php $__errorArgs = [$errorKey];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="block text-sm leading-tight text-danger-700">
                    <?php echo e($message); ?>

                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <?php endif; ?>

        <?php if($helpMessage): ?>
            <div class="text-xs font-normal leading-tight text-gray-500">
                <?php echo Str::of(__($helpMessage))->markdown(); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\Users\Administrador\OneDrive\Escritorio\Grado Superior\2ºDAW\OTROS\Filament\Proyecto1\proyecto_psicologia\vendor\filament\filament\packages\forms\src/../resources/views/components/field-group.blade.php ENDPATH**/ ?>