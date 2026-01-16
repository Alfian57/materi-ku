{{-- Landing Page Hero Section --}}
<section
    class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary-50 via-white to-secondary-50 dark:from-zinc-900 dark:via-zinc-900 dark:to-zinc-800">

    {{-- Decorative Background --}}
    <div class="absolute inset-0 overflow-hidden">
        <div
            class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-primary-400/30 to-secondary-400/30 rounded-full blur-3xl">
        </div>
        <div
            class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-br from-secondary-400/20 to-accent-400/20 rounded-full blur-3xl">
        </div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-br from-primary-200/20 to-transparent rounded-full blur-3xl">
        </div>
    </div>

    {{-- Grid Pattern --}}
    <div
        class="absolute inset-0 bg-[linear-gradient(to_right,#8882_1px,transparent_1px),linear-gradient(to_bottom,#8882_1px,transparent_1px)] bg-[size:60px_60px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)]">
    </div>

    <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 py-20 pt-32">
        <div class="text-center">
            {{-- Badge --}}
            <div
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white dark:bg-zinc-800 shadow-lg shadow-gray-200/50 dark:shadow-none border border-gray-100 dark:border-zinc-700 mb-8">
                <span class="flex h-2 w-2 relative">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                </span>
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Platform pembelajaran terbaik untuk
                    Anda</span>
            </div>

            {{-- Headline --}}
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                <span class="text-gray-900 dark:text-white">Belajar Tanpa</span>
                <br />
                <span
                    class="bg-gradient-to-r from-primary-600 via-secondary-500 to-accent-500 bg-clip-text text-transparent">Batas</span>
            </h1>

            {{-- Subheadline --}}
            <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed">
                Temukan dunia pengetahuan dengan kursus komprehensif kami. Belajar dengan kecepatan Anda sendiri bersama
                guru-guru ahli.
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                <a href="{{ route('dashboard.register.index') }}"
                    class="group inline-flex items-center justify-center gap-2 bg-gradient-to-r from-primary-600 to-secondary-500 text-white font-semibold px-8 py-4 rounded-full shadow-xl shadow-primary-500/30 hover:shadow-2xl hover:shadow-primary-500/40 transition-all hover:-translate-y-1">
                    Mulai Belajar Gratis
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                <a href="#features"
                    class="inline-flex items-center justify-center gap-2 bg-white dark:bg-zinc-800 text-gray-700 dark:text-gray-300 font-semibold px-8 py-4 rounded-full border border-gray-200 dark:border-zinc-700 hover:border-primary-300 dark:hover:border-primary-600 hover:shadow-lg transition-all">
                    <svg class="w-5 h-5 text-primary-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                    Lihat Demo
                </a>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-3xl mx-auto">
                @php
                    $stats = [
                        ['value' => '100+', 'label' => 'Kursus', 'gradient' => 'from-primary-600 to-secondary-500'],
                        ['value' => '50+', 'label' => 'Pengajar', 'gradient' => 'from-secondary-500 to-accent-500'],
                        ['value' => '1K+', 'label' => 'Siswa', 'gradient' => 'from-accent-500 to-primary-500'],
                        ['value' => '95%', 'label' => 'Kepuasan', 'gradient' => 'from-emerald-500 to-teal-500'],
                    ];
                @endphp
                @foreach($stats as $stat)
                    <div
                        class="bg-white/60 dark:bg-zinc-800/60 backdrop-blur-sm rounded-2xl p-5 border border-white dark:border-zinc-700 shadow-lg">
                        <p
                            class="text-3xl font-bold bg-gradient-to-r {{ $stat['gradient'] }} bg-clip-text text-transparent">
                            {{ $stat['value'] }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</section>