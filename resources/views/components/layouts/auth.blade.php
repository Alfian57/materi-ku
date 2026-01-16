<x-layouts.app :title="$title ?? 'Auth'">
    <div class="min-h-screen flex">
        <!-- Left: Form Section -->
        <div class="flex-1 flex items-center justify-center p-6 lg:p-12">
            <div class="w-full max-w-md">
                <!-- Back to Home -->
                <a href="{{ route('landing') }}"
                    class="inline-flex items-center gap-2 text-sm text-[rgb(var(--color-text-muted))] hover:text-primary-600 transition-colors mb-8 group">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>

                <!-- Logo -->
                <div class="mb-8">
                    <x-shared.logo size="lg" />
                </div>

                {{ $slot }}

                <!-- Theme Toggle -->
                <div class="mt-8 flex justify-center">
                    <button @click="darkMode = !darkMode"
                        class="flex items-center gap-2 px-4 py-2 rounded-xl text-sm text-[rgb(var(--color-text-muted))] hover:bg-gray-100 dark:hover:bg-zinc-700 transition-colors">
                        <svg x-show="darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg x-show="!darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <span x-text="darkMode ? 'Mode Terang' : 'Mode Gelap'"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Right: Decorative Section (Hidden on mobile) -->
        <div
            class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-primary-600 via-primary-500 to-secondary-500 relative overflow-hidden">
            <!-- Abstract Background Pattern -->
            <div class="absolute inset-0 opacity-30">
                <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <defs>
                        <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                            <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5" opacity="0.3" />
                        </pattern>
                    </defs>
                    <rect width="100" height="100" fill="url(#grid)" />
                </svg>
            </div>

            <!-- Floating Geometric Shapes -->
            <div
                class="absolute top-16 right-16 w-24 h-24 border-4 border-white/20 rounded-2xl rotate-12 animate-float">
            </div>
            <div class="absolute bottom-24 left-16 w-32 h-32 border-4 border-white/20 rounded-full animate-float"
                style="animation-delay: 1s"></div>
            <div class="absolute top-1/3 left-1/4 w-16 h-16 bg-white/10 rounded-xl rotate-45 animate-float"
                style="animation-delay: 2s"></div>
            <div class="absolute bottom-1/3 right-1/4 w-20 h-20 bg-white/10 rounded-full animate-float"
                style="animation-delay: 0.5s"></div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col items-center justify-center p-12 text-white text-center">
                <!-- Icon -->
                <div
                    class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center mb-8 shadow-lg">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>

                <h2 class="text-3xl font-bold mb-4">
                    @if(isset($headline))
                        {{ $headline }}
                    @else
                        Temukan Ilmu
                    @endif
                </h2>

                <p class="text-lg text-white/80 max-w-sm leading-relaxed">
                    @if(isset($subheadline))
                        {{ $subheadline }}
                    @else
                        Perluas wawasan Anda dengan kursus komprehensif yang dirancang untuk membantu Anda sukses.
                    @endif
                </p>

                <!-- Stats -->
                <div class="flex gap-8 mt-10">
                    <div class="text-center">
                        <div class="text-3xl font-bold">100+</div>
                        <div class="text-sm text-white/70 mt-1">Kursus</div>
                    </div>
                    <div class="w-px bg-white/30"></div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">50+</div>
                        <div class="text-sm text-white/70 mt-1">Pengajar</div>
                    </div>
                    <div class="w-px bg-white/30"></div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">1K+</div>
                        <div class="text-sm text-white/70 mt-1">Siswa</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>