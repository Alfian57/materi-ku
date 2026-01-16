@props([
    'src' => null,
    'size' => 'md',
    'fallback' => null,
    'alt' => 'Avatar',
])

@php
    $sizes = [
        'xs' => 'w-6 h-6 text-xs',
        'sm' => 'w-8 h-8 text-xs',
        'md' => 'w-10 h-10 text-sm',
        'lg' => 'w-12 h-12 text-base',
        'xl' => 'w-16 h-16 text-lg',
        '2xl' => 'w-20 h-20 text-xl',
    ];
    
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<div {{ $attributes->merge(['class' => "rounded-full overflow-hidden bg-gray-200 dark:bg-zinc-700 flex items-center justify-center $sizeClass"]) }}>
    @if($src)
        <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
    @elseif($fallback)
        <div class="w-full h-full bg-gradient-playful flex items-center justify-center text-white font-semibold">
            {{ strtoupper(substr($fallback, 0, 1)) }}
        </div>
    @else
        <svg class="w-1/2 h-1/2 text-[rgb(var(--color-text-muted))]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
    @endif
</div>
