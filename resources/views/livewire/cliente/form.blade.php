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
            <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo *</label>
            <input type="text" id="nome" wire:model="nome" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o nome completo">
            @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Apelido</label>
            <input type="text" id="Apelido" wire:model="apelido" class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o apelido">
            @error('apelido')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">CPF</label>
            <input type="text" id="cpf" x-mask="{{ '999.999.999-99' }}" wire:model="cpf" class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="000.000.000-00" maxlength="14">
            @error('cpf')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">RG</label>
            <input type="text" wire:model="rg" id="rg" class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="00.000.000-0">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Data de Nascimento</label>
            <input type="date" wire:model="data_nasc" required id="dataNascimento" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Sexo</label>
            <select id="sexo" wire:model="sexo" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
            @error('sexo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Registro de nascimento</label>
            <input type="text" id="registro_nascimento" wire:model="registro_nascimento" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="">
            @error('registro_nascimento')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nacionalidade</label>
            <input type="text" id="nacionalidade" wire:model="nacionalidade" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="">
            @error('nacionalidade')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Naturalidade</label>
            <input type="text" id="naturalidade" wire:model="naturalidade" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="">
            @error('naturalidade')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Religião</label>
            <input type="text" id="religiao" wire:model="religiao" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="">
            @error('religiao')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>
</div>

<!-- Dados de Endereço -->
<div class="mb-8">
    <div class="flex items-center space-x-2 mb-4">
        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-map-marker-alt text-green-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Dados de Endereço</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">CEP</label>
            <input type="text" wire:model="cep" id="cep" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="00000-000" maxlength="9"
            wire:blur="buscarCep">
            @error('cep')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Estado *</label>
            <select id="estado" wire:change= "buscarCidades" wire:model="estado_id" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione</option>
                @foreach($estados as $estado)
                    <option value="{{ $estado->id }}" @selected($estado_id == $estado->id)>
                        {{ $estado->nome }}
                    </option>
                @endforeach
            </select>
            @error('estado_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Cidade *</label>
            <select wire:model="cidade_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
                <option value="">Selecione</option>
                @foreach($cidades as $cidade)
                    <option value="{{ $cidade->id }}" @selected($cidade_id == $cidade->id)>
                        {{ $cidade->nome }}
                    </option>
                @endforeach
            </select>
            @error('cidade_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Logradouro</label>
            <input type="text" wire:model="rua" id="logradouro" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Rua, Avenida, etc.">
            @error('rua')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Número</label>
            <input type="text" wire:model="numero" id="numero" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="123">
            @error('numero')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Complemento</label>
            <input type="text" id="complemento" class="w-full uppercase px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Apto, Bloco, etc.">
            @error('complemento')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Bairro</label>
            <input type="text" wire:model="bairro" id="bairro" required class="w-full uppercase px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Nome do bairro">
            @error('bairro')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>

    <br>

    <!-- Dados de Contato -->
    <div class="mb-8">
        <div class="flex items-center space-x-2 mb-4">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-phone text-purple-600"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800">Dados de Contato</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Principal</label>
                <input type="email" wire:model="email" id="emailPrincipal" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="email@exemplo.com">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone Celular</label>
                <input type="text" wire:model="celular" x-mask="{{ '(99) 9999-9999' }}" id="celular" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="(00) 00000-0000" maxlength="15">
                @error('celular')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>
    </div>

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
            <textarea id="observacoes" rows="4" class="w-full uppercase px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none" placeholder="Digite observações importantes sobre o cliente..."></textarea>
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
            @foreach($statuses as $status)
                <label class="flex items-center space-x-2 cursor-pointer">
                    <input type="radio" wire:model="status_id" name="status" value="{{ $status->id }}" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                    <span class="text-sm font-medium text-gray-700">{{$status->nome}}</span>
                </label>
            @endforeach
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
            @if (!empty($cliente_id))
                <a href="{{ route('matricula.cadastrar') }}" wire:navigate class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition-all text-sm">
                    <i class="fas fa-plus mr-2"></i>Nova Matrícula
                </a>
            @endif
        </div>

        @foreach($matriculas as $matricula)
            <div id="matriculasContainer" class="space-y-4">
                <!-- Matrícula Exemplo 1 -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-laptop-code text-blue-600"></i>
                            </div>
                        <div>
                        <h4 class="font-semibold text-gray-800">{{ $matricula->curso->nome }}</h4>
                        <p class="text-sm text-gray-600">Turma {{ $matricula->turma->nome }} • Matrícula: {{ $matricula->id }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">Ativa</span>
                        <a href="{{ route('matricula.alterar', $matricula->id) }}" wire:navigate class="text-blue-500 hover:text-blue-700 p-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button wire:click="deletar({{ $matricula->id }})" class="text-red-500 hover:text-red-700 p-1">
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
                        <p class="font-medium text-gray-800">R$ {{ number_format($matricula->valor, 2, ',', '.') }}</p>
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
                            <span class="font-medium text-gray-800 ml-1">50%</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm">
                            <span class="text-gray-600">Início:</span>
                            <span class="font-medium text-gray-800">
                                {{ \Carbon\Carbon::parse($matricula->data_cad)->format('d/m/Y') }}
                            </span>
                            <span class="text-gray-600 ml-3">Previsão Término:</span>
                            <span class="font-medium text-gray-800">20/03/2024</span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 50%"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Matrícula Exemplo 2 -->
        <!-- <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
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
        </div> -->

        <!-- Mensagem quando não há matrículas -->
        <div id="semMatriculas" class="hidden text-center py-8 text-gray-500">
            <i class="fas fa-file-signature text-4xl mb-3 text-gray-300"></i>
            <p class="text-lg font-medium">Nenhuma matrícula encontrada</p>
            <p class="text-sm">Este cliente ainda não possui matrículas em cursos.</p>
        </div>
    </div>
</div>
