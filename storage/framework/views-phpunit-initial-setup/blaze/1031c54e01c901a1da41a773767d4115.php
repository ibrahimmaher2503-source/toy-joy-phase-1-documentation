<?php
if (!function_exists('__1031c54e01c901a1da41a773767d4115')):
function __1031c54e01c901a1da41a773767d4115($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
    'name',
    'descriptionTrailing',
    'description',
    'label',
    'badge',
]));
?>

<?php $descriptionTrailing = $descriptionTrailing ??= $attributes->pluck('description:trailing'); ?>

<?php
$__defaults = [
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'descriptionTrailing' => null,
    'description' => null,
    'label' => null,
    'badge' => null,
];
$name ??= $attributes['name'] ?? $__defaults['name']; unset($attributes['name']);
$descriptionTrailing ??= $attributes['description-trailing'] ?? $attributes['descriptionTrailing'] ?? $__defaults['descriptionTrailing']; unset($attributes['descriptionTrailing'], $attributes['description-trailing']);
$description ??= $attributes['description'] ?? $__defaults['description']; unset($attributes['description']);
$label ??= $attributes['label'] ?? $__defaults['label']; unset($attributes['label']);
$badge ??= $attributes['badge'] ?? $__defaults['badge']; unset($attributes['badge']);
unset($__defaults);
?>

<?php if (isset($label) || isset($description) || isset($descriptionTrailing)): ?>
    <?php

        $fieldAttributes = Flux::attributesAfter('field:', $attributes, []);
        $labelAttributes = Flux::attributesAfter('label:', $attributes, ['badge' => $badge]);
        $descriptionAttributes = Flux::attributesAfter('description:', $attributes, []);
        $errorAttributes = Flux::attributesAfter('error:', $attributes, ['name' => $name]);
    ?>
    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/field.blade.php', $__blaze->compiledPath.'/7e709e73b7a09aeefef3cd2c0f6fcf4a.php'); ?>
<?php if (isset($__slots7e709e73b7a09aeefef3cd2c0f6fcf4a)) { $__slotsStack7e709e73b7a09aeefef3cd2c0f6fcf4a[] = $__slots7e709e73b7a09aeefef3cd2c0f6fcf4a; } ?>
<?php if (isset($__attrs7e709e73b7a09aeefef3cd2c0f6fcf4a)) { $__attrsStack7e709e73b7a09aeefef3cd2c0f6fcf4a[] = $__attrs7e709e73b7a09aeefef3cd2c0f6fcf4a; } ?>
<?php $__attrs7e709e73b7a09aeefef3cd2c0f6fcf4a = ['attributes' => $fieldAttributes]; ?>
<?php $__slots7e709e73b7a09aeefef3cd2c0f6fcf4a = []; ?>
<?php $__blaze->pushData($__attrs7e709e73b7a09aeefef3cd2c0f6fcf4a); ?>
<?php ob_start(); ?>
        <?php if (isset($label)): ?>
            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/label.blade.php', $__blaze->compiledPath.'/8c26b23e15c3fa7354ced6765d174869.php'); ?>
<?php if (isset($__slots8c26b23e15c3fa7354ced6765d174869)) { $__slotsStack8c26b23e15c3fa7354ced6765d174869[] = $__slots8c26b23e15c3fa7354ced6765d174869; } ?>
<?php if (isset($__attrs8c26b23e15c3fa7354ced6765d174869)) { $__attrsStack8c26b23e15c3fa7354ced6765d174869[] = $__attrs8c26b23e15c3fa7354ced6765d174869; } ?>
<?php $__attrs8c26b23e15c3fa7354ced6765d174869 = ['attributes' => $labelAttributes]; ?>
<?php $__slots8c26b23e15c3fa7354ced6765d174869 = []; ?>
<?php $__blaze->pushData($__attrs8c26b23e15c3fa7354ced6765d174869); ?>
<?php ob_start(); ?><?php echo e($label); ?><?php $__slots8c26b23e15c3fa7354ced6765d174869['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots8c26b23e15c3fa7354ced6765d174869); ?>
<?php __8c26b23e15c3fa7354ced6765d174869($__blaze, $__attrs8c26b23e15c3fa7354ced6765d174869, $__slots8c26b23e15c3fa7354ced6765d174869, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack8c26b23e15c3fa7354ced6765d174869)) { $__slots8c26b23e15c3fa7354ced6765d174869 = array_pop($__slotsStack8c26b23e15c3fa7354ced6765d174869); } ?>
<?php if (! empty($__attrsStack8c26b23e15c3fa7354ced6765d174869)) { $__attrs8c26b23e15c3fa7354ced6765d174869 = array_pop($__attrsStack8c26b23e15c3fa7354ced6765d174869); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>

        <?php if (isset($description)): ?>
            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/description.blade.php', $__blaze->compiledPath.'/852569568acfc001ad615894cdc093e9.php'); ?>
<?php if (isset($__slots852569568acfc001ad615894cdc093e9)) { $__slotsStack852569568acfc001ad615894cdc093e9[] = $__slots852569568acfc001ad615894cdc093e9; } ?>
<?php if (isset($__attrs852569568acfc001ad615894cdc093e9)) { $__attrsStack852569568acfc001ad615894cdc093e9[] = $__attrs852569568acfc001ad615894cdc093e9; } ?>
<?php $__attrs852569568acfc001ad615894cdc093e9 = ['attributes' => $descriptionAttributes]; ?>
<?php $__slots852569568acfc001ad615894cdc093e9 = []; ?>
<?php $__blaze->pushData($__attrs852569568acfc001ad615894cdc093e9); ?>
<?php ob_start(); ?><?php echo e($description); ?><?php $__slots852569568acfc001ad615894cdc093e9['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots852569568acfc001ad615894cdc093e9); ?>
<?php __852569568acfc001ad615894cdc093e9($__blaze, $__attrs852569568acfc001ad615894cdc093e9, $__slots852569568acfc001ad615894cdc093e9, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack852569568acfc001ad615894cdc093e9)) { $__slots852569568acfc001ad615894cdc093e9 = array_pop($__slotsStack852569568acfc001ad615894cdc093e9); } ?>
<?php if (! empty($__attrsStack852569568acfc001ad615894cdc093e9)) { $__attrs852569568acfc001ad615894cdc093e9 = array_pop($__attrsStack852569568acfc001ad615894cdc093e9); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>

        <?php echo e($slot); ?>


        
        [STARTCOMPILEDUNBLAZE:hDEITJeeVd]<?php \Livewire\Blaze\Unblaze::storeScope("hDEITJeeVd", scope: ['attributes' => $errorAttributes->getAttributes()]) ?>[ENDCOMPILEDUNBLAZE:hDEITJeeVd]

        <?php if (isset($descriptionTrailing)): ?>
            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/description.blade.php', $__blaze->compiledPath.'/852569568acfc001ad615894cdc093e9.php'); ?>
<?php if (isset($__slots852569568acfc001ad615894cdc093e9)) { $__slotsStack852569568acfc001ad615894cdc093e9[] = $__slots852569568acfc001ad615894cdc093e9; } ?>
<?php if (isset($__attrs852569568acfc001ad615894cdc093e9)) { $__attrsStack852569568acfc001ad615894cdc093e9[] = $__attrs852569568acfc001ad615894cdc093e9; } ?>
<?php $__attrs852569568acfc001ad615894cdc093e9 = ['attributes' => $descriptionAttributes]; ?>
<?php $__slots852569568acfc001ad615894cdc093e9 = []; ?>
<?php $__blaze->pushData($__attrs852569568acfc001ad615894cdc093e9); ?>
<?php ob_start(); ?><?php echo e($descriptionTrailing); ?><?php $__slots852569568acfc001ad615894cdc093e9['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots852569568acfc001ad615894cdc093e9); ?>
<?php __852569568acfc001ad615894cdc093e9($__blaze, $__attrs852569568acfc001ad615894cdc093e9, $__slots852569568acfc001ad615894cdc093e9, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack852569568acfc001ad615894cdc093e9)) { $__slots852569568acfc001ad615894cdc093e9 = array_pop($__slotsStack852569568acfc001ad615894cdc093e9); } ?>
<?php if (! empty($__attrsStack852569568acfc001ad615894cdc093e9)) { $__attrs852569568acfc001ad615894cdc093e9 = array_pop($__attrsStack852569568acfc001ad615894cdc093e9); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>
    <?php $__slots7e709e73b7a09aeefef3cd2c0f6fcf4a['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slots7e709e73b7a09aeefef3cd2c0f6fcf4a); ?>
<?php __7e709e73b7a09aeefef3cd2c0f6fcf4a($__blaze, $__attrs7e709e73b7a09aeefef3cd2c0f6fcf4a, $__slots7e709e73b7a09aeefef3cd2c0f6fcf4a, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack7e709e73b7a09aeefef3cd2c0f6fcf4a)) { $__slots7e709e73b7a09aeefef3cd2c0f6fcf4a = array_pop($__slotsStack7e709e73b7a09aeefef3cd2c0f6fcf4a); } ?>
<?php if (! empty($__attrsStack7e709e73b7a09aeefef3cd2c0f6fcf4a)) { $__attrs7e709e73b7a09aeefef3cd2c0f6fcf4a = array_pop($__attrsStack7e709e73b7a09aeefef3cd2c0f6fcf4a); } ?>
<?php $__blaze->popData(); ?>
<?php else: ?>
    <?php echo e($slot); ?>

<?php endif; ?>
<?php
echo $__blaze->processPassthroughContent('ltrim', ltrim(ob_get_clean()));
} endif; ?><?php /**PATH C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/with-field.blade.php ENDPATH**/ ?>