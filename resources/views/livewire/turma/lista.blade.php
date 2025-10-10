<!-- Turmas -->
            <div id="turmasContent" class="p-6">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Gerenciar Turmas</h2>
                        <a href="{{route('turma.cadastrar')}}" wire:navigate class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                            <i class="fas fa-plus mr-2"></i>Nova Turma
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
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Data Inicial</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Valor</th>
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
                                    @foreach($turmas as $turma)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-4">{{ $turma->nome }}</td>
                                            <td class="py-3 px-4">{{ $turma->data_inicial }}</td>
                                            <td class="py-3 px-4">
                                                {{ 'R$ ' . number_format($turma->valor, 2, ',', '.') }}
                                            </td>
                                            <td class="py-3 px-4">
                                                <a href="{{ route('turma.alterar', $turma->id) }}" wire:navigate class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-edit"></i></a>
                                                <button wire:click="deletar({{ $turma->id }})" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
