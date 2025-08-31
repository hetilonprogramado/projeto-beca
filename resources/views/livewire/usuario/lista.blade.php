<!-- Usuários -->
            <div id="usuariosContent" class="p-6">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Gerenciar Usuários</h2>
                        <a href="{{route('usuario.cadastrar')}}" wire:navigate class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                            <i class="fas fa-plus mr-2"></i>Novo Usuário
                        </a>
                    </div>
                    
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b">
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Nome</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Email</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Perfil</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Último Acesso</th>
                                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                                        <span class="text-white text-sm font-bold">AD</span>
                                                    </div>
                                                    <span>{{$usuario->name}}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">{{$usuario->email}}</td>
                                            <td class="py-3 px-4"><span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm">Administrador</span></td>
                                            <td class="py-3 px-4"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">{{$usuario->status->nome}}</span></td>
                                            <td class="py-3 px-4">Agora</td>
                                            <td class="py-3 px-4">
                                                <a href="{{ route('usuario.alterar', $usuario->id) }}" wire:navigate class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-edit"></i></a>
                                                <button class="text-orange-500 hover:text-orange-700"><i class="fas fa-key"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
