@php
    $user = Auth::user();
@endphp

<header
    class="sticky top-0 z-20 bg-white/90 dark:bg-slate-800/90 backdrop-blur border-b border-slate-200 dark:border-slate-700 transition-colors">
    <div class="flex h-16 items-center justify-between px-6">
        <div class="flex items-center gap-3">
            <!-- Mobile Toggle -->
            <button type="button" @click="sidebarOpen = !sidebarOpen"
                class="lg:hidden rounded-lg border border-slate-200 dark:border-slate-700 px-2.5 py-2 text-slate-600 dark:text-slate-300 transition-colors hover:bg-slate-100 dark:hover:bg-slate-700">
                <span class="sr-only">Open navigation</span>
                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                    <path d="M3 6h14M3 10h14M3 14h14" stroke-width="1.6" stroke-linecap="round" />
                </svg>
            </button>

            <!-- Desktop Toggle -->
            <button type="button" @click="sidebarExpanded = !sidebarExpanded"
                class="hidden lg:block rounded-lg text-slate-400 dark:text-slate-500 transition-colors hover:text-slate-600 dark:hover:text-slate-300">
                <span class="sr-only">Toggle sidebar</span>
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>

            <div class="ml-2 hidden sm:block">
                <p class="text-sm text-slate-500 dark:text-slate-400">Welcome back</p>
                <p class="text-base font-semibold text-slate-900 dark:text-slate-100 leading-none">{{ $user->name }}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <!-- Dark Mode Toggle -->
            <button @click="darkMode = !darkMode"
                class="relative p-2.5 rounded-xl bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-600 transition-all duration-200 group"
                title="Toggle dark mode">
                <!-- Sun Icon (Light Mode) -->
                <svg x-show="!darkMode" class="w-5 h-5 transition-transform group-hover:rotate-180 duration-500"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <!-- Moon Icon (Dark Mode) -->
                <svg x-show="darkMode" class="w-5 h-5 transition-transform group-hover:-rotate-12 duration-300"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>

            <div class="hidden md:flex flex-col text-right">
                <span class="text-xs text-slate-400 dark:text-slate-500 uppercase tracking-[0.2em]">Today</span>
                <span class="text-sm font-medium text-slate-700 dark:text-slate-300">{{ now()->format('d M Y') }}</span>
            </div>

            @if ($user->profile_photo_url)
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                    class="h-10 w-10 rounded-full object-cover shadow-lg ring-4 ring-slate-100/50 dark:ring-slate-700/50">
            @else
                <div
                    class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-600 to-blue-700 dark:from-blue-500 dark:to-blue-600 text-white flex items-center justify-center text-sm font-bold shadow-lg shadow-blue-500/20 ring-4 ring-slate-100/50 dark:ring-slate-700/50">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>
            @endif
        </div>
    </div>
</header>
