<?php
if (!function_exists('_6372167a6fe6b7f666efc68b71994022')):
function _6372167a6fe6b7f666efc68b71994022($__blaze, $__data = [], $__slots = [], $__bound = [], $__keys = [], $__this = null) {
$__env = $__blaze->env;
$__slots['slot'] ??= new \Illuminate\View\ComponentSlot('');
if (($__data['attributes'] ?? null) instanceof \Illuminate\View\ComponentAttributeBag) { $__data = $__data + $__data['attributes']->all(); unset($__data['attributes']); }
extract($__slots, EXTR_SKIP); unset($__slots);
extract($__data, EXTR_SKIP);
$attributes = \Livewire\Blaze\Runtime\BlazeAttributeBag::make($__data, $__bound, $__keys);
unset($__data, $__bound, $__keys);
ob_start();
?>


<?php $tooltipPosition = $tooltipPosition ??= $attributes->pluck('tooltip:position'); ?>
<?php $tooltipKbd = $tooltipKbd ??= $attributes->pluck('tooltip:kbd'); ?>
<?php $tooltip = $tooltip ??= $attributes->pluck('tooltip'); ?>
<?php $iconTrailing ??= $attributes->pluck('icon:trailing'); ?>
<?php $iconVariant ??= $attributes->pluck('icon:variant'); ?>

<?php
$__defaults = [
    'tooltipPosition' => 'right',
    'tooltipKbd' => null,
    'tooltip' => null,
    'iconVariant' => 'outline',
    'iconTrailing' => null,
    'badgeColor' => null,
    'iconDot' => null,
    'accent' => true,
    'badge' => null,
    'icon' => null,
];
$tooltipPosition ??= $attributes['tooltip-position'] ?? $attributes['tooltipPosition'] ?? $__defaults['tooltipPosition']; unset($attributes['tooltipPosition'], $attributes['tooltip-position']);
$tooltipKbd ??= $attributes['tooltip-kbd'] ?? $attributes['tooltipKbd'] ?? $__defaults['tooltipKbd']; unset($attributes['tooltipKbd'], $attributes['tooltip-kbd']);
$tooltip ??= $attributes['tooltip'] ?? $__defaults['tooltip']; unset($attributes['tooltip']);
$iconVariant ??= $attributes['icon-variant'] ?? $attributes['iconVariant'] ?? $__defaults['iconVariant']; unset($attributes['iconVariant'], $attributes['icon-variant']);
$iconTrailing ??= $attributes['icon-trailing'] ?? $attributes['iconTrailing'] ?? $__defaults['iconTrailing']; unset($attributes['iconTrailing'], $attributes['icon-trailing']);
$badgeColor ??= $attributes['badge-color'] ?? $attributes['badgeColor'] ?? $__defaults['badgeColor']; unset($attributes['badgeColor'], $attributes['badge-color']);
$iconDot ??= $attributes['icon-dot'] ?? $attributes['iconDot'] ?? $__defaults['iconDot']; unset($attributes['iconDot'], $attributes['icon-dot']);
$accent ??= $attributes['accent'] ?? $__defaults['accent']; unset($attributes['accent']);
$badge ??= $attributes['badge'] ?? $__defaults['badge']; unset($attributes['badge']);
$icon ??= $attributes['icon'] ?? $__defaults['icon']; unset($attributes['icon']);
unset($__defaults);
?>

<?php
$tooltip ??= $slot->isNotEmpty() ? (string) $slot : null;

// Size-up icons in square/icon-only buttons...
$iconClasses = Flux::classes('size-4')
    ->add('in-data-flux-sidebar-group-dropdown:text-zinc-400! dark:in-data-flux-sidebar-group-dropdown:text-white/80!')
    ->add('[[data-flux-sidebar-item]:hover_&]:text-current!');

$classes = Flux::classes()
    ->add('h-8 in-data-flux-sidebar-on-mobile:h-10 relative flex items-center gap-3 rounded-lg')
    ->add('in-data-flux-sidebar-collapsed-desktop:w-10 in-data-flux-sidebar-collapsed-desktop:justify-center')
    ->add('py-0 text-start w-full px-3 has-data-flux-navlist-badge:not-in-data-flux-sidebar-collapsed-desktop:pe-1.5 my-px')
    ->add('text-zinc-500 dark:text-white/80')
    ->add(match ($accent) {
        true => [
            'data-current:text-(--color-accent-content) hover:data-current:text-(--color-accent-content)',
            'data-current:bg-white dark:data-current:bg-white/[7%] data-current:border data-current:border-zinc-200 dark:data-current:border-transparent',
            'hover:text-zinc-800 dark:hover:text-white dark:hover:bg-white/[7%] hover:bg-zinc-800/5 ',
            'border border-transparent',
        ],
        false => [
            'data-current:text-zinc-800 dark:data-current:text-zinc-100 data-current:border-zinc-200',
            'data-current:bg-white dark:data-current:bg-white/10 data-current:border data-current:border-zinc-200 dark:data-current:border-white/10 data-current:shadow-xs',
            'hover:text-zinc-800 dark:hover:text-white',
        ],
    })
    // Override the default styles to match dropdowns for when the item is inside a collapsed group dropdown...
    ->add('in-data-flux-sidebar-group-dropdown:w-auto! in-data-flux-sidebar-group-dropdown:px-2!')
    ->add('in-data-flux-sidebar-group-dropdown:text-zinc-800! in-data-flux-sidebar-group-dropdown:bg-white! in-data-flux-sidebar-group-dropdown:hover:bg-zinc-50!')
    ->add('dark:in-data-flux-sidebar-group-dropdown:text-white! dark:in-data-flux-sidebar-group-dropdown:bg-transparent! dark:in-data-flux-sidebar-group-dropdown:hover:bg-zinc-600!')
    ;
?>

<?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/index.blade.php', $__blaze->compiledPath.'/9c09a79c77603e123bca707b7f9dfeba.php'); ?>
<?php if (isset($__slots9c09a79c77603e123bca707b7f9dfeba)) { $__slotsStack9c09a79c77603e123bca707b7f9dfeba[] = $__slots9c09a79c77603e123bca707b7f9dfeba; } ?>
<?php if (isset($__attrs9c09a79c77603e123bca707b7f9dfeba)) { $__attrsStack9c09a79c77603e123bca707b7f9dfeba[] = $__attrs9c09a79c77603e123bca707b7f9dfeba; } ?>
<?php $__attrs9c09a79c77603e123bca707b7f9dfeba = ['position' => $tooltipPosition]; ?>
<?php $__slots9c09a79c77603e123bca707b7f9dfeba = []; ?>
<?php $__blaze->pushData($__attrs9c09a79c77603e123bca707b7f9dfeba); ?>
<?php ob_start(); ?>
    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/button-or-link.blade.php', $__blaze->compiledPath.'/39bab16b772508a9514adb04def7c9f5.php'); ?>
<?php if (isset($__slots39bab16b772508a9514adb04def7c9f5)) { $__slotsStack39bab16b772508a9514adb04def7c9f5[] = $__slots39bab16b772508a9514adb04def7c9f5; } ?>
<?php if (isset($__attrs39bab16b772508a9514adb04def7c9f5)) { $__attrsStack39bab16b772508a9514adb04def7c9f5[] = $__attrs39bab16b772508a9514adb04def7c9f5; } ?>
<?php $__attrs39bab16b772508a9514adb04def7c9f5 = ['attributes' => $attributes->class($classes),'dataFluxSidebarItem' => true]; ?>
<?php $__slots39bab16b772508a9514adb04def7c9f5 = []; ?>
<?php $__blaze->pushData($__attrs39bab16b772508a9514adb04def7c9f5); ?>
<?php ob_start(); ?>
        <?php if ($icon): ?>
            <div class="relative">
                <?php if (is_string($icon) && $icon !== ''): ?>
                    <?php $blaze_memoized_key = \Livewire\Blaze\Memoizer\Memo::key("flux::icon", ['icon' => $icon, 'variant' => $iconVariant, 'class' => $iconClasses]); ?><?php if ($blaze_memoized_key !== null && \Livewire\Blaze\Memoizer\Memo::has($blaze_memoized_key)) : ?><?php echo \Livewire\Blaze\Memoizer\Memo::get($blaze_memoized_key); ?><?php else : ?><?php ob_start(); ?><?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php', $__blaze->compiledPath.'/0ef6a38bec8617e0691200e9ecc57327.php'); ?>
<?php $__blaze->pushData(['icon' => $icon,'variant' => $iconVariant,'class' => $iconClasses]); ?>
<?php _0ef6a38bec8617e0691200e9ecc57327($__blaze, ['icon' => $icon,'variant' => $iconVariant,'class' => $iconClasses], [], ['icon', 'variant'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?><?php $blaze_memoized_html = ob_get_clean(); ?><?php if ($blaze_memoized_key !== null) { \Livewire\Blaze\Memoizer\Memo::put($blaze_memoized_key, $blaze_memoized_html); } ?><?php echo $blaze_memoized_html; ?><?php endif; ?>
                <?php else: ?>
                    <?php echo e($icon); ?>

                <?php endif; ?>

                <?php if ($iconDot): ?>
                    <div class="absolute top-[-2px] end-[-2px]">
                        <div class="size-[6px] rounded-full bg-zinc-500 dark:bg-zinc-400"></div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($slot->isNotEmpty()): ?>
            <div class="
                in-data-flux-sidebar-collapsed-desktop:not-in-data-flux-sidebar-group-dropdown:hidden
                flex-1 text-sm font-medium truncate [[data-nav-footer]_&]:hidden [[data-nav-sidebar]_[data-nav-footer]_&]:block" data-content><?php echo e($slot); ?></div>
        <?php endif; ?>

        <?php if (is_string($iconTrailing) && $iconTrailing !== ''): ?>
            <?php $blaze_memoized_key = \Livewire\Blaze\Memoizer\Memo::key("flux::icon", ['icon' => $iconTrailing, 'variant' => $iconVariant, 'class' => 'in-data-flux-sidebar-collapsed-desktop:not-in-data-flux-sidebar-group-dropdown:hidden size-4!']); ?><?php if ($blaze_memoized_key !== null && \Livewire\Blaze\Memoizer\Memo::has($blaze_memoized_key)) : ?><?php echo \Livewire\Blaze\Memoizer\Memo::get($blaze_memoized_key); ?><?php else : ?><?php ob_start(); ?><?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php', $__blaze->compiledPath.'/0ef6a38bec8617e0691200e9ecc57327.php'); ?>
<?php $__blaze->pushData(['icon' => $iconTrailing,'variant' => $iconVariant,'class' => 'in-data-flux-sidebar-collapsed-desktop:not-in-data-flux-sidebar-group-dropdown:hidden size-4!']); ?>
<?php _0ef6a38bec8617e0691200e9ecc57327($__blaze, ['icon' => $iconTrailing,'variant' => $iconVariant,'class' => 'in-data-flux-sidebar-collapsed-desktop:not-in-data-flux-sidebar-group-dropdown:hidden size-4!'], [], ['icon', 'variant'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?><?php $blaze_memoized_html = ob_get_clean(); ?><?php if ($blaze_memoized_key !== null) { \Livewire\Blaze\Memoizer\Memo::put($blaze_memoized_key, $blaze_memoized_html); } ?><?php echo $blaze_memoized_html; ?><?php endif; ?>
        <?php elseif ($iconTrailing): ?>
            <?php echo e($iconTrailing); ?>

        <?php endif; ?>

        <?php if (isset($badge) && $badge !== ''): ?>
            <?php $badgeAttributes = Flux::attributesAfter('badge:', $attributes, ['color' => $badgeColor]); ?>
            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/navlist/badge.blade.php', $__blaze->compiledPath.'/454a417c3c41dd0eb6a4f85b92cd3cbc.php'); ?>
<?php if (isset($__slots454a417c3c41dd0eb6a4f85b92cd3cbc)) { $__slotsStack454a417c3c41dd0eb6a4f85b92cd3cbc[] = $__slots454a417c3c41dd0eb6a4f85b92cd3cbc; } ?>
<?php if (isset($__attrs454a417c3c41dd0eb6a4f85b92cd3cbc)) { $__attrsStack454a417c3c41dd0eb6a4f85b92cd3cbc[] = $__attrs454a417c3c41dd0eb6a4f85b92cd3cbc; } ?>
<?php $__attrs454a417c3c41dd0eb6a4f85b92cd3cbc = ['attributes' => $badgeAttributes,'class' => 'in-data-flux-sidebar-collapsed-desktop:not-in-data-flux-sidebar-group-dropdown:hidden']; ?>
<?php $__slots454a417c3c41dd0eb6a4f85b92cd3cbc = []; ?>
<?php $__blaze->pushData($__attrs454a417c3c41dd0eb6a4f85b92cd3cbc); ?>
<?php ob_start(); ?><?php echo e($badge); ?><?php $__slots454a417c3c41dd0eb6a4f85b92cd3cbc['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots454a417c3c41dd0eb6a4f85b92cd3cbc); ?>
<?php _454a417c3c41dd0eb6a4f85b92cd3cbc($__blaze, $__attrs454a417c3c41dd0eb6a4f85b92cd3cbc, $__slots454a417c3c41dd0eb6a4f85b92cd3cbc, ['attributes'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack454a417c3c41dd0eb6a4f85b92cd3cbc)) { $__slots454a417c3c41dd0eb6a4f85b92cd3cbc = array_pop($__slotsStack454a417c3c41dd0eb6a4f85b92cd3cbc); } ?>
<?php if (! empty($__attrsStack454a417c3c41dd0eb6a4f85b92cd3cbc)) { $__attrs454a417c3c41dd0eb6a4f85b92cd3cbc = array_pop($__attrsStack454a417c3c41dd0eb6a4f85b92cd3cbc); } ?>
<?php $__blaze->popData(); ?>
        <?php endif; ?>
    <?php $__slots39bab16b772508a9514adb04def7c9f5['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots39bab16b772508a9514adb04def7c9f5); ?>
<?php _39bab16b772508a9514adb04def7c9f5($__blaze, $__attrs39bab16b772508a9514adb04def7c9f5, $__slots39bab16b772508a9514adb04def7c9f5, ['attributes', 'dataFluxSidebarItem'], ['dataFluxSidebarItem' => 'data-flux-sidebar-item'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack39bab16b772508a9514adb04def7c9f5)) { $__slots39bab16b772508a9514adb04def7c9f5 = array_pop($__slotsStack39bab16b772508a9514adb04def7c9f5); } ?>
<?php if (! empty($__attrsStack39bab16b772508a9514adb04def7c9f5)) { $__attrs39bab16b772508a9514adb04def7c9f5 = array_pop($__attrsStack39bab16b772508a9514adb04def7c9f5); } ?>
<?php $__blaze->popData(); ?>

    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/tooltip/content.blade.php', $__blaze->compiledPath.'/09b89d899e722262f03208b9919ee093.php'); ?>
<?php if (isset($__slots09b89d899e722262f03208b9919ee093)) { $__slotsStack09b89d899e722262f03208b9919ee093[] = $__slots09b89d899e722262f03208b9919ee093; } ?>
<?php if (isset($__attrs09b89d899e722262f03208b9919ee093)) { $__attrsStack09b89d899e722262f03208b9919ee093[] = $__attrs09b89d899e722262f03208b9919ee093; } ?>
<?php $__attrs09b89d899e722262f03208b9919ee093 = ['kbd' => $tooltipKbd,'class' => 'not-in-data-flux-sidebar-collapsed-desktop:hidden in-data-flux-sidebar-group-dropdown:hidden cursor-default']; ?>
<?php $__slots09b89d899e722262f03208b9919ee093 = []; ?>
<?php $__blaze->pushData($__attrs09b89d899e722262f03208b9919ee093); ?>
<?php ob_start(); ?>
        <?php echo e($tooltip); ?>

    <?php $__slots09b89d899e722262f03208b9919ee093['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots09b89d899e722262f03208b9919ee093); ?>
<?php _09b89d899e722262f03208b9919ee093($__blaze, $__attrs09b89d899e722262f03208b9919ee093, $__slots09b89d899e722262f03208b9919ee093, ['kbd'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack09b89d899e722262f03208b9919ee093)) { $__slots09b89d899e722262f03208b9919ee093 = array_pop($__slotsStack09b89d899e722262f03208b9919ee093); } ?>
<?php if (! empty($__attrsStack09b89d899e722262f03208b9919ee093)) { $__attrs09b89d899e722262f03208b9919ee093 = array_pop($__attrsStack09b89d899e722262f03208b9919ee093); } ?>
<?php $__blaze->popData(); ?>
<?php $__slots9c09a79c77603e123bca707b7f9dfeba['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots9c09a79c77603e123bca707b7f9dfeba); ?>
<?php _9c09a79c77603e123bca707b7f9dfeba($__blaze, $__attrs9c09a79c77603e123bca707b7f9dfeba, $__slots9c09a79c77603e123bca707b7f9dfeba, ['position'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack9c09a79c77603e123bca707b7f9dfeba)) { $__slots9c09a79c77603e123bca707b7f9dfeba = array_pop($__slotsStack9c09a79c77603e123bca707b7f9dfeba); } ?>
<?php if (! empty($__attrsStack9c09a79c77603e123bca707b7f9dfeba)) { $__attrs9c09a79c77603e123bca707b7f9dfeba = array_pop($__attrsStack9c09a79c77603e123bca707b7f9dfeba); } ?>
<?php $__blaze->popData(); ?><?php
echo ltrim(ob_get_clean());
} endif; ?><?php /**PATH C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php ENDPATH**/ ?>