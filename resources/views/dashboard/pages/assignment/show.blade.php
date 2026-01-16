<x-layouts.dashboard :title="$title">
    <div class="max-w-2xl">
        <div class="card">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('dashboard.assignments.index', [$course->slug, $homework->slug]) }}"
                    class="btn btn-sm btn-ghost"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg></a>
                <div>
                    <h2 class="text-lg font-bold">Nilai Tugas</h2>
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">{{ $assignment->student->name }} -
                        Pengumpulan
                    </p>
                </div>
            </div>

            <!-- Student Info -->
            <div class="flex items-center gap-3 p-4 rounded-xl bg-gray-50 dark:bg-zinc-800 mb-6">
                <div class="avatar">
                    <div
                        class="w-full h-full bg-gradient-teal flex items-center justify-center text-white font-semibold">
                        {{ strtoupper(substr($assignment->student->name, 0, 1)) }}
                    </div>
                </div>
                <div>
                    <p class="font-medium">{{ $assignment->student->name }}</p>
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">{{ $assignment->student->account->email }}
                    </p>
                </div>
            </div>

            <!-- Submission Content -->
            @if($assignment->content)
                <div class="mb-6">
                    <label class="form-label">Jawaban</label>
                    <p class="p-4 rounded-xl bg-gray-50 dark:bg-zinc-800 whitespace-pre-wrap">{{ $assignment->content }}</p>
                </div>
            @endif

            <!-- File -->
            @if($assignment->file)
                <div class="mb-6">
                    <label class="form-label">File Dikumpulkan</label>
                    <a href="{{ asset('storage/' . $assignment->file) }}" target="_blank" class="btn-secondary inline-flex">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Unduh File
                    </a>
                </div>
            @endif

            <!-- Grade Form -->
            <form
                action="{{ route('dashboard.assignments.update', [$course->slug, $homework->slug, $assignment->id]) }}"
                method="POST" class="space-y-5">
                @csrf @method('PUT')
                <div>
                    <label for="point" class="form-label">Nilai (0-100)</label>
                    <input type="number" id="point" name="point" min="0" max="100"
                        value="{{ old('point', $assignment->score) }}"
                        class="form-input @error('point') is-invalid @enderror" placeholder="Masukkan nilai...">
                    @error('point')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[rgb(var(--color-border))]">
                    <a href="{{ route('dashboard.assignments.index', [$course->slug, $homework->slug]) }}"
                        class="btn-ghost">Batal</a>
                    <button type="submit" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Simpan Nilai</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>