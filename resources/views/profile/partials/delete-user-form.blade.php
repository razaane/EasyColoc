<section class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-purple-100 overflow-hidden">
    <!-- Header with gradient accent - red for danger -->
    <div class="h-2 bg-gradient-to-r from-red-500 to-pink-500"></div>
    
    <div class="p-8">
        <header class="mb-6">
            <h2 class="text-2xl font-bold bg-gradient-to-r from-red-600 to-pink-600 bg-clip-text text-transparent">
                {{ __('Delete Account') }}
            </h2>
            <p class="mt-2 text-sm text-gray-500">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </header>

        <!-- Warning Card -->
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div>
                    <h3 class="text-sm font-semibold text-red-800">{{ __('Warning: This action cannot be undone') }}</h3>
                    <p class="text-xs text-red-600 mt-1">{{ __('All your data, colocations, and expenses will be permanently removed.') }}</p>
                </div>
            </div>
        </div>

        <!-- Delete Button -->
        <button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-6 py-3 bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white font-medium rounded-xl shadow-lg shadow-red-300/40 transition-all hover:scale-[1.02] active:scale-[0.98] flex items-center gap-2"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            {{ __('Delete Account') }}
        </button>

        <!-- Confirmation Modal -->
        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl border border-red-100 overflow-hidden max-w-lg mx-auto">
                <!-- Modal header with red gradient -->
                <div class="h-2 bg-gradient-to-r from-red-500 to-pink-500"></div>
                
                <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
                    @csrf
                    @method('delete')

                    <!-- Warning Icon -->
                    <div class="flex justify-center mb-6">
                        <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">
                        {{ __('Are you absolutely sure?') }}
                    </h2>

                    <p class="text-center text-sm text-gray-500 mb-6">
                        {{ __('This action cannot be undone. This will permanently delete your account and remove all your data from our servers.') }}
                    </p>

                    <!-- Consequences List -->
                    <div class="bg-red-50/50 rounded-xl p-4 mb-6 border border-red-100">
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                {{ __('All your personal information will be deleted') }}
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                {{ __('All colocations you own will be cancelled') }}
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                {{ __('All expenses and payment history will be removed') }}
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                {{ __('Your reputation score will be lost') }}
                            </li>
                        </ul>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="space-y-2 mb-6">
                        <x-input-label for="password" value="{{ __('Please enter your password to confirm') }}" class="text-sm font-medium text-gray-700" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                class="block w-full pl-10 pr-3 py-3 bg-[#faf9ff] border-2 border-red-200 rounded-xl text-gray-800 placeholder-gray-400 focus:border-red-500 focus:ring-red-500 focus:outline-none transition"
                                placeholder="{{ __('Enter your password') }}"
                            />
                        </div>
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-sm text-red-500" />
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-3">
                        <button
                            type="button"
                            x-on:click="$dispatch('close')"
                            class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all"
                        >
                            {{ __('Cancel') }}
                        </button>

                        <button
                            type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white font-medium rounded-xl shadow-lg shadow-red-300/40 transition-all hover:scale-[1.02] active:scale-[0.98] flex items-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            {{ __('Yes, delete my account') }}
                        </button>
                    </div>
                </form>
            </div>
        </x-modal>
    </div>
</section>

<!-- Optional: Add this small script for better UX -->
<script>
    // Prevent accidental clicks on the delete button
    document.addEventListener('alpine:init', () => {
        Alpine.data('deleteConfirmation', () => ({
            confirmText: '',
            isConfirmValid: false,
            init() {
                this.$watch('confirmText', value => {
                    this.isConfirmValid = value === 'DELETE';
                });
            }
        }));
    });
</script>