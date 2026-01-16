<x-layouts.dashboard :title="$title">
    <div class="max-w-2xl">
        <div class="card">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('dashboard.homeworks.index', $course->slug) }}" class="btn btn-sm btn-ghost"><svg
                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg></a>
                <div>
                    <h2 class="text-lg font-bold">Tambah Tugas</h2>
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">Buat tugas baru untuk {{ $course->title }}
                    </p>
                </div>
            </div>
            <form action="{{ route('dashboard.homeworks.store', $course->slug) }}" method="POST" class="space-y-5">
                @csrf
                <div><label for="title" class="form-label">Judul Tugas</label><input type="text" id="title" name="title"
                        value="{{ old('title') }}" class="form-input @error('title') is-invalid @enderror"
                        placeholder="Masukkan judul tugas...">@error('title')<p class="form-error">{{ $message }}</p>
                        @enderror</div>
                <div><label for="content" class="form-label">Instruksi</label><textarea id="content" name="content"
                        rows="6" class="form-input @error('content') is-invalid @enderror"
                        placeholder="Masukkan instruksi tugas...">{{ old('content') }}</textarea>@error('content')<p
                        class="form-error">{{ $message }}</p>@enderror</div>
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[rgb(var(--color-border))]">
                    <a href="{{ route('dashboard.homeworks.index', $course->slug) }}" class="btn-ghost">Batal</a>
                    <button type="submit" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>Buat</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>