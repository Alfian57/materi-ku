<x-layouts.dashboard :title="$title">
    <div class="card">
        <div class="flex items-center justify-between mb-6">
            <div>
                <a href="{{ route('dashboard.homeworks.index', $course->slug) }}"
                    class="text-primary-500 hover:underline text-sm">← Kembali ke Tugas</a>
                <p class="text-[rgb(var(--color-text-muted))] mt-1">Pengumpulan siswa untuk: {{ $homework->title }}</p>
            </div>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Pengumpulan</th>
                        <th>Nilai</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assignments as $item)
                        <tr class="animate-fade-in">
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar avatar-sm">
                                        <div
                                            class="w-full h-full bg-gradient-teal flex items-center justify-center text-white text-xs font-semibold">
                                            {{ strtoupper(substr($item->student->name, 0, 1)) }}
                                        </div>
                                    </div><span class="font-medium">{{ $item->student->name }}</span>
                                </div>
                            </td>
                            <td class="max-w-xs truncate text-[rgb(var(--color-text-muted))]">
                                {{ Str::limit($item->content, 50) }}
                            </td>
                            <td>@if($item->score)<span
                            class="badge {{ $item->score >= 70 ? 'badge-success' : 'badge-warning' }}">{{ $item->score }}/100</span>@else<span
                                    class="badge badge-secondary">Menunggu</span>@endif</td>
                            <td>
                                <div class="flex justify-end"><a
                                        href="{{ route('dashboard.assignments.show', [$course->slug, $homework->slug, $item->id]) }}"
                                        class="btn btn-sm btn-ghost text-secondary-500">Lihat & Nilai</a></div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty-state py-8"><svg class="empty-state-icon" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                    <p class="empty-state-title">Belum Ada Pengumpulan</p>
                                    <p class="empty-state-description">Siswa belum mengumpulkan tugas mereka.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>