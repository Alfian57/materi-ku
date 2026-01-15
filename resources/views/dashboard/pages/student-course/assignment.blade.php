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
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">Submit your answer</p>
                </div>
            </div>

            <!-- Homework Instructions -->
            <div class="p-4 rounded-xl bg-gray-50 dark:bg-zinc-800 mb-6">
                <h3 class="font-semibold mb-2 text-sm text-[rgb(var(--color-text-muted))] uppercase tracking-wider">
                    Instructions</h3>
                <div class="prose prose-sm dark:prose-invert max-w-none">{!! nl2br(e($homework->content)) !!}</div>
            </div>

            <!-- Submission Form -->
            <form action="{{ route('dashboard.student.course.submit', [$course->slug, $homework->slug]) }}"
                method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                <div>
                    <label for="file" class="form-label">Upload Answer (PDF, max 2MB)</label>
                    <input type="file" id="file" name="file" accept="application/pdf"
                        class="form-input @error('file') is-invalid @enderror" required>
                    @error('file')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="review" class="form-label">Your Review for This Course</label>
                    <textarea id="review" name="review" rows="4"
                        class="form-input @error('review') is-invalid @enderror"
                        placeholder="Share your thoughts about this course..." required></textarea>
                    @error('review')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="alert alert-info">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm">Submitting your answer will also post a review for this course.</span>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[rgb(var(--color-border))]">
                    <a href="{{ route('dashboard.student.course.homework', $course->slug) }}"
                        class="btn-ghost">Cancel</a>
                    <button type="submit" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>Submit Answer</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>