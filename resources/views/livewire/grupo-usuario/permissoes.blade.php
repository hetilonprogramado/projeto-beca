<div class="p-6">
    <!-- Controles Gerais -->
    <div class="mb-6 p-4 bg-gray-50 rounded-lg flex justify-between items-center">
        <div>
            <h3 class="font-semibold text-gray-800 mb-1">Controles Gerais</h3>
            <p class="text-sm text-gray-600">Ações rápidas para todas as permissões</p>
        </div>
        <div class="flex space-x-3">
            <button 
                type="button"
                wire:click="marcarTodas(true)" 
                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all text-sm">
                <i class="fas fa-check-double mr-1"></i>Marcar Todas
            </button>
            <button 
                type="button"
                wire:click="marcarTodas(false)" 
                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-all text-sm">
                <i class="fas fa-times mr-1"></i>Desmarcar Todas
            </button>
        </div>
    </div>

    <!-- Módulos -->
    <div class="space-y-6">
        @foreach($modulos as $modulo)
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <div class="p-4 border-b flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 {{ $modulo['cor'] ?? 'bg-gray-100' }} rounded-lg flex items-center justify-center">
                            <i class="{{ $modulo['icone'] ?? 'bx bx-question-mark' }}"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">{{ $modulo['nome'] ?? 'Sem nome' }}</h3>
                            <p class="text-sm text-gray-600">{{ $modulo['descricao'] ?? '' }}</p>
                        </div>
                    </div>

                    <button type="button"
                        wire:click="toggleModulo('{{ $modulo['id'] }}')" 
                        class="text-sm font-medium {{ $abertos[$modulo['id']] ? 'text-red-600 hover:text-red-800' : 'text-blue-600 hover:text-blue-800' }}">
                        <i class="fas {{ $abertos[$modulo['id']] ? 'fa-chevron-up' : 'fa-chevron-down' }} mr-1"></i>
                        {{ $abertos[$modulo['id']] ? 'Recolher' : 'Expandir' }}
                    </button>
                </div>

                @if($abertos[$modulo['id']])
                    <div class="space-y-4 px-4 pt-4 pb-4">
                        @foreach($modulo['permissoes'] as $p)
                            <div class="flex items-center justify-between px-5 py-3 bg-white rounded-lg hover:bg-gray-50 transition shadow-sm">
                                <div class="flex items-center space-x-3">
                                    <i class="{{ $p['icone'] }} text-gray-700"></i>
                                    <span class="text-gray-800">{{ $p['nome'] }}</span>
                                </div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input 
                                        type="checkbox" 
                                        wire:model="permissoesMarcadas.{{ $p['id'] }}"
                                        wire:key="chk-{{ $p['id'] }}"
                                        class="sr-only peer">

                                    <div class="relative w-11 h-6 bg-gray-300 rounded-full transition peer-focus:ring-2 peer-focus:ring-blue-300 peer-checked:bg-blue-600">
                                        <div class="absolute top-[2px] left-[2px] w-5 h-5 bg-white border border-gray-300 rounded-full transition-all peer-checked:translate-x-5"></div>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Resumo -->
    <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
        <div class="flex items-center space-x-2 mb-3">
            <i class="fas fa-info-circle text-blue-600"></i>
            <h4 class="font-semibold text-blue-800">Resumo das Permissões</h4>
        </div>
        <div class="text-sm text-blue-700">
            {{ count(array_filter($permissoesMarcadas)) }} permissões ativas de 
            {{ collect($modulos)->sum(fn($m) => count($m['permissoes'])) }} disponíveis
        </div>
    </div>
</div>
