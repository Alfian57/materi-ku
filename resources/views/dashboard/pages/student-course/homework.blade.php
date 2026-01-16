<x-layouts.dashboard :title="$title">
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard.student.course.learn', $course->slug) }}" class="btn btn-sm btn-ghost"><svg
                    class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg></a>
            <div>
                <h2 class="text-lg font-bold">Tugas</h2>
                <p class="text-sm text-[rgb(var(--color-text-muted))]">{{ $course->title }}</p>
            </div>
        </div>

        <!-- Homework List -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($course->homeworks as $homework)
                <div
                    class="card group hover:shadow-lg hover:-translate-y-1 transition-all duration-300 p-0 overflow-hidden">
                    <div class="relative h-32 overflow-hidden">
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold mb-2">{{ $homework->title }}</h3>
                        <p class="text-sm text-[rgb(var(--color-text-muted))] mb-4 line-clamp-2">
                            {!! Str::limit(strip_tags($homework->content), 80) !!}
                        </p>
                        <a href="{{ route('dashboard.student.course.form', [$course->slug, $homework->slug]) }}"
                            class="btn-primary w-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            Kerjakan Tugas
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full card">
                    <div class="empty-state">
                        <p class="empty-state-title">Tidak Ada Tugas</p>
                        <p class="empty-state-description">Belum ada tugas untuk kursus ini.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.dashboard>