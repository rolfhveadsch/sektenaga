<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Profile Photo Section -->
        <div>
            <x-input-label for="profile_photo" value="Profile Photo" />
            <div class="mt-2 flex items-center gap-6">
                <!-- Current/Preview Photo -->
                <div class="relative">
                    @if ($user->profile_photo_url)
                        <img id="photo-preview" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                            class="h-24 w-24 rounded-full object-cover ring-4 ring-blue-100">
                    @else
                        <div id="photo-preview"
                            class="h-24 w-24 rounded-full bg-gradient-to-br from-blue-600 to-blue-700 flex items-center justify-center ring-4 ring-blue-100">
                            <span class="text-3xl font-bold text-white">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                    @endif
                    <div id="photo-preview-container" class="hidden">
                        <img id="new-photo-preview" src="" alt="Preview"
                            class="h-24 w-24 rounded-full object-cover ring-4 ring-blue-100">
                    </div>
                </div>

                <!-- Upload Controls -->
                <div class="flex-1 space-y-3">
                    <div class="flex gap-3">
                        <label for="profile_photo"
                            class="cursor-pointer inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Choose Photo
                        </label>
                        <input id="profile_photo" name="profile_photo" type="file" class="hidden"
                            accept="image/jpeg,image/png,image/jpg" onchange="previewPhoto(event)">

                        @if ($user->profile_photo)
                            <button type="button" onclick="removePhoto()"
                                class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition font-medium text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Remove Photo
                            </button>
                            <input type="hidden" id="remove_photo" name="remove_photo" value="0">
                        @endif
                    </div>
                    <p class="text-xs text-gray-500">JPG, PNG max 2MB. Recommended: 1:1 aspect ratio (square)</p>
                </div>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    <script>
        function previewPhoto(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('photo-preview').classList.add('hidden');
                    document.getElementById('photo-preview-container').classList.remove('hidden');
                    document.getElementById('new-photo-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        function removePhoto() {
            if (confirm('Are you sure you want to remove your profile photo?')) {
                document.getElementById('remove_photo').value = '1';
                document.getElementById('profile_photo').value = '';
                document.getElementById('photo-preview').innerHTML =
                    '<div class="h-24 w-24 rounded-full bg-gradient-to-br from-blue-600 to-blue-700 flex items-center justify-center ring-4 ring-blue-100"><span class="text-3xl font-bold text-white">{{ substr($user->name, 0, 1) }}</span></div>';
                document.getElementById('photo-preview-container').classList.add('hidden');
            }
        }
    </script>
</section>
