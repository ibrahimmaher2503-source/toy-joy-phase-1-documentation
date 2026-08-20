<?php
if (!function_exists('__b854a3af8834ec3e91eea2266c26d262')):
function __b854a3af8834ec3e91eea2266c26d262($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
    'iconVariant' => 'mini',
    'size' => null,
];
$iconVariant ??= $attributes['icon-variant'] ?? $attributes['iconVariant'] ?? $__defaults['iconVariant']; unset($attributes['iconVariant'], $attributes['icon-variant']);
$size ??= $attributes['size'] ?? $__defaults['size']; unset($attributes['size']);
unset($__defaults);
?>

<?php
$attributes = $attributes->merge([
    'variant' => 'subtle',
    'class' => '-me-1 [[data-flux-input]:has(input:placeholder-shown)_&]:hidden [[data-flux-input]:has(input[disabled])_&]:hidden',
    'square' => true,
    'size' => null,
]);
?>

<?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php', $__blaze->compiledPath.'/a137de91fae332872b736a951544cc5c.php'); ?>
<?php if (isset($__slotsa137de91fae332872b736a951544cc5c)) { $__slotsStacka137de91fae332872b736a951544cc5c[] = $__slotsa137de91fae332872b736a951544cc5c; } ?>
<?php if (isset($__attrsa137de91fae332872b736a951544cc5c)) { $__attrsStacka137de91fae332872b736a951544cc5c[] = $__attrsa137de91fae332872b736a951544cc5c; } ?>
<?php $__attrsa137de91fae332872b736a951544cc5c = ['attributes' => $attributes,'size' => $size === 'sm' || $size === 'xs' ? 'xs' : 'sm','xData' => 'fluxInputClearable','xOn:click' => 'clear()','tabindex' => '-1','ariaLabel' => e(__('Clear input')),'dataFluxClearButton' => true]; ?>
<?php $__slotsa137de91fae332872b736a951544cc5c = []; ?>
<?php $__blaze->pushData($__attrsa137de91fae332872b736a951544cc5c); ?>
<?php ob_start(); ?>
    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/x-mark.blade.php', $__blaze->compiledPath.'/8738feb91ddbd35a2e2937c059fdad99.php'); ?>
<?php $__blaze->pushData(['variant' => $iconVariant]); ?>
<?php __8738feb91ddbd35a2e2937c059fdad99($__blaze, ['variant' => $iconVariant], [], ['variant'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
<?php $__slotsa137de91fae332872b736a951544cc5c['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slotsa137de91fae332872b736a951544cc5c); ?>
<?php __a137de91fae332872b736a951544cc5c($__blaze, $__attrsa137de91fae332872b736a951544cc5c, $__slotsa137de91fae332872b736a951544cc5c, ['attributes', 'size', 'dataFluxClearButton'], ['xData' => 'x-data', 'xOn:click' => 'x-on:click', 'ariaLabel' => 'aria-label', 'dataFluxClearButton' => 'data-flux-clear-button'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStacka137de91fae332872b736a951544cc5c)) { $__slotsa137de91fae332872b736a951544cc5c = array_pop($__slotsStacka137de91fae332872b736a951544cc5c); } ?>
<?php if (! empty($__attrsStacka137de91fae332872b736a951544cc5c)) { $__attrsa137de91fae332872b736a951544cc5c = array_pop($__attrsStacka137de91fae332872b736a951544cc5c); } ?>
<?php $__blaze->popData(); ?>
<?php
echo $__blaze->processPassthroughContent('ltrim', ltrim(ob_get_clean()));
} endif; ?><?php /**PATH C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/input/clearable.blade.php ENDPATH**/ ?>