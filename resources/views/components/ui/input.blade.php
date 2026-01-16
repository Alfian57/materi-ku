@props([
    'label' => null,
    'name',
    'type' => 'text',
    'error' => null,
    'placeholder' => '',
    'required' => false,
    'disabled' => false,
    'value' => null,
])

<div class="w-full">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-[rgb(var(--color-text))] mb-2">
            {{ $label }}
            @if($required)
                <span class="text-rose-500">*</span>
            @endif
        </label>
    @endif
    
    <input 
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-3 rounded-xl bg-[rgb(var(--color-surface))] border transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 text-[rgb(var(--color-text))] placeholder-[rgb(var(--color-text-muted))] ' . ($error ? 'border-rose-500 focus:ring-rose-500/50 focus:border-rose-500' : 'border-[rgb(var(--color-border))]')
        ]) }}
    >
    
    @if($error)
        <p class="text-rose-500 text-sm mt-1">{{ $error }}</p>
    @endif
</div>
