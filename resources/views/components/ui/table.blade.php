@props([
    'striped' => false,
])

<div class="overflow-x-auto rounded-xl border border-[rgb(var(--color-border))]">
    <table {{ $attributes->merge(['class' => 'w-full text-sm']) }}>
        @if(isset($header))
            <thead class="bg-gray-50 dark:bg-zinc-800">
                <tr>
                    {{ $header }}
                </tr>
            </thead>
        @endif
        <tbody class="{{ $striped ? 'divide-y divide-[rgb(var(--color-border))]' : '' }}">
            {{ $slot }}
        </tbody>
    </table>
</div>
