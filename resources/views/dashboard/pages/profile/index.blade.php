<x-layouts.dashboard :title="$title">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="lg:col-span-1">
            <div class="card text-center">
                <!-- Avatar -->
                <div class="relative inline-block mx-auto mb-4">
                    <div
                        class="avatar w-32 h-32 ring-4 ring-primary-500 ring-offset-4 ring-offset-[rgb(var(--color-surface))]">
                        @if (Auth::user()->profile_picture)
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile">
                        @else
                            <div
                                class="w-full h-full bg-gradient-playful flex items-center justify-center text-white text-4xl font-bold">
                                {{ strtoupper(substr(Auth::user()->email, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                </div>

                <h2 class="text-xl font-bold mb-1">{{ Auth::user()->accountable->name }}</h2>
                <p class="text-[rgb(var(--color-text-muted))] mb-4">{{ Auth::user()->email }}</p>

                <div class="flex justify-center gap-2 mb-4">
                    <span class="badge badge-primary">
                        {{ class_basename(Auth::user()->accountable_type) }}
                    </span>
                    @if (Auth::user()->accountable_type == 'App\Models\Student')
                        <span class="badge badge-secondary">Level {{ Auth::user()->accountable->level }}</span>
                    @endif
                </div>

                <!-- Profile Picture Upload -->
                <form action="{{ route('dashboard.profile-pic.update') }}" method="POST" enctype="multipart/form-data"
                    class="mt-4">
                    @csrf
                    @method('PUT')
                    <label for="profile_picture" class="block cursor-pointer">
                        <div class="btn-outline btn-sm w-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Ganti Foto
                        </div>
                        <input type="file" id="profile_picture" name="profile_picture" class="hidden" accept="image/*"
                            onchange="this.form.submit()">
                    </label>
                    @error('profile_picture')
                        <p class="form-error mt-2">{{ $message }}</p>
                    @enderror
                </form>
            </div>

            <!-- Stats Card (for Students) -->
            @if (Auth::user()->accountable_type == 'App\Models\Student')
                <div class="card mt-6">
                    <h3 class="font-bold mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-secondary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Kemajuan Anda
                    </h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-[rgb(var(--color-text-muted))]">Level</span>
                            <span class="font-bold text-gradient">{{ Auth::user()->accountable->level }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-[rgb(var(--color-text-muted))]">Poin</span>
                            <span
                                class="font-bold text-gradient-teal">{{ number_format(Auth::user()->accountable->point) }}</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Forms Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Profile Details -->
            <div class="card">
                <h3 class="font-bold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Detail Profil
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="p-4 rounded-xl bg-gray-50 dark:bg-zinc-800">
                        <p class="text-xs text-[rgb(var(--color-text-muted))] uppercase tracking-wider mb-1">Nama</p>
                        <p class="font-medium">{{ Auth::user()->accountable->name }}</p>
                    </div>
                    <div class="p-4 rounded-xl bg-gray-50 dark:bg-zinc-800">
                        <p class="text-xs text-[rgb(var(--color-text-muted))] uppercase tracking-wider mb-1">Email</p>
                        <p class="font-medium">{{ Auth::user()->email }}</p>
                    </div>
                    @if (Auth::user()->accountable_type != 'App\Models\Admin')
                        <div class="p-4 rounded-xl bg-gray-50 dark:bg-zinc-800 md:col-span-2">
                            <p class="text-xs text-[rgb(var(--color-text-muted))] uppercase tracking-wider mb-1">Alamat</p>
                            <p class="font-medium">{{ Auth::user()->accountable->address }}</p>
                        </div>
                    @endif
                    <div class="p-4 rounded-xl bg-gray-50 dark:bg-zinc-800">
                        <p class="text-xs text-[rgb(var(--color-text-muted))] uppercase tracking-wider mb-1">Anggota
                            Sejak</p>
                        <p class="font-medium">{{ Auth::user()->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Update Email -->
            <div class="card">
                <h3 class="font-bold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-secondary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Perbarui Email
                </h3>

                <form action="{{ route('dashboard.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                            class="form-input @error('email') is-invalid @enderror">
                        @error('email')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Perbarui Email
                    </button>
                </form>
            </div>

            <!-- Update Password -->
            <div class="card">
                <h3 class="font-bold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-accent-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Ubah Kata Sandi
                </h3>

                <form action="{{ route('dashboard.password.update') }}" method="POST" class="space-y-4"
                    x-data="{ showPasswords: false }">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="current_password" class="form-label">Kata Sandi Saat Ini</label>
                        <input :type="showPasswords ? 'text' : 'password'" id="current_password" name="current_password"
                            class="form-input @error('current_password') is-invalid @enderror">
                        @error('current_password')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="new_password" class="form-label">Kata Sandi Baru</label>
                        <input :type="showPasswords ? 'text' : 'password'" id="new_password" name="new_password"
                            class="form-input @error('new_password') is-invalid @enderror">
                        @error('new_password')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="new_password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
                        <input :type="showPasswords ? 'text' : 'password'" id="new_password_confirmation"
                            name="new_password_confirmation" class="form-input">
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="show_passwords" x-model="showPasswords"
                            class="rounded border-gray-300">
                        <label for="show_passwords" class="text-sm text-[rgb(var(--color-text-muted))]">Tampilkan
                            kata sandi</label>
                    </div>

                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        Perbarui Kata Sandi
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.dashboard>