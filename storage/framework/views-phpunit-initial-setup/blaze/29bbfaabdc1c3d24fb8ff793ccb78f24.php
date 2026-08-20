<?php
if (!function_exists('__29bbfaabdc1c3d24fb8ff793ccb78f24')):
function __29bbfaabdc1c3d24fb8ff793ccb78f24($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;
$__livewire = $__env->shared('__livewire');
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
    'dismissible' => null,
    'position' => null,
    'closable' => null,
    'trigger' => null,
    'variant' => null,
    'scroll' => null,
    'flyout' => null,
    'name' => null,
];
$dismissible ??= $attributes['dismissible'] ?? $__defaults['dismissible']; unset($attributes['dismissible']);
$position ??= $attributes['position'] ?? $__defaults['position']; unset($attributes['position']);
$closable ??= $attributes['closable'] ?? $__defaults['closable']; unset($attributes['closable']);
$trigger ??= $attributes['trigger'] ?? $__defaults['trigger']; unset($attributes['trigger']);
$variant ??= $attributes['variant'] ?? $__defaults['variant']; unset($attributes['variant']);
$scroll ??= $attributes['scroll'] ?? $__defaults['scroll']; unset($attributes['scroll']);
$flyout ??= $attributes['flyout'] ?? $__defaults['flyout']; unset($attributes['flyout']);
$name ??= $attributes['name'] ?? $__defaults['name']; unset($attributes['name']);
unset($__defaults);
?>

<?php
// Blaze doesn't support View::share, this supplements it...
$__livewire = $__env->shared('__livewire');

if ($variant === 'flyout') {
    $flyout = true;
    $variant = null;
}

$closable ??= $variant === 'bare' ? false : true;
$overflow = $scroll === 'body' && ! $flyout;

if ($flyout) {
    $classes = Flux::classes()
        ->add(match ($variant) {
            default => match($position) {
                // For bottom flyout we intentionally use 100% instead of 100vw because Firefox includes scrollbar gutter in vw...
                'bottom' => 'fixed m-0 p-8 min-w-[100%] overflow-y-auto mt-auto [--flux-flyout-translate:translateY(50px)] border-t',
                'left' => 'fixed m-0 p-8 max-h-dvh min-h-dvh md:[:where(&)]:min-w-[25rem] overflow-y-auto mr-auto [--flux-flyout-translate:translateX(-50px)] border-e rtl:mr-0 rtl:ml-auto rtl:[--flux-flyout-translate:translateX(50px)]',
                default => 'fixed m-0 p-8 max-h-dvh min-h-dvh md:[:where(&)]:min-w-[25rem] overflow-y-auto ml-auto [--flux-flyout-translate:translateX(50px)] border-s rtl:ml-0 rtl:mr-auto rtl:[--flux-flyout-translate:translateX(-50px)]',
            },
            'floating' => match($position) {
                // For bottom flyout we intentionally use 100% instead of 100vw because Firefox includes scrollbar gutter in vw...
                'bottom' => 'fixed m-2 p-8 min-w-[calc(100%-1rem)] overflow-y-auto mt-auto [--flux-flyout-translate:translateY(50px)]',
                'left' => 'fixed m-2 p-8 max-h-[calc(100dvh-1rem)] min-h-[calc(100dvh-1rem)] md:[:where(&)]:min-w-[25rem] overflow-y-auto mr-auto [--flux-flyout-translate:translateX(-50px)] rtl:mr-0 rtl:ml-auto rtl:[--flux-flyout-translate:translateX(50px)]',
                default => 'fixed m-2 p-8 max-h-[calc(100dvh-1rem)] min-h-[calc(100dvh-1rem)] md:[:where(&)]:min-w-[25rem] overflow-y-auto ml-auto [--flux-flyout-translate:translateX(50px)] rtl:ml-0 rtl:mr-auto rtl:[--flux-flyout-translate:translateX(-50px)]',
            },
            'bare' => '',
        })
        ->add(match ($variant) {
            default => 'bg-white dark:bg-zinc-800 border-transparent dark:border-zinc-700',
            'floating' => 'bg-white dark:bg-zinc-800 ring ring-black/5 dark:ring-zinc-700 shadow-lg rounded-xl',
            'bare' => 'bg-transparent',
        });
} elseif ($overflow) {
    $classes = Flux::classes();

    $contentClasses = Flux::classes()
        ->add('relative')
        ->add(match ($variant) {
            default => 'p-6 [:where(&)]:max-w-xl [:where(&)]:min-w-xs shadow-lg rounded-xl',
            'bare' => '',
        })
        ->add(match ($variant) {
            default => 'bg-white dark:bg-zinc-800 ring ring-black/5 dark:ring-zinc-700 shadow-lg rounded-xl',
            'bare' => 'bg-transparent',
        });
} else {
    $classes = Flux::classes()
        ->add(match ($variant) {
            default => 'p-6 [:where(&)]:max-w-xl [:where(&)]:min-w-xs shadow-lg rounded-xl',
            'bare' => '',
        })
        ->add(match ($variant) {
            default => 'bg-white dark:bg-zinc-800 ring ring-black/5 dark:ring-zinc-700 shadow-lg rounded-xl',
            'bare' => 'bg-transparent',
        });
}

// Support adding the .self modifier to the wire:model directive...
if (($wireModel = $attributes->wire('model')) && $wireModel->directive && ! $wireModel->hasModifier('self')) {
    unset($attributes[$wireModel->directive]);

    $wireModel->directive .= '.self';

    $attributes = $attributes->merge([$wireModel->directive => $wireModel->value]);
}

if ($attributes['@close'] ?? null) {
    $attributes['wire:close'] = $attributes['@close'];

    unset($attributes['@close']);
}

if ($attributes['@cancel'] ?? null) {
    $attributes['wire:cancel'] = $attributes['@cancel'];

    unset($attributes['@cancel']);
}

if ($dismissible === false) {
    $attributes = $attributes->merge(['disable-click-outside' => '']);
}

[ $contentAttributes, $attributes ] = Flux::splitAttributes($attributes, ['autofocus', 'class', 'style']);
[ $dialogAttributes, $attributes ] = Flux::splitAttributes($attributes, ['wire:close', 'x-on:close', 'wire:cancel', 'x-on:cancel']);

if (! $overflow) {
    $dialogAttributes = $dialogAttributes->merge($contentAttributes->getAttributes());
}
?>

<ui-modal <?php echo e($attributes); ?> data-flux-modal>
    <?php if ($trigger): ?>
        <?php echo e($trigger); ?>

    <?php endif; ?>

    <dialog
        wire:ignore.self 
        <?php echo e($dialogAttributes->class($classes)); ?>

        <?php if ($name): ?> data-modal="<?php echo e($name); ?>" <?php endif; ?>
        <?php if ($flyout): ?> data-flux-flyout <?php endif; ?>
        <?php if ($overflow): ?> data-flux-modal-overflow <?php endif; ?>
        [STARTCOMPILEDUNBLAZE:syue6t31BL]<?php \Livewire\Blaze\Unblaze::storeScope("syue6t31BL", scope: ['name' => $name]) ?>[ENDCOMPILEDUNBLAZE:syue6t31BL]
        x-on:modal-show.document="handleShow($event)"
        x-on:modal-close.document="handleClose($event)"
    >
        <?php if ($overflow): ?>
            <div class="flex min-h-full items-center justify-center p-4 sm:p-6">
                <div <?php echo e($contentAttributes->class($contentClasses)); ?> data-flux-modal-content>
                    <?php echo e($slot); ?>


                    <?php if ($closable): ?>
                        <div class="absolute top-0 end-0 mt-4 me-4">
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/modal/close.blade.php', $__blaze->compiledPath.'/db2aef950ac49b078c7e8f501b0e2bad.php'); ?>
<?php if (isset($__slotsdb2aef950ac49b078c7e8f501b0e2bad)) { $__slotsStackdb2aef950ac49b078c7e8f501b0e2bad[] = $__slotsdb2aef950ac49b078c7e8f501b0e2bad; } ?>
<?php if (isset($__attrsdb2aef950ac49b078c7e8f501b0e2bad)) { $__attrsStackdb2aef950ac49b078c7e8f501b0e2bad[] = $__attrsdb2aef950ac49b078c7e8f501b0e2bad; } ?>
<?php $__attrsdb2aef950ac49b078c7e8f501b0e2bad = []; ?>
<?php $__slotsdb2aef950ac49b078c7e8f501b0e2bad = []; ?>
<?php $__blaze->pushData($__attrsdb2aef950ac49b078c7e8f501b0e2bad); ?>
<?php ob_start(); ?>
                                <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php', $__blaze->compiledPath.'/a137de91fae332872b736a951544cc5c.php'); ?>
<?php if (isset($__slotsa137de91fae332872b736a951544cc5c)) { $__slotsStacka137de91fae332872b736a951544cc5c[] = $__slotsa137de91fae332872b736a951544cc5c; } ?>
<?php if (isset($__attrsa137de91fae332872b736a951544cc5c)) { $__attrsStacka137de91fae332872b736a951544cc5c[] = $__attrsa137de91fae332872b736a951544cc5c; } ?>
<?php $__attrsa137de91fae332872b736a951544cc5c = ['variant' => 'ghost','icon' => 'x-mark','size' => 'sm','ariaLabel' => e(__('Close modal')),'class' => 'text-zinc-400! hover:text-zinc-800! dark:text-zinc-500! dark:hover:text-white!']; ?>
<?php $__slotsa137de91fae332872b736a951544cc5c = []; ?>
<?php $__blaze->pushData($__attrsa137de91fae332872b736a951544cc5c); ?>
<?php ob_start(); ?><?php $__slotsa137de91fae332872b736a951544cc5c['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slotsa137de91fae332872b736a951544cc5c); ?>
<?php __a137de91fae332872b736a951544cc5c($__blaze, $__attrsa137de91fae332872b736a951544cc5c, $__slotsa137de91fae332872b736a951544cc5c, [], ['ariaLabel' => 'aria-label'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStacka137de91fae332872b736a951544cc5c)) { $__slotsa137de91fae332872b736a951544cc5c = array_pop($__slotsStacka137de91fae332872b736a951544cc5c); } ?>
<?php if (! empty($__attrsStacka137de91fae332872b736a951544cc5c)) { $__attrsa137de91fae332872b736a951544cc5c = array_pop($__attrsStacka137de91fae332872b736a951544cc5c); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__slotsdb2aef950ac49b078c7e8f501b0e2bad['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slotsdb2aef950ac49b078c7e8f501b0e2bad); ?>
<?php __db2aef950ac49b078c7e8f501b0e2bad($__blaze, $__attrsdb2aef950ac49b078c7e8f501b0e2bad, $__slotsdb2aef950ac49b078c7e8f501b0e2bad, [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackdb2aef950ac49b078c7e8f501b0e2bad)) { $__slotsdb2aef950ac49b078c7e8f501b0e2bad = array_pop($__slotsStackdb2aef950ac49b078c7e8f501b0e2bad); } ?>
<?php if (! empty($__attrsStackdb2aef950ac49b078c7e8f501b0e2bad)) { $__attrsdb2aef950ac49b078c7e8f501b0e2bad = array_pop($__attrsStackdb2aef950ac49b078c7e8f501b0e2bad); } ?>
<?php $__blaze->popData(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <?php echo e($slot); ?>


            <?php if ($closable): ?>
                <div class="absolute top-0 end-0 mt-4 me-4">
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/modal/close.blade.php', $__blaze->compiledPath.'/db2aef950ac49b078c7e8f501b0e2bad.php'); ?>
<?php if (isset($__slotsdb2aef950ac49b078c7e8f501b0e2bad)) { $__slotsStackdb2aef950ac49b078c7e8f501b0e2bad[] = $__slotsdb2aef950ac49b078c7e8f501b0e2bad; } ?>
<?php if (isset($__attrsdb2aef950ac49b078c7e8f501b0e2bad)) { $__attrsStackdb2aef950ac49b078c7e8f501b0e2bad[] = $__attrsdb2aef950ac49b078c7e8f501b0e2bad; } ?>
<?php $__attrsdb2aef950ac49b078c7e8f501b0e2bad = []; ?>
<?php $__slotsdb2aef950ac49b078c7e8f501b0e2bad = []; ?>
<?php $__blaze->pushData($__attrsdb2aef950ac49b078c7e8f501b0e2bad); ?>
<?php ob_start(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php', $__blaze->compiledPath.'/a137de91fae332872b736a951544cc5c.php'); ?>
<?php if (isset($__slotsa137de91fae332872b736a951544cc5c)) { $__slotsStacka137de91fae332872b736a951544cc5c[] = $__slotsa137de91fae332872b736a951544cc5c; } ?>
<?php if (isset($__attrsa137de91fae332872b736a951544cc5c)) { $__attrsStacka137de91fae332872b736a951544cc5c[] = $__attrsa137de91fae332872b736a951544cc5c; } ?>
<?php $__attrsa137de91fae332872b736a951544cc5c = ['variant' => 'ghost','icon' => 'x-mark','size' => 'sm','ariaLabel' => e(__('Close modal')),'class' => 'text-zinc-400! hover:text-zinc-800! dark:text-zinc-500! dark:hover:text-white!']; ?>
<?php $__slotsa137de91fae332872b736a951544cc5c = []; ?>
<?php $__blaze->pushData($__attrsa137de91fae332872b736a951544cc5c); ?>
<?php ob_start(); ?><?php $__slotsa137de91fae332872b736a951544cc5c['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slotsa137de91fae332872b736a951544cc5c); ?>
<?php __a137de91fae332872b736a951544cc5c($__blaze, $__attrsa137de91fae332872b736a951544cc5c, $__slotsa137de91fae332872b736a951544cc5c, [], ['ariaLabel' => 'aria-label'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStacka137de91fae332872b736a951544cc5c)) { $__slotsa137de91fae332872b736a951544cc5c = array_pop($__slotsStacka137de91fae332872b736a951544cc5c); } ?>
<?php if (! empty($__attrsStacka137de91fae332872b736a951544cc5c)) { $__attrsa137de91fae332872b736a951544cc5c = array_pop($__attrsStacka137de91fae332872b736a951544cc5c); } ?>
<?php $__blaze->popData(); ?>
                    <?php $__slotsdb2aef950ac49b078c7e8f501b0e2bad['slot'] = new \Illuminate\View\ComponentSlot($__blaze->processPassthroughContent('trim', trim(ob_get_clean())), []); ?>
<?php $__blaze->pushSlots($__slotsdb2aef950ac49b078c7e8f501b0e2bad); ?>
<?php __db2aef950ac49b078c7e8f501b0e2bad($__blaze, $__attrsdb2aef950ac49b078c7e8f501b0e2bad, $__slotsdb2aef950ac49b078c7e8f501b0e2bad, [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStackdb2aef950ac49b078c7e8f501b0e2bad)) { $__slotsdb2aef950ac49b078c7e8f501b0e2bad = array_pop($__slotsStackdb2aef950ac49b078c7e8f501b0e2bad); } ?>
<?php if (! empty($__attrsStackdb2aef950ac49b078c7e8f501b0e2bad)) { $__attrsdb2aef950ac49b078c7e8f501b0e2bad = array_pop($__attrsStackdb2aef950ac49b078c7e8f501b0e2bad); } ?>
<?php $__blaze->popData(); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </dialog>
</ui-modal>
<?php
echo $__blaze->processPassthroughContent('ltrim', ltrim(ob_get_clean()));
} endif; ?><?php /**PATH C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/modal/index.blade.php ENDPATH**/ ?>