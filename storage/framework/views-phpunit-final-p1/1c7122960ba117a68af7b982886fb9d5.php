<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'sidebar' => false,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'sidebar' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sidebar): ?>
    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/brand.blade.php', $__blaze->compiledPath.'/148dfd6de73e8fd2e4f3041becc3827f.php'); ?>
<?php if (isset($__slots148dfd6de73e8fd2e4f3041becc3827f)) { $__slotsStack148dfd6de73e8fd2e4f3041becc3827f[] = $__slots148dfd6de73e8fd2e4f3041becc3827f; } ?>
<?php if (isset($__attrs148dfd6de73e8fd2e4f3041becc3827f)) { $__attrsStack148dfd6de73e8fd2e4f3041becc3827f[] = $__attrs148dfd6de73e8fd2e4f3041becc3827f; } ?>
<?php $__attrs148dfd6de73e8fd2e4f3041becc3827f = ['name' => config('app.name', 'TOY & JOY'),'attributes' => $attributes]; ?>
<?php $__slots148dfd6de73e8fd2e4f3041becc3827f = []; ?>
<?php $__blaze->pushData($__attrs148dfd6de73e8fd2e4f3041becc3827f); ?>
<?php ob_start(); ?>
         <?php ob_start(); ?>
            <?php if (isset($component)) { $__componentOriginal159d6670770cb479b1921cea6416c26c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal159d6670770cb479b1921cea6416c26c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-logo-icon','data' => ['class' => 'size-5 fill-current text-accent-foreground']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-logo-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5 fill-current text-accent-foreground']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $attributes = $__attributesOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__attributesOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $component = $__componentOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__componentOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
        <?php $__slots148dfd6de73e8fd2e4f3041becc3827f['logo'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), ['class' => 'flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground']); ?>
    <?php $__slots148dfd6de73e8fd2e4f3041becc3827f['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots148dfd6de73e8fd2e4f3041becc3827f); ?>
<?php _148dfd6de73e8fd2e4f3041becc3827f($__blaze, $__attrs148dfd6de73e8fd2e4f3041becc3827f, $__slots148dfd6de73e8fd2e4f3041becc3827f, ['name', 'attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack148dfd6de73e8fd2e4f3041becc3827f)) { $__slots148dfd6de73e8fd2e4f3041becc3827f = array_pop($__slotsStack148dfd6de73e8fd2e4f3041becc3827f); } ?>
<?php if (! empty($__attrsStack148dfd6de73e8fd2e4f3041becc3827f)) { $__attrs148dfd6de73e8fd2e4f3041becc3827f = array_pop($__attrsStack148dfd6de73e8fd2e4f3041becc3827f); } ?>
<?php $__blaze->popData(); ?>
<?php else: ?>
    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/brand.blade.php', $__blaze->compiledPath.'/efe143adda53c3e267703be384ec4a91.php'); ?>
<?php if (isset($__slotsefe143adda53c3e267703be384ec4a91)) { $__slotsStackefe143adda53c3e267703be384ec4a91[] = $__slotsefe143adda53c3e267703be384ec4a91; } ?>
<?php if (isset($__attrsefe143adda53c3e267703be384ec4a91)) { $__attrsStackefe143adda53c3e267703be384ec4a91[] = $__attrsefe143adda53c3e267703be384ec4a91; } ?>
<?php $__attrsefe143adda53c3e267703be384ec4a91 = ['name' => config('app.name', 'TOY & JOY'),'attributes' => $attributes]; ?>
<?php $__slotsefe143adda53c3e267703be384ec4a91 = []; ?>
<?php $__blaze->pushData($__attrsefe143adda53c3e267703be384ec4a91); ?>
<?php ob_start(); ?>
         <?php ob_start(); ?>
            <?php if (isset($component)) { $__componentOriginal159d6670770cb479b1921cea6416c26c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal159d6670770cb479b1921cea6416c26c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-logo-icon','data' => ['class' => 'size-5 fill-current text-accent-foreground']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-logo-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5 fill-current text-accent-foreground']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $attributes = $__attributesOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__attributesOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal159d6670770cb479b1921cea6416c26c)): ?>
<?php $component = $__componentOriginal159d6670770cb479b1921cea6416c26c; ?>
<?php unset($__componentOriginal159d6670770cb479b1921cea6416c26c); ?>
<?php endif; ?>
        <?php $__slotsefe143adda53c3e267703be384ec4a91['logo'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), ['class' => 'flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground']); ?>
    <?php $__slotsefe143adda53c3e267703be384ec4a91['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsefe143adda53c3e267703be384ec4a91); ?>
<?php _efe143adda53c3e267703be384ec4a91($__blaze, $__attrsefe143adda53c3e267703be384ec4a91, $__slotsefe143adda53c3e267703be384ec4a91, ['name', 'attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackefe143adda53c3e267703be384ec4a91)) { $__slotsefe143adda53c3e267703be384ec4a91 = array_pop($__slotsStackefe143adda53c3e267703be384ec4a91); } ?>
<?php if (! empty($__attrsStackefe143adda53c3e267703be384ec4a91)) { $__attrsefe143adda53c3e267703be384ec4a91 = array_pop($__attrsStackefe143adda53c3e267703be384ec4a91); } ?>
<?php $__blaze->popData(); ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH C:\projects\toy-joy-phase-1-documentation\resources\views/components/app-logo.blade.php ENDPATH**/ ?>