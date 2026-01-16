<x-layouts.auth :title="'Daftar'" illustration="🚀" headline="Mulai Perjalanan Anda!"
    subheadline="Buat akun dan dapatkan akses ke kursus dan materi pembelajaran yang komprehensif.">
    <div class="animate-slide-up">
        <h1 class="text-3xl font-bold mb-2">Buat Akun</h1>
        <p class="text-[rgb(var(--color-text-muted))] mb-8">Isi data diri Anda untuk memulai.</p>

        <form action="{{ route('dashboard.register.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Name --}}
            <x-ui.input label="Nama Lengkap" name="name" placeholder="Masukkan nama lengkap..." icon="user"
                value="{{ old('name') }}" />

            {{-- Email --}}
            <x-ui.input label="Alamat Email" name="email" type="email" placeholder="Masukkan email..." icon="mail"
                value="{{ old('email') }}" />

            {{-- Address --}}
            <x-ui.input label="Alamat" name="address" placeholder="Masukkan alamat..." icon="location-marker"
                value="{{ old('address') }}" />

            {{-- Password --}}
            <div>
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="relative" x-data="{ showPassword: false }">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-[rgb(var(--color-text-muted))]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                        class="form-input pl-12 pr-12 @error('password') is-invalid @enderror"
                        placeholder="Buat kata sandi...">
                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 pr-4 flex items-center">
                        <svg x-show="!showPassword"
                            class="w-5 h-5 text-[rgb(var(--color-text-muted))] hover:text-[rgb(var(--color-text))]"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword"
                            class="w-5 h-5 text-[rgb(var(--color-text-muted))] hover:text-[rgb(var(--color-text))]"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                <div class="relative" x-data="{ showPassword: false }">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-[rgb(var(--color-text-muted))]" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <input :type="showPassword ? 'text' : 'password'" id="password_confirmation"
                        name="password_confirmation" class="form-input pl-12 pr-12"
                        placeholder="Konfirmasi kata sandi...">
                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 pr-4 flex items-center">
                        <svg x-show="!showPassword"
                            class="w-5 h-5 text-[rgb(var(--color-text-muted))] hover:text-[rgb(var(--color-text))]"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="showPassword"
                            class="w-5 h-5 text-[rgb(var(--color-text-muted))] hover:text-[rgb(var(--color-text))]"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Submit --}}
            <x-ui.button type="submit" class="w-full justify-center mt-2">
                <x-slot:icon>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </x-slot:icon>
                Buat Akun
            </x-ui.button>
        </form>

        <!-- Login Link -->
        <p class="text-center mt-6 text-[rgb(var(--color-text-muted))]">
            Sudah punya akun?
            <a href="{{ route('dashboard.login.index') }}"
                class="text-primary-500 hover:text-primary-600 font-semibold transition-colors">
                Masuk
            </a>
        </p>
    </div>
</x-layouts.auth>