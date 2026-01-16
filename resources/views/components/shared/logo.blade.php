@props([
    'size' => 'md',
    'showText' => true,
])

@php
    $sizes = [
        'sm' => 'w-7 h-7',
        'md' => 'w-9 h-9',
        'lg' => 'w-12 h-12',
        'xl' => 'w-16 h-16',
    ];
    $textSizes = [
        'sm' => 'text-lg',
        'md' => 'text-xl',
        'lg' => 'text-2xl',
        'xl' => 'text-3xl',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $textClass = $textSizes[$size] ?? $textSizes['md'];
@endphp

<a href="/" class="flex items-center gap-2" {{ $attributes }}>
    <div class="{{ $sizeClass }} bg-white dark:bg-zinc-800 rounded-xl flex items-center justify-center shadow-lg shadow-primary-500/25 overflow-hidden">
        <img 
            :src="darkMode ? '{{ asset('logo/logo-dark-theme.svg') }}' : '{{ asset('logo/logo-light-theme.svg') }}'"
            src="{{ asset('logo/logo-light-theme.svg') }}" 
            alt="Materi-Ku Logo"
            class="w-full h-full object-cover"
        >
    </div>
    @if($showText)
        <span class="{{ $textClass }} font-bold bg-gradient-to-r from-primary-600 to-secondary-500 bg-clip-text text-transparent">
            Materi-Ku
        </span>
    @endif
</a>
