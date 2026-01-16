@props([
    'variant' => 'primary',
])
@php
    $variants = [
        'primary' => 'bg-primary-100 text-primary-700 dark:bg-primary-900/30 dark:text-primary-300',
        'secondary' => 'bg-secondary-100 text-secondary-700 dark:bg-secondary-900/30 dark:text-secondary-300',
        'accent' => 'bg-accent-100 text-accent-700 dark:bg-accent-900/30 dark:text-accent-300',
        'success' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300',
        'warning' => 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-300',
        'danger' => 'bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-300',
        'info' => 'bg-sky-100 text-sky-700 dark:bg-sky-900/30 dark:text-sky-300',
    ];

    $classes = 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold ' . ($variants[$variant] ?? $variants['primary']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
