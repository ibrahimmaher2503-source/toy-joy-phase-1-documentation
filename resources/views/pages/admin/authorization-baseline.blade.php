<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Authorization Baseline')] class extends Component {
    use WithPagination;

    public string $search = '';

    public function mount(): void
    {
        Gate::authorize('view-authorization-baseline');
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(): mixed
    {
        return view('pages.admin.authorization-baseline', [
            'users' => User::query()
                ->when($this->search !== '', fn ($query) => $query->where(function ($q): void {
                    $q->where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('email', 'like', '%'.$this->search.'%');
                }))
                ->latest()
                ->paginate(15),
            'roleCount' => Role::query()->count(),
            'permissionCount' => Permission::query()->count(),
        ]);
    }
}; ?>

<section class="w-full space-y-6">
    <x-page-header
        :title="__('Authorization Baseline (TSK-008)')"
        :description="__('Read-only local inventory while the owner role and permission matrix remains pending.')"
    />

    <flux:callout variant="warning" icon="exclamation-triangle" title="{{ __('No authorization behavior is active') }}">
        {{ __('BLK-007 and DM 1.3 remain open. No roles, permissions, grants, scopes, or approval limits are seeded or enforced by this baseline.') }}
    </flux:callout>

    <div class="grid gap-4 md:grid-cols-3">
        <flux:card><flux:subheading>{{ __('Users inventory') }}</flux:subheading><flux:heading size="xl">{{ $users->total() }}</flux:heading></flux:card>
        <flux:card><flux:subheading>{{ __('Roles configured') }}</flux:subheading><flux:heading size="xl">{{ $roleCount }}</flux:heading><flux:text size="sm">{{ __('Awaiting owner matrix') }}</flux:text></flux:card>
        <flux:card><flux:subheading>{{ __('Permissions configured') }}</flux:subheading><flux:heading size="xl">{{ $permissionCount }}</flux:heading><flux:text size="sm">{{ __('No grants active') }}</flux:text></flux:card>
    </div>

    @if ($errors->any())
        <flux:callout variant="danger" title="{{ __('Unable to load authorization inventory') }}">
            {{ __('Review the request and try again. No authorization change was performed.') }}
        </flux:callout>
    @endif

    <flux:card class="space-y-4">
        <flux:heading size="lg">{{ __('Current Users — Inventory Only') }}</flux:heading>
        <flux:input wire:model.live.debounce.300ms="search" icon="magnifying-glass" :label="__('Search users')" :placeholder="__('Name or email')" />
        @if ($users->isEmpty())
            <x-state.empty :title="__('No users found')" :description="__('No user records match this inventory search.')" />
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <caption class="sr-only">{{ __('Current users inventory') }}</caption>
                    <thead><tr><th class="p-2 text-start">{{ __('Name') }}</th><th class="p-2 text-start">{{ __('Email') }}</th><th class="p-2 text-start">{{ __('Verification') }}</th><th class="p-2 text-start">{{ __('Authorization') }}</th></tr></thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-t border-zinc-200 dark:border-zinc-700">
                                <td class="p-2">{{ $user->name }}</td>
                                <td class="p-2">{{ $user->email }}</td>
                                <td class="p-2">{{ $user->email_verified_at ? __('Verified') : __('Not verified') }}</td>
                                <td class="p-2">{{ __('Not assigned in this baseline') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>{{ $users->links() }}</div>
        @endif
    </flux:card>

    <div class="grid gap-6 lg:grid-cols-3">
        <x-state.empty :title="__('Roles matrix pending')" :description="__('Canonical role names and signed responsibilities are required before implementation.')" />
        <x-state.empty :title="__('Permissions matrix pending')" :description="__('P/R cells, action rights, and sensitive fields require owner approval.')" />
        <x-state.empty :title="__('Scopes and approvals pending')" :description="__('Branch/store scopes, limits, overrides, and dual-control rules remain open.')" />
    </div>
</section>
