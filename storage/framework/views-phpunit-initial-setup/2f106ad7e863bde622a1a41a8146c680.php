<?php
if (!function_exists('_2f106ad7e863bde622a1a41a8146c680')):
function _2f106ad7e863bde622a1a41a8146c680($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;

if (($__data['attributes'] ?? null) instanceof \Illuminate\View\ComponentAttributeBag) { $__data = $__data + $__data['attributes']->all(); unset($__data['attributes']); }
extract($__slots, EXTR_SKIP); unset($__slots);
extract($__data, EXTR_SKIP);
$attributes = \Livewire\Blaze\Runtime\BlazeAttributeBag::make($__data, $__bound, $__keys);
unset($__data, $__bound, $__keys);
ob_start();
?>


<?php
$__defaults = [
    'name' => null,
    'align' => 'right',
    'checked' => null
];
$name ??= $attributes['name'] ?? $__defaults['name']; unset($attributes['name']);
$align ??= $attributes['align'] ?? $__defaults['align']; unset($attributes['align']);
$checked ??= $attributes['checked'] ?? $__defaults['checked']; unset($attributes['checked']);
unset($__defaults);
?>

<?php
// We only want to show the name attribute it has been set manually
// but not if it has been set from the `wire:model` attribute...
$showName = isset($name);
if (! isset($name)) {
    $name = $attributes->whereStartsWith('wire:model')->first();
}

$classes = Flux::classes()
    ->add('group h-5 w-8 min-w-8 relative inline-flex items-center outline-offset-2')
    ->add('rounded-full')
    ->add('transition')
    ->add('bg-zinc-800/15 [&[disabled]]:opacity-50 dark:bg-transparent dark:border dark:border-white/20 dark:[&[disabled]]:border-white/10')
    ->add('[print-color-adjust:exact]')
    ->add([
        'data-checked:bg-(--color-accent)',
        'data-checked:border-0',
    ])
    ;

$indicatorClasses = Flux::classes()
    ->add('size-3.5')
    ->add('rounded-full')
    ->add('transition translate-x-[0.1875rem] dark:translate-x-[0.125rem] rtl:-translate-x-[0.1875rem] dark:rtl:-translate-x-[0.125rem]')
    ->add('bg-white')
    ->add([
        'group-data-checked:translate-x-[0.9375rem] rtl:group-data-checked:-translate-x-[0.9375rem]',
        // We have to add the dark variant of the `translate-x-[0.9375rem]` to ensure that if `.dark` is added to an element mid way
        // down the DOM instead of on the root HTML element, that the above `dark:translate-x-[0.125rem]` doesn't over ride it...
        'dark:group-data-checked:translate-x-[0.9375rem] dark:rtl:group-data-checked:-translate-x-[0.9375rem]',
        'group-data-checked:bg-(--color-accent-foreground)',
    ]);
?>

<?php if ($align === 'left' || $align === 'start'): ?>
    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/with-inline-field.blade.php', $__blaze->compiledPath.'/bdfd2066a7d1b0f3f002df5d11f3af86.php'); ?>
<?php if (isset($__slotsbdfd2066a7d1b0f3f002df5d11f3af86)) { $__slotsStackbdfd2066a7d1b0f3f002df5d11f3af86[] = $__slotsbdfd2066a7d1b0f3f002df5d11f3af86; } ?>
<?php if (isset($__attrsbdfd2066a7d1b0f3f002df5d11f3af86)) { $__attrsStackbdfd2066a7d1b0f3f002df5d11f3af86[] = $__attrsbdfd2066a7d1b0f3f002df5d11f3af86; } ?>
<?php $__attrsbdfd2066a7d1b0f3f002df5d11f3af86 = ['attributes' => $attributes]; ?>
<?php $__slotsbdfd2066a7d1b0f3f002df5d11f3af86 = []; ?>
<?php $__blaze->pushData($__attrsbdfd2066a7d1b0f3f002df5d11f3af86); ?>
<?php ob_start(); ?>
        <ui-switch <?php echo e($attributes->class($classes)); ?> <?php if($showName): ?> name="<?php echo e($name); ?>" <?php endif; ?> <?php if($checked): ?> checked data-checked <?php endif; ?> data-flux-control data-flux-switch>
            <span class="<?php echo e(\Illuminate\Support\Arr::toCssClasses($indicatorClasses)); ?>"></span>
        </ui-switch>
    <?php $__slotsbdfd2066a7d1b0f3f002df5d11f3af86['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsbdfd2066a7d1b0f3f002df5d11f3af86); ?>
<?php _bdfd2066a7d1b0f3f002df5d11f3af86($__blaze, $__attrsbdfd2066a7d1b0f3f002df5d11f3af86, $__slotsbdfd2066a7d1b0f3f002df5d11f3af86, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackbdfd2066a7d1b0f3f002df5d11f3af86)) { $__slotsbdfd2066a7d1b0f3f002df5d11f3af86 = array_pop($__slotsStackbdfd2066a7d1b0f3f002df5d11f3af86); } ?>
<?php if (! empty($__attrsStackbdfd2066a7d1b0f3f002df5d11f3af86)) { $__attrsbdfd2066a7d1b0f3f002df5d11f3af86 = array_pop($__attrsStackbdfd2066a7d1b0f3f002df5d11f3af86); } ?>
<?php $__blaze->popData(); ?>
<?php else: ?>
    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/with-reversed-inline-field.blade.php', $__blaze->compiledPath.'/a32d3b7e108eddbe3cd8bd71f5354fcd.php'); ?>
<?php if (isset($__slotsa32d3b7e108eddbe3cd8bd71f5354fcd)) { $__slotsStacka32d3b7e108eddbe3cd8bd71f5354fcd[] = $__slotsa32d3b7e108eddbe3cd8bd71f5354fcd; } ?>
<?php if (isset($__attrsa32d3b7e108eddbe3cd8bd71f5354fcd)) { $__attrsStacka32d3b7e108eddbe3cd8bd71f5354fcd[] = $__attrsa32d3b7e108eddbe3cd8bd71f5354fcd; } ?>
<?php $__attrsa32d3b7e108eddbe3cd8bd71f5354fcd = ['attributes' => $attributes]; ?>
<?php $__slotsa32d3b7e108eddbe3cd8bd71f5354fcd = []; ?>
<?php $__blaze->pushData($__attrsa32d3b7e108eddbe3cd8bd71f5354fcd); ?>
<?php ob_start(); ?>
        <ui-switch <?php echo e($attributes->class($classes)); ?> <?php if($showName): ?> name="<?php echo e($name); ?>" <?php endif; ?> <?php if($checked): ?> checked data-checked <?php endif; ?> data-flux-control data-flux-switch>
            <span class="<?php echo e(\Illuminate\Support\Arr::toCssClasses($indicatorClasses)); ?>"></span>
        </ui-switch>
    <?php $__slotsa32d3b7e108eddbe3cd8bd71f5354fcd['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsa32d3b7e108eddbe3cd8bd71f5354fcd); ?>
<?php _a32d3b7e108eddbe3cd8bd71f5354fcd($__blaze, $__attrsa32d3b7e108eddbe3cd8bd71f5354fcd, $__slotsa32d3b7e108eddbe3cd8bd71f5354fcd, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStacka32d3b7e108eddbe3cd8bd71f5354fcd)) { $__slotsa32d3b7e108eddbe3cd8bd71f5354fcd = array_pop($__slotsStacka32d3b7e108eddbe3cd8bd71f5354fcd); } ?>
<?php if (! empty($__attrsStacka32d3b7e108eddbe3cd8bd71f5354fcd)) { $__attrsa32d3b7e108eddbe3cd8bd71f5354fcd = array_pop($__attrsStacka32d3b7e108eddbe3cd8bd71f5354fcd); } ?>
<?php $__blaze->popData(); ?>
<?php endif; ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/switch.blade.php ENDPATH**/ ?>