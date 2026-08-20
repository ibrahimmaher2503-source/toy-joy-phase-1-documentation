<?php # [BlazeFolded]:{flux::button}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::callout}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/callout/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::callout}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/callout/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::badge}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/badge/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::button}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::heading}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/heading.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::text}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/text.blade.php}:{1781799918} ?>
<?php # [BlazeFolded]:{flux::callout}:{C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/callout/index.blade.php}:{1781799918} ?>
<?php
    $setup ??= app(\App\Modules\Platform\Support\InitialSetupStatus::class)->snapshot();
    $nextStep = collect($setup['steps'])->first(static fn (array $step): bool => $step['required'] && ! $step['complete']);
    $statusClasses = ['not_started' => ['border-zinc-300/70', 'bg-zinc-500/10'], 'incomplete' => ['border-amber-500/35', 'bg-amber-500/10'], 'ready' => ['border-sky-500/35', 'bg-sky-500/10'], 'blocked' => ['border-rose-500/35', 'bg-rose-500/10'], 'completed' => ['border-emerald-500/30', 'bg-emerald-500/10']];
    $stepGroups = [
        'foundation' => ['label' => __('Foundation'), 'description' => __('Set the company context and the places where work happens.'), 'keys' => ['company', 'branches-stores', 'warehouses', 'pos-selling-location', 'cash-drawers', 'users-scopes']],
        'configuration' => ['label' => __('Configuration'), 'description' => __('Save the financial, numbering, printer-profile, and template-assignment rules used by operations.'), 'keys' => ['payment-methods', 'taxes', 'document-sequences', 'printers', 'print-templates']],
        'master-data' => ['label' => __('Master data'), 'description' => __('Prepare catalog definitions, customers, suppliers, products, prices, and opening inventory in dependency order.'), 'keys' => ['categories', 'brands', 'customer-groups', 'customers', 'party-readiness', 'supplier-groups', 'suppliers', 'product-masters', 'product-import', 'prices', 'opening-configuration']],
    ];
?>

<?php if (isset($component)) { $__componentOriginal81a506f898233b9e7d58286e6bea3c18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81a506f898233b9e7d58286e6bea3c18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'f4ac99e09542ff494432bc959d4fee61::app','data' => ['title' => __('Initial setup')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts::app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Initial setup'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php if (isset($component)) { $__componentOriginalddf44183544a95f193518110979774f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalddf44183544a95f193518110979774f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app.page','data' => ['title' => __('Initial setup progress'),'description' => __('Finish setup and master data definitions before daily operations and transactions.'),'maxWidth' => '7xl','class' => 'space-y-6','dataGuide' => 'initial-setup-header']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app.page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Initial setup progress')),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Finish setup and master data definitions before daily operations and transactions.')),'max-width' => '7xl','class' => 'space-y-6','data-guide' => 'initial-setup-header']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

         <?php $__env->slot('actions', null, []); ?> 
            <form method="POST" action="<?php echo e(route('locale.switch')); ?>" class="inline-flex"><?php echo csrf_field(); ?><input type="hidden" name="locale" value="<?php echo e(app()->getLocale() === 'ar' ? 'en' : 'ar'); ?>"><?php ob_start(); ?><button type="submit" class="relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none justify-center h-10 text-sm rounded-lg ps-3 pe-4 inline-flex  bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white    *:transition-opacity [&amp;[disabled]&gt;:not([data-flux-loading-indicator])]:opacity-0 [&amp;[disabled]&gt;[data-flux-loading-indicator]]:opacity-100 [&amp;[disabled]]:pointer-events-none" data-flux-button="data-flux-button">
        <div class="absolute inset-0 flex items-center justify-center opacity-0" data-flux-loading-indicator>
                <svg class="shrink-0 [:where(&amp;)]:size-4 animate-spin" data-flux-icon xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true" data-slot="icon">
    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
</svg>
                    </div>
        
                    <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M11 5a.75.75 0 0 1 .688.452l3.25 7.5a.75.75 0 1 1-1.376.596L12.89 12H9.109l-.67 1.548a.75.75 0 1 1-1.377-.596l3.25-7.5A.75.75 0 0 1 11 5Zm-1.24 5.5h2.48L11 7.636 9.76 10.5ZM5 1a.75.75 0 0 1 .75.75v1.261a25.27 25.27 0 0 1 2.598.211.75.75 0 1 1-.2 1.487c-.22-.03-.44-.056-.662-.08A12.939 12.939 0 0 1 5.92 8.058c.237.304.488.595.752.873a.75.75 0 0 1-1.086 1.035A13.075 13.075 0 0 1 5 9.307a13.068 13.068 0 0 1-2.841 2.546.75.75 0 0 1-.827-1.252A11.566 11.566 0 0 0 4.08 8.057a12.991 12.991 0 0 1-.554-.938.75.75 0 1 1 1.323-.707c.049.09.099.181.15.271.388-.68.708-1.405.952-2.164a23.941 23.941 0 0 0-4.1.19.75.75 0 0 1-.2-1.487c.853-.114 1.72-.185 2.598-.211V1.75A.75.75 0 0 1 5 1Z" clip-rule="evenodd"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?><?php echo e(app()->getLocale() === 'ar' ? __('Switch to English') : __('Switch to Arabic')); ?><?php echo trim(ob_get_clean()); ?></span>
    </button>
<?php echo ltrim(ob_get_clean()); ?></form>
            <?php ob_start(); ?><a href="<?php echo e(route('dashboard')); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none justify-center h-10 text-sm rounded-lg ps-3 pe-4 inline-flex  bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white" wire:navigate="">
        <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?><?php echo e(__('Back to dashboard')); ?><?php echo trim(ob_get_clean()); ?></span>
    </a>
<?php echo ltrim(ob_get_clean()); ?>
         <?php $__env->endSlot(); ?>
        <section class="grid gap-4 lg:grid-cols-[minmax(0,1fr)_22rem]" data-guide="initial-setup-summary">
            <div class="rounded-2xl border border-border bg-surface p-5 shadow-card sm:p-6"><div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"><div><div class="text-xs font-semibold uppercase tracking-[0.16em] text-primary"><?php echo e(__('Setup / master data')); ?></div><?php ob_start(); ?><div class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-base [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2 mt-2" data-flux-heading><?php ob_start(); ?><?php echo e(__('Configuration status')); ?><?php echo trim(ob_get_clean()); ?></div>
<?php echo ltrim(ob_get_clean()); ?><?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 mt-1" data-flux-text ><?php ob_start(); ?><?php echo e(__('Each status below comes from persisted data and its readiness rule.')); ?><?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?></div><div class="text-start sm:text-end"><div class="text-2xl font-semibold tracking-tight text-primary"><span dir="ltr"><?php echo e($setup['completed_count']); ?> / <?php echo e($setup['required_count']); ?></span></div><div class="text-xs font-medium uppercase tracking-wide text-text-muted"><?php echo e(__('Required complete')); ?></div></div></div><progress class="mt-5 h-2.5 w-full accent-primary" value="<?php echo e($setup['progress_percent']); ?>" max="100" aria-label="<?php echo e(__('Setup progress')); ?>"><?php echo e($setup['progress_percent']); ?>%</progress><div class="mt-3 flex flex-wrap gap-x-5 gap-y-2 text-xs text-text-muted"><span><?php echo e(__('Not started')); ?></span><span><?php echo e(__('Incomplete')); ?></span><span><?php echo e(__('Ready')); ?></span><span><?php echo e(__('Blocked')); ?></span><span><?php echo e(__('Completed')); ?></span></div></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($nextStep): ?><div class="flex flex-col justify-between gap-5 rounded-2xl border border-amber-500/30 bg-amber-500/10 p-5 shadow-sm sm:p-6" data-guide="initial-setup-next-step"><div><div class="text-xs font-semibold uppercase tracking-[0.16em] text-amber-800 dark:text-amber-200"><?php echo e(__('Next action')); ?></div><?php ob_start(); ?><div class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-sm [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2 mt-3" data-flux-heading><?php ob_start(); ?><?php echo e($nextStep['label']); ?><?php echo trim(ob_get_clean()); ?></div>
<?php echo ltrim(ob_get_clean()); ?><?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 mt-1" data-flux-text ><?php ob_start(); ?><?php echo e($nextStep['reason']); ?><?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?></div><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($nextStep['route'] && $nextStep['can_access']): ?><?php ob_start(); ?><a href="<?php echo e($nextStep['route']); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none justify-center h-10 text-sm rounded-lg ps-3 pe-4 inline-flex  bg-[var(--color-accent)] hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)] text-[var(--color-accent-foreground)] border border-black/10 dark:border-0 shadow-[inset_0px_1px_--theme(--color-white/.2)] [[data-flux-button-group]_&amp;]:border-e-0 [:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-[1px] dark:[:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-e-0 dark:[:is([data-flux-button-group]&gt;&amp;:last-child,_[data-flux-button-group]_:last-child&gt;&amp;)]:border-s-[1px] [:is([data-flux-button-group]&gt;&amp;:not(:first-child),_[data-flux-button-group]_:not(:first-child)&gt;&amp;)]:border-s-[color-mix(in_srgb,var(--color-accent-foreground),transparent_85%)]" data-flux-group-target="data-flux-group-target" data-setup-route="<?php echo e($nextStep['route_name']); ?>" wire:navigate="">
        <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?><?php echo e($nextStep['cta_label']); ?><?php echo trim(ob_get_clean()); ?></span>
    </a>
<?php echo ltrim(ob_get_clean()); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div><?php else: ?><?php ob_start(); ?><div class="@container p-2 flex border rounded-xl border-(--callout-border) bg-(--callout-background) [&amp;_[data-slot=heading]]:text-(--callout-heading) [&amp;_[data-slot=text]]:text-(--callout-text) [--callout-border:var(--color-green-300)] dark:[--callout-border:color-mix(in_oklab,var(--color-green-400),transparent_50%)] [--callout-background:var(--color-green-50)] dark:[--callout-background:color-mix(in_oklab,var(--color-green-400),transparent_90%)] [--callout-heading:var(--color-green-600)] dark:[--callout-heading:var(--color-green-200)] [--callout-text:var(--color-green-600)] dark:[--callout-text:var(--color-green-300)] [--callout-icon:var(--color-green-500)] dark:[--callout-icon:var(--color-green-400)]" title="<?php echo e(__('All required setup steps are complete')); ?>" data-flux-callout>
            <div class="ps-2 py-2 pe-0 flex items-baseline">
            <svg class="shrink-0 [:where(&amp;)]:size-5 inline-block size-5 text-[var(--callout-icon)] dark:text-[var(--callout-icon)]" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd"/>
</svg>

                </div>
    
    <div class="ps-2 flex-1 ">
        <div class="flex-1 py-2 pe-3 @md:pe-4 flex flex-col justify-center gap-2" data-slot="content">
            
            
            <?php ob_start(); ?><?php echo e(__('Review the saved definitions before opening daily operations.')); ?><?php echo trim(ob_get_clean()); ?>

        </div>

            </div>

    </div>
<?php echo ltrim(ob_get_clean()); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </section>
        <?php ob_start(); ?><div class="@container p-2 flex border rounded-xl border-(--callout-border) bg-(--callout-background) [&amp;_[data-slot=heading]]:text-(--callout-heading) [&amp;_[data-slot=text]]:text-(--callout-text) [--callout-border:var(--color-zinc-200)] dark:[--callout-border:color-mix(in_oklab,var(--color-white),transparent_95%)] [--callout-background:var(--color-white)] dark:[--callout-background:color-mix(in_oklab,var(--color-zinc-400),transparent_90%)] [--callout-heading:var(--color-zinc-800)] dark:[--callout-heading:var(--color-zinc-200)] [--callout-text:var(--color-zinc-500)] dark:[--callout-text:var(--color-zinc-300)] [--callout-icon:var(--color-zinc-400)] dark:[--callout-icon:var(--color-zinc-400)]" title="<?php echo e(__('Definitions first, transactions later')); ?>" data-flux-callout>
            <div class="ps-2 py-2 pe-0 flex items-baseline">
            <svg class="shrink-0 [:where(&amp;)]:size-5 inline-block size-5 text-[var(--callout-icon)] dark:text-[var(--callout-icon)]" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd"/>
</svg>

                </div>
    
    <div class="ps-2 flex-1 ">
        <div class="flex-1 py-2 pe-3 @md:pe-4 flex flex-col justify-center gap-2" data-slot="content">
            
            
            <?php ob_start(); ?><?php echo e(__('Use Setup / Master Data for company, branch, catalog, and policy definitions. Daily Operations / Transactions remains separate for sales, purchase orders, inventory movements, parties, settlements, and returns.')); ?><?php echo trim(ob_get_clean()); ?>

        </div>

            </div>

    </div>
<?php echo ltrim(ob_get_clean()); ?>
        <section aria-labelledby="owner-decisions-heading" data-guide="initial-setup-owner-decisions">
            <div class="mb-4"><div class="text-xs font-semibold uppercase tracking-[0.16em] text-amber-700 dark:text-amber-300"><?php echo e(__('Owner decisions')); ?></div><?php ob_start(); ?><div class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-base [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2 mt-2" id="owner-decisions-heading" data-flux-heading><?php ob_start(); ?><?php echo e(__('Open decisions with an entry or review surface')); ?><?php echo trim(ob_get_clean()); ?></div>
<?php echo ltrim(ob_get_clean()); ?><?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 mt-1 max-w-4xl text-sm leading-6" data-flux-text ><?php ob_start(); ?><?php echo e(__('Each card stays pending until the owner confirms the policy. Use the linked screen to enter or review the decision; this page never records an approval by itself.')); ?><?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?></div>
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $setup['owner_decisions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $decision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <article class="flex h-full flex-col gap-4 rounded-2xl border border-amber-500/30 bg-amber-500/5 p-5 shadow-sm sm:p-6" data-owner-decision="<?php echo e($decision['key']); ?>">
                        <div class="flex items-start justify-between gap-3"><?php ob_start(); ?><div class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-sm [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2 min-w-0" data-flux-heading><?php ob_start(); ?><?php echo e($decision['title']); ?><?php echo trim(ob_get_clean()); ?></div>
<?php echo ltrim(ob_get_clean()); ?><?php ob_start(); ?><div data-flux-badge="data-flux-badge" class="inline-flex items-center font-medium whitespace-nowrap  [print-color-adjust:exact] text-xs py-1 **:data-flux-badge-icon:me-1 rounded-md px-2 text-amber-700 [&amp;_button]:text-amber-700! dark:text-amber-200 dark:[&amp;_button]:text-amber-200! bg-amber-400/25 dark:bg-amber-400/40 [&amp;:is(button)]:hover:bg-amber-400/40 dark:[button]:hover:bg-amber-400/50 shrink-0">
        <?php ob_start(); ?><?php echo e($decision['status_label']); ?><?php echo trim(ob_get_clean()); ?>

    </div>
<?php echo ltrim(ob_get_clean()); ?></div>
                        <?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 text-sm leading-6 text-text-muted" data-flux-text ><?php ob_start(); ?><?php echo e($decision['description']); ?><?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?>
                        <div class="mt-auto border-t border-amber-500/20 pt-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($decision['can_access']): ?>
                                <?php ob_start(); ?><a href="<?php echo e($decision['route']); ?>" data-flux-button="data-flux-button" class="relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none justify-center h-8 text-sm rounded-md px-3 inline-flex  bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-500 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white" data-setup-route="<?php echo e($decision['route_name']); ?>" wire:navigate="">
        <svg class="shrink-0 [:where(&amp;)]:size-4" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z" clip-rule="evenodd"/>
</svg>

                
                    
            
            <span><?php ob_start(); ?><?php echo e($decision['cta_label']); ?><?php echo trim(ob_get_clean()); ?></span>
    </a>
<?php echo ltrim(ob_get_clean()); ?>
                            <?php else: ?>
                                <span class="text-xs font-medium text-text-muted"><?php echo e(__('Permission required')); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </article>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
        <section aria-label="<?php echo e(__('Initial setup steps')); ?>" data-guide="initial-setup-steps"><div class="mb-4"><div class="text-xs font-semibold uppercase tracking-[0.16em] text-primary"><?php echo e(__('Owner checklist')); ?></div><?php ob_start(); ?><div class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-base [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2 mt-2" data-flux-heading><?php ob_start(); ?><?php echo e(__('Initial setup steps')); ?><?php echo trim(ob_get_clean()); ?></div>
<?php echo ltrim(ob_get_clean()); ?><?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 mt-1 max-w-4xl text-sm leading-6" data-flux-text ><?php ob_start(); ?><?php echo e(__('Follow the sections in order. Each action opens the internal screen that owns the data, and returning here refreshes the readiness status.')); ?><?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?></div>
            <?php ($stepNumber = 0); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stepGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupKey => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="mt-7 first:mt-0" data-setup-section="<?php echo e($groupKey); ?>"><div class="mb-3 flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between"><div><?php ob_start(); ?><div class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-sm [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2" data-flux-heading><?php ob_start(); ?><?php echo e($group['label']); ?><?php echo trim(ob_get_clean()); ?></div>
<?php echo ltrim(ob_get_clean()); ?><?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 text-sm" data-flux-text ><?php ob_start(); ?><?php echo e($group['description']); ?><?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?></div><span class="text-xs font-medium text-text-muted"><?php echo e(count($group['keys'])); ?> <?php echo e(__('areas')); ?></span></div><div class="grid gap-4 md:grid-cols-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = collect($setup['steps'])->whereIn('key', $group['keys']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php ($stepNumber++); ?>
                        <?php ($classes = $statusClasses[$step['status']] ?? $statusClasses['incomplete']); ?>
                        <article class="group flex h-full flex-col gap-4 rounded-2xl border <?php echo e($classes[0]); ?> bg-surface p-5 shadow-sm sm:p-6" data-guide="initial-setup-step-<?php echo e($step['key']); ?>" data-setup-destination="<?php echo e($step['destination_key']); ?>"><div class="flex items-start justify-between gap-4"><div class="flex min-w-0 items-start gap-3"><span class="flex size-10 shrink-0 items-center justify-center rounded-xl <?php echo e($classes[1]); ?> text-sm font-semibold"><?php echo e(str_pad((string) $stepNumber, 2, '0', STR_PAD_LEFT)); ?></span><div class="min-w-0"><?php ob_start(); ?><div class="font-medium [:where(&amp;)]:text-zinc-800 [:where(&amp;)]:dark:text-white text-sm [&amp;:has(+[data-flux-subheading])]:mb-2 [[data-flux-subheading]+&amp;]:mt-2" data-flux-heading><?php ob_start(); ?><?php echo e($step['label']); ?><?php echo trim(ob_get_clean()); ?></div>
<?php echo ltrim(ob_get_clean()); ?><?php ob_start(); ?><p class="[:where(&amp;)]:font-normal [:where(&amp;)]:text-sm [:where(&amp;)]:text-zinc-500 [:where(&amp;)]:dark:text-white/70 mt-1 text-sm leading-6" data-flux-text ><?php ob_start(); ?><?php echo e($step['description']); ?><?php echo trim(ob_get_clean()); ?></p><?php echo ltrim(ob_get_clean()); ?></div></div><?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/badge/index.blade.php', $__blaze->compiledPath.'/37b38441f2ce9fb75eb5edd8233bdbca.php'); ?>
<?php if (isset($__slots37b38441f2ce9fb75eb5edd8233bdbca)) { $__slotsStack37b38441f2ce9fb75eb5edd8233bdbca[] = $__slots37b38441f2ce9fb75eb5edd8233bdbca; } ?>
<?php if (isset($__attrs37b38441f2ce9fb75eb5edd8233bdbca)) { $__attrsStack37b38441f2ce9fb75eb5edd8233bdbca[] = $__attrs37b38441f2ce9fb75eb5edd8233bdbca; } ?>
<?php $__attrs37b38441f2ce9fb75eb5edd8233bdbca = ['size' => 'sm','color' => e($step['status'] === 'completed' ? 'green' : ($step['status'] === 'blocked' ? 'red' : ($step['status'] === 'ready' ? 'blue' : 'amber')))]; ?>
<?php $__slots37b38441f2ce9fb75eb5edd8233bdbca = []; ?>
<?php $__blaze->pushData($__attrs37b38441f2ce9fb75eb5edd8233bdbca); ?>
<?php ob_start(); ?><?php echo e($step['status_label']); ?><?php $__slots37b38441f2ce9fb75eb5edd8233bdbca['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slots37b38441f2ce9fb75eb5edd8233bdbca); ?>
<?php _37b38441f2ce9fb75eb5edd8233bdbca($__blaze, $__attrs37b38441f2ce9fb75eb5edd8233bdbca, $__slots37b38441f2ce9fb75eb5edd8233bdbca, [], [], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStack37b38441f2ce9fb75eb5edd8233bdbca)) { $__slots37b38441f2ce9fb75eb5edd8233bdbca = array_pop($__slotsStack37b38441f2ce9fb75eb5edd8233bdbca); } ?>
<?php if (! empty($__attrsStack37b38441f2ce9fb75eb5edd8233bdbca)) { $__attrs37b38441f2ce9fb75eb5edd8233bdbca = array_pop($__attrsStack37b38441f2ce9fb75eb5edd8233bdbca); } ?>
<?php $__blaze->popData(); ?></div><div class="mt-auto border-t border-border pt-4"><p class="text-sm leading-6 text-text-muted"><?php echo e($step['reason']); ?></p><div class="mt-3 flex items-center justify-between gap-3"><span class="text-xs font-medium text-text-muted"><?php echo e($step['required'] ? __('Required') : __('Optional')); ?></span><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step['route'] && $step['can_access']): ?><?php $__blaze->ensureRequired('C:\projects\toy-joy-phase-1-documentation\vendor\livewire\flux\src/../stubs/resources/views/flux/button/index.blade.php', $__blaze->compiledPath.'/a137de91fae332872b736a951544cc5c.php'); ?>
<?php if (isset($__slotsa137de91fae332872b736a951544cc5c)) { $__slotsStacka137de91fae332872b736a951544cc5c[] = $__slotsa137de91fae332872b736a951544cc5c; } ?>
<?php if (isset($__attrsa137de91fae332872b736a951544cc5c)) { $__attrsStacka137de91fae332872b736a951544cc5c[] = $__attrsa137de91fae332872b736a951544cc5c; } ?>
<?php $__attrsa137de91fae332872b736a951544cc5c = ['href' => $step['route'],'dataSetupRoute' => e($step['route_name']),'dataSetupDestination' => e($step['destination_key']),'variant' => e($step['complete'] ? 'subtle' : 'primary'),'size' => 'sm','icon' => 'arrow-left','wire:navigate' => true]; ?>
<?php $__slotsa137de91fae332872b736a951544cc5c = []; ?>
<?php $__blaze->pushData($__attrsa137de91fae332872b736a951544cc5c); ?>
<?php ob_start(); ?><?php echo e($step['cta_label']); ?><?php $__slotsa137de91fae332872b736a951544cc5c['slot'] = new \Illuminate\View\ComponentSlot(trim(ob_get_clean()), []); ?>
<?php $__blaze->pushSlots($__slotsa137de91fae332872b736a951544cc5c); ?>
<?php _a137de91fae332872b736a951544cc5c($__blaze, $__attrsa137de91fae332872b736a951544cc5c, $__slotsa137de91fae332872b736a951544cc5c, ['href', 'wire:navigate'], ['dataSetupRoute' => 'data-setup-route', 'dataSetupDestination' => 'data-setup-destination'], $__this ?? (isset($this) ? $this : null)); ?>
<?php if (! empty($__slotsStacka137de91fae332872b736a951544cc5c)) { $__slotsa137de91fae332872b736a951544cc5c = array_pop($__slotsStacka137de91fae332872b736a951544cc5c); } ?>
<?php if (! empty($__attrsStacka137de91fae332872b736a951544cc5c)) { $__attrsa137de91fae332872b736a951544cc5c = array_pop($__attrsStacka137de91fae332872b736a951544cc5c); } ?>
<?php $__blaze->popData(); ?><?php elseif($step['route']): ?><span class="text-xs font-medium text-text-muted"><?php echo e(__('Permission required')); ?></span><?php else: ?><span class="text-xs font-medium text-rose-700 dark:text-rose-300"><?php echo e(__('No configuration surface')); ?></span><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div></div></article>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </section>
        <?php ob_start(); ?><div class="@container p-2 flex border rounded-xl border-(--callout-border) bg-(--callout-background) [&amp;_[data-slot=heading]]:text-(--callout-heading) [&amp;_[data-slot=text]]:text-(--callout-text) [--callout-border:var(--color-yellow-400)] dark:[--callout-border:color-mix(in_oklab,var(--color-yellow-400),transparent_50%)] [--callout-background:var(--color-yellow-50)] dark:[--callout-background:color-mix(in_oklab,var(--color-yellow-400),transparent_90%)] [--callout-heading:var(--color-yellow-600)] dark:[--callout-heading:var(--color-yellow-200)] [--callout-text:var(--color-yellow-700)] dark:[--callout-text:var(--color-yellow-300)] [--callout-icon:var(--color-yellow-500)] dark:[--callout-icon:var(--color-yellow-400)]" title="<?php echo e(__('Readiness is not approval')); ?>" data-flux-callout>
            <div class="ps-2 py-2 pe-0 flex items-baseline">
            <svg class="shrink-0 [:where(&amp;)]:size-5 inline-block size-5 text-[var(--callout-icon)] dark:text-[var(--callout-icon)]" data-flux-icon xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M9.661 2.237a.531.531 0 0 1 .678 0 11.947 11.947 0 0 0 7.078 2.749.5.5 0 0 1 .479.425c.069.52.104 1.05.104 1.59 0 5.162-3.26 9.563-7.834 11.256a.48.48 0 0 1-.332 0C5.26 16.564 2 12.163 2 7c0-.538.035-1.069.104-1.589a.5.5 0 0 1 .48-.425 11.947 11.947 0 0 0 7.077-2.75Zm4.196 5.954a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd"/>
</svg>

                </div>
    
    <div class="ps-2 flex-1 ">
        <div class="flex-1 py-2 pe-3 @md:pe-4 flex flex-col justify-center gap-2" data-slot="content">
            
            
            <?php ob_start(); ?><?php echo e(__('A saved row is counted only when the current readiness rule is met. Financial approvals, production devices, and owner/UAT decisions remain separate gates.')); ?><?php echo trim(ob_get_clean()); ?>

        </div>

            </div>

    </div>
<?php echo ltrim(ob_get_clean()); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalddf44183544a95f193518110979774f8)): ?>
<?php $attributes = $__attributesOriginalddf44183544a95f193518110979774f8; ?>
<?php unset($__attributesOriginalddf44183544a95f193518110979774f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalddf44183544a95f193518110979774f8)): ?>
<?php $component = $__componentOriginalddf44183544a95f193518110979774f8; ?>
<?php unset($__componentOriginalddf44183544a95f193518110979774f8); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81a506f898233b9e7d58286e6bea3c18)): ?>
<?php $attributes = $__attributesOriginal81a506f898233b9e7d58286e6bea3c18; ?>
<?php unset($__attributesOriginal81a506f898233b9e7d58286e6bea3c18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81a506f898233b9e7d58286e6bea3c18)): ?>
<?php $component = $__componentOriginal81a506f898233b9e7d58286e6bea3c18; ?>
<?php unset($__componentOriginal81a506f898233b9e7d58286e6bea3c18); ?>
<?php endif; ?>
<?php /**PATH C:\projects\toy-joy-phase-1-documentation\resources\views/platform/initial-setup.blade.php ENDPATH**/ ?>