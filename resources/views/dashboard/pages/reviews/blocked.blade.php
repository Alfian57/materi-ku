<x-layouts.dashboard :title="$title">
    <div class="card">
        <h2 class="font-bold mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
            </svg>
            Ulasan Diblokir
        </h2>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Isi Ulasan</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reviews as $item)
                        <tr class="animate-fade-in">
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar avatar-sm">
                                        <div
                                            class="w-full h-full bg-gradient-playful flex items-center justify-center text-white text-xs font-semibold">
                                            {{ strtoupper(substr($item->student->name, 0, 1)) }}
                                        </div>
                                    </div><span class="font-medium">{{ $item->student->name }}</span>
                                </div>
                            </td>
                            <td class="text-[rgb(var(--color-text-muted))]">{{ $item->content }}</td>
                            <td>
                                <div class="flex justify-end">
                                    <form action="{{ route('dashboard.reviews.unblock', $item->id) }}" method="POST"
                                        class="inline" x-data
                                        @submit.prevent="Swal.fire({title:'Buka Blokir Ulasan?',icon:'question',showCancelButton:true,confirmButtonText:'Ya, buka blokir', cancelButtonText:'Batal'}).then((r)=>{if(r.isConfirmed)$el.submit()})">
                                        @csrf<button type="submit" class="btn btn-sm bg-emerald-500 text-white">Buka
                                            Blokir</button></form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="empty-state py-8"><svg class="empty-state-icon" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="empty-state-title">Tidak Ada Ulasan Diblokir</p>
                                    <p class="empty-state-description">Semua ulasan saat ini terlihat.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>