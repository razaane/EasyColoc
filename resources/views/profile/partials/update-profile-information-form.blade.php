<section class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-purple-100 overflow-hidden">
    <!-- Header with gradient accent -->
    <div class="h-2 bg-gradient-to-r from-[#8b5cf6] to-[#c084fc]"></div>
    
    <div class="p-8">
        <header class="mb-8">
            <h2 class="text-2xl font-bold bg-gradient-to-r from-[#6b21a5] to-[#a855f7] bg-clip-text text-transparent">
                {{ __('Profile Information') }}
            </h2>
            <p class="mt-2 text-sm text-gray-500">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="space-y-8">
            @csrf
            @method('patch')

            <!-- Name Field -->
            <div class="space-y-2">
                <x-input-label for="name" :value="__('Name')" class="text-sm font-medium text-gray-700" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <x-text-input 
                        id="name" 
                        name="name" 
                        type="text" 
                        class="block w-full pl-10 pr-3 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition" 
                        :value="old('name', $user->name)" 
                        required 
                        autofocus 
                        autocomplete="name" 
                        placeholder="Votre nom complet"
                    />
                </div>
                <x-input-error class="mt-2 text-sm text-red-500" :messages="$errors->get('name')" />
            </div>

            <!-- Email Field -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <x-text-input 
                        id="email" 
                        name="email" 
                        type="email" 
                        class="block w-full pl-10 pr-3 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition" 
                        :value="old('email', $user->email)" 
                        required 
                        autocomplete="username" 
                        placeholder="exemple@email.com"
                    />
                </div>
                <x-input-error class="mt-2 text-sm text-red-500" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <div>
                                <p class="text-sm text-gray-700">
                                    {{ __('Your email address is unverified.') }}
                                </p>
                                <button 
                                    form="send-verification" 
                                    class="mt-2 text-sm text-[#8b5cf6] hover:text-[#6d28d9] font-medium hover:underline transition"
                                >
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </div>
                        </div>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-3 text-sm text-green-600 bg-green-50 p-3 rounded-lg">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4 pt-4">
                <button type="submit" 
                        class="px-6 py-3 bg-[#8b5cf6] hover:bg-[#6d28d9] text-white font-medium rounded-xl shadow-lg shadow-purple-300/40 transition-all hover:scale-[1.02] active:scale-[0.98] flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ __('Save Changes') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }"
                       x-show="show"
                       x-transition
                       x-init="setTimeout(() => show = false, 2000)"
                       class="flex items-center gap-2 text-sm text-green-600 bg-green-50 px-4 py-2 rounded-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ __('Saved successfully!') }}
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>