@props([
    'align' => 'right',
])

@php
    $alignments = [
        'left' => 'left-0',
        'right' => 'right-0',
        'center' => 'left-1/2 -translate-x-1/2',
    ];
    $alignClass = $alignments[$align] ?? $alignments['right'];
@endphp

<div x-data="{ open: false }" class="relative inline-block" {{ $attributes }}>
    {{-- Trigger --}}
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    {{-- Menu --}}
    <div 
        x-show="open"
        @click.away="open = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute {{ $alignClass }} mt-2 w-48 py-2 bg-[rgb(var(--color-surface))] rounded-xl shadow-lg border border-[rgb(var(--color-border))] z-50"
    >
        {{ $slot }}
    </div>
</div>
