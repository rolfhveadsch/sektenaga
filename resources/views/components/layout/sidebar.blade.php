@php
    $navigation = [
        [
            'label' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => 'M3 9.75 10 3l7 6.75V17a1 1 0 01-1 1h-4a1 1 0 01-1-1v-3H9v3a1 1 0 01-1 1H4a1 1 0 01-1-1z',
        ],
        [
            'label' => 'Teachers',
            'route' => 'teachers.index',
            'pattern' => 'teachers.*',
            'icon' =>
                'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
        ],
        [
            'label' => 'Students',
            'route' => 'students.index',
            'pattern' => 'students.*',
            'icon' =>
                'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
        ],
        [
            'label' => 'Categories',
            'route' => 'categories.index',
            'pattern' => 'categories.*',
            'icon' => 'M3 5h14v4H3zm0 6h14v4H3z',
        ],
        [
            'label' => 'Inventory',
            'route' => 'inventories.index',
            'pattern' => 'inventories.*',
            'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
        ],
        [
            'label' => 'Admins',
            'route' => 'admins.index',
            'pattern' => 'admins.*',
            'icon' => 'M10 9a3 3 0 100-6 3 3 0 000 6zm-6 9a6 6 0 1112 0',
        ],
        [
            'label' => 'Peminjaman',
            'route' => 'peminjaman.index',
            'pattern' => 'peminjaman.*',
            'icon' =>
                'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
        ],
        [
            'label' => 'Pengembalian',
            'route' => 'pengembalian.index',
            'pattern' => 'pengembalian.*',
            'icon' =>
                'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15',
        ],
        [
            'label' => 'Laporan',
            'route' => 'laporan.index',
            'pattern' => 'laporan.*',
            'icon' => 'M4 4h4v12H4zm6 4h4v8h-4zm6-6h4v14h-4z',
        ],
        [
            'label' => 'Profile',
            'route' => 'profile.show',
            'pattern' => 'profile.*',
            'icon' => 'M12 7a4 4 0 11-8 0 4 4 0 018 0zm-6 6a6 6 0 016 6H0a6 6 0 016-6z',
        ],
    ];
@endphp

<!-- Mobile Overlay -->
<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
    class="fixed inset-0 z-20 bg-slate-900/60 backdrop-blur-sm transition-all lg:hidden"></div>

<!-- Sidebar -->
<aside :class="sidebarExpanded ? 'w-64' : 'w-20'"
    class="fixed inset-y-0 left-0 z-30 flex flex-col bg-gradient-to-b from-white to-slate-50/50 dark:from-slate-800 dark:to-slate-900/50 border-r border-slate-200/80 dark:border-slate-700/80 shadow-xl shadow-slate-200/50 dark:shadow-slate-900/50 transition-all duration-300 ease-in-out lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

    <!-- Logo Section -->
    <div class="flex h-16 items-center border-b border-slate-200/80 dark:border-slate-700/80 bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm transition-all duration-300"
        :class="sidebarExpanded ? 'px-6' : 'px-0 justify-center'">
        <div class="flex items-center gap-3 overflow-hidden whitespace-nowrap">
            <!-- Logo Icon -->
            <div class="relative flex-shrink-0">
                <div class="absolute inset-0 bg-blue-400 rounded-xl blur-md opacity-30"></div>
                <div
                    class="relative w-9 h-9 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/30">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>

            <!-- Logo Text -->
            <div class="transition-all duration-300 origin-left"
                :class="sidebarExpanded ? 'opacity-100 translate-x-0 scale-100' :
                    'opacity-0 -translate-x-10 scale-95 w-0 hidden'">
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">School</p>
                <p class="text-base font-extrabold text-slate-800 leading-none tracking-tight">Management</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1 custom-scroll">
        @foreach ($navigation as $item)
            @php
                $isActive = request()->routeIs($item['pattern'] ?? $item['route']);
            @endphp
            <a href="{{ route($item['route']) }}" title="{{ $item['label'] }}"
                class="group relative flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition-all duration-200 
                      {{ $isActive
                          ? 'bg-gradient-to-r from-blue-50 to-blue-50/50 dark:from-blue-900/30 dark:to-blue-900/10 text-blue-700 dark:text-blue-400 shadow-sm'
                          : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-slate-100' }}">

                <!-- Active Indicator -->
                @if ($isActive)
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-8 w-1 bg-gradient-to-b from-blue-600 to-blue-500 rounded-r-full shadow-lg shadow-blue-500/50"
                        :class="sidebarExpanded ? 'hidden' : 'block'"></div>
                @endif

                <!-- Icon -->
                <div class="relative flex-shrink-0">
                    @if ($isActive)
                        <div class="absolute inset-0 bg-blue-400 rounded-lg blur-sm opacity-20"></div>
                    @endif
                    <svg class="relative w-5 h-5 transition-all duration-200 
                                {{ $isActive ? 'text-blue-600 dark:text-blue-400 scale-110' : 'text-slate-400 dark:text-slate-500 group-hover:text-slate-600 dark:group-hover:text-slate-300 group-hover:scale-105' }}"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="{{ $item['icon'] }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <!-- Label -->
                <span class="overflow-hidden whitespace-nowrap transition-all duration-300 origin-left font-medium"
                    :class="sidebarExpanded ? 'opacity-100 w-auto translate-x-0' : 'opacity-0 w-0 -translate-x-5 hidden'">
                    {{ $item['label'] }}
                </span>

                <!-- Hover Effect -->
                <div
                    class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500/0 to-blue-500/0 group-hover:from-blue-500/5 group-hover:to-transparent transition-all duration-300 pointer-events-none">
                </div>
            </a>
        @endforeach
    </nav>

    <!-- Logout Button -->
    <div
        class="p-4 border-t border-slate-200/80 dark:border-slate-700/80 bg-white/50 dark:bg-slate-800/50 backdrop-blur-sm">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="group relative flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-300 transition-all hover:bg-gradient-to-r hover:from-red-50 hover:to-red-50/50 dark:hover:from-red-900/30 dark:hover:to-red-900/10 hover:text-red-700 dark:hover:text-red-400 hover:shadow-sm">

                <!-- Icon -->
                <div class="relative flex-shrink-0">
                    <svg class="w-5 h-5 transition-all duration-200 text-slate-400 dark:text-slate-500 group-hover:text-red-600 dark:group-hover:text-red-400 group-hover:scale-105"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>

                <!-- Label -->
                <span class="overflow-hidden whitespace-nowrap transition-all duration-300 origin-left font-medium"
                    :class="sidebarExpanded ? 'opacity-100 w-auto translate-x-0' : 'opacity-0 w-0 -translate-x-5 hidden'">
                    Logout
                </span>

                <!-- Hover Effect -->
                <div
                    class="absolute inset-0 rounded-xl bg-gradient-to-r from-red-500/0 to-red-500/0 group-hover:from-red-500/5 group-hover:to-transparent transition-all duration-300 pointer-events-none">
                </div>
            </button>
        </form>
    </div>
</aside>
