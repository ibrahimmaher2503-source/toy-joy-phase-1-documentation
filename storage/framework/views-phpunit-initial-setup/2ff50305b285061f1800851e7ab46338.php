<?php # [BlazeFolded]:{flux::heading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1781799918} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => null,
    'description' => null,
    'icon' => 'inbox',
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
    'title' => null,
    'description' => null,
    'icon' => 'inbox',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div <?php echo e($attributes->merge(['class' => 'my-3 flex flex-col items-center justify-center space-y-3 rounded-xl border border-dashed border-border bg-surface-muted/40 p-6 text-center'])); ?> role="status">
    <div class="flex size-10 items-center justify-center rounded-full bg-surface-muted text-text-muted">
        <?php $blaze_memoized_key = \Livewire\Blaze\Memoizer\Memo::key("flux::icon", ['name' => $icon, 'class' => 'size-6 shrink-0']); ?><?php if ($blaze_memoized_key !== null && \Livewire\Blaze\Memoizer\Memo::has($blaze_memoized_key)) : ?><?php echo \Livewire\Blaze\Memoizer\Memo::get($blaze_memoized_key); ?><?php else : ?><?php ob_start(); ?><?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php', $__blaze->compiledPath.'/0ef6a38bec8617e0691200e9ecc57327.php'); ?>
<?php $__blaze->pushData(['name' => $icon,'class' => 'size-6 shrink-0']); ?>
<?php _0ef6a38bec8617e0691200e9ecc57327($__blaze, ['name' => $icon,'class' => 'size-6 shrink-0'], [], ['name'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?><?php $blaze_memoized_html = ob_get_clean(); ?><?php if ($blaze_memoized_key !== null) { \Livewire\Blaze\Memoizer\Memo::put($blaze_memoized_key, $blaze_memoized_html); } ?><?php echo $blaze_memoized_html; ?><?php endif; ?>
    </div>

    <div class="max-w-md space-y-1">
        <?php ob_start(); ?><h3 class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-base [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2 font-semibold text-text-primary" data-flux-heading><?php ob_start(); ?>
            <?php echo e($title ?? __('No records found')); ?>

        <?php echo trim(ob_get_clean()); ?></h3>

        <!--[if ENDBLOCK]><![endif]--><?php echo ltrim(ob_get_clean()); ?>

        <?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 text-sm leading-6 text-text-muted" data-flux-text ><?php ob_start(); ?>
            <?php echo e($description ?? __('No records match the current filters.')); ?>

        <?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($action)): ?>
        <div class="pt-2">
            <?php echo e($action); ?>

        </div>
    <?php elseif($slot->isNotEmpty()): ?>
        <div class="pt-2">
            <?php echo e($slot); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH C:\projects\toy-joy-phase-1-documentation\resources\views/components/state/empty.blade.php ENDPATH**/ ?>