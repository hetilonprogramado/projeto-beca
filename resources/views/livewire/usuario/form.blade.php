<!-- Dados Pessoais -->
<div class="mb-8">
    <div class="flex items-center space-x-2 mb-4">
        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-user text-blue-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Dados Pessoais</h3>
    </div>
                            
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo *</label>
            <input type="text" id="nomeCompleto" wire:model="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o nome completo">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">CPF *</label>
            <input type="text" id="cpf" x-mask="{{ '999.999.999-99' }}" wire:model="cpf" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="000.000.000-00" maxlength="14">
            @error('cpf') 
                <small class="text-danger">{{ $message }}</small> 
            @enderror
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">RG</label>
            <input type="text" wire:model="rg" id="rg" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="00.000.000-0">
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Data de Nascimento</label>
            <input type="date" wire:model="data_nascimento" id="dataNascimento" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Sexo</label>
            <select id="sexo" wire:model="sexo" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Usuario do Sistema?</label>
            <select id="user_system" wire:model="user_system" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione</option>
                <option value="Sim">Sim</option>
                <option value="Nao">Não</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Data de Admissão</label>
            <input type="date" wire:model="data_admissao" id="dataAdmissao" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Data de Demissão</label>
            <input type="date" wire:model="data_demissao" id="dataDemissao" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Salario *</label>
            <input type="text" wire:model="salario" id="salario" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="1.000,00">
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Cargo *</label>
            <input type="text" id="cargo" wire:model="cargo" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o cargo">
            @error('cargo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Perc. Compra *</label>
            <input type="text" wire:model="perc_compra" id="perc_compra" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="10,00%">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Codigo de Acesso *</label>
            <input type="text" wire:model="codigo_acesso" id="codigo_acesso" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">PIS *</label>
            <input type="text" wire:model="pis" id="pis" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">CTPS *</label>
            <input type="text" wire:model="ctps" id="ctps" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="">
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
            <label class="block text-sm font-medium text-gray-700 mb-2">Bairro</label>
            <input type="text" wire:model="bairro" id="bairro" required class="w-full uppercase px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Nome do bairro">
            @error('bairro')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
                                
        </div>
    </div>

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
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Principal *</label>
                <input type="email" wire:model="email" id="emailPrincipal" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="email@exemplo.com">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password *</label>
                <input type="password" wire:model="password" id="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="123456">
            </div>
                                
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone Celular *</label>
                <input type="text" x-mask="{{ '(99) 9999-9999' }}" wire:model="telefone1" id="celular" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="(00) 00000-0000" maxlength="15">
            </div>
                                
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone Fixo</label>
                <input type="text" x-mask="{{ '(99) 9999-9999' }}" wire:model="telefone2" id="telefoneFixo" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="(00) 0000-0000" maxlength="14">
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
            <textarea id="observacoes" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none" placeholder="Digite observações importantes sobre o cliente..."></textarea>
        </div>
    </div>
</div>

<!-- Status do Usuario -->
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