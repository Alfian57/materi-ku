{{-- Landing Page CTA Section --}}
<section class="py-24 px-4 sm:px-6">
    <div class="max-w-4xl mx-auto">
        <div
            class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-primary-600 via-secondary-500 to-accent-500 p-10 sm:p-16 text-center">
            {{-- Grid Pattern --}}
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff10_1px,transparent_1px),linear-gradient(to_bottom,#ffffff10_1px,transparent_1px)] bg-[size:40px_40px]">
            </div>

            {{-- Decorative Blobs --}}
            <div class="absolute -top-20 -right-20 w-60 h-60 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-white/10 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">Siap Mulai Belajar?</h2>
                <p class="text-lg text-white/80 mb-8 max-w-xl mx-auto">
                    Bergabung dengan ribuan siswa yang sudah belajar bersama Materi-Ku. Mulai perjalanan Anda hari ini!
                </p>
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