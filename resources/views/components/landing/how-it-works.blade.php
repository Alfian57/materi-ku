{{-- Landing Page How It Works Section --}}
<section id="how-it-works"
    class="py-24 px-4 sm:px-6 bg-gradient-to-br from-primary-50 via-white to-secondary-50 dark:from-zinc-800 dark:via-zinc-900 dark:to-zinc-800">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <span
                class="inline-block px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-secondary-600 dark:text-secondary-400 bg-secondary-100 dark:bg-secondary-900/30 rounded-full mb-4">
                Cara Kerja
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">Mulai dalam 3 Langkah</h2>
            <p class="text-gray-600 dark:text-gray-400">Proses sederhana untuk memulai perjalanan belajar Anda</p>
        </div>

        <div class="relative">
            {{-- Connecting Line --}}
            <div
                class="hidden md:block absolute top-1/2 left-0 right-0 h-0.5 bg-gradient-to-r from-primary-300 via-secondary-300 to-accent-300 dark:from-primary-800 dark:via-secondary-800 dark:to-accent-800 -translate-y-1/2">
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                @php
                    $steps = [
                        [
                            'number' => '1',
                            'title' => 'Buat Akun',
                            'description' => 'Daftar gratis dan atur profil Anda dalam hitungan menit.',
                            'color' => 'primary'
                        ],
                        [
                            'number' => '2',
                            'title' => 'Pilih Kursus',
                            'description' => 'Jelajahi katalog dan temukan kursus yang sesuai minat.',
                            'color' => 'secondary'
                        ],
                        [
                            'number' => '3',
                            'title' => 'Mulai Belajar',
                            'description' => 'Pelajari materi, kerjakan tugas, dan pantau progress.',
                            'color' => 'accent'
                        ],
                    ];
                @endphp

                @foreach($steps as $step)
                    <div class="relative text-center">
                        <div
                            class="relative z-10 w-16 h-16 bg-gradient-to-br from-{{ $step['color'] }}-500 to-{{ $step['color'] }}-600 rounded-2xl flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 shadow-xl shadow-{{ $step['color'] }}-500/30">
                            {{ $step['number'] }}
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">{{ $step['title'] }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $step['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>