@extends('layouts.app')

@section('header', 'Profile')

@section('content')
    <div class="max-w-6xl mx-auto space-y-8">
        <!-- Header Banner -->
        <div
            class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 via-blue-700 to-sky-600 p-10 shadow-2xl">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 -mt-20 -mr-20 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 h-64 w-64 rounded-full bg-white/10 blur-3xl"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div class="flex items-center gap-6">
                    <!-- Avatar -->
                    <div class="relative">
                        <div class="absolute inset-0 bg-white/30 rounded-3xl blur-xl"></div>
                        <div
                            class="relative h-20 w-20 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center shadow-2xl border border-white/30">
                            <svg class="h-11 w-11 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Title -->
                    <div>
                        <h1 class="text-4xl font-extrabold text-white mb-1 tracking-tight">Your Profile</h1>
                        <p class="text-blue-100 text-lg">Manage your account information and preferences</p>
                    </div>
                </div>

                <!-- Large Avatar (Desktop) -->
                <div class="hidden md:block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-white/20 rounded-full blur-2xl"></div>
                        @if ($user->profile_photo_url)
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                class="relative w-24 h-24 rounded-full object-cover shadow-2xl border-2 border-white/40">
                        @else
                            <div
                                class="relative w-24 h-24 bg-gradient-to-br from-white/30 to-white/10 backdrop-blur-sm rounded-full flex items-center justify-center shadow-2xl border-2 border-white/40">
                                <span class="text-4xl font-bold text-white">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Cards Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Profile Overview Card -->
            <div
                class="lg:col-span-1 bg-white rounded-3xl shadow-lg border border-slate-200 p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="text-center space-y-6">
                    <!-- Profile Avatar -->
                    <div class="relative inline-block">
                        <div class="absolute inset-0 bg-blue-400 rounded-full blur-2xl opacity-30"></div>
                        @if ($user->profile_photo_url)
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                class="relative mx-auto h-32 w-32 rounded-full object-cover shadow-2xl shadow-blue-500/30 ring-4 ring-blue-50">
                        @else
                            <div
                                class="relative mx-auto h-32 w-32 bg-gradient-to-br from-blue-600 to-blue-700 rounded-full flex items-center justify-center shadow-2xl shadow-blue-500/30 ring-4 ring-blue-50">
                                <span class="text-5xl font-bold text-white">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- User Info -->
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900 mb-2">{{ $user->name }}</h2>
                        <p class="text-slate-600 text-base mb-4 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            {{ $user->email }}
                        </p>
                    </div>

                    <!-- Member Badge -->
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-50 to-sky-50 text-blue-700 rounded-full text-sm font-semibold border border-blue-100 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Member since {{ $user->created_at->format('M Y') }}
                    </div>

                    <!-- Quick Actions -->
                    <div class="pt-6 space-y-3">
                        <a href="{{ route('profile.edit') }}"
                            class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 font-semibold shadow-lg shadow-blue-500/30 hover:shadow-xl hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Profile
                        </a>

                        <a href="{{ route('dashboard') }}"
                            class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-slate-100 text-slate-700 rounded-xl hover:bg-slate-200 transition-all duration-200 font-semibold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- Account Details Card -->
            <div
                class="lg:col-span-2 bg-white rounded-3xl shadow-lg border border-slate-200 p-8 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-8 pb-4 border-b border-slate-100">
                    <div class="h-10 w-10 rounded-xl bg-blue-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900">Account Details</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div
                        class="group p-5 bg-gradient-to-br from-blue-50 to-sky-50 rounded-2xl border border-blue-100 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 h-12 w-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-semibold text-blue-600 uppercase tracking-wider mb-1">Full Name</p>
                                <p class="text-lg font-bold text-slate-900 truncate">{{ $user->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div
                        class="group p-5 bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl border border-cyan-100 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 h-12 w-12 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/30 group-hover:scale-110 transition-transform">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-semibold text-cyan-600 uppercase tracking-wider mb-1">Email Address
                                </p>
                                <p class="text-lg font-bold text-slate-900 truncate">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Account Created -->
                    <div
                        class="group p-5 bg-gradient-to-br from-emerald-50 to-green-50 rounded-2xl border border-emerald-100 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 h-12 w-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-semibold text-emerald-600 uppercase tracking-wider mb-1">Account
                                    Created</p>
                                <p class="text-lg font-bold text-slate-900">{{ $user->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Last Updated -->
                    <div
                        class="group p-5 bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl border border-amber-100 hover:shadow-md transition-all duration-200 hover:-translate-y-1">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 h-12 w-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/30 group-hover:scale-110 transition-transform">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-semibold text-amber-600 uppercase tracking-wider mb-1">Last Updated
                                </p>
                                <p class="text-lg font-bold text-slate-900">{{ $user->updated_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
