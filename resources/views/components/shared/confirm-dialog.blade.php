{{--
Confirm Dialog Component
Uses SweetAlert2 for confirmation dialogs

Usage:
<x-shared.confirm-dialog id="delete-user-123" title="Hapus Pengguna?" text="Data pengguna akan dihapus permanen."
    confirm-text="Ya, Hapus" action="/users/123" method="DELETE">
    <button>Delete</button>
</x-shared.confirm-dialog>
--}}

@props([
    'id' => null,
    'title' => 'Apakah Anda yakin?',
    'text' => '',
    'icon' => 'warning',
    'confirmText' => 'Ya',
    'cancelText' => 'Batal',
    'confirmColor' => '#7C3AED',
    'cancelColor' => '#6B7280',
    'action' => null,
    'method' => 'POST',
])

@php
    $uniqueId = $id ?? 'confirm-' . uniqid();
@endphp

<div x-data="{ 
    confirm() {
        Swal.fire({
            title: '{{ $title }}',
            text: '{{ $text }}',
            icon: '{{ $icon }}',
            showCancelButton: true,
            confirmButtonColor: '{{ $confirmColor }}',
            cancelButtonColor: '{{ $cancelColor }}',
            confirmButtonText: '{{ $confirmText }}',
            cancelButtonText: '{{ $cancelText }}',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                @if($action)
                    document.getElementById('{{ $uniqueId }}-form').submit();
                @else
                    this.$dispatch('confirmed', { id: '{{ $uniqueId }}' });
                @endif
        }
});
}
}" {{ $attributes }}>
    <div @click="confirm()">
        {{ $slot }}
    </div>
    
    @if($action)
        <form id="{{ $uniqueId }}-form" action="{{ $action }}" method="POST" class="hidden">
            @csrf
            @if(strtoupper($method) !== 'POST')
                @method($method)
            @endif
        </form>
    @endif
</div>
