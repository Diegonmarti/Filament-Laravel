<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.field-group','data' => ['columnSpan' => $formComponent->getColumnSpan(),'errorKey' => $formComponent->getName(),'for' => $formComponent->getId(),'helpMessage' => $formComponent->getHelpMessage(),'hint' => $formComponent->getHint(),'label' => $formComponent->getLabel(),'required' => $formComponent->isRequired()]]); ?>
<?php $component->withName('forms::field-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['column-span' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getColumnSpan()),'error-key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getName()),'for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getId()),'help-message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getHelpMessage()),'hint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getHint()),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getLabel()),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->isRequired())]); ?>
    <?php if($formComponent->isInline()): ?>
         <?php $__env->slot('labelPrefix', null, []); ?> 
    <?php endif; ?>
        <input
            <?php echo $formComponent->isAutofocused() ? 'autofocus' : null; ?>

            <?php echo $formComponent->isDisabled() ? 'disabled' : null; ?>

            <?php echo $formComponent->getId() ? "id=\"{$formComponent->getId()}\"" : null; ?>

            <?php echo $formComponent->getName() ? "{$formComponent->getBindingAttribute()}=\"{$formComponent->getName()}\"" : null; ?>

            type="checkbox"
            <?php echo $formComponent->isRequired() ? 'required' : null; ?>

            class="rounded text-primary-600 shadow-sm focus:border-primary-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50 <?php echo e($errors->has($formComponent->getName()) ? 'border-danger-600 ' : 'border-gray-300'); ?>"
            <?php echo Filament\format_attributes($formComponent->getExtraAttributes()); ?>

        />
    <?php if($formComponent->isInline()): ?>
         <?php $__env->endSlot(); ?>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Administrador\OneDrive\Escritorio\Grado Superior\2ºDAW\OTROS\Filament\Proyecto1\proyecto_psicologia\vendor\filament\filament\packages\forms\src/../resources/views/components/checkbox.blade.php ENDPATH**/ ?>