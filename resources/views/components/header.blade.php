{{-- User Dashboard Header --}}
<header class="sticky top-0 z-20 bg-[rgb(var(--color-surface))]/80 backdrop-blur-xl border-b border-[rgb(var(--color-border))]">
    <div class="flex items-center justify-between px-6 py-4">
        {{-- Left: Mobile menu button --}}
        <div class="flex items-center gap-4">
            <button @click="sidebarOpen = !sidebarOpen"
                class="lg:hidden p-2 rounded-xl hover:bg-gray-100 dark:hover:bg-zinc-700 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            {{-- Breadcrumb or Page Title (Mobile) --}}
            <h1 class="text-lg font-semibold lg:hidden">{{ $title ?? 'Dasbor' }}</h1>
        </div>

        {{-- Right: Actions --}}
        <div class="flex items-center gap-3">
            {{-- Dark Mode Toggle --}}
            <x-shared.dark-mode-toggle />

            {{-- Profile Dropdown --}}
            <div class="dropdown" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center gap-2 p-1 rounded-xl hover:bg-gray-100 dark:hover:bg-zinc-700 transition-colors">
                    <x-ui.avatar 
                        :src="Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : null"
                        :fallback="Auth::user()->email"
                        size="md"
                        class="ring-2 ring-primary-500 ring-offset-2 ring-offset-[rgb(var(--color-surface))]"
                    />
                    <svg class="w-4 h-4 text-[rgb(var(--color-text-muted))]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                {{-- Dropdown Menu --}}
                <div x-show="open" @click.away="open = false" 
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95" 
                    class="dropdown-menu">
                    
                    <div class="px-4 py-3 border-b border-[rgb(var(--color-border))]">
                        <p class="text-sm font-semibold">{{ Auth::user()->accountable->name ?? 'Pengguna' }}</p>
                        <p class="text-xs text-[rgb(var(--color-text-muted))] truncate">{{ Auth::user()->email }}</p>
                    </div>

                    <a href="{{ route('dashboard.profile.index') }}" class="dropdown-item flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profil
                    </a>

                    {{-- Logout with SweetAlert2 Confirmation --}}
                    <x-shared.confirm-dialog 
                        title="Keluar dari Akun?"
                        text="Anda akan keluar dari sesi ini."
                        icon="question"
                        confirm-text="Ya, Keluar"
                        action="{{ route('dashboard.logout') }}"
                        method="POST"
                    >
                        <button type="button"
                            class="dropdown-item w-full flex items-center gap-2 text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-900/20">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Keluar
                        </button>
                    </x-shared.confirm-dialog>
                </div>
            </div>
        </div>
    </div>
</header>