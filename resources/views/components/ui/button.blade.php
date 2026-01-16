@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'href' => null,
    'icon' => null,
    'iconPosition' => 'left',
    'loading' => false,
    'disabled' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 font-semibold rounded-xl transition-all duration-200 ease-out focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed active:scale-95';
    
    $variants = [
        'primary' => 'bg-gradient-playful text-white shadow-glow hover:shadow-lg hover:-translate-y-0.5 focus:ring-primary-500',
        'secondary' => 'bg-gradient-secondary text-white shadow-glow-secondary hover:shadow-lg hover:-translate-y-0.5 focus:ring-secondary-500',
        'accent' => 'bg-gradient-accent text-white hover:shadow-lg hover:-translate-y-0.5 focus:ring-accent-500',
        'outline' => 'border-2 border-primary-500 text-primary-500 hover:bg-primary-500 hover:text-white focus:ring-primary-500',
        'ghost' => 'text-[rgb(var(--color-text))] hover:bg-gray-100 dark:hover:bg-zinc-700',
        'danger' => 'bg-rose-500 text-white hover:bg-rose-600 hover:shadow-lg hover:-translate-y-0.5 focus:ring-rose-500',
        'success' => 'bg-emerald-500 text-white hover:bg-emerald-600 hover:shadow-lg hover:-translate-y-0.5 focus:ring-emerald-500',
    ];
    
    $sizes = [
        'xs' => 'px-2.5 py-1 text-xs',
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-5 py-2.5 text-sm',
        'lg' => 'px-8 py-3 text-base',
        'xl' => 'px-10 py-4 text-lg',
    ];
    
    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon && $iconPosition === 'left')
            {!! $icon !!}
        @endif
        {{ $slot }}
        @if($icon && $iconPosition === 'right')
            {!! $icon !!}
        @endif
    </a>
@else
    <button 
        type="{{ $type }}" 
        {{ $attributes->merge(['class' => $classes]) }}
        @if($disabled || $loading) disabled @endif
    >
        @if($loading)
            <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        @else
            @if($icon && $iconPosition === 'left')
                {!! $icon !!}
            @endif
        @endif
        {{ $slot }}
        @if(!$loading && $icon && $iconPosition === 'right')
            {!! $icon !!}
        @endif
    </button>
@endif
