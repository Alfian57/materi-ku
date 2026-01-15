<x-layouts.dashboard :title="$title">
    <!-- Welcome Banner -->
    <div
        class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-primary-600 via-primary-500 to-secondary-500 p-6 md:p-8 mb-6">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-4 right-8 w-24 h-24 border-4 border-white/30 rounded-full animate-float"></div>
            <div class="absolute -bottom-4 left-12 w-32 h-32 border-4 border-white/20 rounded-full animate-float"
                style="animation-delay: 1s"></div>
        </div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">Hello, {{ Auth::user()->accountable->name }}!
                    🎓</h1>
                <p class="text-white/80">Ready to continue your learning journey?</p>
                <div class="flex items-center gap-4 mt-4">
                    <div class="flex items-center gap-2 text-white/90">
                        <span class="text-2xl font-bold">{{ Auth::user()->accountable->level }}</span>
                        <span class="text-sm">Level</span>
                    </div>
                    <div class="w-px h-8 bg-white/30"></div>
                    <div class="flex items-center gap-2 text-white/90">
                        <span class="text-2xl font-bold">{{ number_format(Auth::user()->accountable->point) }}</span>
                        <span class="text-sm">Points</span>
                    </div>
                </div>
            </div>
            <a href="#courses" class="btn bg-white/20 text-white backdrop-blur-sm hover:bg-white/30 transition-colors">
                Browse Courses
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
        </div>
    </div>

    <!-- Courses Section -->
    <div id="courses">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold flex items-center gap-2">
                <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Available Courses
            </h2>
            <span class="text-sm text-[rgb(var(--color-text-muted))]">{{ $courses->total() }} courses</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($courses as $course)
                <div
                    class="card p-0 overflow-hidden group hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="relative h-40 overflow-hidden">
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <span
                            class="absolute bottom-3 left-3 badge badge-primary text-xs">{{ $course->courseCategory->name }}</span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold mb-2 line-clamp-1 group-hover:text-primary-500 transition-colors">
                            {{ $course->title }}</h3>
                        <p class="text-sm text-[rgb(var(--color-text-muted))] mb-3 line-clamp-2">
                            {{ Str::limit($course->description, 60) }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-sm text-[rgb(var(--color-text-muted))]">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ $course->teacher->name }}
                            </div>
                            <a href="{{ route('dashboard.student.course.learn', $course->slug) }}"
                                class="btn btn-sm btn-primary px-3 py-1.5 text-xs">
                                Learn
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full card">
                    <div class="empty-state py-12">
                        <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <p class="empty-state-title">No Courses Available</p>
                        <p class="empty-state-description">Check back later for new courses!</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($courses->hasPages())
            <div class="mt-8 flex justify-center">
                {{ $courses->links() }}
            </div>
        @endif
    </div>
</x-layouts.dashboard>