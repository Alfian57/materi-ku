<x-layouts.app title="Materi-Ku - Learning Platform">
    <div x-data="{ mobileMenuOpen: false }" class="min-h-screen">
        <!-- Navbar -->
        <nav
            class="fixed top-0 left-0 right-0 z-50 bg-white/90 dark:bg-zinc-900/90 backdrop-blur-md border-b border-gray-100 dark:border-zinc-800">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="flex items-center justify-between h-16">
                    <a href="/" class="flex items-center gap-2">
                        <div
                            class="w-9 h-9 bg-white rounded-xl flex items-center justify-center shadow-lg shadow-primary-500/25 overflow-hidden">
                            <img src="{{ asset('logo/logo.svg') }}" alt="Materi-Ku Logo"
                                class="w-full h-full object-cover">
                        </div>
                        <span
                            class="text-xl font-bold bg-gradient-to-r from-primary-600 to-secondary-500 bg-clip-text text-transparent">Materi-Ku</span>
                    </a>
                    <div class="hidden md:flex items-center gap-8">
                        <a href="#features"
                            class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Features</a>
                        <a href="#how-it-works"
                            class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">How
                            it Works</a>
                        <a href="#testimonials"
                            class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Testimonials</a>
                    </div>
                    <div class="hidden md:flex items-center gap-3">
                        <button @click="darkMode = !darkMode"
                            class="w-9 h-9 rounded-full flex items-center justify-center hover:bg-gray-100 dark:hover:bg-zinc-800 transition-colors">
                            <svg x-show="darkMode" class="w-5 h-5 text-yellow-500" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <svg x-show="!darkMode" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </button>
                        <a href="{{ route('dashboard.login.index') }}"
                            class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary-600 px-3 py-2">Sign
                            In</a>
                        <a href="{{ route('dashboard.register.index') }}"
                            class="text-sm font-semibold bg-gradient-to-r from-primary-600 to-secondary-500 text-white px-5 py-2.5 rounded-full hover:shadow-lg hover:shadow-primary-500/25 transition-all hover:-translate-y-0.5">Get
                            Started</a>
                    </div>
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="md:hidden w-9 h-9 flex items-center justify-center rounded-lg hover:bg-gray-100 dark:hover:bg-zinc-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                <div x-show="mobileMenuOpen" x-transition
                    class="md:hidden py-4 space-y-3 border-t border-gray-100 dark:border-zinc-800">
                    <a href="#features" class="block py-2 text-sm font-medium">Features</a>
                    <a href="#how-it-works" class="block py-2 text-sm font-medium">How it Works</a>
                    <a href="#testimonials" class="block py-2 text-sm font-medium">Testimonials</a>
                    <div class="flex gap-3 pt-3">
                        <a href="{{ route('dashboard.login.index') }}"
                            class="flex-1 text-center py-2.5 border border-gray-200 dark:border-zinc-700 rounded-full text-sm font-medium">Sign
                            In</a>
                        <a href="{{ route('dashboard.register.index') }}"
                            class="flex-1 text-center py-2.5 bg-gradient-to-r from-primary-600 to-secondary-500 text-white rounded-full text-sm font-semibold">Get
                            Started</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section
            class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary-50 via-white to-secondary-50 dark:from-zinc-900 dark:via-zinc-900 dark:to-zinc-800">
            <!-- Decorative Background -->
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
            <!-- Grid Pattern -->
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#8882_1px,transparent_1px),linear-gradient(to_bottom,#8882_1px,transparent_1px)] bg-[size:60px_60px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)]">
            </div>

            <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 py-20 pt-32">
                <div class="text-center">
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white dark:bg-zinc-800 shadow-lg shadow-gray-200/50 dark:shadow-none border border-gray-100 dark:border-zinc-700 mb-8">
                        <span class="flex h-2 w-2 relative">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                        </span>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Platform pembelajaran terbaik
                            untuk Anda</span>
                    </div>

                    <!-- Headline -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                        <span class="text-gray-900 dark:text-white">Belajar Tanpa</span>
                        <br />
                        <span
                            class="bg-gradient-to-r from-primary-600 via-secondary-500 to-accent-500 bg-clip-text text-transparent">Batas</span>
                    </h1>

                    <!-- Subheadline -->
                    <p
                        class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed">
                        Temukan dunia pengetahuan dengan kursus komprehensif kami. Belajar dengan kecepatan Anda sendiri
                        bersama guru-guru ahli.
                    </p>

                    <!-- CTA Buttons -->
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

                    <!-- Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-3xl mx-auto">
                        <div
                            class="bg-white/60 dark:bg-zinc-800/60 backdrop-blur-sm rounded-2xl p-5 border border-white dark:border-zinc-700 shadow-lg">
                            <p
                                class="text-3xl font-bold bg-gradient-to-r from-primary-600 to-secondary-500 bg-clip-text text-transparent">
                                100+</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Kursus</p>
                        </div>
                        <div
                            class="bg-white/60 dark:bg-zinc-800/60 backdrop-blur-sm rounded-2xl p-5 border border-white dark:border-zinc-700 shadow-lg">
                            <p
                                class="text-3xl font-bold bg-gradient-to-r from-secondary-500 to-accent-500 bg-clip-text text-transparent">
                                50+</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Pengajar</p>
                        </div>
                        <div
                            class="bg-white/60 dark:bg-zinc-800/60 backdrop-blur-sm rounded-2xl p-5 border border-white dark:border-zinc-700 shadow-lg">
                            <p
                                class="text-3xl font-bold bg-gradient-to-r from-accent-500 to-primary-500 bg-clip-text text-transparent">
                                1K+</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Siswa</p>
                        </div>
                        <div
                            class="bg-white/60 dark:bg-zinc-800/60 backdrop-blur-sm rounded-2xl p-5 border border-white dark:border-zinc-700 shadow-lg">
                            <p
                                class="text-3xl font-bold bg-gradient-to-r from-emerald-500 to-teal-500 bg-clip-text text-transparent">
                                95%</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Kepuasan</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-24 px-4 sm:px-6 bg-white dark:bg-zinc-900">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <span
                        class="inline-block px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-primary-600 dark:text-primary-400 bg-primary-100 dark:bg-primary-900/30 rounded-full mb-4">Fitur
                        Unggulan</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">Semua yang Anda
                        Butuhkan</h2>
                    <p class="text-gray-600 dark:text-gray-400 max-w-xl mx-auto">Platform kami menyediakan semua alat
                        dan sumber daya untuk mencapai tujuan pembelajaran Anda.</p>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        class="group p-6 rounded-2xl bg-gradient-to-br from-primary-50 to-white dark:from-zinc-800 dark:to-zinc-800 border border-primary-100 dark:border-zinc-700 hover:shadow-xl hover:shadow-primary-100/50 dark:hover:shadow-none transition-all hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center text-white mb-5 shadow-lg shadow-primary-500/30 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Kursus Lengkap</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">Akses berbagai kursus dari
                            level pemula hingga mahir.</p>
                    </div>
                    <div
                        class="group p-6 rounded-2xl bg-gradient-to-br from-secondary-50 to-white dark:from-zinc-800 dark:to-zinc-800 border border-secondary-100 dark:border-zinc-700 hover:shadow-xl hover:shadow-secondary-100/50 dark:hover:shadow-none transition-all hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-secondary-500 to-secondary-600 rounded-xl flex items-center justify-center text-white mb-5 shadow-lg shadow-secondary-500/30 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Guru Ahli</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">Belajar dari pengajar
                            berkualitas yang berdedikasi.</p>
                    </div>
                    <div
                        class="group p-6 rounded-2xl bg-gradient-to-br from-accent-50 to-white dark:from-zinc-800 dark:to-zinc-800 border border-accent-100 dark:border-zinc-700 hover:shadow-xl hover:shadow-accent-100/50 dark:hover:shadow-none transition-all hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-accent-500 to-accent-600 rounded-xl flex items-center justify-center text-white mb-5 shadow-lg shadow-accent-500/30 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">PR Interaktif</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">Latihan dan dapatkan
                            feedback dari guru.</p>
                    </div>
                    <div
                        class="group p-6 rounded-2xl bg-gradient-to-br from-emerald-50 to-white dark:from-zinc-800 dark:to-zinc-800 border border-emerald-100 dark:border-zinc-700 hover:shadow-xl hover:shadow-emerald-100/50 dark:hover:shadow-none transition-all hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white mb-5 shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Poin & Level</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">Gamifikasi untuk menjaga
                            motivasi belajar.</p>
                    </div>
                    <div
                        class="group p-6 rounded-2xl bg-gradient-to-br from-amber-50 to-white dark:from-zinc-800 dark:to-zinc-800 border border-amber-100 dark:border-zinc-700 hover:shadow-xl hover:shadow-amber-100/50 dark:hover:shadow-none transition-all hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center text-white mb-5 shadow-lg shadow-amber-500/30 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Belajar Kapan Saja</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">Akses 24/7 dari perangkat
                            apapun.</p>
                    </div>
                    <div
                        class="group p-6 rounded-2xl bg-gradient-to-br from-rose-50 to-white dark:from-zinc-800 dark:to-zinc-800 border border-rose-100 dark:border-zinc-700 hover:shadow-xl hover:shadow-rose-100/50 dark:hover:shadow-none transition-all hover:-translate-y-1">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-rose-500 to-rose-600 rounded-xl flex items-center justify-center text-white mb-5 shadow-lg shadow-rose-500/30 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Komunitas</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">Bergabung dengan sesama
                            pelajar.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section id="how-it-works"
            class="py-24 px-4 sm:px-6 bg-gradient-to-br from-primary-50 via-white to-secondary-50 dark:from-zinc-800 dark:via-zinc-900 dark:to-zinc-800">
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-16">
                    <span
                        class="inline-block px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-secondary-600 dark:text-secondary-400 bg-secondary-100 dark:bg-secondary-900/30 rounded-full mb-4">Cara
                        Kerja</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">Mulai dalam 3 Langkah
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400">Proses sederhana untuk memulai perjalanan belajar Anda
                    </p>
                </div>
                <div class="relative">
                    <div
                        class="hidden md:block absolute top-1/2 left-0 right-0 h-0.5 bg-gradient-to-r from-primary-300 via-secondary-300 to-accent-300 dark:from-primary-800 dark:via-secondary-800 dark:to-accent-800 -translate-y-1/2">
                    </div>
                    <div class="grid md:grid-cols-3 gap-12">
                        <div class="relative text-center">
                            <div
                                class="relative z-10 w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 shadow-xl shadow-primary-500/30">
                                1</div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Buat Akun</h3>
                            <p class="text-gray-600 dark:text-gray-400">Daftar gratis dan atur profil Anda dalam
                                hitungan menit.</p>
                        </div>
                        <div class="relative text-center">
                            <div
                                class="relative z-10 w-16 h-16 bg-gradient-to-br from-secondary-500 to-secondary-600 rounded-2xl flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 shadow-xl shadow-secondary-500/30">
                                2</div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Pilih Kursus</h3>
                            <p class="text-gray-600 dark:text-gray-400">Jelajahi katalog dan temukan kursus yang sesuai
                                minat.</p>
                        </div>
                        <div class="relative text-center">
                            <div
                                class="relative z-10 w-16 h-16 bg-gradient-to-br from-accent-500 to-accent-600 rounded-2xl flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 shadow-xl shadow-accent-500/30">
                                3</div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Mulai Belajar</h3>
                            <p class="text-gray-600 dark:text-gray-400">Pelajari materi, kerjakan tugas, dan pantau
                                progress.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section id="testimonials" class="py-24 px-4 sm:px-6 bg-white dark:bg-zinc-900">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <span
                        class="inline-block px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-accent-600 dark:text-accent-400 bg-accent-100 dark:bg-accent-900/30 rounded-full mb-4">Testimoni</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">Apa Kata Siswa Kami
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400">Dengarkan pengalaman dari komunitas pelajar kami</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div
                        class="bg-gradient-to-br from-primary-50 to-white dark:from-zinc-800 dark:to-zinc-900 p-6 rounded-2xl border border-primary-100 dark:border-zinc-700">
                        <div class="flex gap-1 mb-4 text-amber-400">★★★★★</div>
                        <p class="text-gray-700 dark:text-gray-300 mb-6 italic">"Kursusnya terstruktur dengan baik dan
                            para guru sangat membantu. Saya sudah belajar banyak hanya dalam beberapa minggu!"</p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                A</div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white text-sm">Ahmad Rizki</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Level 5 · Siswa</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gradient-to-br from-secondary-50 to-white dark:from-zinc-800 dark:to-zinc-900 p-6 rounded-2xl border border-secondary-100 dark:border-zinc-700">
                        <div class="flex gap-1 mb-4 text-amber-400">★★★★★</div>
                        <p class="text-gray-700 dark:text-gray-300 mb-6 italic">"Saya suka aspek gamifikasi-nya!
                            Mengumpulkan poin dan naik level membuat saya tetap termotivasi untuk belajar setiap hari."
                        </p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-secondary-500 to-accent-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                S</div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white text-sm">Siti Nurhaliza</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Level 8 · Siswa</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-gradient-to-br from-accent-50 to-white dark:from-zinc-800 dark:to-zinc-900 p-6 rounded-2xl border border-accent-100 dark:border-zinc-700">
                        <div class="flex gap-1 mb-4 text-amber-400">★★★★★</div>
                        <p class="text-gray-700 dark:text-gray-300 mb-6 italic">"Sistem PR sangat bagus untuk melatih
                            konsep. Mendapat feedback dari guru benar-benar membantu saya memahami lebih baik."</p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-accent-500 to-primary-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                B</div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white text-sm">Budi Santoso</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Level 3 · Siswa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24 px-4 sm:px-6">
            <div class="max-w-4xl mx-auto">
                <div
                    class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-primary-600 via-secondary-500 to-accent-500 p-10 sm:p-16 text-center">
                    <div
                        class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff10_1px,transparent_1px),linear-gradient(to_bottom,#ffffff10_1px,transparent_1px)] bg-[size:40px_40px]">
                    </div>
                    <div class="absolute -top-20 -right-20 w-60 h-60 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Siap Mulai Belajar?</h2>
                        <p class="text-lg text-white/80 mb-8 max-w-xl mx-auto">Bergabung dengan ribuan siswa yang sudah
                            belajar bersama Materi-Ku. Mulai perjalanan Anda hari ini!</p>
                        <a href="{{ route('dashboard.register.index') }}"
                            class="inline-flex items-center gap-2 bg-white text-primary-600 font-bold px-8 py-4 rounded-full shadow-2xl hover:shadow-3xl hover:bg-gray-50 transition-all hover:-translate-y-1">
                            Daftar Gratis Sekarang
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 px-4 sm:px-6 bg-gray-50 dark:bg-zinc-900 border-t border-gray-200 dark:border-zinc-800">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <a href="/" class="flex items-center gap-2">
                        <div
                            class="w-9 h-9 bg-white rounded-xl flex items-center justify-center shadow-lg shadow-primary-500/25 overflow-hidden">
                            <img src="{{ asset('logo/logo.svg') }}" alt="Materi-Ku Logo"
                                class="w-full h-full object-cover">
                        </div>
                        <span
                            class="text-xl font-bold bg-gradient-to-r from-primary-600 to-secondary-500 bg-clip-text text-transparent">Materi-Ku</span>
                    </a>
                    <div class="flex flex-wrap gap-6 text-sm text-gray-600 dark:text-gray-400">
                        <a href="#features"
                            class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Fitur</a>
                        <a href="#how-it-works"
                            class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Cara Kerja</a>
                        <a href="#testimonials"
                            class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Testimoni</a>
                        <a href="{{ route('dashboard.login.index') }}"
                            class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Masuk</a>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-500">&copy; {{ date('Y') }} Materi-Ku. All rights
                        reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</x-layouts.app>