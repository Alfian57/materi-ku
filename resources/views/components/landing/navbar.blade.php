{{-- Landing Page Navbar Component --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 dark:bg-zinc-900/90 backdrop-blur-md border-b border-gray-100 dark:border-zinc-800"
    x-data="{ mobileMenuOpen: false }">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <x-shared.logo size="md" />

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="#features"
                    class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Fitur</a>
                <a href="#how-it-works"
                    class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Cara
                    Kerja</a>
                <a href="#testimonials"
                    class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Testimoni</a>
            </div>

            {{-- Desktop Actions --}}
            <div class="hidden md:flex items-center gap-3">
                <x-shared.dark-mode-toggle />
                <a href="{{ route('dashboard.login.index') }}"
                    class="text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary-600 px-3 py-2">Masuk</a>
                <x-ui.button href="{{ route('dashboard.register.index') }}" size="sm">
                    Daftar
                </x-ui.button>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="md:hidden w-9 h-9 flex items-center justify-center rounded-lg hover:bg-gray-100 dark:hover:bg-zinc-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileMenuOpen" x-transition
            class="md:hidden py-4 space-y-3 border-t border-gray-100 dark:border-zinc-800">
            <a href="#features" class="block py-2 text-sm font-medium">Fitur</a>
            <a href="#how-it-works" class="block py-2 text-sm font-medium">Cara Kerja</a>
            <a href="#testimonials" class="block py-2 text-sm font-medium">Testimoni</a>
            <div class="flex gap-3 pt-3">
                <a href="{{ route('dashboard.login.index') }}"
                    class="flex-1 text-center py-2.5 border border-gray-200 dark:border-zinc-700 rounded-full text-sm font-medium">Masuk</a>
                <a href="{{ route('dashboard.register.index') }}"
                    class="flex-1 text-center py-2.5 bg-gradient-to-r from-primary-600 to-secondary-500 text-white rounded-full text-sm font-semibold">Daftar</a>
            </div>
        </div>
    </div>
</nav>