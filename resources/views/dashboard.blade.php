@extends('layouts.app')

@section('header', 'Dashboard')

@section('content')
    <div class="space-y-8">
        <!-- Welcome Banner with Gradient -->
        <div
            class="relative overflow-visible rounded-3xl bg-gradient-to-r from-blue-600 to-sky-600 p-8 shadow-xl lg:p-12 min-h-[320px] lg:min-h-[280px]">
            <div class="absolute top-0 right-0 -mt-20 -mr-20 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>

            <div class="relative z-10">
                <h2 class="text-3xl font-bold text-white sm:text-4xl">Welcome to Dashboard</h2>
                <p class="mt-4 max-w-2xl text-lg text-blue-100">
                    Manage your school efficiently. Access teachers, students, inventory, and reports all in one place with
                    our official management system.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('laporan.index') }}"
                        class="inline-flex items-center rounded-xl bg-white/10 px-6 py-3 text-sm font-semibold text-white backdrop-blur transition hover:bg-white/20">
                        View Reports
                    </a>
                    <div x-data="{ quickActionsOpen: false }" class="relative" @click.outside="quickActionsOpen = false">
                        <button @click="quickActionsOpen = !quickActionsOpen"
                            class="inline-flex items-center rounded-xl bg-white px-6 py-3 text-sm font-semibold text-blue-600 shadow-sm transition hover:bg-blue-50">
                            Quick Actions
                            <svg class="ml-2 w-4 h-4 transition-transform duration-300"
                                :class="quickActionsOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Rolling Menu -->
                        <div x-show="quickActionsOpen" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-x-6 scale-95"
                            x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-x-6 scale-95"
                            class="absolute left-full top-1/2 -translate-y-1/2 ml-4 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl shadow-blue-500/10 ring-1 ring-slate-200/50 p-4 flex gap-4 z-50">

                            <a href="{{ route('teachers.index') }}" x-show="quickActionsOpen"
                                x-transition:enter="transition ease-out duration-400 delay-100"
                                x-transition:enter-start="opacity-0 translate-x-6 scale-90"
                                x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                                class="flex flex-col items-center gap-2.5 p-4 rounded-2xl hover:bg-gradient-to-br hover:from-sky-50 hover:to-blue-50 transition-all duration-300 group min-w-[90px] hover:shadow-lg hover:shadow-sky-200/50 hover:-translate-y-1">
                                <div class="relative">
                                    <div
                                        class="absolute inset-0 bg-sky-400 rounded-2xl blur-md opacity-0 group-hover:opacity-50 transition-opacity">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-sky-500 to-sky-600 flex items-center justify-center text-white shadow-lg shadow-sky-500/30 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <span
                                    class="text-xs font-semibold text-slate-600 group-hover:text-sky-600 transition-colors">Teachers</span>
                            </a>

                            <a href="{{ route('students.index') }}" x-show="quickActionsOpen"
                                x-transition:enter="transition ease-out duration-400 delay-200"
                                x-transition:enter-start="opacity-0 translate-x-6 scale-90"
                                x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                                class="flex flex-col items-center gap-2.5 p-4 rounded-2xl hover:bg-gradient-to-br hover:from-pink-50 hover:to-rose-50 transition-all duration-300 group min-w-[90px] hover:shadow-lg hover:shadow-pink-200/50 hover:-translate-y-1">
                                <div class="relative">
                                    <div
                                        class="absolute inset-0 bg-pink-400 rounded-2xl blur-md opacity-0 group-hover:opacity-50 transition-opacity">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-pink-500 to-pink-600 flex items-center justify-center text-white shadow-lg shadow-pink-500/30 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <span
                                    class="text-xs font-semibold text-slate-600 group-hover:text-pink-600 transition-colors">Students</span>
                            </a>

                            <a href="{{ route('inventories.index') }}" x-show="quickActionsOpen"
                                x-transition:enter="transition ease-out duration-400 delay-300"
                                x-transition:enter-start="opacity-0 translate-x-6 scale-90"
                                x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                                class="flex flex-col items-center gap-2.5 p-4 rounded-2xl hover:bg-gradient-to-br hover:from-amber-50 hover:to-orange-50 transition-all duration-300 group min-w-[90px] hover:shadow-lg hover:shadow-amber-200/50 hover:-translate-y-1">
                                <div class="relative">
                                    <div
                                        class="absolute inset-0 bg-amber-400 rounded-2xl blur-md opacity-0 group-hover:opacity-50 transition-opacity">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center text-white shadow-lg shadow-amber-500/30 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>
                                </div>
                                <span
                                    class="text-xs font-semibold text-slate-600 group-hover:text-amber-600 transition-colors">Inventory</span>
                            </a>

                            <a href="{{ route('peminjaman.index') }}" x-show="quickActionsOpen"
                                x-transition:enter="transition ease-out duration-400 delay-400"
                                x-transition:enter-start="opacity-0 translate-x-6 scale-90"
                                x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                                class="flex flex-col items-center gap-2.5 p-4 rounded-2xl hover:bg-gradient-to-br hover:from-emerald-50 hover:to-green-50 transition-all duration-300 group min-w-[90px] hover:shadow-lg hover:shadow-emerald-200/50 hover:-translate-y-1">
                                <div class="relative">
                                    <div
                                        class="absolute inset-0 bg-emerald-400 rounded-2xl blur-md opacity-0 group-hover:opacity-50 transition-opacity">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center text-white shadow-lg shadow-emerald-500/30 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                        </svg>
                                    </div>
                                </div>
                                <span
                                    class="text-xs font-semibold text-slate-600 group-hover:text-emerald-600 transition-colors">Pinjam</span>
                            </a>

                            <a href="{{ route('pengembalian.index') }}" x-show="quickActionsOpen"
                                x-transition:enter="transition ease-out duration-400 delay-500"
                                x-transition:enter-start="opacity-0 translate-x-6 scale-90"
                                x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                                class="flex flex-col items-center gap-2.5 p-4 rounded-2xl hover:bg-gradient-to-br hover:from-blue-50 hover:to-cyan-50 transition-all duration-300 group min-w-[90px] hover:shadow-lg hover:shadow-blue-200/50 hover:-translate-y-1">
                                <div class="relative">
                                    <div
                                        class="absolute inset-0 bg-blue-400 rounded-2xl blur-md opacity-0 group-hover:opacity-50 transition-opacity">
                                    </div>
                                    <div
                                        class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/30 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </div>
                                </div>
                                <span
                                    class="text-xs font-semibold text-slate-600 group-hover:text-blue-600 transition-colors">Kembali</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div id="stats" class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
            @php
                $metrics = [
                    [
                        'label' => 'Total Teachers',
                        'value' => $stats['teachers'],
                        'color' => 'bg-blue-50 text-blue-600',
                        'icon' =>
                            'M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z',
                    ],
                    [
                        'label' => 'Total Students',
                        'value' => $stats['students'],
                        'color' => 'bg-emerald-50 text-emerald-600',
                        'icon' =>
                            'M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.499 5.24 50.552 50.552 0 00-2.658.813m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5',
                    ],
                    [
                        'label' => 'Inventory Items',
                        'value' => $stats['inventories'],
                        'color' => 'bg-orange-50 text-orange-600',
                        'icon' =>
                            'M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 7.5V3.75m0 0a3.75 3.75 0 017.5 0M10 3.75a3.75 3.75 0 017.5 0m-7.5 0v3.75m-3.75 0h11.25',
                    ],
                    [
                        'label' => 'Categories',
                        'value' => $stats['categories'],
                        'color' => 'bg-sky-50 text-sky-600',
                        'icon' =>
                            'M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3zM6 6a.75.75 0 100-1.5.75.75 0 000 1.5z',
                    ],
                ];
            @endphp

            @foreach ($metrics as $metric)
                <div
                    class="group relative overflow-hidden rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 transition-all hover:shadow-md hover:ring-blue-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">{{ $metric['label'] }}</p>
                            <p class="mt-2 text-3xl font-bold text-slate-900 tracking-tight">{{ $metric['value'] }}</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div
                                class="inline-flex h-12 w-12 items-center justify-center rounded-xl {{ $metric['color'] }} transition-transform group-hover:scale-110">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="{{ $metric['icon'] }}" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Quick Actions -->
        <div>
            <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                Quick Management
            </h3>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([['label' => 'Teachers', 'desc' => 'Manage teaching staff and profiles', 'route' => 'teachers.index', 'color' => 'bg-sky-500 shadow-sky-200'], ['label' => 'Students', 'desc' => 'Track student enrollment and data', 'route' => 'students.index', 'color' => 'bg-pink-500 shadow-pink-200'], ['label' => 'Inventory', 'desc' => 'Monitor school assets and items', 'route' => 'inventories.index', 'color' => 'bg-amber-500 shadow-amber-200']] as $action)
                    <a href="{{ route($action['route']) }}"
                        class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                        <div
                            class="absolute top-0 right-0 -mt-4 -mr-4 h-24 w-24 rounded-full {{ $action['color'] }} opacity-10 blur-2xl group-hover:opacity-20 transition-opacity">
                        </div>

                        <div>
                            <div
                                class="mb-4 inline-flex h-10 w-10 items-center justify-center rounded-lg {{ str_replace('bg-', 'bg-', str_replace('shadow-', 'text-', $action['color'])) }} bg-opacity-10">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-semibold text-slate-900 group-hover:text-blue-600 transition-colors">
                                {{ $action['label'] }}</h4>
                            <p class="mt-2 text-sm text-slate-500 leading-relaxed">{{ $action['desc'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
