<x-layouts.dashboard :title="$title">
    <div class="space-y-6">
        <!-- Course Header -->
        <div class="card p-0 overflow-hidden">
            <div class="relative h-48 md:h-64">
                <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6">
                    <span class="badge badge-accent mb-2">{{ $course->courseCategory->name }}</span>
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">{{ $course->title }}</h1>
                    <p class="text-white/70 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        {{ $course->teacher->name }}
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Content -->
            <div class="lg:col-span-2 space-y-6">
                <div class="card">
                    <h2 class="font-bold text-lg mb-4">Tentang Kursus Ini</h2>
                    <p class="text-[rgb(var(--color-text-muted))] whitespace-pre-wrap">{{ $course->description }}</p>
                </div>

                <div class="card">
                    <h2 class="font-bold text-lg mb-4">Konten Kursus</h2>
                    <div class="prose prose-sm dark:prose-invert max-w-none">
                        {!! nl2br(e($course->content)) !!}
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Actions -->
                <div class="card">
                    <h3 class="font-bold mb-4">Aksi</h3>
                    <div class="space-y-2">
                        <a href="{{ route('dashboard.courses.edit', $course->slug) }}" class="btn-outline w-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Kursus
                        </a>
                        <a href="{{ route('dashboard.homeworks.index', $course->slug) }}" class="btn-secondary w-full">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Kelola Tugas
                        </a>
                    </div>
                </div>

                <!-- Reviews -->
                <div class="card">
                    <h3 class="font-bold mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        Ulasan
                    </h3>
                    <div class="space-y-4 max-h-96 overflow-y-auto">
                        @forelse ($course->reviews as $item)
                            <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50 dark:bg-zinc-800">
                                <div class="avatar avatar-sm flex-shrink-0">
                                    <div
                                        class="w-full h-full bg-gradient-teal flex items-center justify-center text-white text-xs font-semibold">
                                        {{ strtoupper(substr($item->student->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="font-medium text-sm">{{ $item->student->name }}</span>
                                        @if ($item->status === 'blocked')
                                            <span class="badge badge-danger">Diblokir</span>
                                        @endif
                                    </div>
                                    <p class="text-sm text-[rgb(var(--color-text-muted))]">{{ $item->content }}</p>
                                    <div class="mt-2">
                                        @if ($item->status === 'blocked')
                                            <form action="{{ route('dashboard.reviews.unblock', $item->id) }}" method="POST"
                                                class="inline" x-data
                                                @submit.prevent="Swal.fire({title:'Buka Blokir Ulasan?',icon:'question',showCancelButton:true,confirmButtonText:'Ya, buka blokir', cancelButtonText:'Batal'}).then((r)=>{if(r.isConfirmed)$el.submit()})">
                                                @csrf
                                                <button type="submit" class="btn btn-sm text-xs bg-emerald-500 text-white">Buka
                                                    Blokir</button>
                                            </form>
                                        @else
                                            <form action="{{ route('dashboard.reviews.blocked', $item->id) }}" method="POST"
                                                class="inline" x-data
                                                @submit.prevent="Swal.fire({title:'Blokir Ulasan?',icon:'warning',showCancelButton:true,confirmButtonColor:'#f43f5e',confirmButtonText:'Ya, blokir', cancelButtonText:'Batal'}).then((r)=>{if(r.isConfirmed)$el.submit()})">
                                                @csrf
                                                <button type="submit" class="btn btn-sm text-xs btn-danger">Blokir</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-[rgb(var(--color-text-muted))] text-sm text-center py-4">Belum ada ulasan</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>