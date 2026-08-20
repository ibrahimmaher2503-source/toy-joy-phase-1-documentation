<?php
if (!function_exists('_6253c76b2afc28af5d2cf66445a8b347')):
function _6253c76b2afc28af5d2cf66445a8b347($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;
$__slots['slot'] ??= new \Illuminate\View\ComponentSlot('');
if (($__data['attributes'] ?? null) instanceof \Illuminate\View\ComponentAttributeBag) { $__data = $__data + $__data['attributes']->all(); unset($__data['attributes']); }
extract($__slots, EXTR_SKIP); unset($__slots);
extract($__data, EXTR_SKIP);
$attributes = \Livewire\Blaze\Runtime\BlazeAttributeBag::make($__data, $__bound, $__keys);
unset($__data, $__bound, $__keys);
ob_start();
?>


<?php
extract(Flux::forwardedAttributes($attributes, [
    'tooltipPosition',
    'tooltipKbd',
    'tooltip',
]));
?>

<?php $tooltipPosition = $tooltipPosition ??= $attributes->pluck('tooltip:position'); ?>
<?php $tooltipKbd = $tooltipKbd ??= $attributes->pluck('tooltip:kbd'); ?>
<?php $tooltip = $tooltip ??= $attributes->pluck('tooltip'); ?>

<?php
$__defaults = [
    'tooltipPosition' => 'top',
    'tooltipKbd' => null,
    'tooltip' => null,
];
$tooltipPosition ??= $attributes['tooltip-position'] ?? $attributes['tooltipPosition'] ?? $__defaults['tooltipPosition']; unset($attributes['tooltipPosition'], $attributes['tooltip-position']);
$tooltipKbd ??= $attributes['tooltip-kbd'] ?? $attributes['tooltipKbd'] ?? $__defaults['tooltipKbd']; unset($attributes['tooltipKbd'], $attributes['tooltip-kbd']);
$tooltip ??= $attributes['tooltip'] ?? $__defaults['tooltip']; unset($attributes['tooltip']);
unset($__defaults);
?>

<?php if ($tooltip): ?>
    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/index.blade.php', $__blaze->compiledPath.'/9c09a79c77603e123bca707b7f9dfeba.php'); ?>
<?php if (isset($__slots9c09a79c77603e123bca707b7f9dfeba)) { $__slotsStack9c09a79c77603e123bca707b7f9dfeba[] = $__slots9c09a79c77603e123bca707b7f9dfeba; } ?>
<?php if (isset($__attrs9c09a79c77603e123bca707b7f9dfeba)) { $__attrsStack9c09a79c77603e123bca707b7f9dfeba[] = $__attrs9c09a79c77603e123bca707b7f9dfeba; } ?>
<?php $__attrs9c09a79c77603e123bca707b7f9dfeba = ['content' => $tooltip,'position' => $tooltipPosition,'kbd' => $tooltipKbd]; ?>
<?php $__slots9c09a79c77603e123bca707b7f9dfeba = []; ?>
<?php $__blaze->pushData($__attrs9c09a79c77603e123bca707b7f9dfeba); ?>
<?php ob_start(); ?>
        <?php echo e($slot); ?>

    <?php $__slots9c09a79c77603e123bca707b7f9dfeba['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots9c09a79c77603e123bca707b7f9dfeba); ?>
<?php _9c09a79c77603e123bca707b7f9dfeba($__blaze, $__attrs9c09a79c77603e123bca707b7f9dfeba, $__slots9c09a79c77603e123bca707b7f9dfeba, ['content', 'position', 'kbd'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack9c09a79c77603e123bca707b7f9dfeba)) { $__slots9c09a79c77603e123bca707b7f9dfeba = array_pop($__slotsStack9c09a79c77603e123bca707b7f9dfeba); } ?>
<?php if (! empty($__attrsStack9c09a79c77603e123bca707b7f9dfeba)) { $__attrs9c09a79c77603e123bca707b7f9dfeba = array_pop($__attrsStack9c09a79c77603e123bca707b7f9dfeba); } ?>
<?php $__blaze->popData(); ?>
<?php else: ?>
    <?php echo e($slot); ?>

<?php endif; ?>
<?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/with-tooltip.blade.php ENDPATH**/ ?>