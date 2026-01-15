<x-layouts.dashboard :title="$title">
    <div class="card">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <p class="text-[rgb(var(--color-text-muted))]">Manage your courses</p>
            <a href="{{ route('dashboard.courses.create') }}" class="btn-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add Course
            </a>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Thumbnail</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $item)
                        <tr class="animate-fade-in">
                            <td><span class="font-medium">{{ $item->title }}</span></td>
                            <td>
                                <a href="{{ asset('storage/' . $item->thumbnail) }}" target="_blank"
                                    class="block w-20 h-12 rounded-lg overflow-hidden hover:ring-2 ring-primary-500 transition-all">
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                                        class="w-full h-full object-cover">
                                </a>
                            </td>
                            <td><span class="badge badge-accent">{{ $item->courseCategory->name }}</span></td>
                            <td class="text-[rgb(var(--color-text-muted))] max-w-xs truncate">
                                {{ Str::limit($item->description, 50) }}</td>
                            <td>
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('dashboard.courses.show', $item->slug) }}"
                                        class="btn btn-sm btn-ghost text-secondary-500 hover:bg-secondary-50 dark:hover:bg-secondary-900/20"
                                        title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('dashboard.homeworks.index', $item->slug) }}"
                                        class="btn btn-sm btn-ghost text-accent-500 hover:bg-accent-50 dark:hover:bg-accent-900/20"
                                        title="Homework">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('dashboard.courses.edit', $item->slug) }}"
                                        class="btn btn-sm btn-ghost text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-900/20"
                                        title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('dashboard.courses.destroy', $item->slug) }}" method="POST"
                                        class="inline" x-data
                                        @submit.prevent="Swal.fire({title:'Delete Course?',text:'This will also delete all homework and assignments.',icon:'warning',showCancelButton:true,confirmButtonColor:'#f43f5e',confirmButtonText:'Yes, delete!'}).then((r)=>{if(r.isConfirmed)$el.submit()})">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-ghost text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-900/20"
                                            title="Delete">
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
                            <td colspan="5">
                                <div class="empty-state py-8">
                                    <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    <p class="empty-state-title">No Courses Found</p>
                                    <p class="empty-state-description">Create your first course to get started.</p>
                                    <a href="{{ route('dashboard.courses.create') }}" class="btn-primary mt-4">Add
                                        Course</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.dashboard>