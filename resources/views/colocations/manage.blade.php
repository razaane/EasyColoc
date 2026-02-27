<div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg border border-purple-100 overflow-hidden">
    <div class="h-2 bg-gradient-to-r from-[#8b5cf6] to-[#c084fc]"></div>
    
    <div class="p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Inviter des colocataires</h3>
        
        <!-- Invitation Link Section -->
        <div class="mb-6 p-4 bg-purple-50/50 rounded-xl border border-purple-100">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Lien d'invitation unique
            </label>
            <div class="flex gap-2">
                <input type="text" 
                       id="invitation-link"
                       value="{{ url('/join/'.$colocation->invitation_token) }}"
                       class="flex-1 px-4 py-3 bg-white border-2 border-purple-100 rounded-xl text-gray-600 focus:border-[#8b5cf6] focus:outline-none"
                       readonly>
                <button onclick="copyInvitationLink()" 
                        class="px-4 py-3 bg-[#8b5cf6] hover:bg-[#6d28d9] text-white rounded-xl transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                        </svg>
                    Copier
                </button>
            </div>
            <p class="text-xs text-gray-500 mt-2">
                Partagez ce lien avec vos colocataires. Ils pourront rejoindre directement la colocation.
            </p>
        </div>

        <!-- Email Invitation Form -->
        <form method="POST" action="{{ route('invitations.send') }}" class="mb-6">
            @csrf
            <input type="hidden" name="colocation_id" value="{{ $colocation->id }}">
            
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Ou envoyez des invitations par email
            </label>
            
            <div class="space-y-3" id="email-fields">
                <div class="flex gap-2">
                    <input type="email" 
                           name="emails[]" 
                           class="flex-1 px-4 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:outline-none"
                           placeholder="email@exemple.com">
                    <button type="button" onclick="addEmailField()" 
                            class="px-4 py-3 bg-purple-100 text-[#8b5cf6] rounded-xl hover:bg-purple-200 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Message Personnalisé -->
            <div class="mt-4">
                <textarea name="invitation_message" 
                          rows="3"
                          class="w-full px-4 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:outline-none"
                          placeholder="Ajoutez un message personnel (optionnel)">{{ old('invitation_message') }}</textarea>
            </div>

            <button type="submit" 
                    class="mt-4 px-6 py-3 bg-[#8b5cf6] hover:bg-[#6d28d9] text-white font-medium rounded-xl shadow-lg shadow-purple-300/40 transition-all hover:scale-[1.02] flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Envoyer les invitations
            </button>
        </form>

        <!-- Invitations en attente -->
        @if($colocation->pendingInvitations->count() > 0)
            <div class="mt-6">
                <h4 class="font-semibold text-gray-700 mb-3">Invitations en attente</h4>
                <div class="space-y-2">
                    @foreach($colocation->pendingInvitations as $invitation)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm text-gray-600">{{ $invitation->email }}</span>
                            </div>
                            <span class="text-xs text-gray-400">Envoyé {{ $invitation->created_at->diffForHumans() }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

<script>
function copyInvitationLink() {
    var copyText = document.getElementById("invitation-link");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
    
    // Show feedback
    alert('Lien copié dans le presse-papier!');
}

function addEmailField() {
    const container = document.getElementById('email-fields');
    const newField = document.createElement('div');
    newField.className = 'flex gap-2';
    newField.innerHTML = `
        <input type="email" 
               name="emails[]" 
               class="flex-1 px-4 py-3 bg-[#faf9ff] border-2 border-purple-100 rounded-xl text-gray-800 placeholder-gray-400 focus:border-[#8b5cf6] focus:outline-none"
               placeholder="email@exemple.com">
        <button type="button" onclick="this.parentElement.remove()" 
                class="px-4 py-3 bg-red-100 text-red-500 rounded-xl hover:bg-red-200 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    `;
    container.appendChild(newField);
}
</script>