<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.field-group','data' => ['columnSpan' => $formComponent->getColumnSpan(),'errorKey' => $formComponent->getName(),'for' => $formComponent->getId(),'helpMessage' => $formComponent->getHelpMessage(),'hint' => $formComponent->getHint(),'label' => $formComponent->getLabel(),'required' => $formComponent->isRequired()]]); ?>
<?php $component->withName('forms::field-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['column-span' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getColumnSpan()),'error-key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getName()),'for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getId()),'help-message' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getHelpMessage()),'hint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getHint()),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->getLabel()),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($formComponent->isRequired())]); ?>
    <div class="flex border-gray-300 rounded shadow-sm">
        <?php if($formComponent->getPrefix()): ?>
            <span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l bg-gray-50 whitespace-nowrap sm:text-sm">
                <?php echo $formComponent->getPrefix(); ?>

            </span>
        <?php endif; ?>

        <input
            <?php echo $formComponent->getAutocomplete() ? "autocomplete=\"{$formComponent->getAutocomplete()}\"" : null; ?>

            <?php echo $formComponent->isAutofocused() ? 'autofocus' : null; ?>

            <?php echo $formComponent->isDisabled() ? 'disabled' : null; ?>

            <?php echo $formComponent->getId() ? "id=\"{$formComponent->getId()}\"" : null; ?>

            <?php echo $formComponent->getName() ? "{$formComponent->getBindingAttribute()}=\"{$formComponent->getName()}\"" : null; ?>

            <?php echo $formComponent->getMaxLength() ? "maxlength=\"{$formComponent->getMaxLength()}\"" : null; ?>

            <?php echo $formComponent->getMinLength() ? "minlength=\"{$formComponent->getMinLength()}\"" : null; ?>

            <?php echo $formComponent->getPlaceholder() ? "placeholder=\"{$formComponent->getPlaceholder()}\"" : null; ?>

            <?php echo $formComponent->isRequired() ? 'required' : null; ?>

            <?php echo $formComponent->getType() ? "type=\"{$formComponent->getType()}\"" : null; ?>

            class="block w-full placeholder-gray-400 focus:placeholder-gray-500 placeholder-opacity-100 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 <?php echo e(! $formComponent->getPrefix() ? 'rounded-l-md' : null); ?> <?php echo e(! $formComponent->getPostfix() ? 'rounded-r-md' : null); ?> <?php echo e($errors->has($formComponent->getName()) ? 'border-danger-600 motion-safe:animate-shake' : 'border-gray-300'); ?>"
            <?php echo Filament\format_attributes($formComponent->getExtraAttributes()); ?>

        />

        <?php if($formComponent->getPostfix()): ?>
            <span class="inline-flex items-center px-3 text-gray-500 border border-l-0 border-gray-300 rounded-r bg-gray-50 whitespace-nowrap sm:text-sm">
                <?php echo $formComponent->getPostfix(); ?>

            </span>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Administrador\OneDrive\Escritorio\Grado Superior\2ºDAW\OTROS\Filament\Proyecto1\proyecto_psicologia\vendor\filament\filament\packages\forms\src/../resources/views/components/text-input.blade.php ENDPATH**/ ?>