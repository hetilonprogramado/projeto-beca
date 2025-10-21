<div id="clientesContent" class="p-6">
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Gerenciar Alunos</h2>
            <a href="{{route('cliente.cadastrar')}}" wire:navigate class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                <i class="fas fa-plus mr-2"></i>Novo Aluno
            </a>
        </div>

        <div class="p-6">
            <div class="mb-4">
                <input type="text" wire:model.live.debounce.500ms="pesquisa" placeholder="Buscar alunos..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Aluno</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Email</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Mensagem de sucesso --}}
                        @if (session()->has('success'))
                            <div
                                x-data="{ show: true }"
                                x-init="setTimeout(() => show = false, 4000)"
                                x-show="show"
                                x-transition
                                class="fixed top-5 right-5 bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg z-50"
                            >
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Mensagem de erro --}}
                        @if (session()->has('error'))
                            <div
                                x-data="{ show: true }"
                                x-init="setTimeout(() => show = false, 4000)"
                                x-show="show"
                                x-transition
                                class="fixed top-5 right-5 bg-red-500 text-white px-4 py-3 rounded-lg shadow-lg z-50"
                            >
                                <i class="fas fa-times-circle mr-2"></i>
                                {{ session('error') }}
                            </div>
                        @endif
                        @foreach($clientes as $cliente)
                            @php
                                $status = strtolower($cliente->status->nome ?? '');
                                $cores = [
                                    'ativo' => 'bg-green-100 text-green-800',
                                    'bloqueado' => 'bg-red-100 text-red-700',
                                    'cancelado' => 'bg-yellow-100 text-yellow-700',
                                    'trancado' => 'bg-gray-100 text-gray-700',
                                ];
                                $classe = $cores[$status] ?? 'bg-gray-100 text-gray-700';
                            @endphp

                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $cliente->nome }}</td>
                                <td class="py-3 px-4">{{ $cliente->email }}</td>
                                <td class="py-3 px-4">
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">
                                        <td class="py-3 px-4">
                                            <span class="{{ $classe }} px-2 py-1 rounded-full text-sm">
                                                {{ ucfirst($cliente->status->nome) }}
                                            </span>
                                        </td>
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('cliente.alterar', $cliente->id) }}" wire:navigate class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-edit"></i></a>
                                    <button wire:click="deletar({{ $cliente->id }})" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
