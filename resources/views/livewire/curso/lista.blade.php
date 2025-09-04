<div id="cursosContent" class="p-6">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Gerenciar Cursos</h2>
                        <a href="{{route('curso.cadastrar')}}" wire:navigate class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                            <i class="fas fa-plus mr-2"></i>Novo Curso
                        </a>
                    </div>

                    <div class="p-6">
                        <div class="mb-4">
                            <input type="text" placeholder="Buscar cursos..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                                    
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b">
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Nome</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Hora|Aula</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cursos as $curso)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-4">{{$curso->nome}}</td>
                                            <td class="py-3 px-4">{{$curso->hora_aula}} horas</td>
                                            <td class="py-3 px-4">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">
                                                    {{ $curso->status->nome}}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <a href="{{ route('curso.alterar', $curso->id) }}" wire:navigate class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-edit"></i></a>
                                                <button wire:click="deletar({{ $curso->id }})" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
