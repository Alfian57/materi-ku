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
                    <h2 class="text-lg font-bold">Edit Admin</h2>
                    <p class="text-sm text-[rgb(var(--color-text-muted))]">Update administrator information</p>
                </div>
            </div>
            <form action="{{ route('dashboard.admins.update', $admin->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $admin->name) }}"
                        class="form-input @error('name') is-invalid @enderror" placeholder="Enter admin name...">
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $admin->account->email) }}"
                        class="form-input @error('email') is-invalid @enderror" placeholder="Enter email address...">
                    @error('email')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" id="password" name="password"
                            class="form-input @error('password') is-invalid @enderror" placeholder="New password...">
                        @error('password')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-input" placeholder="Confirm password...">
                    </div>
                </div>
                <div class="alert alert-info">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm">Leave password fields empty if you don't want to change the password.</span>
                </div>
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-[rgb(var(--color-border))]">
                    <a href="{{ route('dashboard.admins.index') }}" class="btn-ghost">Cancel</a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Admin
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.dashboard>