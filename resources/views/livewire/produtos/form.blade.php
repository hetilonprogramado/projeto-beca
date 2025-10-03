<!-- Dados Pessoais -->
<div class="mb-8">
    <div class="flex items-center space-x-2 mb-4">
        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-user text-blue-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Dados Pessoais</h3>
    </div>
                            
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nome *</label>
            <input type="text" id="nome" wire:model="nome" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o nome">
            @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Código de Barras *</label>
            <input type="text" id="codigo_barras" wire:model="codigo_barras" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o código de barras">
            @error('codigo_barras')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Esstoque Minimo *</label>
            <input type="text" id="estoque" wire:model="estoque_minimo" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o estoque minimo" maxlength="14">
            @error('estoque_minimo') 
                <small class="text-danger">{{ $message }}</small> 
            @enderror
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Grupo Fiscal</label>
            <input type="text" wire:model="grupo_fiscal" id="grupo_fiscal" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o grupo fiscal">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Grupo Produtos *</label>
            <select id="grupoMatricula" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                 <option value="">Selecione</option>
                @foreach($grupos as $grupo)
                    <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
                @endforeach
            </select>
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Utilização</label>
            <select id="utilizacao" wire:model="utilizacao" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="Venda">Venda</option>
                <option value="Consumo">Consumo</option>
            </select>
            @error('utilizacao')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Valor de Compra</label>
            <input type="text" id="vlr_compra" wire:model="vlr_compra" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o valor da compra">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Valor da Venda</label>
            <input type="text" id="vlr_venda" wire:model="vlr_venda" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o valor da venda">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">NCM</label>
            <input type="text" id="ncm" wire:model="ncm" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o NCM">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Combo</label>
            <select id="combo" wire:model="combo" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="Nao">Não</option>
                <option value="Sim">Sim</option>
            </select>
            @error('combo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Grup Prod</label>
            <input type="text" id="grup_prod_id" wire:model="grup_prod_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o grupo de produto">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Imagem</label>
            <input type="text" id="imagem" wire:model="imagem" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Adicione uma imagem">
        </div>
    </div>
</div>

<!-- Dados de Endereço -->
<div class="mb-8">

    <!-- Observações -->
    <div class="mb-6">
        <div class="flex items-center space-x-2 mb-4">
            <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-sticky-note text-orange-600"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800">Observações</h3>
        </div>
                            
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Observações Gerais</label>
            <textarea id="observacoes" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none" placeholder="Digite observações importantes sobre o cliente..."></textarea>
        </div>
    </div>

    <!-- Matrículas do Cliente -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-file-signature text-indigo-600"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Matrículas</h3>
            </div>
            <button onclick="adicionarMatricula()" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition-all text-sm">
                <i class="fas fa-plus mr-2"></i>Nova Matrícula
            </button>
        </div>
                            
        <div id="matriculasContainer" class="space-y-4">
            <!-- Matrícula Exemplo 1 -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-laptop-code text-blue-600"></i>
                        </div>
                    <div>
                    <h4 class="font-semibold text-gray-800">Curso de JavaScript Avançado</h4>
                    <p class="text-sm text-gray-600">Turma JS-2024-01 • Matrícula: #2024001</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Ativa</span>
                    <button onclick="editarMatricula(this)" class="text-blue-500 hover:text-blue-700 p-1">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="removerMatricula(this)" class="text-red-500 hover:text-red-700 p-1">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
                                    
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                <div>
                    <span class="text-gray-600">Data Matrícula:</span>
                    <p class="font-medium text-gray-800">15/01/2024</p>
                </div>
                <div>
                    <span class="text-gray-600">Valor:</span>
                    <p class="font-medium text-gray-800">R$ 299,00</p>
                </div>
                <div>
                    <span class="text-gray-600">Forma Pagamento:</span>
                    <p class="font-medium text-gray-800">Cartão 3x</p>
                </div>
                <div>
                    <span class="text-gray-600">Situação Pagamento:</span>
                    <p class="font-medium text-green-600">Em Dia</p>
                </div>
            </div>
                                    
            <div class="mt-3 pt-3 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        <span>Progresso do Curso:</span>
                        <span class="font-medium text-gray-800 ml-1">65%</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                        <span class="text-gray-600">Início:</span>
                        <span class="font-medium text-gray-800">20/01/2024</span>
                        <span class="text-gray-600 ml-3">Previsão Término:</span>
                        <span class="font-medium text-gray-800">20/03/2024</span>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Matrícula Exemplo 2 -->
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-python text-green-600"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Curso de Python para Web</h4>
                        <p class="text-sm text-gray-600">Turma PY-2023-02 • Matrícula: #2023089</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">Concluída</span>
                    <button onclick="editarMatricula(this)" class="text-blue-500 hover:text-blue-700 p-1">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="removerMatricula(this)" class="text-red-500 hover:text-red-700 p-1">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
                                    
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                <div>
                    <span class="text-gray-600">Data Matrícula:</span>
                    <p class="font-medium text-gray-800">10/09/2023</p>
                </div>
                <div>
                    <span class="text-gray-600">Valor:</span>
                    <p class="font-medium text-gray-800">R$ 349,00</p>
                </div>
                <div>
                    <span class="text-gray-600">Forma Pagamento:</span>
                    <p class="font-medium text-gray-800">PIX à Vista</p>
                </div>
                <div>
                    <span class="text-gray-600">Situação Pagamento:</span>
                    <p class="font-medium text-blue-600">Pago</p>
                </div>
            </div>
                                    
            <div class="mt-3 pt-3 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        <span>Progresso do Curso:</span>
                        <span class="font-medium text-green-600 ml-1">100%</span>
                    </div>
                    <div class="flex items-center space-x-2 text-sm">
                        <span class="text-gray-600">Início:</span>
                        <span class="font-medium text-gray-800">15/09/2023</span>
                        <span class="text-gray-600 ml-3">Concluído em:</span>
                        <span class="font-medium text-gray-800">20/12/2023</span>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                <div class="mt-2 flex items-center space-x-2">
                    <i class="fas fa-certificate text-yellow-500"></i>
                    <span class="text-sm text-gray-600">Certificado emitido em 22/12/2023</span>
                    <button class="text-blue-500 hover:text-blue-700 text-sm font-medium ml-2">
                        <i class="fas fa-download mr-1"></i>Baixar
                    </button>
                </div>
            </div>
        </div>

        <!-- Mensagem quando não há matrículas -->
        <div id="semMatriculas" class="hidden text-center py-8 text-gray-500">
            <i class="fas fa-file-signature text-4xl mb-3 text-gray-300"></i>
            <p class="text-lg font-medium">Nenhuma matrícula encontrada</p>
            <p class="text-sm">Este cliente ainda não possui matrículas em cursos.</p>
        </div>
    </div>
</div>

<!-- Status do Cliente -->
<div class="mb-6">
    <div class="flex items-center space-x-2 mb-4">
        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-toggle-on text-gray-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Status</h3>
    </div>
                            
    <div class="flex items-center space-x-4">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="status" value="ativo" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Ativo</span>
        </label>
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="status" value="inativo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Inativo</span>
        </label>
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="status" value="suspenso" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Suspenso</span>
        </label>
    </div>
</div>