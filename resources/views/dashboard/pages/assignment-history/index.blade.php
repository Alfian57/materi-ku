<x-layouts.dashboard :title="$title">
    <div class="card">
        <h2 class="font-bold mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-secondary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            Tugas Saya
        </h2>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kursus</th>
                        <th>Tugas</th>
                        <th>Status</th>
                        <th>Nilai</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assignments as $item)
                        <tr class="animate-fade-in">
                            <td><span class="font-medium">{{ $item->homework->course->title }}</span></td>
                            <td class="text-[rgb(var(--color-text-muted))]">{{ $item->homework->title }}</td>
                            <td>
                                @if($item->status == 'submitted')
                                    <span class="badge badge-warning">Dikumpulkan</span>
                                @elseif($item->status == 'graded')
                                    <span class="badge badge-success">Dinilai</span>
                                @endif
                            </td>
                            <td>
                                @if($item->status == 'graded')
                                    <span
                                        class="font-bold {{ $item->point >= 70 ? 'text-emerald-500' : 'text-amber-500' }}">{{ $item->point }}/100</span>
                                @else
                                    <span class="text-[rgb(var(--color-text-muted))]">—</span>
                                @endif
                            </td>
                            <td>
                                @if($item->file)
                                    <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                        class="btn btn-sm btn-ghost text-secondary-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state py-8"><svg class="empty-state-icon" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <p class="empty-state-title">Belum Ada Tugas</p>
                                    <p class="empty-state-description">Selesaikan tugas untuk melihat pengumpulan Anda di
                                        sini.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>