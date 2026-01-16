<x-layouts.dashboard :title="$title">
    <div class="max-w-2xl">
        <div class="card">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('dashboard.student.course.homework', $course->slug) }}"
                    class="btn btn-sm btn-ghost"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg></a>
                <div>
                    <h2 class="text-lg font-bold">{{ $homework->title }}</h2>
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">Kumpulkan jawaban Anda</p>
                </div>
            </div>

            <!-- Homework Instructions -->
            <div class="p-4 rounded-xl bg-gray-50 dark:bg-zinc-800 mb-6">
                <h3 class="font-semibold mb-2 text-sm text-[rgb(var(--color-text-muted))] uppercase tracking-wider">
                    Instruksi</h3>
                <div class="prose prose-sm dark:prose-invert max-w-none">{!! clean_html($homework->content) !!}</div>
            </div>

            <!-- Already Submitted Warning -->
            @if($alreadySubmitted)
                <div class="alert alert-warning mb-6">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>Anda sudah pernah mengerjakan tugas ini. Poin tidak akan ditambahkan lagi untuk pengumpulan
                        berikutnya.</span>
                </div>
            @endif

            <!-- Submission Form -->
            <form action="{{ route('dashboard.student.course.submit', [$course->slug, $homework->slug]) }}"
                method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div>
                    <label for="file" class="form-label">Unggah Jawaban (PDF, maks 2MB)</label>
                    <input type="file" id="file" name="file" accept="application/pdf"
                        class="form-input @error('file') is-invalid @enderror" required>
                    @error('file')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="review" class="form-label">Ulasan Anda untuk Kursus Ini</label>
                    <textarea id="review" name="review" rows="4"
                        class="form-input @error('review') is-invalid @enderror"
                        placeholder="Bagikan pendapat Anda tentang kursus ini..." required></textarea>
                    @error('review')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="alert alert-info">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm">Mengumpulkan jawaban Anda juga akan memposting ulasan untuk kursus ini.</span>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[rgb(var(--color-border))]">
                    <a href="{{ route('dashboard.student.course.homework', $course->slug) }}"
                        class="btn-ghost">Batal</a>
                    <button type="submit" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>Kumpulkan Jawaban</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>