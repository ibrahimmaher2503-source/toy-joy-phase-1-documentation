<?php

use Flux\Flux;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('UI Pattern Showcase')] class extends Component {
    /**
     * Active showcase section tab.
     */
    public string $activeSection = 'headers';

    /**
     * Demo state toggles.
     */
    public bool $isSimulatingLoading = false;

    /**
     * Demo form input properties.
     */
    public string $demoInput = '';
    public string $demoSelect = 'active';

    /**
     * Mount the component with authorization check.
     */
    public function mount(): void
    {
        Gate::authorize('view-ui-showcase');
    }

    /**
     * Toggle simulated loading state.
     */
    public function toggleLoading(): void
    {
        $this->isSimulatingLoading = !$this->isSimulatingLoading;
        Flux::toast(
            variant: 'info',
            text: $this->isSimulatingLoading ? __('Simulating loading state...') : __('Loading state reset.')
        );
    }

    /**
     * Trigger example toast notification.
     */
    public function triggerToast(): void
    {
        Flux::toast(variant: 'success', text: __('Example toast notification triggered successfully!'));
    }
}; ?>

<section class="w-full space-y-6">
    <!-- Showcase Page Header -->
    <x-page-header
        :title="__('[EXAMPLE] Shared UI Pattern Showcase')"
        :description="__('Local pattern matrix demonstrating standard headers, state panels, status badges, timelines, audit panels, Flux UI controls, and print placeholders.')"
        badge="LOCAL PATTERNS"
        badgeColor="teal"
        requestId="REQ-SHOWCASE-004"
    >
        <x-slot:actions>
            <flux:button icon="sparkles" size="sm" variant="primary" wire:click="triggerToast">
                {{ __('Test Toast') }}
            </flux:button>
            <flux:button icon="arrow-path" size="sm" variant="subtle" wire:click="toggleLoading">
                {{ $isSimulatingLoading ? __('Reset Loading') : __('Simulate Loading') }}
            </flux:button>
        </x-slot:actions>
    </x-page-header>

    <!-- Interactive Simulated Loading Banner -->
    @if ($isSimulatingLoading)
        <x-state.loading :title="__('[EXAMPLE] Simulated Loading State Active')" :description="__('Demonstrating centered skeleton/spinner component during async operations.')" />
    @endif

    <!-- Showcase Navigation Bar -->
    <div class="flex flex-wrap items-center gap-2 border-b border-zinc-200 dark:border-zinc-800 pb-3">
        <flux:button size="sm" icon="layout-grid" :variant="$activeSection === 'headers' ? 'primary' : 'subtle'" wire:click="$set('activeSection', 'headers')">
            {{ __('Page Headers') }}
        </flux:button>
        <flux:button size="sm" icon="exclamation-circle" :variant="$activeSection === 'states' ? 'primary' : 'subtle'" wire:click="$set('activeSection', 'states')">
            {{ __('State Panels') }}
        </flux:button>
        <flux:button size="sm" icon="tag" :variant="$activeSection === 'status' ? 'primary' : 'subtle'" wire:click="$set('activeSection', 'status')">
            {{ __('Status & Timeline') }}
        </flux:button>
        <flux:button size="sm" icon="shield-check" :variant="$activeSection === 'audit' ? 'primary' : 'subtle'" wire:click="$set('activeSection', 'audit')">
            {{ __('Audit Panel') }}
        </flux:button>
        <flux:button size="sm" icon="command-line" :variant="$activeSection === 'controls' ? 'primary' : 'subtle'" wire:click="$set('activeSection', 'controls')">
            {{ __('Form & Table Patterns') }}
        </flux:button>
        <flux:button size="sm" icon="printer" :variant="$activeSection === 'print' ? 'primary' : 'subtle'" wire:click="$set('activeSection', 'print')">
            {{ __('Print Placeholders') }}
        </flux:button>
    </div>

    <!-- SECTION 1: Page Header Patterns -->
    @if ($activeSection === 'headers')
        <div class="space-y-6">
            <flux:card class="space-y-4">
                <flux:heading size="lg">{{ __('1. Full Page Header Pattern (with Breadcrumbs & Actions)') }}</flux:heading>
                <div class="p-4 border border-zinc-200 dark:border-zinc-800 rounded-lg bg-zinc-50/50 dark:bg-zinc-900/50">
                    <x-page-header
                        :title="__('[EXAMPLE] Sales Invoice Master')"
                        :description="__('Manage retail sales documents, pricing rules, and daily summaries.')"
                        badge="ACTIVE"
                        badgeColor="green"
                        requestId="REQ-SAMPLE-88"
                    >
                        <x-slot:breadcrumbs>
                            <span>{{ __('Home') }}</span> / <span>{{ __('Sales') }}</span> / <span class="text-zinc-900 dark:text-zinc-100 font-medium">{{ __('Invoices') }}</span>
                        </x-slot:breadcrumbs>

                        <x-slot:actions>
                            <flux:button size="sm" icon="plus" variant="primary">{{ __('New Invoice') }}</flux:button>
                            <flux:button size="sm" icon="arrow-down-tray" variant="subtle">{{ __('Export') }}</flux:button>
                        </x-slot:actions>
                    </x-page-header>
                </div>
            </flux:card>

            <flux:card class="space-y-4">
                <flux:heading size="lg">{{ __('2. Minimal Page Header Pattern') }}</flux:heading>
                <div class="p-4 border border-zinc-200 dark:border-zinc-800 rounded-lg bg-zinc-50/50 dark:bg-zinc-900/50">
                    <x-page-header
                        :title="__('[EXAMPLE] General Settings')"
                        :description="__('System parameters and operational configurations.')"
                    />
                </div>
            </flux:card>
        </div>
    @endif

    <!-- SECTION 2: State Panels -->
    @if ($activeSection === 'states')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Empty State -->
            <flux:card class="space-y-3">
                <flux:heading size="lg">{{ __('Empty State Pattern') }}</flux:heading>
                <flux:subheading size="xs">{{ __('Used when a list, filter query, or section returns zero records.') }}</flux:subheading>

                <x-state.empty
                    :title="__('[EXAMPLE] No Cash Drawers Found')"
                    :description="__('No active cash drawer assignments exist for the selected branch.')"
                    icon="inbox"
                >
                    <x-slot:action>
                        <flux:button size="sm" icon="plus" variant="primary">{{ __('Assign Drawer') }}</flux:button>
                    </x-slot:action>
                </x-state.empty>
            </flux:card>

            <!-- Loading State -->
            <flux:card class="space-y-3">
                <flux:heading size="lg">{{ __('Loading State Pattern') }}</flux:heading>
                <flux:subheading size="xs">{{ __('Used during async data fetching or component updates.') }}</flux:subheading>

                <x-state.loading
                    :title="__('[EXAMPLE] Syncing Branch Catalog...')"
                    :description="__('Please wait while inventory balance snapshots are computed.')"
                />
            </flux:card>

            <!-- Error State -->
            <flux:card class="space-y-3">
                <flux:heading size="lg">{{ __('Error State Pattern') }}</flux:heading>
                <flux:subheading size="xs">{{ __('Used when a recoverable request failure occurs while retaining user input.') }}</flux:subheading>

                <x-state.error
                    :title="__('[EXAMPLE] Network Disconnected')"
                    :description="__('Unable to reach local background queue. Safe inputs have been preserved.')"
                    requestId="ERR-LOCAL-503"
                />
            </flux:card>

            <!-- Permission Denied State -->
            <flux:card class="space-y-3">
                <flux:heading size="lg">{{ __('Permission Denied Pattern') }}</flux:heading>
                <flux:subheading size="xs">{{ __('Used when server policy denies access without leaking record existence.') }}</flux:subheading>

                <x-state.denied
                    :title="__('[EXAMPLE] Role Authorization Required')"
                    :description="__('Administrator rights are required to modify sequence number allocations.')"
                    requestId="DENIED-AUTH-403"
                />
            </flux:card>
        </div>
    @endif

    <!-- SECTION 3: Status Badges & Timeline -->
    @if ($activeSection === 'status')
        <div class="space-y-6">
            <flux:card class="space-y-4">
                <flux:heading size="lg">{{ __('1. Standard Status Badge Variants') }}</flux:heading>
                <flux:subheading size="xs">{{ __('Locale-aware color-coded status badges with dot indicators.') }}</flux:subheading>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <x-status.badge status="active" />
                    <x-status.badge status="healthy" />
                    <x-status.badge status="approved" />
                    <x-status.badge status="draft" />
                    <x-status.badge status="pending" />
                    <x-status.badge status="degraded" />
                    <x-status.badge status="rejected" />
                    <x-status.badge status="failed" />
                    <x-status.badge status="disabled" />
                    <x-status.badge status="processing" />
                    <x-status.badge status="override" />
                </div>
            </flux:card>

            <flux:card class="space-y-4">
                <flux:heading size="lg">{{ __('2. Event & Status Timeline Pattern') }}</flux:heading>
                <flux:subheading size="xs">{{ __('Chronological document lifecycle or status change audit history.') }}</flux:subheading>

                @php
                    $timelineEntries = [
                        [
                            'title' => '[EXAMPLE] Document Created',
                            'status' => 'draft',
                            'timestamp' => '2026-08-03 10:15:00',
                            'actor' => 'Store Cashier (User #102)',
                            'description' => 'Initial record created in local draft state.'
                        ],
                        [
                            'title' => '[EXAMPLE] Manager Override Requested',
                            'status' => 'pending',
                            'timestamp' => '2026-08-03 10:18:22',
                            'actor' => 'Store Cashier (User #102)',
                            'description' => 'Requested discount limit exception approval.'
                        ],
                        [
                            'title' => '[EXAMPLE] Override Approved',
                            'status' => 'approved',
                            'timestamp' => '2026-08-03 10:20:05',
                            'actor' => 'Branch Manager (User #44)',
                            'description' => 'Approved exception with override justification note.'
                        ],
                        [
                            'title' => '[EXAMPLE] Document Finalized',
                            'status' => 'active',
                            'timestamp' => '2026-08-03 10:21:40',
                            'actor' => 'System Engine',
                            'description' => 'Sequence number assigned atomically and immutable record stored.'
                        ],
                    ];
                @endphp

                <div class="pt-2 max-w-2xl">
                    <x-status.timeline :items="$timelineEntries" />
                </div>
            </flux:card>
        </div>
    @endif

    <!-- SECTION 4: Audit Panel -->
    @if ($activeSection === 'audit')
        <div class="space-y-6">
            <flux:card class="space-y-4">
                <flux:heading size="lg">{{ __('Record Traceability & Audit Metadata Panel') }}</flux:heading>
                <flux:subheading size="xs">{{ __('Contextual component for displaying record provenance, actors, and version metadata.') }}</flux:subheading>

                <x-audit-panel
                    createdByName="System Administrator (User #1)"
                    createdAt="2026-08-01 08:00:00"
                    updatedByName="Branch Supervisor (User #12)"
                    updatedAt="2026-08-03 01:30:15"
                    approvedByName="Operations Manager (User #5)"
                    approvedAt="2026-08-03 01:35:00"
                    requestId="REQ-AUDIT-9902"
                    version="2"
                    status="approved"
                >
                    <div class="flex items-center gap-2 text-zinc-500 dark:text-zinc-400">
                        <flux:icon name="information-circle" class="size-4 shrink-0 text-teal-600 dark:text-teal-400" />
                        <span>{{ __('All modifications are stored in an append-only local audit log.') }}</span>
                    </div>
                </x-audit-panel>
            </flux:card>
        </div>
    @endif

    <!-- SECTION 5: Form & Table Patterns -->
    @if ($activeSection === 'controls')
        <div class="space-y-6">
            <!-- Form Controls Demo Card -->
            <flux:card class="space-y-6">
                <flux:heading size="lg">{{ __('1. Form Controls Pattern (Native Flux UI)') }}</flux:heading>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <flux:field>
                        <flux:label>{{ __('Example Input Field') }}</flux:label>
                        <flux:input wire:model="demoInput" placeholder="{{ __('Type sample text...') }}" />
                        <flux:description>{{ __('Helper text providing validation guidance.') }}</flux:description>
                    </flux:field>

                    <flux:field>
                        <flux:label>{{ __('Example Select Control') }}</flux:label>
                        <flux:select wire:model="demoSelect">
                            <option value="active">{{ __('Active') }}</option>
                            <option value="pending">{{ __('Pending') }}</option>
                            <option value="inactive">{{ __('Inactive') }}</option>
                        </flux:select>
                    </flux:field>
                </div>

                <div class="flex items-center gap-6 pt-2">
                    <flux:checkbox label="{{ __('Example Checkbox Control') }}" default-checked />
                    <flux:switch label="{{ __('Example Switch Control') }}" default-checked />
                </div>
            </flux:card>

            <!-- Table Demo Card -->
            <flux:card class="space-y-4">
                <flux:heading size="lg">{{ __('2. Paginated Data Table Pattern (Native Flux UI)') }}</flux:heading>

                <flux:table>
                    <flux:table.columns>
                        <flux:table.column>{{ __('Record ID') }}</flux:table.column>
                        <flux:table.column>{{ __('Sample Name') }}</flux:table.column>
                        <flux:table.column>{{ __('Scope / Location') }}</flux:table.column>
                        <flux:table.column>{{ __('Status') }}</flux:table.column>
                        <flux:table.column class="text-end">{{ __('Actions') }}</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        <flux:table.row>
                            <flux:table.cell class="font-mono text-xs">REC-1001</flux:table.cell>
                            <flux:table.cell class="font-medium">[EXAMPLE] Main Warehouse</flux:table.cell>
                            <flux:table.cell>Branch 01 - Riyadh Central</flux:table.cell>
                            <flux:table.cell><x-status.badge status="active" /></flux:table.cell>
                            <flux:table.cell class="text-end">
                                <flux:button size="xs" variant="subtle" icon="pencil-square">{{ __('Edit') }}</flux:button>
                            </flux:table.cell>
                        </flux:table.row>

                        <flux:table.row>
                            <flux:table.cell class="font-mono text-xs">REC-1002</flux:table.cell>
                            <flux:table.cell class="font-medium">[EXAMPLE] Express Store</flux:table.cell>
                            <flux:table.cell>Branch 02 - Jeddah North</flux:table.cell>
                            <flux:table.cell><x-status.badge status="pending" /></flux:table.cell>
                            <flux:table.cell class="text-end">
                                <flux:button size="xs" variant="subtle" icon="pencil-square">{{ __('Edit') }}</flux:button>
                            </flux:table.cell>
                        </flux:table.row>
                    </flux:table.rows>
                </flux:table>
            </flux:card>
        </div>
    @endif

    <!-- SECTION 6: Shared Print Placeholders -->
    @if ($activeSection === 'print')
        <div class="space-y-6">
            <flux:card class="space-y-4">
                <flux:heading size="lg">{{ __('Safe Shared Print CSS & Layout Placeholders') }}</flux:heading>
                <flux:subheading size="xs">{{ __('Layout structural previews strictly containing NO business totals, tax rates, currency values, or fake financial data.') }}</flux:subheading>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-2">
                    <!-- Thermal Receipt Layout Preview -->
                    <div class="border border-zinc-300 dark:border-zinc-700 rounded-xl p-4 bg-zinc-50 dark:bg-zinc-900 space-y-3 text-center">
                        <div class="flex items-center justify-center gap-1.5 text-xs font-semibold text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="printer" class="size-4 text-teal-600 dark:text-teal-400" />
                            <span>{{ __('Thermal Receipt (80mm)') }}</span>
                        </div>

                        <div class="mx-auto w-[80mm] max-w-full p-3 bg-white text-zinc-900 rounded border border-zinc-200 shadow-2xs font-mono text-[10px] text-start space-y-2">
                            <div class="text-center font-bold border-b border-dashed border-zinc-300 pb-1">
                                [PRINT PLACEHOLDER]<br/>
                                TOY & JOY RETAIL
                            </div>
                            <div class="space-y-0.5 text-zinc-600">
                                <p>{{ __('Date:') }} 2026-08-03 01:45</p>
                                <p>{{ __('Register:') }} REG-01</p>
                            </div>
                            <div class="border-t border-b border-dashed border-zinc-300 py-1 text-center italic text-zinc-400">
                                {{ __('[Layout Line Items Area]') }}
                            </div>
                            <div class="text-center text-[9px] text-zinc-500 pt-1">
                                {{ __('THANK YOU FOR VISITING') }}
                            </div>
                        </div>
                    </div>

                    <!-- A4 Document Layout Preview -->
                    <div class="border border-zinc-300 dark:border-zinc-700 rounded-xl p-4 bg-zinc-50 dark:bg-zinc-900 space-y-3 text-center">
                        <div class="flex items-center justify-center gap-1.5 text-xs font-semibold text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="document-text" class="size-4 text-teal-600 dark:text-teal-400" />
                            <span>{{ __('A4 Document Layout') }}</span>
                        </div>

                        <div class="w-full h-48 p-4 bg-white text-zinc-900 rounded border border-zinc-200 shadow-2xs text-start space-y-3">
                            <div class="flex items-center justify-between border-b border-zinc-200 pb-2">
                                <span class="font-bold text-xs">[A4 HEADER]</span>
                                <span class="text-[9px] font-mono text-zinc-400">PAGE 1/1</span>
                            </div>
                            <div class="space-y-1">
                                <div class="h-2 w-3/4 bg-zinc-200 rounded"></div>
                                <div class="h-2 w-1/2 bg-zinc-100 rounded"></div>
                            </div>
                            <div class="border border-zinc-200 rounded p-2 text-[9px] text-zinc-400 text-center">
                                {{ __('[A4 Structural Table Grid Placeholder]') }}
                            </div>
                        </div>
                    </div>

                    <!-- Barcode Label Preview -->
                    <div class="border border-zinc-300 dark:border-zinc-700 rounded-xl p-4 bg-zinc-50 dark:bg-zinc-900 space-y-3 text-center">
                        <div class="flex items-center justify-center gap-1.5 text-xs font-semibold text-zinc-700 dark:text-zinc-300">
                            <flux:icon name="qr-code" class="size-4 text-teal-600 dark:text-teal-400" />
                            <span>{{ __('Product Label (50x30mm)') }}</span>
                        </div>

                        <div class="mx-auto w-[50mm] h-[30mm] p-2 bg-white text-zinc-900 rounded border border-zinc-200 shadow-2xs font-mono text-[9px] text-center flex flex-col justify-between">
                            <div class="font-bold truncate">[LABEL PLACEHOLDER]</div>
                            <div class="my-0.5 h-4 bg-zinc-900 rounded flex items-center justify-center text-[7px] text-white tracking-widest">
                                ||||| | |||| ||| |||||
                            </div>
                            <div class="text-[8px] text-zinc-600">SKU-PLACEHOLDER</div>
                        </div>
                    </div>
                </div>
            </flux:card>
        </div>
    @endif
</section>
