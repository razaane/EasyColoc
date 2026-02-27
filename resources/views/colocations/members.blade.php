<div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg border border-purple-100 overflow-hidden">
    <div class="h-2 bg-gradient-to-r from-[#8b5cf6] to-[#c084fc]"></div>
    
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Membres de la colocation</h3>
            <span class="px-3 py-1 bg-purple-100 text-[#6b21a5] text-sm font-medium rounded-full">
                {{ $colocation->users->count() }} membre(s)
            </span>
        </div>

        <!-- Members Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($colocation->users as $member)
                <div class="relative p-4 bg-gradient-to-br from-[#f7f3ff] to-white rounded-xl border border-purple-100 hover:shadow-md transition-all">
                    <!-- Owner Badge -->
                    @if($member->id === $colocation->owner_id)
                        <div class="absolute top-2 right-2">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-600 text-xs font-medium rounded-full">
                                Propriétaire
                            </span>
                        </div>
                    @endif

                    <div class="flex items-center gap-4">
                        <!-- Avatar -->
                        @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}"
                                 class="w-16 h-16 rounded-full object-cover border-3 border-[#8b5cf6]"
                                 alt="{{ $member->name }}">
                        @else
                            <div class="w-16 h-16 rounded-full bg-gradient-to-r from-[#8b5cf6] to-[#c084fc] 
                                        flex items-center justify-center text-white text-xl font-bold">
                                {{ strtoupper(substr($member->name, 0, 1)) }}
                            </div>
                        @endif

                        <!-- Member Info -->
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-800">{{ $member->name }}</h4>
                            <p class="text-xs text-gray-500">{{ $member->email }}</p>
                            
                            <!-- Reputation Badge -->
                            <div class="flex items-center gap-1 mt-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $member->reputation ? 'text-yellow-400' : 'text-gray-300' }}" 
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>

                        <!-- Role Badge -->
                        @if($member->pivot->role === 'admin')
                            <span class="px-2 py-1 bg-purple-100 text-[#6b21a5] text-xs font-medium rounded-full">
                                Admin
                            </span>
                        @else
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">
                                Membre
                            </span>
                        @endif
                    </div>

                    <!-- Member Stats -->
                    <div class="grid grid-cols-2 gap-2 mt-4 pt-4 border-t border-purple-100">
                        <div class="text-center">
                            <p class="text-xs text-gray-500">Dépenses</p>
                            <p class="text-sm font-semibold text-gray-800">{{ $member->expenses_count ?? 0 }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xs text-gray-500">Solde</p>
                            <p class="text-sm font-semibold {{ $member->balance > 0 ? 'text-green-500' : ($member->balance < 0 ? 'text-red-500' : 'text-gray-500') }}">
                                {{ $member->balance > 0 ? '+' : '' }}{{ number_format($member->balance ?? 0, 2) }} €
                            </p>
                        </div>
                    </div>

                    <!-- Remove Button (only for owner) -->
                    @if(Auth::id() === $colocation->owner_id && $member->id !== Auth::id())
                        <button onclick="confirmRemove('{{ $member->id }}', '{{ $member->name }}')"
                                class="absolute bottom-2 right-2 p-2 bg-red-50 text-red-500 rounded-lg hover:bg-red-100 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Remove Member Confirmation Modal -->
<div id="removeModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl border border-red-100 max-w-md w-full mx-4 overflow-hidden">
        <div class="h-2 bg-gradient-to-r from-red-500 to-pink-500"></div>
        <div class="p-6">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
            </div>
            <h3 class="text-xl font-bold text-center text-gray-800 mb-2">Retirer un membre</h3>
            <p class="text-center text-gray-500 mb-6">
                Êtes-vous sûr de vouloir retirer <span id="memberName" class="font-semibold"></span> de la colocation ?
            </p>
            
            <form id="removeForm" method="POST" class="flex gap-3">
                @csrf
                @method('DELETE')
                <button type="button" onclick="closeRemoveModal()"
                        class="flex-1 px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all">
                    Annuler
                </button>
                <button type="submit"
                        class="flex-1 px-4 py-3 bg-red-500 hover:bg-red-600 text-white font-medium rounded-xl shadow-lg shadow-red-300/40 transition-all">
                    Retirer
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function confirmRemove(memberId, memberName) {
    document.getElementById('memberName').textContent = memberName;
    document.getElementById('removeForm').action = `/colocations/{{ $colocation->id }}/members/${memberId}`;
    document.getElementById('removeModal').classList.remove('hidden');
    document.getElementById('removeModal').classList.add('flex');
}

function closeRemoveModal() {
    document.getElementById('removeModal').classList.add('hidden');
    document.getElementById('removeModal').classList.remove('flex');
}
</script>