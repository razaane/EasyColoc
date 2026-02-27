<section class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-purple-100 overflow-hidden">
    <!-- Header with gradient accent -->
    <div class="h-2 bg-gradient-to-r from-[#8b5cf6] to-[#c084fc]"></div>
    
    <div class="p-8">
        <header class="mb-8">
            <h2 class="text-2xl font-bold bg-gradient-to-r from-[#6b21a5] to-[#a855f7] bg-clip-text text-transparent">
                {{ __('Update Password') }}
            </h2>
            <p class="mt-2 text-sm text-gray-500">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="space-y-8">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div class="space-y-2">
                <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-sm font-medium text-gray-700" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input 
                        id="update_password_current_password" 
                        name="current_password" 
                        type="password" 
                        class="block w-full pl-10 pr-10 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition" 
                        autocomplete="current-password" 
                        placeholder="••••••••"
                    />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" onclick="togglePassword('current')" class="text-gray-400 hover:text-[#8b5cf6] focus:outline-none">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- New Password -->
            <div class="space-y-2">
                <x-input-label for="update_password_password" :value="__('New Password')" class="text-sm font-medium text-gray-700" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input 
                        id="update_password_password" 
                        name="password" 
                        type="password" 
                        class="block w-full pl-10 pr-10 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition" 
                        autocomplete="new-password" 
                        placeholder="••••••••"
                    />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" onclick="togglePassword('new')" class="text-gray-400 hover:text-[#8b5cf6] focus:outline-none">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Password strength indicator -->
                <div class="mt-2 space-y-1">
                    <div class="flex items-center gap-2">
                        <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                            <div id="password-strength" class="h-full w-0 transition-all duration-300"></div>
                        </div>
                        <span id="password-strength-text" class="text-xs text-gray-500">Enter password</span>
                    </div>
                    <ul class="text-xs text-gray-500 space-y-1 mt-2">
                        <li class="flex items-center gap-1" id="length-check">
                            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            At least 8 characters
                        </li>
                    </ul>
                </div>
                
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-2">
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-sm font-medium text-gray-700" />
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-[#8b5cf6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <x-text-input 
                        id="update_password_password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        class="block w-full pl-10 pr-10 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:ring-[#8b5cf6] focus:outline-none transition" 
                        autocomplete="new-password" 
                        placeholder="••••••••"
                    />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <button type="button" onclick="togglePassword('confirm')" class="text-gray-400 hover:text-[#8b5cf6] focus:outline-none">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Password match indicator -->
                <div id="password-match" class="hidden mt-1 text-xs flex items-center gap-1">
                    <!-- Will be populated by JavaScript -->
                </div>
                
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Password Requirements Card -->
            <div class="bg-purple-50/50 rounded-xl p-4 border border-purple-100">
                <h4 class="text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Password Requirements:</h4>
                <ul class="space-y-1 text-xs text-gray-600">
                    <li class="flex items-center gap-2">
                        <span class="w-1 h-1 bg-[#8b5cf6] rounded-full"></span>
                        Minimum 8 characters long
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1 h-1 bg-[#8b5cf6] rounded-full"></span>
                        Include at least one uppercase letter
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1 h-1 bg-[#8b5cf6] rounded-full"></span>
                        Include at least one number
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1 h-1 bg-[#8b5cf6] rounded-full"></span>
                        Include at least one special character
                    </li>
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4 pt-4">
                <button type="submit" 
                        class="px-6 py-3 bg-[#8b5cf6] hover:bg-[#6d28d9] text-white font-medium rounded-xl shadow-lg shadow-purple-300/40 transition-all hover:scale-[1.02] active:scale-[0.98] flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    {{ __('Update Password') }}
                </button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }"
                       x-show="show"
                       x-transition
                       x-init="setTimeout(() => show = false, 2000)"
                       class="flex items-center gap-2 text-sm text-green-600 bg-green-50 px-4 py-2 rounded-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ __('Password updated successfully!') }}
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>

<!-- JavaScript for password toggle and strength indicator -->
<script>
function togglePassword(field) {
    const input = document.getElementById(
        field === 'current' ? 'update_password_current_password' :
        field === 'new' ? 'update_password_password' :
        'update_password_password_confirmation'
    );
    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
    input.setAttribute('type', type);
}

// Password strength checker
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('update_password_password');
    const strengthBar = document.getElementById('password-strength');
    const strengthText = document.getElementById('password-strength-text');
    const lengthCheck = document.getElementById('length-check');
    
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Check length
            if (password.length >= 8) strength += 25;
            
            // Check for uppercase
            if (/[A-Z]/.test(password)) strength += 25;
            
            // Check for numbers
            if (/[0-9]/.test(password)) strength += 25;
            
            // Check for special characters
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            
            // Update colors
            if (strength < 25) {
                strengthBar.className = 'h-full bg-red-500';
                strengthText.textContent = 'Very weak';
            } else if (strength < 50) {
                strengthBar.className = 'h-full bg-orange-500';
                strengthText.textContent = 'Weak';
            } else if (strength < 75) {
                strengthBar.className = 'h-full bg-yellow-500';
                strengthText.textContent = 'Medium';
            } else if (strength < 100) {
                strengthBar.className = 'h-full bg-green-500';
                strengthText.textContent = 'Strong';
            } else {
                strengthBar.className = 'h-full bg-green-600';
                strengthText.textContent = 'Very strong';
            }
            
            // Update length check icon
            if (password.length >= 8) {
                lengthCheck.innerHTML = '<svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg> At least 8 characters';
            } else {
                lengthCheck.innerHTML = '<svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg> At least 8 characters';
            }
        });
    }
    
    // Password match checker
    const confirmInput = document.getElementById('update_password_password_confirmation');
    const matchIndicator = document.getElementById('password-match');
    
    if (passwordInput && confirmInput) {
        function checkMatch() {
            if (confirmInput.value.length === 0) {
                matchIndicator.classList.add('hidden');
                return;
            }
            
            matchIndicator.classList.remove('hidden');
            
            if (passwordInput.value === confirmInput.value) {
                matchIndicator.innerHTML = '<svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg> <span class="text-green-600">Passwords match</span>';
            } else {
                matchIndicator.innerHTML = '<svg class="w-3 h-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg> <span class="text-red-600">Passwords do not match</span>';
            }
        }
        
        passwordInput.addEventListener('input', checkMatch);
        confirmInput.addEventListener('input', checkMatch);
    }
});
</script>