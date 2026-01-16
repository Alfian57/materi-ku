@props([
    'label' => null,
    'name',
    'options' => [],
    'error' => null,
    'placeholder' => 'Pilih...',
    'required' => false,
    'disabled' => false,
    'selected' => null,
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
    
    <select 
        name="{{ $name }}"
        id="{{ $name }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-3 rounded-xl bg-[rgb(var(--color-surface))] border transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 text-[rgb(var(--color-text))] appearance-none bg-no-repeat bg-right pr-10 ' . ($error ? 'border-rose-500 focus:ring-rose-500/50 focus:border-rose-500' : 'border-[rgb(var(--color-border))]'),
            'style' => "background-image: url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e\"); background-size: 1.5em 1.5em;"
        ]) }}
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach($options as $value => $text)
            <option value="{{ $value }}" @if(old($name, $selected) == $value) selected @endif>
                {{ $text }}
            </option>
        @endforeach
    </select>
    
    @if($error)
        <p class="text-rose-500 text-sm mt-1">{{ $error }}</p>
    @endif
</div>
