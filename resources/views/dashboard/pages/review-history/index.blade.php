<x-layouts.dashboard :title="$title">
    <div class="card">
        <h2 class="font-bold mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg>
            Ulasan Saya
        </h2>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Kursus</th>
                        <th>Ulasan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reviews as $item)
                        <tr class="animate-fade-in">
                            <td><span class="font-medium">{{ $item->course->title }}</span></td>
                            <td class="text-[rgb(var(--color-text-muted))] max-w-md">{{ $item->content }}</td>
                            <td>
                                @if($item->status === 'blocked')
                                    <span class="badge badge-danger">Diblokir</span>
                                @else
                                    <span class="badge badge-success">Diterbitkan</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="empty-state py-8"><svg class="empty-state-icon" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                    <p class="empty-state-title">Belum Ada Ulasan</p>
                                    <p class="empty-state-description">Kumpulkan tugas untuk memberikan ulasan kursus.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>