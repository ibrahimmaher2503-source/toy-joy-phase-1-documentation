<?php
if (!function_exists('__fa11af15d0b0fe0184ebe15ad18d79f6')):
function __fa11af15d0b0fe0184ebe15ad18d79f6($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
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
    'direction' => null,
    'sorted' => false,
];
$direction ??= $attributes['direction'] ?? $__defaults['direction']; unset($attributes['direction']);
$sorted ??= $attributes['sorted'] ?? $__defaults['sorted']; unset($attributes['sorted']);
unset($__defaults);
?>

<?php
$classes = Flux::classes()
    ->add('flex items-center gap-1 -my-1 -ms-2 -me-2 px-2 py-1 ')
    ->add('in-[.group\/end-align]:flex-row-reverse in-[.group\/end-align]:-me-2 in-[.group\/end-align]:-ms-8')
    ;
?>

<button type="button" <?php echo e($attributes->class($classes)); ?> data-flux-table-sortable>
    <?php echo e($slot); ?>


    <div class="rounded-sm text-zinc-400 group-hover/sortable:text-zinc-800 dark:group-hover/sortable:text-white">
        <?php if ($sorted): ?>
            <?php if ($direction === 'asc'): ?>
                <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/chevron-up.blade.php', $__blaze->compiledPath.'/8f166656d11fc32bfefaadb47b7c9557.php'); ?>
<?php $__blaze->pushData(['variant' => 'micro']); ?>
<?php __8f166656d11fc32bfefaadb47b7c9557($__blaze, ['variant' => 'micro'], [], [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
            <?php elseif ($direction === 'desc'): ?>
                <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/chevron-down.blade.php', $__blaze->compiledPath.'/d54033b50f0153bcd623808a4d285d64.php'); ?>
<?php $__blaze->pushData(['variant' => 'micro']); ?>
<?php __d54033b50f0153bcd623808a4d285d64($__blaze, ['variant' => 'micro'], [], [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
            <?php else: ?>
                <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/chevron-down.blade.php', $__blaze->compiledPath.'/d54033b50f0153bcd623808a4d285d64.php'); ?>
<?php $__blaze->pushData(['variant' => 'micro']); ?>
<?php __d54033b50f0153bcd623808a4d285d64($__blaze, ['variant' => 'micro'], [], [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
            <?php endif; ?>
        <?php else: ?>
            <div class="opacity-0 group-hover/sortable:opacity-100">
                <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/chevron-down.blade.php', $__blaze->compiledPath.'/d54033b50f0153bcd623808a4d285d64.php'); ?>
<?php $__blaze->pushData(['variant' => 'micro']); ?>
<?php __d54033b50f0153bcd623808a4d285d64($__blaze, ['variant' => 'micro'], [], [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>
            </div>
        <?php endif; ?>
    </div>
</button>
<?php
echo $__blaze->processPassthroughContent('ltrim', ltrim(ob_get_clean()));
} endif; ?><?php /**PATH C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/table/sortable.blade.php ENDPATH**/ ?>