<x-layouts.dashboard :title="$title">
    <div class="card">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <p class="text-[rgb(var(--color-text-muted))]">Manage all registered students</p>
            </div>
            <a href="{{ route('dashboard.students.create') }}" class="btn-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add Student
            </a>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Points</th>
                        <th>Address</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $item)
                        <tr class="animate-fade-in" style="animation-delay: {{ $loop->index * 30 }}ms">
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar avatar-sm">
                                        @if ($item->account->profile_picture)
                                            <img src="{{ asset('storage/' . $item->account->profile_picture) }}"
                                                alt="{{ $item->name }}">
                                        @else
                                            <div
                                                class="w-full h-full bg-gradient-teal flex items-center justify-center text-white text-xs font-semibold">
                                                {{ strtoupper(substr($item->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </div>
                                    <span class="font-medium">{{ $item->name }}</span>
                                </div>
                            </td>
                            <td class="text-[rgb(var(--color-text-muted))]">{{ $item->account->email }}</td>
                            <td><span class="badge badge-secondary">Level {{ $item->level }}</span></td>
                            <td><span class="badge badge-accent">{{ number_format($item->point) }} pts</span></td>
                            <td class="text-[rgb(var(--color-text-muted))] max-w-xs truncate">{{ $item->address }}</td>
                            <td>
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('dashboard.students.edit', $item->id) }}"
                                        class="btn btn-sm btn-ghost text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-900/20">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('dashboard.students.destroy', $item->id) }}" method="POST"
                                        class="inline" x-data @submit.prevent="
                                            Swal.fire({
                                                title: 'Delete Student?',
                                                text: 'This action cannot be undone.',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#f43f5e',
                                                confirmButtonText: 'Yes, delete it!'
                                            }).then((result) => {
                                                if (result.isConfirmed) $el.submit();
                                            })
                                        ">
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
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state py-8">
                                    <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <p class="empty-state-title">No Students Found</p>
                                    <p class="empty-state-description">Get started by adding your first student.</p>
                                    <a href="{{ route('dashboard.students.create') }}" class="btn-primary mt-4">Add
                                        Student</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>