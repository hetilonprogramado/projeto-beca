<div id="gruposContent" class="p-6 ">
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Gerenciar Grupos de Usuários</h2>
            <a href="{{route('grupo-usuario.cadastrar')}}" wire:navigate class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                <i class="fas fa-plus mr-2"></i>Novo Grupo
            </a>
        </div>
                    
        <div class="p-6">
            <div class="mb-4">
                <input type="text" placeholder="Buscar grupos..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
                        
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Nome do Grupo</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Usuários</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Data Criação</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grupos as $grupo)
                            <!-- <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-crown text-red-600"></i>
                                        </div>
                                        <span class="font-medium">Administradores</span>
                                    </div>
                                </td>
                                <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Ativo</span></td>
                                <td class="py-3 px-4">2 usuários</td>
                                <td class="py-3 px-4">01/01/2024</td>
                                <td class="py-3 px-4">
                                    <button onclick="editarGrupo('admin')" class="text-blue-500 hover:text-blue-700 mr-2" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="gerenciarPermissoes('admin')" class="text-purple-500 hover:text-purple-700 mr-2" title="Permissões">
                                        <i class="fas fa-key"></i>
                                    </button>
                                    <button onclick="excluirGrupo('admin')" class="text-red-500 hover:text-red-700" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr> -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-chalkboard-teacher text-blue-600"></i>
                                        </div>
                                        <span class="font-medium">{{$grupo->nome}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">{{$grupo->status->nome}}</span></td>
                                <td class="py-3 px-4">8 usuários</td>
                                <td class="py-3 px-4">{{$grupo->data_inicial}}</td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('grupo-usuario.alterar', $grupo->id) }}" wire:navigate class="text-blue-500 hover:text-blue-700 mr-2" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="gerenciarPermissoes('professor')" class="text-purple-500 hover:text-purple-700 mr-2" title="Permissões">
                                        <i class="fas fa-key"></i>
                                    </button>
                                    <button wire:click="deletar({{ $grupo->id }})" class="text-red-500 hover:text-red-700" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-user-graduate text-green-600"></i>
                                        </div>
                                        <span class="font-medium">Alunos</span>
                                    </div>
                                </td>
                                <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Ativo</span></td>
                                <td class="py-3 px-4">1.234 usuários</td>
                                <td class="py-3 px-4">10/01/2024</td>
                                <td class="py-3 px-4">
                                    <button onclick="editarGrupo('aluno')" class="text-blue-500 hover:text-blue-700 mr-2" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="gerenciarPermissoes('aluno')" class="text-purple-500 hover:text-purple-700 mr-2" title="Permissões">
                                        <i class="fas fa-key"></i>
                                    </button>
                                    <button onclick="excluirGrupo('aluno')" class="text-red-500 hover:text-red-700" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-headset text-orange-600"></i>
                                    </div>
                                    <span class="font-medium">Suporte</span>
                                </div>
                            </td>
                            <td class="py-3 px-4"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm">Inativo</span></td>
                            <td class="py-3 px-4">3 usuários</td>
                            <td class="py-3 px-4">15/01/2024</td>
                            <td class="py-3 px-4">
                                <button onclick="editarGrupo('suporte')" class="text-blue-500 hover:text-blue-700 mr-2" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="gerenciarPermissoes('suporte')" class="text-purple-500 hover:text-purple-700 mr-2" title="Permissões">
                                    <i class="fas fa-key"></i>
                                </button>
                                <button onclick="excluirGrupo('suporte')" class="text-red-500 hover:text-red-700" title="Excluir">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                            </tr> -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>