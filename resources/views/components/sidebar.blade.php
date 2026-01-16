<!-- Sidebar -->
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="sidebar lg:translate-x-0">
    <!-- Logo -->
    <div class="p-6 border-b border-[rgb(var(--color-border))]">
        <x-shared.logo size="md" />
    </div>

    <!-- Navigation -->
    <nav class="flex-1 py-4 overflow-y-auto">
        <ul class="space-y-1">
            <!-- Menu Title -->
            <li class="sidebar-title">Menu Utama</li>

            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="sidebar-link {{ Request::is('dashboard') && !Request::is('dashboard/learn*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            @if (auth()->user()->accountable_type === 'App\Models\Admin')
                <!-- Admin Menu -->
                <li class="sidebar-title">Manajemen Aplikasi</li>

                <li>
                    <a href="{{ route('dashboard.students.index') }}"
                        class="sidebar-link {{ Request::is('dashboard/students*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>Siswa</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.teachers.index') }}"
                        class="sidebar-link {{ Request::is('dashboard/teachers*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Pengajar</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.admins.index') }}"
                        class="sidebar-link {{ Request::is('dashboard/admins*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Admin</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.course-categories.index') }}"
                        class="sidebar-link {{ Request::is('dashboard/course-categories*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <span>Kategori Kursus</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->accountable_type === 'App\Models\Teacher')
                <!-- Teacher Menu -->
                <li class="sidebar-title">Menu Utama</li>

                <li>
                    <a href="{{ route('dashboard.courses.index') }}"
                        class="sidebar-link {{ Request::is('dashboard/courses*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span>Kursus</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.reviews.getBlocked') }}"
                        class="sidebar-link {{ Request::is('dashboard/blocked-reviews*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                        <span>Ulasan Diblokir</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->accountable_type === 'App\Models\Student')
                <!-- Student Menu -->
                <li class="sidebar-title">Menu Utama</li>

                <li>
                    <a href="{{ route('dashboard.index') }}"
                        class="sidebar-link {{ Request::is('dashboard/learn*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span>Materi Kursus</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.student.reviews.histories') }}"
                        class="sidebar-link {{ Request::is('dashboard/review-histories*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        <span>Riwayat Ulasan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.student.assignment.histories') }}"
                        class="sidebar-link {{ Request::is('dashboard/assignment-histories*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Riwayat Tugas</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>

    <!-- User Info -->
    <div class="p-4 border-t border-[rgb(var(--color-border))]">
        <div class="flex items-center gap-3">
            <div class="avatar avatar-md">
                @if (Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile">
                @else
                    <svg class="w-6 h-6 text-[rgb(var(--color-text-muted))]" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                @endif
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold truncate">{{ Auth::user()->accountable->name ?? Auth::user()->email }}
                </p>
                <p class="text-xs text-[rgb(var(--color-text-muted))] truncate">
                    @if (Auth::user()->accountable_type === 'App\Models\Student')
                        Level {{ Auth::user()->accountable->level }}
                    @else
                        @if(Auth::user()->accountable_type === 'App\Models\Admin')
                            Admin
                        @elseif(Auth::user()->accountable_type === 'App\Models\Teacher')
                            Pengajar
                        @else
                            {{ class_basename(Auth::user()->accountable_type) }}
                        @endif
                    @endif
                </p>
            </div>
        </div>
    </div>
</aside>