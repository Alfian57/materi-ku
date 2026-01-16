{{-- Landing Page Features Section --}}
<section id="features" class="py-24 px-4 sm:px-6 bg-white dark:bg-zinc-900">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <span
                class="inline-block px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-primary-600 dark:text-primary-400 bg-primary-100 dark:bg-primary-900/30 rounded-full mb-4">
                Fitur Unggulan
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">Semua yang Anda Butuhkan</h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-xl mx-auto">Platform kami menyediakan semua alat dan sumber
                daya untuk mencapai tujuan pembelajaran Anda.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $features = [
                    [
                        'title' => 'Kursus Lengkap',
                        'description' => 'Akses berbagai kursus dari level pemula hingga mahir.',
                        'color' => 'primary',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />'
                    ],
                    [
                        'title' => 'Guru Ahli',
                        'description' => 'Belajar dari pengajar berkualitas yang berdedikasi.',
                        'color' => 'secondary',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />'
                    ],
                    [
                        'title' => 'PR Interaktif',
                        'description' => 'Latihan dan dapatkan feedback dari guru.',
                        'color' => 'accent',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />'
                    ],
                    [
                        'title' => 'Poin & Level',
                        'description' => 'Gamifikasi untuk menjaga motivasi belajar.',
                        'color' => 'emerald',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />'
                    ],
                    [
                        'title' => 'Belajar Kapan Saja',
                        'description' => 'Akses 24/7 dari perangkat apapun.',
                        'color' => 'amber',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />'
                    ],
                    [
                        'title' => 'Komunitas',
                        'description' => 'Bergabung dengan sesama pelajar.',
                        'color' => 'rose',
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />'
                    ],
                ];
            @endphp

            @foreach($features as $feature)
                <div
                    class="group p-6 rounded-2xl bg-gradient-to-br from-{{ $feature['color'] }}-50 to-white dark:from-zinc-800 dark:to-zinc-800 border border-{{ $feature['color'] }}-100 dark:border-zinc-700 hover:shadow-xl hover:shadow-{{ $feature['color'] }}-100/50 dark:hover:shadow-none transition-all hover:-translate-y-1">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-{{ $feature['color'] }}-500 to-{{ $feature['color'] }}-600 rounded-xl flex items-center justify-center text-white mb-5 shadow-lg shadow-{{ $feature['color'] }}-500/30 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            {!! $feature['icon'] !!}
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">{{ $feature['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>