@props([
    'status' => 'draft',
    'label' => null,
    'size' => 'sm',
    'variant' => 'subtle',
])

@php
    $normalized = strtolower(trim((string)$status));

    $colorMap = [
        'active' => 'green',
        'healthy' => 'green',
        'approved' => 'green',
        'completed' => 'green',
        'success' => 'green',
        'online' => 'green',

        'draft' => 'zinc',
        'inactive' => 'zinc',
        'closed' => 'zinc',
        'archived' => 'zinc',

        'pending' => 'amber',
        'degraded' => 'amber',
        'warning' => 'amber',
        'review' => 'amber',
        'offline' => 'amber',

        'rejected' => 'red',
        'down' => 'red',
        'failed' => 'red',
        'error' => 'red',
        'disabled' => 'red',

        'processing' => 'blue',
        'queued' => 'blue',
        'assigned' => 'blue',

        'override' => 'purple',
        'special' => 'purple',
    ];

    $color = $colorMap[$normalized] ?? 'zinc';

    $defaultLabels = [
        'active' => __('Active'),
        'healthy' => __('Healthy'),
        'approved' => __('Approved'),
        'completed' => __('Completed'),
        'success' => __('Success'),
        'online' => __('Online'),
        'draft' => __('Draft'),
        'inactive' => __('Inactive'),
        'closed' => __('Closed'),
        'archived' => __('Archived'),
        'pending' => __('Pending'),
        'degraded' => __('Degraded'),
        'warning' => __('Warning'),
        'review' => __('In Review'),
        'offline' => __('Offline'),
        'rejected' => __('Rejected'),
        'down' => __('Down'),
        'failed' => __('Failed'),
        'error' => __('Error'),
        'disabled' => __('Disabled'),
        'processing' => __('Processing'),
        'queued' => __('Queued'),
        'assigned' => __('Assigned'),
        'override' => __('Override'),
    ];

    $displayLabel = $label ?? $defaultLabels[$normalized] ?? ucfirst((string)$status);
@endphp

<flux:badge :size="$size" :color="$color" :variant="$variant" {{ $attributes->merge(['class' => 'inline-flex items-center gap-1.5 font-medium']) }}>
    <span class="size-1.5 rounded-full bg-current opacity-75"></span>
    <span>{{ $displayLabel }}</span>
</flux:badge>
