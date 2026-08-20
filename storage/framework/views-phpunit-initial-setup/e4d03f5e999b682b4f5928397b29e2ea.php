<?php # [BlazeFolded]:{flux::icon}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::icon}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/icon/index.blade.php}:{1781799918} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'pageIds' => [],
    'selectedCount' => 0,
    'selectedIds' => [],
    'pageCount' => 0,
    'maxSelection' => 100,
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
    'pageIds' => [],
    'selectedCount' => 0,
    'selectedIds' => [],
    'pageCount' => 0,
    'maxSelection' => 100,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $pageSelectionComplete = $pageIds !== [] && count(array_diff($pageIds, $selectedIds)) === 0;
?>

<div <?php echo e($attributes->merge(['class' => 'table-bulk-actions'])); ?> role="region" aria-label="<?php echo e(__('Bulk operations')); ?>" data-bulk-actions data-selected-count="<?php echo e($selectedCount); ?>">
    <div class="table-bulk-actions__summary">
        <div class="flex min-w-0 items-start gap-3">
            <span class="table-bulk-actions__icon" aria-hidden="true">
                <?php ob_start(); ?><svg class="shrink-0 [:where(&amp;)]:size-6 size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
</svg>

        <?php echo ltrim(ob_get_clean()); ?>
            </span>
            <div class="min-w-0 space-y-1">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-sm font-semibold text-text-primary"><?php echo e(__('Bulk operations')); ?></span>
                    <?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/badge/index.blade.php', $__blaze->compiledPath.'/37b38441f2ce9fb75eb5edd8233bdbca.php'); ?>
<?php if (isset($__slots37b38441f2ce9fb75eb5edd8233bdbca)) { $__slotsStack37b38441f2ce9fb75eb5edd8233bdbca[] = $__slots37b38441f2ce9fb75eb5edd8233bdbca; } ?>
<?php if (isset($__attrs37b38441f2ce9fb75eb5edd8233bdbca)) { $__attrsStack37b38441f2ce9fb75eb5edd8233bdbca[] = $__attrs37b38441f2ce9fb75eb5edd8233bdbca; } ?>
<?php $__attrs37b38441f2ce9fb75eb5edd8233bdbca = ['size' => 'sm','color' => e($selectedCount > 0 ? 'blue' : 'zinc'),'dataBulkSelectedCount' => true,'ariaLive' => 'polite']; ?>
<?php $__slots37b38441f2ce9fb75eb5edd8233bdbca = []; ?>
<?php $__blaze->pushData($__attrs37b38441f2ce9fb75eb5edd8233bdbca); ?>
<?php ob_start(); ?>
                        <?php echo e(trans_choice(':count selected', $selectedCount, ['count' => $selectedCount])); ?>

                    <?php $__slots37b38441f2ce9fb75eb5edd8233bdbca['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots37b38441f2ce9fb75eb5edd8233bdbca); ?>
<?php _37b38441f2ce9fb75eb5edd8233bdbca($__blaze, $__attrs37b38441f2ce9fb75eb5edd8233bdbca, $__slots37b38441f2ce9fb75eb5edd8233bdbca, ['dataBulkSelectedCount'], ['dataBulkSelectedCount' => 'data-bulk-selected-count', 'ariaLive' => 'aria-live'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack37b38441f2ce9fb75eb5edd8233bdbca)) { $__slots37b38441f2ce9fb75eb5edd8233bdbca = array_pop($__slotsStack37b38441f2ce9fb75eb5edd8233bdbca); } ?>
<?php if (! empty($__attrsStack37b38441f2ce9fb75eb5edd8233bdbca)) { $__attrs37b38441f2ce9fb75eb5edd8233bdbca = array_pop($__attrsStack37b38441f2ce9fb75eb5edd8233bdbca); } ?>
<?php $__blaze->popData(); ?>
                </div>
                <p class="text-xs leading-5 text-text-muted">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedCount > 0): ?>
                        <?php echo e(__('Ready to apply to :count selected records.', ['count' => $selectedCount])); ?>

                    <?php else: ?>
                        <?php echo e(__('Select records to enable bulk actions.')); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <span class="table-bulk-actions__limit"><?php echo e(__('Limit: :limit.', ['limit' => $maxSelection])); ?></span>
                </p>
            </div>
        </div>

        <label class="table-bulk-actions__page-toggle">
            <input
                type="checkbox"
                class="size-4 rounded border-border text-primary focus:ring-primary"
                wire:click="toggleBulkPage(<?php echo \Illuminate\Support\Js::from($pageIds)->toHtml() ?>)"
                <?php if($pageSelectionComplete): echo 'checked'; endif; ?>
                aria-label="<?php echo e($pageSelectionComplete ? __('Clear page selection') : __('Select all records on this page')); ?>"
            />
            <span class="min-w-0">
                <span class="block text-sm font-medium text-text-primary"><?php echo e($pageSelectionComplete ? __('Clear page selection') : __('Select page')); ?></span>
                <span class="block text-xs text-text-muted"><?php echo e(__(':count visible records', ['count' => $pageCount])); ?></span>
            </span>
        </label>
    </div>

    <div class="table-bulk-actions__commands">
        <div class="flex min-w-0 items-center gap-2 text-xs text-text-muted">
            <span class="hidden sm:inline"><?php echo e(__('Selection scope')); ?>:</span>
            <span class="table-bulk-actions__scope"><?php echo e(__('Current page')); ?></span>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedCount > 0 && isset($actions)): ?>
            <div class="table-bulk-actions__action-list" data-bulk-action-list>
                <span class="sr-only"><?php echo e(__('Actions for selected records')); ?></span>
                <?php echo e($actions); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedCount > 0): ?>
            <?php ob_start(); ?><button type="button" class="relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none justify-center h-8 text-sm rounded-md px-3 inline-flex  bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-800 dark:text-white    *:transition-opacity [&amp;[data-loading]&gt;:not([data-flux-loading-indicator])]:opacity-0 [&amp;[data-flux-loading]&gt;:not([data-flux-loading-indicator])]:opacity-0 [&amp;[data-loading]&gt;[data-flux-loading-indicator]]:opacity-100 [&amp;[data-flux-loading]&gt;[data-flux-loading-indicator]]:opacity-100 data-loading:pointer-events-none data-flux-loading:pointer-events-none" data-flux-button="data-flux-button" wire:target="clearBulkSelection" wire:loading.attr="data-flux-loading" wire:click="clearBulkSelection">
        <div class="absolute inset-0 flex items-center justify-center opacity-0" data-flux-loading-indicator>
                <svg class="shrink-0 [:where(&amp;)]:size-4 animate-spin" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" data-slot="icon">
    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
</svg>
                    </div>
        
                    <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?>
                <?php echo e(__('Clear selection')); ?>

            <?php echo trim(ob_get_clean()); ?></span>
    </button>
<?php echo ltrim(ob_get_clean()); ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <span wire:loading.flex wire:target="toggleBulkPage,clearBulkSelection,bulkToggleProductStatus,bulkToggleCategoryStatus,bulkToggleBrandStatus,bulkToggleSupplierStatus,bulkToggleBranchStatus,bulkToggleStoreStatus" class="table-bulk-actions__loading" role="status" aria-live="polite">
            <?php ob_start(); ?><svg class="shrink-0 [:where(&amp;)]:size-6 size-3.5 animate-spin" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
</svg>

        <?php echo ltrim(ob_get_clean()); ?>
            <?php echo e(__('Updating selection...')); ?>

        </span>
    </div>
</div>
<?php /**PATH C:\projects\toy-joy-phase-1-documentation\resources\views/components/tables/bulk-actions.blade.php ENDPATH**/ ?>