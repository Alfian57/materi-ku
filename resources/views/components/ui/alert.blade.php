@props([
    'type' => 'info',
    'dismissible' => false,
    'title' => null,
])

@php
    $types = [
        'success' => [
            'bg' => 'bg-emerald-50 dark:bg-emerald-900/20',
            'text' => 'text-emerald-700 dark:text-emerald-300',
            'border' => 'border-emerald-200 dark:border-emerald-800',
            'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>',
        ],
        'warning' => [
            'bg' => 'bg-amber-50 dark:bg-amber-900/20',
            'text' => 'text-amber-700 dark:text-amber-300',
            'border' => 'border-amber-200 dark:border-amber-800',
            'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>',
        ],
        'danger' => [
            'bg' => 'bg-rose-50 dark:bg-rose-900/20',
            'text' => 'text-rose-700 dark:text-rose-300',
            'border' => 'border-rose-200 dark:border-rose-800',
            'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>',
        ],
        'info' => [
            'bg' => 'bg-sky-50 dark:bg-sky-900/20',
            'text' => 'text-sky-700 dark:text-sky-300',
            'border' => 'border-sky-200 dark:border-sky-800',
            'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>',
        ],
    ];
    
    $config = $types[$type] ?? $types['info'];
@endphp

<div 
    x-data="{ show: true }"
    x-show="show"
    x-transition
    {{ $attributes->merge(['class' => "p-4 rounded-xl flex items-start gap-3 border {$config['bg']} {$config['text']} {$config['border']}"]) }}
>
    <div class="flex-shrink-0">
        {!! $config['icon'] !!}
    </div>
    <div class="flex-1">
        @if($title)
            <h4 class="font-semibold mb-1">{{ $title }}</h4>
        @endif
        <div class="text-sm">{{ $slot }}</div>
    </div>
    @if($dismissible)
        <button @click="show = false" class="flex-shrink-0 p-1 rounded hover:bg-black/10 dark:hover:bg-white/10 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
</div>
