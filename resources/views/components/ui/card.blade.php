@props([
    'padding' => 'md',
    'hover' => false,
])
@php
    $paddings = [
        'none' => '',
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
    ];

    $baseClasses = 'bg-[rgb(var(--color-surface))] rounded-2xl shadow-soft border border-[rgb(var(--color-border))] transition-all duration-300';
    $hoverClasses = $hover ? 'hover:shadow-lg hover:-translate-y-1' : '';
    $paddingClass = $paddings[$padding] ?? $paddings['md'];
@endphp

<div {{ $attributes->merge(['class' => "$baseClasses $hoverClasses $paddingClass"]) }}>
    {{ $slot }}
</div>
