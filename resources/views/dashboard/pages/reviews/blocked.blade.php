<x-layouts.dashboard :title="$title">
    <div class="card">
        <h2 class="font-bold mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
            </svg>
            Blocked Reviews
        </h2>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Review Content</th>
                        <th class="text-right">Actions</th>
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
                                            {{ strtoupper(substr($item->student->name, 0, 1)) }}</div>
                                    </div><span class="font-medium">{{ $item->student->name }}</span>
                                </div>
                            </td>
                            <td class="text-[rgb(var(--color-text-muted))]">{{ $item->content }}</td>
                            <td>
                                <div class="flex justify-end">
                                    <form action="{{ route('dashboard.reviews.unblock', $item->id) }}" method="POST"
                                        class="inline" x-data
                                        @submit.prevent="Swal.fire({title:'Unblock Review?',icon:'question',showCancelButton:true,confirmButtonText:'Yes, unblock'}).then((r)=>{if(r.isConfirmed)$el.submit()})">
                                        @csrf<button type="submit"
                                            class="btn btn-sm bg-emerald-500 text-white">Unblock</button></form>
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
                                    <p class="empty-state-title">No Blocked Reviews</p>
                                    <p class="empty-state-description">All reviews are currently visible.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>