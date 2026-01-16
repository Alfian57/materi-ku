{{-- Landing Page Footer --}}
<footer class="py-12 px-4 sm:px-6 bg-gray-50 dark:bg-zinc-900 border-t border-gray-200 dark:border-zinc-800">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            {{-- Logo --}}
            <x-shared.logo size="md" />

            {{-- Links --}}
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

            {{-- Copyright --}}
            <p class="text-sm text-gray-500 dark:text-gray-500">&copy; {{ date('Y') }} Materi-Ku. All rights reserved.
            </p>
        </div>
    </div>
</footer>