<div id="cursosContent" class="p-6">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">Gerenciar Cursos</h2>
                        <a href="{{route('curso.cadastrar')}}" wire:navigate class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                            <i class="fas fa-plus mr-2"></i>Novo Curso
                        </a>
                    </div>
                    
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            @foreach($cursos as $curso)
                                <div class="border rounded-lg p-6 hover:shadow-md transition-all">
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-code text-blue-600 text-xl"></i>
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-gray-800">{{$curso->nome}}</h3>
                                                <p class="text-sm text-gray-600">{{$curso->hora_aula}} horas</p>
                                            </div>
                                        </div>
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Ativo</span>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-4">Curso completo de desenvolvimento web com HTML, CSS, JavaScript e frameworks modernos.</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-blue-600">R$ 599,00</span>
                                        <div class="space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                            <button class="text-green-500 hover:text-green-700"><i class="fas fa-users"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
