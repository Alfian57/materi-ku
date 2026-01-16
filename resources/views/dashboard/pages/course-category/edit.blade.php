<x-layouts.dashboard :title="$title">
    <div class="max-w-md">
        <div class="card">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('dashboard.course-categories.index') }}" class="btn btn-sm btn-ghost">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <div>
                    <h2 class="text-lg font-bold">Edit Kategori</h2>
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">Perbarui kategori kursus</p>
                </div>
            </div>
            <form action="{{ route('dashboard.course-categories.update', $courseCategory->slug) }}" method="POST"
                class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $courseCategory->name) }}"
                        class="form-input @error('name') is-invalid @enderror"
                        placeholder="contoh: Matematika, Sains, Seni...">
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[rgb(var(--color-border))]">
                    <a href="{{ route('dashboard.course-categories.index') }}" class="btn-ghost">Batal</a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Perbarui Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>