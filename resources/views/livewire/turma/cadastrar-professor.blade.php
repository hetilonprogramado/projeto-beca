<div id="adicionarProfessorContent" class="p-6">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <a href="{{route('turma.cadastrar')}}" wire:navigate class="text-gray-500 hover:text-gray-700 transition-colors">
                                <i class="fas fa-arrow-left text-xl"></i>
                            </a>
                            <h2 class="text-xl font-semibold text-gray-800">Adicionar Professor à Turma</h2>
                        </div>
                    </div>
                    
                    <!-- Seleção de Turma -->
                    <div class="p-6 border-b bg-gray-50">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher text-blue-600"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">Selecionar Turma</h3>
                        </div>
                        
                        <div class="w-1/2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Turma *</label>
                            <select id="turma" wire:model="turma_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                <option value="">Selecione a Turma</option>
                                @foreach($turmas as $turma)
                                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Lista de Professores -->
                            <div>
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-user-tie text-green-600"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-800">Professores Disponíveis</h3>
                                    </div>
                                </div>
                                
                                <!-- Busca de Professores -->
                                <div class="mb-4">
                                    <div class="relative">
                                        <input type="text" id="buscaProfessor" onkeyup="filtrarProfessores()" placeholder="Buscar professores..." class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    </div>
                                </div>
                                
                                <!-- Lista de Professores -->
                                <div id="listaProfessores" class="space-y-3 max-h-96 overflow-y-auto">
                                    <!-- Professor 1 -->
                                    <div class="professor-item border border-gray-200 rounded-lg p-4 hover:bg-gray-50 cursor-pointer transition-all" onclick="selecionarProfessor(this)" data-nome="Carlos Silva" data-especialidades="JavaScript, React, Node.js">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-user-tie text-blue-600 text-lg"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-800">Carlos Silva</h4>
                                                <p class="text-sm text-gray-600">JavaScript, React, Node.js</p>
                                                <div class="flex items-center space-x-4 mt-1">
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-envelope mr-1"></i>carlos@escola.com
                                                    </span>
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-phone mr-1"></i>(11) 99999-1111
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Disponível</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Professor 2 -->
                                    <div class="professor-item border border-gray-200 rounded-lg p-4 hover:bg-gray-50 cursor-pointer transition-all" onclick="selecionarProfessor(this)" data-nome="Ana Costa" data-especialidades="Python, Django, Flask">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-user-tie text-purple-600 text-lg"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-800">Ana Costa</h4>
                                                <p class="text-sm text-gray-600">Python, Django, Flask</p>
                                                <div class="flex items-center space-x-4 mt-1">
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-envelope mr-1"></i>ana@escola.com
                                                    </span>
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-phone mr-1"></i>(11) 99999-2222
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Disponível</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Professor 3 -->
                                    <div class="professor-item border border-gray-200 rounded-lg p-4 hover:bg-gray-50 cursor-pointer transition-all" onclick="selecionarProfessor(this)" data-nome="Roberto Santos" data-especialidades="Java, Spring, Microservices">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-user-tie text-orange-600 text-lg"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-800">Roberto Santos</h4>
                                                <p class="text-sm text-gray-600">Java, Spring, Microservices</p>
                                                <div class="flex items-center space-x-4 mt-1">
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-envelope mr-1"></i>roberto@escola.com
                                                    </span>
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-phone mr-1"></i>(11) 99999-3333
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium">Ocupado</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Professor 4 -->
                                    <div class="professor-item border border-gray-200 rounded-lg p-4 hover:bg-gray-50 cursor-pointer transition-all" onclick="selecionarProfessor(this)" data-nome="Maria Oliveira" data-especialidades="PHP, Laravel, WordPress">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-user-tie text-pink-600 text-lg"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-800">Maria Oliveira</h4>
                                                <p class="text-sm text-gray-600">PHP, Laravel, WordPress</p>
                                                <div class="flex items-center space-x-4 mt-1">
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-envelope mr-1"></i>maria@escola.com
                                                    </span>
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-phone mr-1"></i>(11) 99999-4444
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Disponível</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Professor 5 -->
                                    <div class="professor-item border border-gray-200 rounded-lg p-4 hover:bg-gray-50 cursor-pointer transition-all" onclick="selecionarProfessor(this)" data-nome="João Ferreira" data-especialidades="C#, .NET, Azure">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-user-tie text-indigo-600 text-lg"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-800">João Ferreira</h4>
                                                <p class="text-sm text-gray-600">C#, .NET, Azure</p>
                                                <div class="flex items-center space-x-4 mt-1">
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-envelope mr-1"></i>joao@escola.com
                                                    </span>
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-phone mr-1"></i>(11) 99999-5555
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Disponível</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Professor Selecionado -->
                                <div id="professorSelecionado" class="hidden mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-check text-white"></i>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-blue-800">Professor Selecionado</h4>
                                                <p id="nomeProfessorSelecionado" class="text-sm text-blue-600"></p>
                                            </div>
                                        </div>
                                        <button onclick="desselecionarProfessor()" class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Lista de Disciplinas -->
                            <div>
                                <div class="flex items-center space-x-2 mb-6">
                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-book text-purple-600"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800">Disciplinas do Curso</h3>
                                </div>
                                
                                <!-- Mensagem quando nenhuma turma selecionada -->
                                <div id="semTurmaSelecionada" class="text-center py-12 text-gray-500">
                                    <i class="fas fa-chalkboard-teacher text-4xl mb-3 text-gray-300"></i>
                                    <p class="text-lg font-medium">Selecione uma turma</p>
                                    <p class="text-sm">Escolha uma turma acima para ver as disciplinas disponíveis.</p>
                                </div>
                                
                                <!-- Lista de Disciplinas -->
                                <div id="listaDisciplinas" class="hidden space-y-3 max-h-96 overflow-y-auto">
                                    <!-- As disciplinas serão carregadas dinamicamente -->
                                </div>
                                
                                <!-- Resumo das Disciplinas Selecionadas -->
                                <div id="resumoDisciplinas" class="hidden mt-6 p-4 bg-purple-50 border border-purple-200 rounded-lg">
                                    <h4 class="font-semibold text-purple-800 mb-2">Disciplinas Selecionadas</h4>
                                    <div id="disciplinasSelecionadas" class="space-y-1">
                                        <!-- Lista das disciplinas selecionadas -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
