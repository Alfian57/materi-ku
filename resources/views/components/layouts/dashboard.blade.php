<x-layouts.app :title="$title ?? 'Dashboard'">
    <div class="min-h-screen flex" x-data="{ sidebarOpen: false }">
        <!-- Sidebar -->
        @include('components.sidebar')

        <!-- Main Content -->
        <div class="flex-1 lg:ml-64">
            <!-- Header -->
            @include('components.header')

            <!-- Page Content -->
            <main class="p-6">
                <!-- Page Title -->
                @if(isset($title))
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gradient">{{ $title }}</h1>
                        @if(isset($subtitle))
                            <p class="text-[rgb(var(--color-text-muted))] mt-1">{{ $subtitle }}</p>
                        @endif
                    </div>
                @endif

                {{ $slot }}
            </main>

            <!-- Footer -->
            @include('components.footer')
        </div>
    </div>

    <!-- Mobile sidebar backdrop -->
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="sidebarOpen = false"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-30 lg:hidden"></div>
</x-layouts.app>