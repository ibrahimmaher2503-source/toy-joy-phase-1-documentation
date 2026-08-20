<?php
if (!function_exists('__9c09a79c77603e123bca707b7f9dfeba')):
function __9c09a79c77603e123bca707b7f9dfeba($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
$__defaults = [
    'interactive' => null,
    'position' => 'top',
    'align' => 'center',
    'content' => null,
    'kbd' => null,
    'toggleable' => null,
];
$interactive ??= $attributes['interactive'] ?? $__defaults['interactive']; unset($attributes['interactive']);
$position ??= $attributes['position'] ?? $__defaults['position']; unset($attributes['position']);
$align ??= $attributes['align'] ?? $__defaults['align']; unset($attributes['align']);
$content ??= $attributes['content'] ?? $__defaults['content']; unset($attributes['content']);
$kbd ??= $attributes['kbd'] ?? $__defaults['kbd']; unset($attributes['kbd']);
$toggleable ??= $attributes['toggleable'] ?? $__defaults['toggleable']; unset($attributes['toggleable']);
unset($__defaults);
?>

<?php
// Support adding the .self modifier to the wire:model directive...
if (($wireModel = $attributes->wire('model')) && $wireModel->directive && ! $wireModel->hasModifier('self')) {
    unset($attributes[$wireModel->directive]);

    $wireModel->directive .= '.self';

    $attributes = $attributes->merge([$wireModel->directive => $wireModel->value]);
}
?>

<?php if ($toggleable): ?>
    <ui-dropdown position="<?php echo e($position); ?> <?php echo e($align); ?>" <?php echo e($attributes); ?> data-flux-tooltip>
        <?php echo e($slot); ?>


        <?php if ($content !== null): ?>
            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/content.blade.php', $__blaze->compiledPath.'/09b89d899e722262f03208b9919ee093.php'); ?>
<?php if (isset($__slots09b89d899e722262f03208b9919ee093)) { $__slotsStack09b89d899e722262f03208b9919ee093[] = $__slots09b89d899e722262f03208b9919ee093; } ?>
<?php if (isset($__attrs09b89d899e722262f03208b9919ee093)) { $__attrsStack09b89d899e722262f03208b9919ee093[] = $__attrs09b89d899e722262f03208b9919ee093; } ?>
<?php $__attrs09b89d899e722262f03208b9919ee093 = ['kbd' => $kbd]; ?>
<?php $__slots09b89d899e722262f03208b9919ee093 = []; ?>
<?php $__blaze->pushData($__attrs09b89d899e722262f03208b9919ee093); ?>
<?php ob_start(); ?><?php echo e($content); ?><?php $__slots09b89d899e722262f03208b9919ee093['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots09b89d899e722262f03208b9919ee093); ?>
<?php __09b89d899e722262f03208b9919ee093($__blaze, $__attrs09b89d899e722262f03208b9919ee093, $__slots09b89d899e722262f03208b9919ee093, ['kbd'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack09b89d899e722262f03208b9919ee093)) { $__slots09b89d899e722262f03208b9919ee093 = array_pop($__slotsStack09b89d899e722262f03208b9919ee093); } ?>
<?php if (! empty($__attrsStack09b89d899e722262f03208b9919ee093)) { $__attrs09b89d899e722262f03208b9919ee093 = array_pop($__attrsStack09b89d899e722262f03208b9919ee093); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>
    </ui-dropdown>
<?php else: ?>
    <ui-tooltip position="<?php echo e($position); ?> <?php echo e($align); ?>" <?php echo e($attributes); ?> data-flux-tooltip <?php if($interactive): ?> interactive <?php endif; ?>>
        <?php echo e($slot); ?>


        <?php if ($content !== null): ?>
            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/content.blade.php', $__blaze->compiledPath.'/09b89d899e722262f03208b9919ee093.php'); ?>
<?php if (isset($__slots09b89d899e722262f03208b9919ee093)) { $__slotsStack09b89d899e722262f03208b9919ee093[] = $__slots09b89d899e722262f03208b9919ee093; } ?>
<?php if (isset($__attrs09b89d899e722262f03208b9919ee093)) { $__attrsStack09b89d899e722262f03208b9919ee093[] = $__attrs09b89d899e722262f03208b9919ee093; } ?>
<?php $__attrs09b89d899e722262f03208b9919ee093 = ['kbd' => $kbd]; ?>
<?php $__slots09b89d899e722262f03208b9919ee093 = []; ?>
<?php $__blaze->pushData($__attrs09b89d899e722262f03208b9919ee093); ?>
<?php ob_start(); ?><?php echo e($content); ?><?php $__slots09b89d899e722262f03208b9919ee093['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots09b89d899e722262f03208b9919ee093); ?>
<?php __09b89d899e722262f03208b9919ee093($__blaze, $__attrs09b89d899e722262f03208b9919ee093, $__slots09b89d899e722262f03208b9919ee093, ['kbd'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack09b89d899e722262f03208b9919ee093)) { $__slots09b89d899e722262f03208b9919ee093 = array_pop($__slotsStack09b89d899e722262f03208b9919ee093); } ?>
<?php if (! empty($__attrsStack09b89d899e722262f03208b9919ee093)) { $__attrs09b89d899e722262f03208b9919ee093 = array_pop($__attrsStack09b89d899e722262f03208b9919ee093); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>
    </ui-tooltip>
<?php endif; ?>
<?php
echo $__blaze->processPassthroughContent('ltrim', ltrim(ob_get_clean()));
} endif; ?><?php /**PATH C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/index.blade.php ENDPATH**/ ?>