<x-layouts.dashboard :title="$title">
    <div class="card">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <a href="{{ route('dashboard.courses.show', $course->slug) }}"
                    class="text-primary-500 hover:underline text-sm">← Kembali ke {{ $course->title }}</a>
                <p class="text-[rgb(var(--color-text-muted))] mt-1">Kelola tugas untuk kursus ini</p>
            </div>
            <a href="{{ route('dashboard.homeworks.create', $course->slug) }}" class="btn-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Tugas
            </a>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul Tugas</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($homeworks as $item)
                        <tr class="animate-fade-in">
                            <td><span class="font-medium">{{ $item->title }}</span></td>
                            <td>
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('dashboard.homeworks.show', [$course->slug, $item->slug]) }}"
                                        class="btn btn-sm btn-ghost text-secondary-500" title="View"><svg class="w-4 h-4"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg></a>
                                    <a href="{{ route('dashboard.assignments.index', [$course->slug, $item->slug]) }}"
                                        class="btn btn-sm btn-ghost text-accent-500" title="Assignments"><svg
                                            class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                        </svg></a>
                                    <a href="{{ route('dashboard.homeworks.edit', [$course->slug, $item->slug]) }}"
                                        class="btn btn-sm btn-ghost text-amber-500" title="Edit"><svg class="w-4 h-4"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg></a>
                                    <form action="{{ route('dashboard.homeworks.destroy', [$course->slug, $item->slug]) }}"
                                        method="POST" class="inline" x-data
                                        @submit.prevent="Swal.fire({title:'Hapus Tugas?',icon:'warning',showCancelButton:true,confirmButtonColor:'#f43f5e',confirmButtonText:'Hapus', cancelButtonText:'Batal'}).then((r)=>{if(r.isConfirmed)$el.submit()})">
                                        @csrf @method('DELETE')<button type="submit"
                                            class="btn btn-sm btn-ghost text-rose-500" title="Delete"><svg class="w-4 h-4"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg></button></form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
                                <div class="empty-state py-8"><svg class="empty-state-icon" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <p class="empty-state-title">Belum Ada Tugas</p><a
                                        href="{{ route('dashboard.homeworks.create', $course->slug) }}"
                                        class="btn-primary mt-4">Tambah Tugas</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>