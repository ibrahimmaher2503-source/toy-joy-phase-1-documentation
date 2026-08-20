<?php # [BlazeFolded]:{flux::heading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::subheading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/subheading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::badge}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/badge/index.blade.php}:{1781799918} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title',
    'description' => null,
    'badge' => null,
    'badgeColor' => 'zinc',
    'requestId' => null,
    'breadcrumbs' => null,
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
    'title',
    'description' => null,
    'badge' => null,
    'badgeColor' => 'zinc',
    'requestId' => null,
    'breadcrumbs' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div <?php echo e($attributes->merge(['class' => 'app-page-header mb-6 w-full space-y-3 border-b border-border pb-5'])); ?>>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($breadcrumbs || isset($breadcrumbs)): ?>
        <div class="min-w-0 text-xs font-semibold tracking-wide text-text-muted" dir="auto">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($breadcrumbs)): ?>
                <?php echo e($breadcrumbs); ?>

            <?php else: ?>
                <?php echo e($breadcrumbs); ?>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="flex min-w-0 flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
        <div class="min-w-0 space-y-1">
            <div class="flex flex-wrap items-center gap-2.5">
                <?php ob_start(); ?><h1 class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-2xl [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2 font-bold tracking-[-0.03em] text-text-primary" data-flux-heading><?php ob_start(); ?>
                    <?php echo e($title); ?>

                <?php echo trim(ob_get_clean()); ?></h1>

        <!--[if ENDBLOCK]><![endif]--><?php echo ltrim(ob_get_clean()); ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($badge): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($badgeColor === 'primary'): ?>
                        <span class="inline-flex items-center rounded-md bg-primary-soft px-2 py-1 text-xs font-medium text-primary ring-1 ring-primary/20">
                            <?php echo e($badge); ?>

                        </span>
                    <?php else: ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/badge/index.blade.php', $__blaze->compiledPath.'/37b38441f2ce9fb75eb5edd8233bdbca.php'); ?>
<?php if (isset($__slots37b38441f2ce9fb75eb5edd8233bdbca)) { $__slotsStack37b38441f2ce9fb75eb5edd8233bdbca[] = $__slots37b38441f2ce9fb75eb5edd8233bdbca; } ?>
<?php if (isset($__attrs37b38441f2ce9fb75eb5edd8233bdbca)) { $__attrsStack37b38441f2ce9fb75eb5edd8233bdbca[] = $__attrs37b38441f2ce9fb75eb5edd8233bdbca; } ?>
<?php $__attrs37b38441f2ce9fb75eb5edd8233bdbca = ['size' => 'sm','color' => $badgeColor]; ?>
<?php $__slots37b38441f2ce9fb75eb5edd8233bdbca = []; ?>
<?php $__blaze->pushData($__attrs37b38441f2ce9fb75eb5edd8233bdbca); ?>
<?php ob_start(); ?>
                            <?php echo e($badge); ?>

                        <?php $__slots37b38441f2ce9fb75eb5edd8233bdbca['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots37b38441f2ce9fb75eb5edd8233bdbca); ?>
<?php _37b38441f2ce9fb75eb5edd8233bdbca($__blaze, $__attrs37b38441f2ce9fb75eb5edd8233bdbca, $__slots37b38441f2ce9fb75eb5edd8233bdbca, ['color'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack37b38441f2ce9fb75eb5edd8233bdbca)) { $__slots37b38441f2ce9fb75eb5edd8233bdbca = array_pop($__slotsStack37b38441f2ce9fb75eb5edd8233bdbca); } ?>
<?php if (! empty($__attrsStack37b38441f2ce9fb75eb5edd8233bdbca)) { $__attrs37b38441f2ce9fb75eb5edd8233bdbca = array_pop($__attrsStack37b38441f2ce9fb75eb5edd8233bdbca); } ?>
<?php $__blaze->popData(); ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($description): ?>
                <?php ob_start(); ?><div class="text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 max-w-2xl text-sm leading-6 text-text-muted" data-flux-subheading>
    <?php ob_start(); ?>
                    <?php echo e($description); ?>

                <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="flex w-full shrink-0 flex-wrap items-center gap-2.5 sm:w-auto sm:justify-end">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($requestId): ?>
                <?php ob_start(); ?><div data-flux-badge="data-flux-badge" class="inline-flex items-center font-medium whitespace-nowrap  [print-color-adjust:exact] text-xs py-1 **:data-flux-badge-icon:me-1 rounded-md px-2 text-zinc-700 [&amp;_button]:text-zinc-700! dark:text-zinc-200 dark:[&amp;_button]:text-zinc-200! bg-zinc-400/15 dark:bg-zinc-400/40 [&amp;:is(button)]:hover:bg-zinc-400/25 dark:[button]:hover:bg-zinc-400/50 font-mono text-xs" title="<?php echo e(__('Correlation ID')); ?>">
        <svg class="shrink-0 [:where(&amp;)]:size-4 size-3" data-flux-badge-icon="data-flux-badge-icon" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M8 3c-.988 0-1.908.286-2.682.78a.75.75 0 0 1-.806-1.266A6.5 6.5 0 0 1 14.5 8c0 1.665-.333 3.254-.936 4.704a.75.75 0 0 1-1.385-.577C12.708 10.857 13 9.464 13 8a5 5 0 0 0-5-5ZM3.55 4.282a.75.75 0 0 1 .23 1.036A4.973 4.973 0 0 0 3 8a.75.75 0 0 1-1.5 0c0-1.282.372-2.48 1.014-3.488a.75.75 0 0 1 1.036-.23ZM8 5.875A2.125 2.125 0 0 0 5.875 8a3.625 3.625 0 0 1-3.625 3.625H2.213a.75.75 0 1 1 .008-1.5h.03A2.125 2.125 0 0 0 4.376 8a3.625 3.625 0 1 1 7.25 0c0 .078-.001.156-.003.233a.75.75 0 1 1-1.5-.036c.002-.066.003-.131.003-.197A2.125 2.125 0 0 0 8 5.875ZM7.995 7.25a.75.75 0 0 1 .75.75 6.502 6.502 0 0 1-4.343 6.133.75.75 0 1 1-.498-1.415A5.002 5.002 0 0 0 7.245 8a.75.75 0 0 1 .75-.75Zm2.651 2.87a.75.75 0 0 1 .463.955 9.39 9.39 0 0 1-3.008 4.25.75.75 0 0 1-.936-1.171 7.892 7.892 0 0 0 2.527-3.57.75.75 0 0 1 .954-.463Z" clip-rule="evenodd"/>
</svg>

            
    <?php ob_start(); ?>
                    <?php echo e($requestId); ?>

                <?php echo trim(ob_get_clean()); ?>

    </div>
<?php echo ltrim(ob_get_clean()); ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($actions)): ?>
                <?php echo e($actions); ?>

            <?php elseif($slot->isNotEmpty()): ?>
                <?php echo e($slot); ?>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\projects\toy-joy-phase-1-documentation\resources\views/components/page-header.blade.php ENDPATH**/ ?>