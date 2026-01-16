<x-layouts.dashboard :title="$title">
    <div class="space-y-6">
        <!-- Course Header -->
        <div class="card p-0 overflow-hidden">
            <div class="relative h-48 md:h-56">
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <span class="badge badge-accent mb-2">{{ $course->courseCategory->name }}</span>
                    <h1 class="text-2xl font-bold text-white">{{ $course->title }}</h1>
                    <p class="text-white/70 flex items-center gap-2 mt-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        {{ $course->teacher->name }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="card">
            <h2 class="font-bold text-lg mb-4">Konten Kursus</h2>
            <div class="prose prose-sm dark:prose-invert max-w-none whitespace-pre-wrap">
                {!! nl2br(e($course->content)) !!}
            </div>
        </div>

        <!-- Actions -->
        <div class="flex flex-wrap gap-3">
            @if ($course->homeworks->count() > 0)
                <a href="{{ route('dashboard.student.course.homework', $course->slug) }}" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Lihat Tugas ({{ $course->homeworks->count() }})
                </a>
            @else
                <span class="text-[rgb(var(--color-text-muted))]">Tidak ada tugas tersedia untuk kursus ini.</span>
            @endif
        </div>
    </div>
</x-layouts.dashboard>