<x-layouts.dashboard :title="$title">
    <div class="max-w-2xl">
        <div class="card">
            <div class="flex items-center gap-3 mb-6">
                <a href="{{ route('dashboard.admins.index') }}" class="btn btn-sm btn-ghost">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <div>
                    <h2 class="text-lg font-bold">Create New Admin</h2>
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">Add a new administrator</p>
                </div>
            </div>
            <form action="{{ route('dashboard.admins.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="form-input @error('name') is-invalid @enderror" placeholder="Enter admin name...">
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="form-input @error('email') is-invalid @enderror" placeholder="Enter email address...">
                    @error('email')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-input @error('password') is-invalid @enderror" placeholder="Enter password...">
                        @error('password')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-input" placeholder="Confirm password...">
                    </div>
                </div>
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[rgb(var(--color-border))]">
                    <a href="{{ route('dashboard.admins.index') }}" class="btn-ghost">Cancel</a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Create Admin
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>