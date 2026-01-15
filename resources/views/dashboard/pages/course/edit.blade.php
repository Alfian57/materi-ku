<x-layouts.dashboard :title="$title">
    <div class="max-w-3xl">
        <div class="card">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('dashboard.courses.index') }}" class="btn btn-sm btn-ghost">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <div>
                    <h2 class="text-lg font-bold">Edit Course</h2>
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">Update course information</p>
                </div>
            </div>

            <form action="{{ route('dashboard.courses.update', $course->slug) }}" method="POST"
                enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="form-label">Course Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}"
                        class="form-input @error('title') is-invalid @enderror" placeholder="Enter course title...">
                    @error('title')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                @if ($course->thumbnail)
                    <div>
                        <label class="form-label">Current Thumbnail</label>
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Current Thumbnail"
                            class="w-48 h-32 object-cover rounded-xl">
                    </div>
                @endif

                <div>
                    <label for="thumbnail" class="form-label">New Thumbnail (optional)</label>
                    <input type="file" id="thumbnail" name="thumbnail" accept="image/*"
                        class="form-input @error('thumbnail') is-invalid @enderror">
                    @error('thumbnail')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="course_category_id" class="form-label">Category</label>
                    <select id="course_category_id" name="course_category_id"
                        class="form-select @error('course_category_id') is-invalid @enderror">
                        <option value="">Select a category...</option>
                        @foreach ($courseCategories as $category)
                            <option value="{{ $category->id }}" {{ old('course_category_id', $course->course_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_category_id')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="description" class="form-label">Short Description</label>
                    <textarea id="description" name="description" rows="3"
                        class="form-input @error('description') is-invalid @enderror"
                        placeholder="Brief description...">{{ old('description', $course->description) }}</textarea>
                    @error('description')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="content" class="form-label">Course Content</label>
                    <textarea id="content" name="content" rows="10"
                        class="form-input @error('content') is-invalid @enderror"
                        placeholder="Full course content...">{{ old('content', $course->content) }}</textarea>
                    @error('content')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[rgb(var(--color-border))]">
                    <a href="{{ route('dashboard.courses.index') }}" class="btn-ghost">Cancel</a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Course
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>