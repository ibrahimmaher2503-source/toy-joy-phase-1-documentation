<?php # [BlazeFolded]:{flux::sidebar.collapse}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/collapse.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::sidebar.header}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/header.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::sidebar.toggle}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/toggle.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::spacer}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/spacer.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::menu.radio.group}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/menu/radio/group.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::menu.separator}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/menu/separator.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::menu.item}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/menu/item.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::menu.radio.group}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/menu/radio/group.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::menu.separator}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/menu/separator.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::menu.item}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/menu/item.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::menu.item}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/menu/item.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::menu.separator}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/menu/separator.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::menu.item}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/menu/item.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::menu}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/menu/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::dropdown}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/dropdown.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::header}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/header.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::main}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/main.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::toast}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/toast/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::toast.group}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/toast/group.blade.php}:{1781799918} ?>
<!DOCTYPE html>
<html
    lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
    dir="<?php echo e(in_array(app()->getLocale(), config('app.rtl_locales'), true) ? 'rtl' : 'ltr'); ?>"
    class="overflow-x-hidden"
>
    <head>
        <?php echo $__env->make('partials.head', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </head>
    <body class="app-layout min-h-screen overflow-x-hidden">
        <ui-sidebar
            class="lg:col-start-1 lg:sticky lg:top-0 z-1 flex h-dvh min-h-dvh max-h-dvh flex-col gap-4 [:where(&)]:w-64 overflow-hidden p-4 max-lg:data-flux-sidebar-cloak:hidden data-flux-sidebar-on-mobile:data-flux-sidebar-collapsed-mobile:-translate-x-full data-flux-sidebar-on-mobile:data-flux-sidebar-collapsed-mobile:rtl:translate-x-full z-20! data-flux-sidebar-on-mobile:start-0! data-flux-sidebar-on-mobile:fixed! data-flux-sidebar-on-mobile:top-0! data-flux-sidebar-on-mobile:min-h-dvh! data-flux-sidebar-on-mobile:max-h-dvh! app-sidebar border-e transition-[transform,width,padding,box-shadow] duration-200 ease-out"
            collapsible="mobile"
            sticky
            x-data
            data-flux-sidebar-cloak
            data-flux-sidebar
        >
            <?php ob_start(); ?><div class="flex items-center justify-between gap-2 min-h-10" data-flux-sidebar-header>
    <?php ob_start(); ?>
                <?php if (isset($component)) { $__componentOriginal7b17d80ff7900603fe9e5f0b453cc7c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b17d80ff7900603fe9e5f0b453cc7c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-logo','data' => ['sidebar' => true,'href' => ''.e(route('dashboard')).'','wire:navigate' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sidebar' => true,'href' => ''.e(route('dashboard')).'','wire:navigate' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b17d80ff7900603fe9e5f0b453cc7c3)): ?>
<?php $attributes = $__attributesOriginal7b17d80ff7900603fe9e5f0b453cc7c3; ?>
<?php unset($__attributesOriginal7b17d80ff7900603fe9e5f0b453cc7c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b17d80ff7900603fe9e5f0b453cc7c3)): ?>
<?php $component = $__componentOriginal7b17d80ff7900603fe9e5f0b453cc7c3; ?>
<?php unset($__componentOriginal7b17d80ff7900603fe9e5f0b453cc7c3); ?>
<?php endif; ?>
                <?php ob_start(); ?><ui-sidebar-toggle class="w-10 h-8 shrink-0 flex items-center justify-center in-data-flux-sidebar-collapsed-desktop:opacity-0 in-data-flux-sidebar-collapsed-desktop:absolute in-data-flux-sidebar-collapsed-desktop:in-data-flux-sidebar-active:opacity-100  lg:hidden" data-flux-sidebar-collapse>
    <ui-tooltip position="right center"  data-flux-tooltip >
        <button type="button" class="size-10 relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none text-sm rounded-lg inline-flex  bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white in-data-flux-sidebar-collapsed-desktop:cursor-e-resize rtl:in-data-flux-sidebar-collapsed-desktop:cursor-w-resize [&amp;[collapsible=&quot;mobile&quot;]]:in-data-flux-sidebar-on-desktop:hidden rtl:rotate-180">
            <svg class="text-zinc-500 dark:text-zinc-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.5 3.75V16.25M3.4375 16.25H16.5625C17.08 16.25 17.5 15.83 17.5 15.3125V4.6875C17.5 4.17 17.08 3.75 16.5625 3.75H3.4375C2.92 3.75 2.5 4.17 2.5 4.6875V15.3125C2.5 15.83 2.92 16.25 3.4375 16.25Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </button>

                    <div popover="manual" class="relative py-2 px-2.5 rounded-md text-xs text-white font-medium bg-zinc-800 dark:bg-zinc-700 dark:border dark:border-white/10 p-0 overflow-visible" data-flux-tooltip-content>
    Toggle sidebar

    </div>
            </ui-tooltip>
</ui-sidebar-toggle>
<?php echo ltrim(ob_get_clean()); ?>
            <?php echo trim(ob_get_clean()); ?>

</div><?php echo ltrim(ob_get_clean()); ?>

            <?php
                // Keep offline POS and control screens out of Sales. A broad `pos*`
                // match made two parents active and could restore the wrong scroll state.
                $salesActive = request()->routeIs('pos')
                    || request()->routeIs('pos.shift*')
                    || request()->routeIs('pos.suspended*')
                    || request()->routeIs('returns.*')
                    || request()->routeIs('gift.*')
                    || request()->routeIs('sales.*')
                    || request()->routeIs('quotations.readiness');
                $customersActive = request()->routeIs('customers.*')
                    || request()->routeIs('wallets.product');
                $catalogActive = request()->routeIs('catalog.products*') || request()->routeIs('catalog.product-options') || request()->routeIs('catalog.categories') || request()->routeIs('catalog.brands');
                $suppliersActive = request()->routeIs('catalog.suppliers*') || request()->routeIs('suppliers.*') || request()->routeIs('purchasing.history.suppliers');
                $purchasingActive = request()->routeIs('purchasing.*') && ! request()->routeIs('purchasing.history.suppliers');
                $pricingActive = request()->routeIs('pricing.*');
                $inventoryActive = request()->routeIs('inventory.*');
                $partyActive = request()->routeIs('party.*') || request()->routeIs('parties.*') || request()->routeIs('wallets.party');
                $rentalAssetsActive = request()->routeIs('party.assets.*') || request()->routeIs('party.asset-events.*');
                $reportsActive = request()->routeIs('reports.*') || request()->routeIs('exports.*');
                $administrationActive = request()->routeIs('admin.settings*')
                    || request()->routeIs('admin.translations')
                    || request()->routeIs('admin.branches')
                    || request()->routeIs('admin.stores')
                    || request()->routeIs('admin.cash-drawers')
                    || request()->routeIs('admin.roles*')
                    || request()->routeIs('initial-setup')
                    || request()->routeIs('purchasing.invoices.settings')
                    || request()->routeIs('purchasing.returns.settings');
                $controlActive = request()->routeIs('admin.audit')
                    || request()->routeIs('admin.approvals*')
                    || request()->routeIs('system.*')
                    || request()->routeIs('operations.readiness')
                    || request()->routeIs('pos.offline-*')
                    || request()->routeIs('offline.conflicts.*');
            ?>

            <nav aria-label="<?php echo e(__('Workspace')); ?>" class="flex min-h-0 flex-1 flex-col gap-2 overflow-y-auto overscroll-contain pe-1" data-flux-sidebar-nav>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['dashboard_reports.view'])): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Workspace'),'class' => 'sidebar-nav-group sidebar-nav-workspace']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'home','href' => route('dashboard'),'current' => request()->routeIs('dashboard'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Dashboard')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'bell-alert','href' => route('alerts.index'),'current' => request()->routeIs('alerts.*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Operational alerts')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['pos_sales.view', 'pos_sales.payment_view', 'pos_sales.payment_evidence_view', 'shifts_cash_movements.view', 'returns_exchanges_gift_instruments.view', 'dashboard_reports.view'])): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Daily Operations / Transactions'),'icon' => 'shopping-cart','expandable' => true,'expanded' => $salesActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pos_sales.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'shopping-cart','class' => 'pos-nav-item','href' => route('pos'),'current' => request()->routeIs('pos'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('POS')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'shopping-bag','href' => route('sales.index'),'current' => request()->routeIs('sales.index', 'sales.show'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Sales')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'document-text','href' => route('sales.invoices'),'current' => request()->routeIs('sales.invoices'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Sales Invoices')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('suspended_sales.view')): ?><?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'pause','href' => route('pos.suspended'),'current' => request()->routeIs('pos.suspended*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Suspended Sales')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?><?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pos_sales.payment_view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'banknotes','href' => route('payments.index'),'current' => request()->routeIs('payments.index'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Payments')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pos_sales.payment_evidence_view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'paper-clip','href' => route('payments.evidence'),'current' => request()->routeIs('payments.evidence*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Payment Evidence')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shifts_cash_movements.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'lock-closed','href' => route('pos.shift'),'current' => request()->routeIs('pos.shift*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Shifts & cash movements')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('returns_exchanges_gift_instruments.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'arrow-path','href' => route('returns.index'),'current' => request()->routeIs('returns.*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Returns & exchanges')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'gift','href' => route('gift.cards.index'),'current' => request()->routeIs('gift.cards.*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Gift Cards')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'receipt-percent','href' => route('gift.receipts.index'),'current' => request()->routeIs('gift.receipts.*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Gift Receipts')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard_reports.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'document-text','href' => route('quotations.index'),'current' => request()->routeIs('quotations.*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Quotations')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['pos_sales.view', 'customers.view', 'loyalty.view', 'product_wallet.view'])): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Customer master & history'),'icon' => 'user-group','expandable' => true,'expanded' => $customersActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customers.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'user-group','href' => route('customers.index'),'current' => request()->routeIs('customers.create', 'customers.show') || (request()->routeIs('customers.index') && request('mode', 'master') === 'master'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Customer master, privacy & history')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('loyalty.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'star','href' => route('customers.index', ['mode' => 'loyalty']),'current' => request()->routeIs('customers.loyalty*') || (request()->routeIs('customers.index') && request('mode') === 'loyalty'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Loyalty & points')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customers.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'clock','href' => route('customers.index', ['mode' => 'history']),'current' => request()->routeIs('customers.index') && request('mode') === 'history','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Transaction history')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_wallet.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'wallet','href' => route('wallets.product'),'current' => request()->routeIs('wallets.product'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Product Wallet')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products_categories_brands.view')): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Catalog master data'),'icon' => 'cube','expandable' => true,'expanded' => $catalogActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'cube','href' => route('catalog.products'),'current' => request()->routeIs('catalog.products'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                            <?php echo e(__('Products')); ?>

                        <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'swatch','href' => route('catalog.product-options'),'current' => request()->routeIs('catalog.product-options'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                            <?php echo e(__('Product Options')); ?>

                        <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products_categories_brands.create')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'arrow-up-tray','href' => route('catalog.products.import'),'current' => request()->routeIs('catalog.products.import'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                                <?php echo e(__('Product Import')); ?>

                            <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'squares-2x2','href' => route('catalog.categories'),'current' => request()->routeIs('catalog.categories'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                            <?php echo e(__('Categories')); ?>

                        <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'tag','href' => route('catalog.brands'),'current' => request()->routeIs('catalog.brands'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                            <?php echo e(__('Brands')); ?>

                        <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['suppliers.view', 'purchase_invoices_supplier_returns.view', 'purchase_returns.view'])): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Supplier master data'),'icon' => 'truck','expandable' => true,'expanded' => $suppliersActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('suppliers.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'truck','href' => route('catalog.suppliers'),'current' => request()->routeIs('catalog.suppliers*') || request()->routeIs('suppliers.*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                                <?php echo e(__('Suppliers')); ?>

                            <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'folder-open','href' => route('catalog.suppliers', ['section' => 'supplier-groups']),'current' => request()->routeIs('catalog.suppliers') && request('section') === 'supplier-groups','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Supplier groups')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_invoices_supplier_returns.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'receipt-percent','href' => route('purchasing.history.suppliers'),'current' => request()->routeIs('purchasing.history.suppliers'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Supplier invoices & cost history')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['purchase_orders.view', 'purchase_invoices_supplier_returns.view', 'purchase_returns.view'])): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Purchasing operations'),'icon' => 'truck','expandable' => true,'expanded' => $purchasingActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_orders.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'document-text','href' => route('purchasing.orders'),'current' => request()->routeIs('purchasing.orders*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                                <?php echo e(__('Purchase Orders')); ?>

                            <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_invoices_supplier_returns.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'receipt-percent','href' => route('purchasing.invoices'),'current' => request()->routeIs('purchasing.invoices'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Purchase invoices')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'arrow-up-tray','href' => route('purchasing.invoices.import'),'current' => request()->routeIs('purchasing.invoices.import'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Invoice import')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'clipboard-document-check','href' => route('purchasing.invoices.readiness'),'current' => request()->routeIs('purchasing.invoices.readiness'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Purchase receiving & matching')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'chart-bar','href' => route('purchasing.history.costs'),'current' => request()->routeIs('purchasing.history.costs'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Purchase cost history')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_returns.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'arrow-path','href' => route('purchasing.returns'),'current' => request()->routeIs('purchasing.returns'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Supplier returns')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pricing_labels.view')): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Pricing master data'),'icon' => 'banknotes','expandable' => true,'expanded' => $pricingActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'banknotes','href' => route('pricing.index'),'current' => request()->routeIs('pricing.index'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                            <?php echo e(__('Pricing Workspace')); ?>

                        <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'printer','href' => route('pricing.labels'),'current' => request()->routeIs('pricing.labels'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                            <?php echo e(__('Barcode & label printing')); ?>

                        <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'document-text','href' => route('pricing.focus', ['mode' => 'versions']),'current' => request()->routeIs('pricing.focus') && request()->route('mode') === 'versions','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Price lists & versions')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'exclamation-triangle','href' => route('pricing.focus', ['mode' => 'unpriced']),'current' => request()->routeIs('pricing.focus') && request()->route('mode') === 'unpriced','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Unpriced products')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'clock','href' => route('pricing.focus', ['mode' => 'history']),'current' => request()->routeIs('pricing.focus') && request()->route('mode') === 'history','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Price change history')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['inventory_stock_card.view', 'transfers.view'])): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Inventory operations'),'icon' => 'archive-box','expandable' => true,'expanded' => $inventoryActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'archive-box','href' => route('inventory.index'),'current' => request()->routeIs('inventory.index'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Inventory Control Center')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'scale','href' => route('inventory.balances'),'current' => request()->routeIs('inventory.balances'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Balances')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'arrows-right-left','href' => route('inventory.movements'),'current' => request()->routeIs('inventory.movements'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Stock movements')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transfers.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'arrow-path','href' => route('inventory.transfers'),'current' => request()->routeIs('inventory.transfers'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Transfers')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'adjustments-horizontal','href' => route('inventory.adjustments'),'current' => request()->routeIs('inventory.adjustments'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Stock in / out & adjustments')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'clipboard-document-list','href' => route('inventory.counts'),'current' => request()->routeIs('inventory.counts'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Stock counts')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['party_bookings_invoices.view', 'party_wallet.view'])): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Party operations'),'icon' => 'cake','expandable' => true,'expanded' => $partyActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('party_bookings_invoices.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'cake','href' => route('parties.bookings.index'),'current' => request()->routeIs('parties.bookings.*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Party bookings')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rental_assets.view')): ?><?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'calendar-days','href' => route('parties.calendar'),'current' => request()->routeIs('parties.calendar'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Party calendar')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?><?php endif; ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'document-text','href' => route('parties.invoices.index', ['mode' => 'working']),'current' => request()->routeIs('parties.invoices.index') && request('mode', 'working') === 'working','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Working invoice')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'banknotes','href' => route('parties.invoices.index', ['mode' => 'payments']),'current' => request()->routeIs('parties.invoices.payments*') || (request()->routeIs('parties.invoices.index') && request('mode') === 'payments'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Party payments')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'clipboard-document-list','href' => route('parties.orders.index'),'current' => request()->routeIs('parties.orders.*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Operating orders & consumables')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'check-circle','href' => route('parties.invoices.index', ['mode' => 'settlement']),'current' => request()->routeIs('parties.invoices.settle') || (request()->routeIs('parties.invoices.index') && request('mode') === 'settlement'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Final close & settlement')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('party_wallet.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'wallet','href' => route('wallets.party'),'current' => request()->routeIs('wallets.party'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Party Wallet')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rental_assets.view')): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Rental Assets'),'icon' => 'cube','expandable' => true,'expanded' => $rentalAssetsActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'cube','href' => route('party.assets.index', ['mode' => 'workspace']),'current' => request()->routeIs('party.assets.index') && request('mode', 'workspace') === 'workspace','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Rental assets & calendar')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'calendar-days','href' => route('party.assets.index', ['mode' => 'reservations']),'current' => request()->routeIs('party.assets.index') && request('mode') === 'reservations','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Asset reservations & checkout')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'clipboard-document-check','href' => route('party.assets.index', ['mode' => 'returns']),'current' => request()->routeIs('party.assets.index') && request('mode') === 'returns','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Return, condition & damages')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'chart-bar','href' => route('party.assets.index', ['mode' => 'history']),'current' => request()->routeIs('party.assets.index') && request('mode') === 'history','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Depreciation & asset history')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard_reports.view')): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Reports'),'icon' => 'chart-bar','expandable' => true,'expanded' => $reportsActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'chart-bar','href' => route('reports.index'),'current' => request()->routeIs('reports.index'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Dashboard & KPI reports')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pos_sales.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'shopping-cart','href' => route('reports.sales'),'current' => request()->routeIs('reports.sales'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Sales reports')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customers.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'user-group','href' => route('reports.customers'),'current' => request()->routeIs('reports.customers'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Customer & loyalty reports')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shifts_cash_movements.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'banknotes','href' => route('reports.cash'),'current' => request()->routeIs('reports.cash'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Cash & shift reports')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('purchase_orders.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'truck','href' => route('reports.purchasing'),'current' => request()->routeIs('reports.purchasing'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Purchasing reports')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('inventory_stock_card.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'archive-box','href' => route('reports.inventory'),'current' => request()->routeIs('reports.inventory'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Inventory reports')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('party_bookings_invoices.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'cake','href' => route('reports.parties'),'current' => request()->routeIs('reports.parties'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Party reports')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rental_assets.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'cube','href' => route('reports.assets'),'current' => request()->routeIs('reports.assets'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Rental asset reports')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'arrow-down-tray','href' => route('exports.index'),'current' => request()->routeIs('exports.*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('PDF / Excel export center')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['company_settings.view', 'branches_stores.view', 'drawers_payments_tax_numbering_printers.view', 'users_roles_permissions.view'])): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('Setup / Master Data'),'icon' => 'cog-6-tooth','expandable' => true,'expanded' => $administrationActive,'dataSidebarExpandable' => true,'dataSidebarSection' => 'administration','class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company_settings.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'cog-6-tooth','href' => route('admin.settings', ['tab' => 'company']),'current' => request()->routeIs('admin.settings*'),'ariaCurrent' => request()->routeIs('admin.settings*') ? 'page' : null,'dataSettingsEntry' => 'canonical','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                                <?php echo e(__('System setup workspace')); ?>

                            <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'ariaCurrent', 'wire:navigate'], ['ariaCurrent' => 'aria-current', 'dataSettingsEntry' => 'data-settings-entry'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company_settings.edit')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'clipboard-document-check','href' => route('initial-setup'),'current' => request()->routeIs('initial-setup'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                                <?php echo e(__('Initial setup')); ?>

                            <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'language','href' => route('admin.translations'),'current' => request()->routeIs('admin.translations'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                                <?php echo e(__('Translation editor')); ?>

                            <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company_settings.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'adjustments-horizontal','href' => route('admin.settings.customer-loyalty'),'current' => request()->routeIs('admin.settings.customer-loyalty'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Work policies & customer settings')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('branches_stores.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'building-office-2','href' => route('admin.branches'),'current' => request()->routeIs('admin.branches'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                                <?php echo e(__('Branches')); ?>

                            <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'building-storefront','href' => route('admin.stores'),'current' => request()->routeIs('admin.stores'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                                <?php echo e(__('Stores & Mapping')); ?>

                            <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('drawers_payments_tax_numbering_printers.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'inbox-stack','href' => route('admin.cash-drawers'),'current' => request()->routeIs('admin.cash-drawers'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Cash Drawers')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users_roles_permissions.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'shield-check','href' => route('admin.authorization-baseline'),'current' => request()->routeIs('admin.authorization-baseline'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?>
                                <?php echo e(__('Users, roles & permissions')); ?>

                            <?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'key','href' => route('admin.roles'),'current' => request()->routeIs('admin.roles*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Roles & permission matrix')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company_settings.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'banknotes','href' => route('purchasing.invoices.settings'),'current' => request()->routeIs('purchasing.invoices.settings'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Purchase invoice settings')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'arrow-path','href' => route('purchasing.returns.settings'),'current' => request()->routeIs('purchasing.returns.settings'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Returns settings')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable', 'dataSidebarSection' => 'data-sidebar-section'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['audit_logs.view', 'dashboard_reports.view', 'pos_sales.view', 'pricing_labels.approve', 'purchase_orders.approve', 'purchase_invoices_supplier_returns.approve', 'purchase_returns.approve', 'inventory_stock_card.approve', 'stock_counts.reconcile'])): ?>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/group.blade.php', $__blaze->compiledPath.'/74e6054e37efafaaba4712e33b1e823b.php'); ?>
<?php if (isset($__slots74e6054e37efafaaba4712e33b1e823b)) { $__slotsStack74e6054e37efafaaba4712e33b1e823b[] = $__slots74e6054e37efafaaba4712e33b1e823b; } ?>
<?php if (isset($__attrs74e6054e37efafaaba4712e33b1e823b)) { $__attrsStack74e6054e37efafaaba4712e33b1e823b[] = $__attrs74e6054e37efafaaba4712e33b1e823b; } ?>
<?php $__attrs74e6054e37efafaaba4712e33b1e823b = ['heading' => __('System & Control'),'icon' => 'shield-check','expandable' => true,'expanded' => $controlActive,'dataSidebarExpandable' => true,'class' => 'sidebar-nav-group']; ?>
<?php $__slots74e6054e37efafaaba4712e33b1e823b = []; ?>
<?php $__blaze->pushData($__attrs74e6054e37efafaaba4712e33b1e823b); ?>
<?php ob_start(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['audit_logs.view', 'pricing_labels.approve', 'purchase_orders.approve', 'purchase_invoices_supplier_returns.approve', 'purchase_returns.approve', 'inventory_stock_card.approve', 'stock_counts.reconcile'])): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'check-badge','href' => route('admin.approvals'),'current' => request()->routeIs('admin.approvals*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Approvals')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit_logs.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'clock','href' => route('admin.audit'),'current' => request()->routeIs('admin.audit') && request('mode', 'all') === 'all','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Audit logs')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'exclamation-triangle','href' => route('admin.audit', ['mode' => 'override']),'current' => request()->routeIs('admin.audit') && request('mode') === 'override','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Override log')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'printer','href' => route('admin.audit', ['mode' => 'print']),'current' => request()->routeIs('admin.audit') && request('mode') === 'print','wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Print log')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'server','href' => route('system.health'),'current' => request()->routeIs('system.health'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Service status & system health')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pos_sales.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'signal-slash','href' => route('pos.offline-readiness'),'current' => request()->routeIs('pos.offline-readiness'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Offline POS & sync')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('offline_queue_conflicts.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'arrow-path','href' => route('pos.offline.queue'),'current' => request()->routeIs('pos.offline.queue'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('offline.queue_title')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('offline_queue_conflicts.approve')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'exclamation-triangle','href' => route('offline.conflicts.index'),'current' => request()->routeIs('offline.conflicts.*'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('offline.conflict_title')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit_logs.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'arrow-path','href' => route('operations.readiness'),'current' => request()->routeIs('operations.readiness'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('Failed operations & handover readiness')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard_reports.view')): ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'device-phone-mobile','href' => route('system.app'),'current' => request()->routeIs('system.app'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('System App Shell')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                            <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/sidebar/item.blade.php', $__blaze->compiledPath.'/6372167a6fe6b7f666efc68b71994022.php'); ?>
<?php if (isset($__slots6372167a6fe6b7f666efc68b71994022)) { $__slotsStack6372167a6fe6b7f666efc68b71994022[] = $__slots6372167a6fe6b7f666efc68b71994022; } ?>
<?php if (isset($__attrs6372167a6fe6b7f666efc68b71994022)) { $__attrsStack6372167a6fe6b7f666efc68b71994022[] = $__attrs6372167a6fe6b7f666efc68b71994022; } ?>
<?php $__attrs6372167a6fe6b7f666efc68b71994022 = ['icon' => 'paint-brush','href' => route('system.ui-showcase'),'current' => request()->routeIs('system.ui-showcase'),'wire:navigate' => true]; ?>
<?php $__slots6372167a6fe6b7f666efc68b71994022 = []; ?>
<?php $__blaze->pushData($__attrs6372167a6fe6b7f666efc68b71994022); ?>
<?php ob_start(); ?><?php echo e(__('UI Pattern Showcase')); ?><?php $__slots6372167a6fe6b7f666efc68b71994022['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots6372167a6fe6b7f666efc68b71994022); ?>
<?php _6372167a6fe6b7f666efc68b71994022($__blaze, $__attrs6372167a6fe6b7f666efc68b71994022, $__slots6372167a6fe6b7f666efc68b71994022, ['href', 'current', 'wire:navigate'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack6372167a6fe6b7f666efc68b71994022)) { $__slots6372167a6fe6b7f666efc68b71994022 = array_pop($__slotsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php if (! empty($__attrsStack6372167a6fe6b7f666efc68b71994022)) { $__attrs6372167a6fe6b7f666efc68b71994022 = array_pop($__attrsStack6372167a6fe6b7f666efc68b71994022); } ?>
<?php $__blaze->popData(); ?>
                        <?php endif; ?>
                    <?php $__slots74e6054e37efafaaba4712e33b1e823b['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots74e6054e37efafaaba4712e33b1e823b); ?>
<?php _74e6054e37efafaaba4712e33b1e823b($__blaze, $__attrs74e6054e37efafaaba4712e33b1e823b, $__slots74e6054e37efafaaba4712e33b1e823b, ['heading', 'expandable', 'expanded', 'dataSidebarExpandable'], ['dataSidebarExpandable' => 'data-sidebar-expandable'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack74e6054e37efafaaba4712e33b1e823b)) { $__slots74e6054e37efafaaba4712e33b1e823b = array_pop($__slotsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php if (! empty($__attrsStack74e6054e37efafaaba4712e33b1e823b)) { $__attrs74e6054e37efafaaba4712e33b1e823b = array_pop($__attrsStack74e6054e37efafaaba4712e33b1e823b); } ?>
<?php $__blaze->popData(); ?>
                <?php endif; ?>
            </nav>

            <div class="sidebar-status px-4 py-3 hidden lg:flex items-center justify-between border-t border-border text-xs">
                <div x-data="{ online: navigator.onLine }"
                     x-on:online.window="online = true"
                     x-on:offline.window="online = false"
                     class="flex items-center gap-1.5 font-medium">
                    <span class="size-2 rounded-full" :class="online ? 'bg-emerald-500' : 'bg-amber-500'"></span>
                    <span data-status-label x-text="online ? '<?php echo e(__('Online')); ?>' : '<?php echo e(__('Offline')); ?>'" class="text-zinc-600 dark:text-zinc-400"></span>
                </div>
            </div>

            <?php if (isset($component)) { $__componentOriginalca54afb14f8d43d7f1acc5dbe6164a0a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalca54afb14f8d43d7f1acc5dbe6164a0a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.desktop-user-menu','data' => ['class' => 'hidden lg:block','name' => auth()->user()->name]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('desktop-user-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hidden lg:block','name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(auth()->user()->name)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalca54afb14f8d43d7f1acc5dbe6164a0a)): ?>
<?php $attributes = $__attributesOriginalca54afb14f8d43d7f1acc5dbe6164a0a; ?>
<?php unset($__attributesOriginalca54afb14f8d43d7f1acc5dbe6164a0a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalca54afb14f8d43d7f1acc5dbe6164a0a)): ?>
<?php $component = $__componentOriginalca54afb14f8d43d7f1acc5dbe6164a0a; ?>
<?php unset($__componentOriginalca54afb14f8d43d7f1acc5dbe6164a0a); ?>
<?php endif; ?>
        </ui-sidebar>

        <div class="app-layout__content min-w-0">
        <!-- Mobile User Menu -->
        <?php ob_start(); ?><header class="[grid-area:header] z-10 min-h-14 flex items-center px-6 lg:px-8 lg:hidden" data-flux-header>
            <?php ob_start(); ?>
            <?php ob_start(); ?><button type="button" class="relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none justify-center h-10 text-sm rounded-lg w-10 inline-flex -ms-2.5 bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white      shrink-0 lg:hidden" data-flux-button="data-flux-button" x-data="" x-on:click="$dispatch('flux-sidebar-toggle')" aria-label="Toggle sidebar" data-flux-sidebar-toggle="data-flux-sidebar-toggle">
        <svg class="shrink-0 [:where(&amp;)]:size-5" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M2 6.75A.75.75 0 0 1 2.75 6h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 6.75Zm0 6.5a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
</svg>
    </button>
<?php echo ltrim(ob_get_clean()); ?>

            <?php ob_start(); ?><div class="flex-1" data-flux-spacer></div>
<?php echo ltrim(ob_get_clean()); ?>

            <div x-data="{ online: navigator.onLine }"
                 x-on:online.window="online = true"
                 x-on:offline.window="online = false"
                 class="me-2 flex items-center gap-1 text-xs font-medium">
                <span class="size-2 rounded-full" :class="online ? 'bg-emerald-500' : 'bg-amber-500'"></span>
                <span x-text="online ? '<?php echo e(__('Online')); ?>' : '<?php echo e(__('Offline')); ?>'" class="text-zinc-600 dark:text-zinc-400"></span>
            </div>

            <?php ob_start(); ?><ui-dropdown position="top end"  data-flux-dropdown>
    <?php ob_start(); ?>
                <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/profile.blade.php', $__blaze->compiledPath.'/d56474dd4ef050a42ce67f9864f790aa.php'); ?>
<?php $__blaze->pushData(['initials' => auth()->user()->initials(),'iconTrailing' => 'chevron-down']); ?>
<?php _d56474dd4ef050a42ce67f9864f790aa($__blaze, ['initials' => auth()->user()->initials(),'iconTrailing' => 'chevron-down'], [], ['initials'], ['iconTrailing' => 'icon-trailing'], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?>

                <?php ob_start(); ?><ui-menu
    class="[:where(&amp;)]:min-w-48 p-[.3125rem] rounded-lg shadow-xs border border-zinc-200 dark:border-zinc-600 bg-white dark:bg-zinc-700 focus:outline-hidden"
    popover="manual"
    data-flux-menu
>
    <?php ob_start(); ?>
                    <?php ob_start(); ?><ui-menu-radio-group  data-flux-menu-radio-group>
    <?php ob_start(); ?>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <?php $blaze_memoized_key = \Livewire\Blaze\Memoizer\Memo::key("flux::avatar", ['name' => auth()->user()->name, 'initials' => auth()->user()->initials()]); ?><?php if ($blaze_memoized_key !== null && \Livewire\Blaze\Memoizer\Memo::has($blaze_memoized_key)) : ?><?php echo \Livewire\Blaze\Memoizer\Memo::get($blaze_memoized_key); ?><?php else : ?><?php ob_start(); ?><?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/avatar/index.blade.php', $__blaze->compiledPath.'/192c5a6c5b6f3242fa535f0a11456bf8.php'); ?>
<?php $__blaze->pushData(['name' => auth()->user()->name,'initials' => auth()->user()->initials()]); ?>
<?php _192c5a6c5b6f3242fa535f0a11456bf8($__blaze, ['name' => auth()->user()->name,'initials' => auth()->user()->initials()], [], ['name', 'initials'], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php $__blaze->popData(); ?><?php $blaze_memoized_html = ob_get_clean(); ?><?php if ($blaze_memoized_key !== null) { \Livewire\Blaze\Memoizer\Memo::put($blaze_memoized_key, $blaze_memoized_html); } ?><?php echo $blaze_memoized_html; ?><?php endif; ?>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <?php ob_start(); ?><div class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-sm [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2 truncate" data-flux-heading><?php ob_start(); ?><?php echo e(auth()->user()->name); ?><?php echo trim(ob_get_clean()); ?></div>
<?php echo ltrim(ob_get_clean()); ?>
                                    <?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 truncate" data-flux-text ><?php ob_start(); ?><?php echo e(auth()->user()->email); ?><?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?>
                                </div>
                            </div>
                        </div>
                    <?php echo trim(ob_get_clean()); ?>

</ui-menu-radio-group>
<?php echo ltrim(ob_get_clean()); ?>

                    <?php ob_start(); ?><div class="-mx-[.3125rem] my-[.3125rem] h-px"  data-flux-menu-separator>
    <div data-orientation="horizontal" role="none" class="border-0 [print-color-adjust:exact] bg-zinc-800/15 dark:bg-white/20 h-px w-full dark:bg-zinc-600!" data-flux-separator></div>
</div>
<?php echo ltrim(ob_get_clean()); ?>

                    <?php ob_start(); ?><ui-menu-radio-group  data-flux-menu-radio-group>
    <?php ob_start(); ?>
                        <?php ob_start(); ?><a href="<?php echo e(route('profile.edit')); ?>" data-flux-menu-item="data-flux-menu-item" data-flux-menu-item-has-icon="data-flux-menu-item-has-icon" class="flex items-center px-2 py-1.5 w-full focus:outline-hidden rounded-md text-start text-sm font-medium [&amp;[disabled]]:opacity-50 text-zinc-800 data-active:bg-zinc-50 dark:text-white dark:data-active:bg-zinc-600 **:data-flux-menu-item-icon:text-zinc-400 dark:**:data-flux-menu-item-icon:text-white/60 [&amp;[data-active]_[data-flux-menu-item-icon]]:text-current" wire:navigate="">
        <svg class="shrink-0 [:where(&amp;)]:size-5 me-2" data-flux-menu-item-icon="data-flux-menu-item-icon" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M13.024 9.25c.47 0 .827-.433.637-.863a4 4 0 0 0-4.094-2.364c-.468.05-.665.576-.43.984l1.08 1.868a.75.75 0 0 0 .649.375h2.158ZM7.84 7.758c-.236-.408-.79-.5-1.068-.12A3.982 3.982 0 0 0 6 10c0 .884.287 1.7.772 2.363.278.38.832.287 1.068-.12l1.078-1.868a.75.75 0 0 0 0-.75L7.839 7.758ZM9.138 12.993c-.235.408-.039.934.43.984a4 4 0 0 0 4.094-2.364c.19-.43-.168-.863-.638-.863h-2.158a.75.75 0 0 0-.65.375l-1.078 1.868Z"/>
  <path fill-rule="evenodd" d="m14.13 4.347.644-1.117a.75.75 0 0 0-1.299-.75l-.644 1.116a6.954 6.954 0 0 0-2.081-.556V1.75a.75.75 0 0 0-1.5 0v1.29a6.954 6.954 0 0 0-2.081.556L6.525 2.48a.75.75 0 1 0-1.3.75l.645 1.117A7.04 7.04 0 0 0 4.347 5.87L3.23 5.225a.75.75 0 1 0-.75 1.3l1.116.644A6.954 6.954 0 0 0 3.04 9.25H1.75a.75.75 0 0 0 0 1.5h1.29c.078.733.27 1.433.556 2.081l-1.116.645a.75.75 0 1 0 .75 1.298l1.117-.644a7.04 7.04 0 0 0 1.523 1.523l-.645 1.117a.75.75 0 1 0 1.3.75l.644-1.116a6.954 6.954 0 0 0 2.081.556v1.29a.75.75 0 0 0 1.5 0v-1.29a6.954 6.954 0 0 0 2.081-.556l.645 1.116a.75.75 0 0 0 1.299-.75l-.645-1.117a7.042 7.042 0 0 0 1.523-1.523l1.117.644a.75.75 0 0 0 .75-1.298l-1.116-.645a6.954 6.954 0 0 0 .556-2.081h1.29a.75.75 0 0 0 0-1.5h-1.29a6.954 6.954 0 0 0-.556-2.081l1.116-.644a.75.75 0 0 0-.75-1.3l-1.117.645a7.04 7.04 0 0 0-1.524-1.523ZM10 4.5a5.475 5.475 0 0 0-2.781.754A5.527 5.527 0 0 0 5.22 7.277 5.475 5.475 0 0 0 4.5 10a5.475 5.475 0 0 0 .752 2.777 5.527 5.527 0 0 0 2.028 2.004c.802.458 1.73.719 2.72.719a5.474 5.474 0 0 0 2.78-.753 5.527 5.527 0 0 0 2.001-2.027c.458-.802.719-1.73.719-2.72a5.475 5.475 0 0 0-.753-2.78 5.528 5.528 0 0 0-2.028-2.002A5.475 5.475 0 0 0 10 4.5Z" clip-rule="evenodd"/>
</svg>

            
    <?php ob_start(); ?>
                            <?php echo e(__('Settings')); ?>

                        <?php echo trim(ob_get_clean()); ?>

    </a>
<?php echo ltrim(ob_get_clean()); ?>
                    <?php echo trim(ob_get_clean()); ?>

</ui-menu-radio-group>
<?php echo ltrim(ob_get_clean()); ?>

                    <?php ob_start(); ?><div class="-mx-[.3125rem] my-[.3125rem] h-px"  data-flux-menu-separator>
    <div data-orientation="horizontal" role="none" class="border-0 [print-color-adjust:exact] bg-zinc-800/15 dark:bg-white/20 h-px w-full dark:bg-zinc-600!" data-flux-separator></div>
</div>
<?php echo ltrim(ob_get_clean()); ?>

                    <form method="POST" action="<?php echo e(route('locale.switch')); ?>" class="w-full">
                        <?php echo csrf_field(); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->getLocale() === 'ar'): ?>
                            <input type="hidden" name="locale" value="en" />
                            <?php ob_start(); ?><button type="submit" class="flex items-center px-2 py-1.5 w-full focus:outline-hidden rounded-md text-start text-sm font-medium [&amp;[disabled]]:opacity-50 text-zinc-800 data-active:bg-zinc-50 dark:text-white dark:data-active:bg-zinc-600 **:data-flux-menu-item-icon:text-zinc-400 dark:**:data-flux-menu-item-icon:text-white/60 [&amp;[data-active]_[data-flux-menu-item-icon]]:text-current w-full cursor-pointer" data-flux-menu-item="data-flux-menu-item" data-flux-menu-item-has-icon="data-flux-menu-item-has-icon">
        <svg class="shrink-0 [:where(&amp;)]:size-5 me-2" data-flux-menu-item-icon="data-flux-menu-item-icon" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M7.75 2.75a.75.75 0 0 0-1.5 0v1.258a32.987 32.987 0 0 0-3.599.278.75.75 0 1 0 .198 1.487A31.545 31.545 0 0 1 8.7 5.545 19.381 19.381 0 0 1 7 9.56a19.418 19.418 0 0 1-1.002-2.05.75.75 0 0 0-1.384.577 20.935 20.935 0 0 0 1.492 2.91 19.613 19.613 0 0 1-3.828 4.154.75.75 0 1 0 .945 1.164A21.116 21.116 0 0 0 7 12.331c.095.132.192.262.29.391a.75.75 0 0 0 1.194-.91c-.204-.266-.4-.538-.59-.815a20.888 20.888 0 0 0 2.333-5.332c.31.031.618.068.924.108a.75.75 0 0 0 .198-1.487 32.832 32.832 0 0 0-3.599-.278V2.75Z"/>
  <path fill-rule="evenodd" d="M13 8a.75.75 0 0 1 .671.415l4.25 8.5a.75.75 0 1 1-1.342.67L15.787 16h-5.573l-.793 1.585a.75.75 0 1 1-1.342-.67l4.25-8.5A.75.75 0 0 1 13 8Zm2.037 6.5L13 10.427 10.964 14.5h4.073Z" clip-rule="evenodd"/>
</svg>

            
    <?php ob_start(); ?>
                                <?php echo e(__('Switch to English')); ?>

                            <?php echo trim(ob_get_clean()); ?>

    </button>
<?php echo ltrim(ob_get_clean()); ?>
                        <?php else: ?>
                            <input type="hidden" name="locale" value="ar" />
                            <?php ob_start(); ?><button type="submit" class="flex items-center px-2 py-1.5 w-full focus:outline-hidden rounded-md text-start text-sm font-medium [&amp;[disabled]]:opacity-50 text-zinc-800 data-active:bg-zinc-50 dark:text-white dark:data-active:bg-zinc-600 **:data-flux-menu-item-icon:text-zinc-400 dark:**:data-flux-menu-item-icon:text-white/60 [&amp;[data-active]_[data-flux-menu-item-icon]]:text-current w-full cursor-pointer" data-flux-menu-item="data-flux-menu-item" data-flux-menu-item-has-icon="data-flux-menu-item-has-icon">
        <svg class="shrink-0 [:where(&amp;)]:size-5 me-2" data-flux-menu-item-icon="data-flux-menu-item-icon" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M7.75 2.75a.75.75 0 0 0-1.5 0v1.258a32.987 32.987 0 0 0-3.599.278.75.75 0 1 0 .198 1.487A31.545 31.545 0 0 1 8.7 5.545 19.381 19.381 0 0 1 7 9.56a19.418 19.418 0 0 1-1.002-2.05.75.75 0 0 0-1.384.577 20.935 20.935 0 0 0 1.492 2.91 19.613 19.613 0 0 1-3.828 4.154.75.75 0 1 0 .945 1.164A21.116 21.116 0 0 0 7 12.331c.095.132.192.262.29.391a.75.75 0 0 0 1.194-.91c-.204-.266-.4-.538-.59-.815a20.888 20.888 0 0 0 2.333-5.332c.31.031.618.068.924.108a.75.75 0 0 0 .198-1.487 32.832 32.832 0 0 0-3.599-.278V2.75Z"/>
  <path fill-rule="evenodd" d="M13 8a.75.75 0 0 1 .671.415l4.25 8.5a.75.75 0 1 1-1.342.67L15.787 16h-5.573l-.793 1.585a.75.75 0 1 1-1.342-.67l4.25-8.5A.75.75 0 0 1 13 8Zm2.037 6.5L13 10.427 10.964 14.5h4.073Z" clip-rule="evenodd"/>
</svg>

            
    <?php ob_start(); ?>
                                <?php echo e(__('Switch to Arabic')); ?>

                            <?php echo trim(ob_get_clean()); ?>

    </button>
<?php echo ltrim(ob_get_clean()); ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </form>

                    <?php ob_start(); ?><div class="-mx-[.3125rem] my-[.3125rem] h-px"  data-flux-menu-separator>
    <div data-orientation="horizontal" role="none" class="border-0 [print-color-adjust:exact] bg-zinc-800/15 dark:bg-white/20 h-px w-full dark:bg-zinc-600!" data-flux-separator></div>
</div>
<?php echo ltrim(ob_get_clean()); ?>

                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="w-full">
                        <?php echo csrf_field(); ?>
                        <?php ob_start(); ?><button type="submit" class="flex items-center px-2 py-1.5 w-full focus:outline-hidden rounded-md text-start text-sm font-medium [&amp;[disabled]]:opacity-50 text-zinc-800 data-active:bg-zinc-50 dark:text-white dark:data-active:bg-zinc-600 **:data-flux-menu-item-icon:text-zinc-400 dark:**:data-flux-menu-item-icon:text-white/60 [&amp;[data-active]_[data-flux-menu-item-icon]]:text-current w-full cursor-pointer" data-flux-menu-item="data-flux-menu-item" data-flux-menu-item-has-icon="data-flux-menu-item-has-icon" data-test="logout-button">
        <svg class="shrink-0 [:where(&amp;)]:size-5 me-2" data-flux-menu-item-icon="data-flux-menu-item-icon" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M6 10a.75.75 0 0 1 .75-.75h9.546l-1.048-.943a.75.75 0 1 1 1.004-1.114l2.5 2.25a.75.75 0 0 1 0 1.114l-2.5 2.25a.75.75 0 1 1-1.004-1.114l1.048-.943H6.75A.75.75 0 0 1 6 10Z" clip-rule="evenodd"/>
</svg>

            
    <?php ob_start(); ?>
                            <?php echo e(__('Log out')); ?>

                        <?php echo trim(ob_get_clean()); ?>

    </button>
<?php echo ltrim(ob_get_clean()); ?>
                    </form>
                <?php echo trim(ob_get_clean()); ?>

</ui-menu>
<?php echo ltrim(ob_get_clean()); ?>
            <?php echo trim(ob_get_clean()); ?>

</ui-dropdown>
<?php echo ltrim(ob_get_clean()); ?>
        <?php echo trim(ob_get_clean()); ?>

    </header>
<?php echo ltrim(ob_get_clean()); ?>

        <?php echo $__env->make('components.platform.dashboard-tools', ['pageGuide' => \App\Modules\Platform\Data\PageGuideContext::fromRequest(auth()->user())], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <?php ob_start(); ?><div class="[grid-area:main] p-6 lg:p-8 [[data-flux-container]_&amp;]:px-0" data-flux-main>
    <?php ob_start(); ?>
            <?php echo e($slot); ?>

        <?php echo trim(ob_get_clean()); ?>

</div>
<?php echo ltrim(ob_get_clean()); ?>

        <?php app("livewire")->forceAssetInjection(); ?><div x-persist="<?php echo e('toast'); ?>">
            <?php ob_start(); ?><ui-toast-group x-data x-on:toast-show.document="$el.showToast($event.detail)" popover="manual" position="bottom end"  wire:ignore>
    <?php ob_start(); ?>
                <?php ob_start(); ?><ui-toast x-data x-on:toast-show.document="! $el.closest('ui-toast-group') && $el.showToast($event.detail)" popover="manual" position="bottom end" wire:ignore>
    <template>
        <div class="max-w-sm in-[ui-toast-group]:max-w-auto in-[ui-toast-group]:w-xs sm:in-[ui-toast-group]:w-sm" data-variant="" data-flux-toast-dialog>
            <div class="p-2 flex rounded-xl shadow-lg bg-white border border-zinc-200 border-b-zinc-300/80 dark:bg-zinc-700 dark:border-zinc-600">
                <div class="flex-1 flex items-start gap-4 overflow-hidden">
                    <div class="flex-1 py-1.5 ps-2.5 flex gap-2">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-flux-toast-dialog][data-variant=success]_&]:block shrink-0 mt-0.5 size-4 text-lime-600 dark:text-lime-400">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm3.844-8.791a.75.75 0 0 0-1.188-.918l-3.7 4.79-1.649-1.833a.75.75 0 1 0-1.114 1.004l2.25 2.5a.75.75 0 0 0 1.15-.043l4.25-5.5Z" clip-rule="evenodd" />
                        </svg>

                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-flux-toast-dialog][data-variant=warning]_&]:block shrink-0 mt-0.5 size-4 text-amber-500 dark:text-amber-400">
                            <path fill-rule="evenodd" d="M6.701 2.25c.577-1 2.02-1 2.598 0l5.196 9a1.5 1.5 0 0 1-1.299 2.25H2.804a1.5 1.5 0 0 1-1.3-2.25l5.197-9ZM8 4a.75.75 0 0 1 .75.75v3a.75.75 0 1 1-1.5 0v-3A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                        </svg>

                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-flux-toast-dialog][data-variant=info]_&]:block shrink-0 mt-0.5 size-4 text-cyan-500 dark:text-cyan-400">
                            <path fill-rule="evenodd" d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM9 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.75 8a.75.75 0 0 0 0 1.5h.75v1.75a.75.75 0 0 0 1.5 0v-2.5A.75.75 0 0 0 8.25 8h-1.5Z" clip-rule="evenodd" />
                        </svg>

                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-flux-toast-dialog][data-variant=danger]_&]:block shrink-0 mt-0.5 size-4 text-rose-500 dark:text-rose-400">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14ZM8 4a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-1.5 0v-3A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                        </svg>

                        <div>
                            
                            <div class="font-medium text-sm text-zinc-800 dark:text-white [&:not(:empty)+div]:font-normal [&:not(:empty)+div]:text-zinc-500 [&:not(:empty)+div]:dark:text-zinc-300 [&:not(:empty)]:pb-2"><slot name="heading"></slot></div>

                            
                            <div class="font-medium text-sm text-zinc-800 dark:text-white"><slot name="text"></slot></div>

                            
                            <template name="link">
                                <a class="block mt-2 font-medium text-sm text-[var(--color-accent-content)] decoration-[color-mix(in_oklab,var(--color-accent-content),transparent_80%)] underline underline-offset-[6px] hover:decoration-current"><slot name="text"></slot></a>
                            </template>
                        </div>
                    </div>

                    
                    <ui-close class="flex items-center">
                        <button type="button" class="inline-flex items-center font-medium justify-center gap-2 truncate disabled:opacity-50 dark:disabled:opacity-75 disabled:cursor-default h-8 text-sm rounded-md w-8 bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-400 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white" as="button">
                            <div>
                                <svg class="[:where(&)]:size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"></path>
                                </svg>
                            </div>
                        </button>
                    </ui-close>
                </div>
            </div>
        </div>
    </template>
</ui-toast>
<?php echo ltrim(ob_get_clean()); ?>
            <?php echo trim(ob_get_clean()); ?>

</ui-toast-group>
<?php echo ltrim(ob_get_clean()); ?>
        </div>
        </div>

        <?php app('livewire')->forceAssetInjection(); ?>
<?php echo app('flux')->scripts(); ?>

    </body>
</html>
<?php /**PATH C:\projects\toy-joy-phase-1-documentation\resources\views/layouts/app/sidebar.blade.php ENDPATH**/ ?>