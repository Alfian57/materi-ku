{{-- Landing Page Testimonials Section --}}
<section id="testimonials" class="py-24 px-4 sm:px-6 bg-white dark:bg-zinc-900">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <span
                class="inline-block px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-accent-600 dark:text-accent-400 bg-accent-100 dark:bg-accent-900/30 rounded-full mb-4">
                Testimoni
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">Apa Kata Siswa Kami</h2>
            <p class="text-gray-600 dark:text-gray-400">Dengarkan pengalaman dari komunitas pelajar kami</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
                $testimonials = [
                    [
                        'quote' => 'Kursusnya terstruktur dengan baik dan para guru sangat membantu. Saya sudah belajar banyak hanya dalam beberapa minggu!',
                        'name' => 'Ahmad Rizki',
                        'role' => 'Level 5 · Siswa',
                        'initial' => 'A',
                        'gradient' => 'from-primary-500 to-secondary-500',
                        'cardGradient' => 'from-primary-50',
                        'borderColor' => 'primary-100'
                    ],
                    [
                        'quote' => 'Saya suka aspek gamifikasi-nya! Mengumpulkan poin dan naik level membuat saya tetap termotivasi untuk belajar setiap hari.',
                        'name' => 'Siti Nurhaliza',
                        'role' => 'Level 8 · Siswa',
                        'initial' => 'S',
                        'gradient' => 'from-secondary-500 to-accent-500',
                        'cardGradient' => 'from-secondary-50',
                        'borderColor' => 'secondary-100'
                    ],
                    [
                        'quote' => 'Sistem PR sangat bagus untuk melatih konsep. Mendapat feedback dari guru benar-benar membantu saya memahami lebih baik.',
                        'name' => 'Budi Santoso',
                        'role' => 'Level 3 · Siswa',
                        'initial' => 'B',
                        'gradient' => 'from-accent-500 to-primary-500',
                        'cardGradient' => 'from-accent-50',
                        'borderColor' => 'accent-100'
                    ],
                ];
            @endphp

            @foreach($testimonials as $testimonial)
                <div
                    class="bg-gradient-to-br {{ $testimonial['cardGradient'] }} to-white dark:from-zinc-800 dark:to-zinc-900 p-6 rounded-2xl border border-{{ $testimonial['borderColor'] }} dark:border-zinc-700">
                    <div class="flex gap-1 mb-4 text-amber-400">★★★★★</div>
                    <p class="text-gray-700 dark:text-gray-300 mb-6 italic">"{{ $testimonial['quote'] }}"</p>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br {{ $testimonial['gradient'] }} rounded-full flex items-center justify-center text-white font-bold text-sm">
                            {{ $testimonial['initial'] }}
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 dark:text-white text-sm">{{ $testimonial['name'] }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $testimonial['role'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>