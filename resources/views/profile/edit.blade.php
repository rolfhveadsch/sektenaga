@extends('layouts.app')

@section('header', 'Edit Profile')

@section('content')
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-slate-900">Edit Profile</h2>
            <p class="text-sm text-slate-600 mt-1">Update your account information and profile photo</p>
        </div>

        <!-- Profile Information Card -->
        <div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-8">
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Update Password Card -->
        <div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-8">
            @include('profile.partials.update-password-form')
        </div>

        <!-- Delete Account Card -->
        <div class="bg-white rounded-3xl shadow-lg border border-slate-200 p-8">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
