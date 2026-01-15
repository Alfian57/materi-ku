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
                    <h2 class="text-lg font-bold">Edit Homework</h2>
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">Update homework for {{ $course->title }}</p>
                </div>
            </div>
            <form action="{{ route('dashboard.homeworks.update', [$course->slug, $homework->slug]) }}" method="POST"
                class="space-y-5">
                @csrf @method('PUT')
                <div><label for="title" class="form-label">Homework Title</label><input type="text" id="title"
                        name="title" value="{{ old('title', $homework->title) }}"
                        class="form-input @error('title') is-invalid @enderror"
                        placeholder="Enter homework title...">@error('title')<p class="form-error">{{ $message }}</p>
                        @enderror</div>
                <div><label for="content" class="form-label">Instructions</label><textarea id="content" name="content"
                        rows="6" class="form-input @error('content') is-invalid @enderror"
                        placeholder="Enter homework instructions...">{{ old('content', $homework->content) }}</textarea>@error('content')
                        <p class="form-error">{{ $message }}</p>@enderror</div>
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[rgb(var(--color-border))]">
                    <a href="{{ route('dashboard.homeworks.index', $course->slug) }}" class="btn-ghost">Cancel</a>
                    <button type="submit" class="btn-primary"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>Update</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>