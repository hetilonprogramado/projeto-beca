<div class="mb-8">
    <div class="flex items-center space-x-2 mb-6">
        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-chalkboard-teacher text-blue-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Informações Básicas</h3>
    </div>
                            
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Turma *</label>
            <input type="text" wire:model="nome" id="nomeTurma" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Ex: JS-2024-01">
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Curso *</label>
            <select id="cursoTurma" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione o curso</option>
                <option value="javascript">JavaScript Avançado</option>
                <option value="python">Python para Web</option>
                <option value="react">React.js Completo</option>
                <option value="nodejs">Node.js Backend</option>
                <option value="database">Banco de Dados</option>
                <option value="mobile">Desenvolvimento Mobile</option>
            </select>
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Valor da Turma *</label>
            <div class="relative">
                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">R$</span>
                    <input type="number" wire:model="valor" id="valorTurma" required min="0" step="0.01" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="299,00">
            </div>
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Data de Início *</label>
            <input type="date" wire:model="data_inicial" id="dataInicio" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Data de Fim *</label>
            <input type="date" wire:model="data_final" id="dataFim" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Carga Horária *</label>
            <div class="relative">
                <input type="number" wire:model="carga_hr" id="cargaHorariaTurma" required min="1" max="2000" class="w-full px-4 py-3 pr-16 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="120">
                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">horas</span>
            </div>
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Sala *</label>
            <select id="salaTurma" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione a sala</option>
                <option value="101">Sala 101 - Lab. Informática 1</option>
                <option value="102">Sala 102 - Lab. Informática 2</option>
                <option value="201">Sala 201 - Auditório</option>
                <option value="202">Sala 202 - Sala de Aula</option>
                <option value="203">Sala 203 - Lab. Avançado</option>
                <option value="301">Sala 301 - Sala Multimídia</option>
                <option value="online">Online - EAD</option>
            </select>
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Data Encerrar Lançamentos</label>
            <input type="date" wire:model="data_encerrar_lancamento" id="dataEncerrarLancamentos" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
            <p class="text-xs text-gray-500 mt-1">Data limite para lançamento de notas e frequência</p>
        </div>
                                
        <div class="flex items-center space-x-2">
            <input type="checkbox" id="validarAcesso" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
            <label for="validarAcesso" class="text-sm font-medium text-gray-700">Validar Acesso</label>
            <div class="group relative">
                <i class="fas fa-question-circle text-gray-400 cursor-help"></i>
                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-2 bg-gray-800 text-white text-xs rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                    Exigir validação de acesso para alunos
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Certificado -->
<div class="mb-8">
    <div class="flex items-center space-x-2 mb-6">
        <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-certificate text-yellow-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Certificado</h3>
    </div>
                            
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Emitir Certificado</label>
            <select id="emitirCertificado" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
                <option value="condicional">Condicional (mediante aprovação)</option>
            </select>
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Modelo do Certificado</label>
            <select id="modeloCertificado" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="padrao">Modelo Padrão</option>
                <option value="premium">Modelo Premium</option>
                <option value="tecnico">Modelo Técnico</option>
                <option value="profissional">Modelo Profissional</option>
            </select>
        </div>
                                
    </div>
</div>

<!-- Professores -->
<div class="mb-8">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-user-tie text-green-600"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800">Professores</h3>
        </div>
        <a href="{{route('turma.cadastrar.professor')}}" wire:navigate class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-all text-sm">
            <i class="fas fa-plus mr-2"></i>Adicionar Professor
        </a>
    </div>
                            
    <div id="professoresContainer" class="space-y-4">
        <!-- Professor Exemplo -->
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-user-tie text-green-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Carlos Silva</h4>
                        <p class="text-sm text-gray-600">Professor Principal</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">Ativo</span>
                    <button type="button" onclick="editarProfessor(this)" class="text-blue-500 hover:text-blue-700 p-1">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" onclick="removerProfessor(this)" class="text-red-500 hover:text-red-700 p-1">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
                                    
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div>
                    <span class="text-gray-600">Email:</span>
                    <p class="font-medium text-gray-800">carlos@escola.com</p>
                </div>
                <div>
                    <span class="text-gray-600">Especialidade:</span>
                    <p class="font-medium text-gray-800">JavaScript, React</p>
                </div>
                <div>
                    <span class="text-gray-600">Carga Horária:</span>
                    <p class="font-medium text-gray-800">40h/semana</p>
                </div>
            </div>
        </div>

        <!-- Mensagem quando não há professores -->
        <div id="semProfessores" class="hidden text-center py-8 text-gray-500">
            <i class="fas fa-user-tie text-4xl mb-3 text-gray-300"></i>
            <p class="text-lg font-medium">Nenhum professor adicionado</p>
            <p class="text-sm">Adicione professores para esta turma.</p>
        </div>
    </div>
</div>



<!-- Status da Turma -->
<div class="mb-6">
    <div class="flex items-center space-x-2 mb-6">
        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-toggle-on text-gray-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Status da Turma</h3>
    </div>
                            
    <div class="flex items-center space-x-6">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="statusTurma" value="planejada" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Planejada</span>
        </label>
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="statusTurma" value="em_andamento" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Em Andamento</span>
        </label>
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="statusTurma" value="concluida" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Concluída</span>
        </label>
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="statusTurma" value="cancelada" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Cancelada</span>
        </label>
    </div>
</div>