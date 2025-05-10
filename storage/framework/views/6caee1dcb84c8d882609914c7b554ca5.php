
<?php
    $user = filament()->auth()->user();
?>

<!--[if BLOCK]><![endif]--><?php if($user instanceof \Illuminate\Contracts\Auth\Authenticatable): ?>
    <?php if (isset($component)) { $__componentOriginal7aa0b6b1aa4a6b63824d7be5e541d1cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7aa0b6b1aa4a6b63824d7be5e541d1cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.avatar','data' => ['src' => filament()->getUserAvatarUrl($user),'alt' => __('filament-panels::layout.avatar.alt', ['name' => filament()->getUserName($user)]),'attributes' => 
            \Filament\Support\prepare_inherited_attributes($attributes)
                ->class(['fi-user-avatar'])
        ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(filament()->getUserAvatarUrl($user)),'alt' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('filament-panels::layout.avatar.alt', ['name' => filament()->getUserName($user)])),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(
            \Filament\Support\prepare_inherited_attributes($attributes)
                ->class(['fi-user-avatar'])
        )]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7aa0b6b1aa4a6b63824d7be5e541d1cb)): ?>
<?php $attributes = $__attributesOriginal7aa0b6b1aa4a6b63824d7be5e541d1cb; ?>
<?php unset($__attributesOriginal7aa0b6b1aa4a6b63824d7be5e541d1cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7aa0b6b1aa4a6b63824d7be5e541d1cb)): ?>
<?php $component = $__componentOriginal7aa0b6b1aa4a6b63824d7be5e541d1cb; ?>
<?php unset($__componentOriginal7aa0b6b1aa4a6b63824d7be5e541d1cb); ?>
<?php endif; ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\Users\hanan\call-system\resources\views/vendor/filament-panels/components/avatar/user.blade.php ENDPATH**/ ?>