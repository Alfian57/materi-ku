<x-layouts.dashboard :title="$title">
    <div class="card">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <p class="text-[rgb(var(--color-text-muted))]">Kelola semua administrator</p>
            <a href="{{ route('dashboard.admins.create') }}" class="btn-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Admin
            </a>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Admin</th>
                        <th>Email</th>
                        <th class="!text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $item)
                        <tr class="animate-fade-in">
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar avatar-sm">
                                        @if ($item->account->profile_picture)
                                            <img src="{{ asset('storage/' . $item->account->profile_picture) }}"
                                                alt="{{ $item->name }}">
                                        @else
                                            <div
                                                class="w-full h-full bg-gradient-playful flex items-center justify-center text-white text-xs font-semibold">
                                                {{ strtoupper(substr($item->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="font-medium">{{ $item->name }}</span>
                                        <span class="badge badge-primary ml-2">Admin</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-[rgb(var(--color-text-muted))]">{{ $item->account->email }}</td>
                            <td>
                                <div class="flex items-center justify-center gap-1">
                                    <a href="{{ route('dashboard.admins.edit', $item->id) }}"
                                        class="btn btn-sm btn-ghost text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-900/20">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    @if($item->account->id !== auth()->id())
                                        <form action="{{ route('dashboard.admins.destroy', $item->id) }}" method="POST"
                                            class="inline" x-data
                                            @submit.prevent="Swal.fire({title:'Hapus Admin?',text:'Tindakan ini tidak dapat dibatalkan.',icon:'warning',showCancelButton:true,confirmButtonColor:'#f43f5e',confirmButtonText:'Ya, hapus!',cancelButtonText:'Batal'}).then((r)=>{if(r.isConfirmed)$el.submit()})">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-ghost text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-900/20">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="empty-state py-8">
                                    <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35" />
                                    </svg>
                                    <p class="empty-state-title">Tidak Ada Admin Ditemukan</p>
                                    <p class="empty-state-description">Mulai dengan menambahkan admin pertama Anda.</p>
                                    <a href="{{ route('dashboard.admins.create') }}" class="btn-primary mt-4">Tambah
                                        Admin</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>