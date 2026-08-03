@props([
    'title' => null,
    'description' => null,
    'icon' => 'inbox',
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center p-8 text-center rounded-xl border border-dashed border-zinc-300 dark:border-zinc-700 bg-zinc-50/50 dark:bg-zinc-900/50 my-4 space-y-4']) }}>
    <div class="flex items-center justify-center size-12 rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400">
        <flux:icon :name="$icon" class="size-6 shrink-0" />
    </div>

    <div class="space-y-1 max-w-md">
        <flux:heading level="3" size="lg" class="font-semibold text-zinc-900 dark:text-zinc-100">
            {{ $title ?? __('No records found') }}
        </flux:heading>

        @if ($description)
            <flux:text class="text-sm text-zinc-500 dark:text-zinc-400">
                {{ $description }}
            </flux:text>
        @endif
    </div>

    @if (isset($action))
        <div class="pt-2">
            {{ $action }}
        </div>
    @elseif ($slot->isNotEmpty())
        <div class="pt-2">
            {{ $slot }}
        </div>
    @endif
</div>
