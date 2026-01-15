<x-layouts.dashboard :title="$title">
    <div class="max-w-3xl">
        <div class="card">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('dashboard.homeworks.index', $course->slug) }}" class="btn btn-sm btn-ghost"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg></a>
                <div>
                    <h2 class="text-lg font-bold">{{ $homework->title }}</h2>
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">{{ $course->title }}</p>
                </div>
            </div>
            <div class="prose prose-sm dark:prose-invert max-w-none mb-6">
                <p class="whitespace-pre-wrap">{{ $homework->content }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('dashboard.homeworks.edit', [$course->slug, $homework->slug]) }}"
                    class="btn-outline"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>Edit</a>
                <a href="{{ route('dashboard.assignments.index', [$course->slug, $homework->slug]) }}"
                    class="btn-secondary"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>View Assignments</a>
            </div>
        </div>
    </div>
</x-layouts.dashboard>