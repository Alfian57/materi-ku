<x-layouts.dashboard :title="$title">
    <!-- Welcome Header -->
    <div
        class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-primary-600 via-primary-500 to-secondary-500 p-6 mb-6">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-4 right-4 w-32 h-32 border-4 border-white/30 rounded-full"></div>
            <div class="absolute -bottom-8 -left-8 w-48 h-48 border-4 border-white/20 rounded-full"></div>
        </div>
        <div class="relative z-10">
            <h1 class="text-2xl font-bold text-white mb-2">Selamat Datang Kembali! 👋</h1>
            <p class="text-white/80">Inilah yang terjadi dengan platform Anda hari ini.</p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Teachers Card -->
        <div
            class="card group hover:shadow-glow hover:-translate-y-1 transition-all duration-300 border-l-4 border-primary-500">
            <div class="flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center text-primary-600 dark:text-primary-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-[rgb(var(--color-text-muted))] font-medium">Pengajar</p>
                    <p class="text-2xl font-bold text-primary-600 dark:text-primary-400">
                        {{ number_format($teacherCount) }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Students Card -->
        <div
            class="card group hover:shadow-glow-secondary hover:-translate-y-1 transition-all duration-300 border-l-4 border-secondary-500">
            <div class="flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-secondary-100 dark:bg-secondary-900/30 rounded-xl flex items-center justify-center text-secondary-600 dark:text-secondary-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-[rgb(var(--color-text-muted))] font-medium">Siswa</p>
                    <p class="text-2xl font-bold text-secondary-600 dark:text-secondary-400">
                        {{ number_format($studentCount) }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Courses Card -->
        <div
            class="card group hover:shadow-glow hover:-translate-y-1 transition-all duration-300 border-l-4 border-accent-500">
            <div class="flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-accent-100 dark:bg-accent-900/30 rounded-xl flex items-center justify-center text-accent-600 dark:text-accent-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-[rgb(var(--color-text-muted))] font-medium">Kursus</p>
                    <p class="text-2xl font-bold text-accent-600 dark:text-accent-400">{{ number_format($courseCount) }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Homework Card -->
        <div
            class="card group hover:shadow-lg hover:-translate-y-1 transition-all duration-300 border-l-4 border-emerald-500">
            <div class="flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-[rgb(var(--color-text-muted))] font-medium">Tugas</p>
                    <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">
                        {{ number_format($homeworkCount) }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Latest Reviews -->
        <div class="lg:col-span-2 card">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-bold flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    Ulasan Terbaru
                </h2>
            </div>
            <div class="space-y-4">
                @forelse ($latestReviews as $item)
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 dark:bg-zinc-800/50 hover:bg-gray-100 dark:hover:bg-zinc-800 transition-colors animate-fade-in"
                        style="animation-delay: {{ $loop->index * 50 }}ms">
                        <div class="avatar avatar-md flex-shrink-0">
                            @if ($item->student->account->profile_picture)
                                <img src="{{ asset('storage/' . $item->student->account->profile_picture) }}"
                                    alt="{{ $item->student->name }}">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-playful flex items-center justify-center text-white font-semibold text-sm">
                                    {{ strtoupper(substr($item->student->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-medium">{{ $item->student->name }}</p>
                            <p class="text-sm text-[rgb(var(--color-text-muted))] mt-1">{{ $item->content }}</p>
                        </div>
                    </div>
                @empty
                    <div class="empty-state py-8">
                        <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <p class="empty-state-title">Belum Ada Ulasan</p>
                        <p class="empty-state-description">Ulasan siswa akan muncul di sini.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card">
            <h2 class="text-lg font-bold mb-4">Aksi Cepat</h2>
            <div class="space-y-3">
                @if (auth()->user()->accountable_type === 'App\Models\Admin')
                    <a href="{{ route('dashboard.students.create') }}"
                        class="flex items-center gap-3 p-3 rounded-xl hover:bg-primary-50 dark:hover:bg-primary-900/20 transition-colors group">
                        <div
                            class="w-10 h-10 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center text-primary-600 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <span class="font-medium">Tambah Siswa</span>
                    </a>
                    <a href="{{ route('dashboard.teachers.create') }}"
                        class="flex items-center gap-3 p-3 rounded-xl hover:bg-secondary-50 dark:hover:bg-secondary-900/20 transition-colors group">
                        <div
                            class="w-10 h-10 bg-secondary-100 dark:bg-secondary-900/30 rounded-xl flex items-center justify-center text-secondary-600 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <span class="font-medium">Tambah Pengajar</span>
                    </a>
                    <a href="{{ route('dashboard.course-categories.create') }}"
                        class="flex items-center gap-3 p-3 rounded-xl hover:bg-accent-50 dark:hover:bg-accent-900/20 transition-colors group">
                        <div
                            class="w-10 h-10 bg-accent-100 dark:bg-accent-900/30 rounded-xl flex items-center justify-center text-accent-600 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <span class="font-medium">Tambah Kategori</span>
                    </a>
                @else
                    <a href="{{ route('dashboard.courses.create') }}"
                        class="flex items-center gap-3 p-3 rounded-xl hover:bg-primary-50 dark:hover:bg-primary-900/20 transition-colors group">
                        <div
                            class="w-10 h-10 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center text-primary-600 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <span class="font-medium">Buat Kursus</span>
                    </a>
                    <a href="{{ route('dashboard.courses.index') }}"
                        class="flex items-center gap-3 p-3 rounded-xl hover:bg-secondary-50 dark:hover:bg-secondary-900/20 transition-colors group">
                        <div
                            class="w-10 h-10 bg-secondary-100 dark:bg-secondary-900/30 rounded-xl flex items-center justify-center text-secondary-600 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <span class="font-medium">Kelola Kursus</span>
                    </a>
                @endif
                <a href="{{ route('dashboard.profile.index') }}"
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-100 dark:hover:bg-zinc-700 transition-colors group">
                    <div
                        class="w-10 h-10 bg-gray-100 dark:bg-zinc-700 rounded-xl flex items-center justify-center text-gray-600 dark:text-gray-400 group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <span class="font-medium">Edit Profil</span>
                </a>
            </div>
        </div>
    </div>
</x-layouts.dashboard>