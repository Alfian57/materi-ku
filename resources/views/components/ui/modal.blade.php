@props([
    'name',
    'title' => '',
    'maxWidth' => 'lg',
])

@php
    $maxWidths = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        '2xl' => 'max-w-2xl',
    ];
    $widthClass = $maxWidths[$maxWidth] ?? $maxWidths['lg'];
@endphp

<div 
    x-data="{ open: false }"
    x-on:open-modal.window="if ($event.detail === '{{ $name }}') open = true"
    x-on:close-modal.window="if ($event.detail === '{{ $name }}') open = false"
    x-on:keydown.escape.window="open = false"
    {{ $attributes }}
>
    {{-- Trigger Slot --}}
    @if(isset($trigger))
        <div @click="open = true">
            {{ $trigger }}
        </div>
    @endif

    {{-- Modal Backdrop --}}
    <template x-teleport="body">
        <div 
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4"
            @click.self="open = false"
        >
            {{-- Modal Content --}}
            <div 
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="bg-[rgb(var(--color-surface))] rounded-2xl shadow-xl w-full {{ $widthClass }}"
                @click.stop
            >
                {{-- Header --}}
                @if($title)
                    <div class="flex items-center justify-between p-6 border-b border-[rgb(var(--color-border))]">
                        <h3 class="text-lg font-semibold text-[rgb(var(--color-text))]">{{ $title }}</h3>
                        <button @click="open = false" class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-zinc-700 transition-colors">
                            <svg class="w-5 h-5 text-[rgb(var(--color-text-muted))]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif

                {{-- Body --}}
                <div class="p-6">
                    {{ $slot }}
                </div>

                {{-- Footer --}}
                @if(isset($footer))
                    <div class="flex items-center justify-end gap-3 p-6 border-t border-[rgb(var(--color-border))]">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </div>
    </template>
</div>
