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
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($turmas as $turma)
                                <div class="border rounded-lg p-6 hover:shadow-md transition-all">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="font-semibold text-gray-800">{{$turma->nome }}</h3>
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Em Andamento</span>
                                    </div>
                                    <div class="space-y-2 text-sm text-gray-600 mb-4">
                                        <p><i class="fas fa-book mr-2"></i>JavaScript Avançado</p>
                                        <p><i class="fas fa-calendar mr-2"></i>{{ $turma->data_inicial }}</p>
                                        <p><i class="fas fa-users mr-2"></i>18/20 alunos</p>
                                        <p><i class="fas fa-clock mr-2"></i>Seg/Qua/Sex - 19h às 22h</p>
                                        <p><i class="fas fa-dollar-sign mr-2"></i>{{$turma->valor}}</p>
                                        <p><i class="fas fa-door-open mr-2"></i>Sala 101</p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="text-sm">
                                            <span class="text-gray-600">Professor:</span>
                                            <span class="font-medium text-gray-800">Carlos Silva</span>
                                        </div>
                                        <div class="space-x-2">
                                            <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-eye"></i></button>
                                            <button onclick="showTurmaForm()" class="text-green-500 hover:text-green-700"><i class="fas fa-edit"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
