<div id="matriculasContent" class="p-6">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Gerenciar Matrículas</h2>
                        <a href="{{route('matricula.cadastrar')}}" wire:navigate class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                            <i class="fas fa-plus mr-2"></i>Nova Matrícula
                        </a>
                    </div>
                    
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b">
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Aluno</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Curso</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Data Matrícula</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
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
                                    @foreach($matriculas as $matricula)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-4">{{ $matricula->cliente->nome }}</td>
                                            <td class="py-3 px-4">{{ $matricula->curso->nome }}</td>
                                            <td class="py-3 px-4">{{ $matricula->data_cad }}</td>
                                            <td class="py-3 px-4">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">
                                                    {{ $matricula->status->nome}}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">{{ $matricula->valor }}</td>
                                            <td class="py-3 px-4">
                                                <a href="{{ route('matricula.alterar', $matricula->id) }}" wire:navigate class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-edit"></i></a>
                                                <button wire:click="deletar({{ $matricula->id }})" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
