<x-layouts.dashboard :title="$title">
    <div class="card">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <p class="text-[rgb(var(--color-text-muted))]">Kelola kategori kursus</p>
            <a href="{{ route('dashboard.course-categories.create') }}" class="btn-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Kategori
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($courseCategories as $item)
                <div class="card group hover:shadow-glow transition-all duration-300 animate-fade-in">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-teal rounded-xl flex items-center justify-center text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold">{{ $item->name }}</h3>
                                <p class="text-xs text-[rgb(var(--color-text-muted))]">{{ $item->courses_count ?? 0 }}
                                    kursus</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-1">
                            <a href="{{ route('dashboard.course-categories.edit', $item->slug) }}"
                                class="btn btn-sm btn-ghost text-amber-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('dashboard.course-categories.destroy', $item->slug) }}" method="POST"
                                class="inline" x-data
                                @submit.prevent="Swal.fire({title:'Hapus Kategori?',text:'Ini akan mempengaruhi semua kursus terkait.',icon:'warning',showCancelButton:true,confirmButtonColor:'#f43f5e',confirmButtonText:'Ya, hapus!',cancelButtonText:'Batal'}).then((r)=>{if(r.isConfirmed)$el.submit()})">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-ghost text-rose-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="empty-state py-12">
                        <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <p class="empty-state-title">Tidak Ada Kategori Ditemukan</p>
                        <p class="empty-state-description">Buat kategori pertama Anda untuk mengorganisir kursus.</p>
                        <a href="{{ route('dashboard.course-categories.create') }}" class="btn-primary mt-4">Tambah
                            Kategori</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.dashboard>