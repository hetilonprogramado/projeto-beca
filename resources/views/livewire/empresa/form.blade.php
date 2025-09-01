<!-- Dados Pessoais -->
<div class="mb-8">
    <div class="flex items-center space-x-2 mb-4">
        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-user text-blue-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Dados Pessoais</h3>
    </div>
                            
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de pessoa</label>
            <select id="tipoDePessoa" wire:model="tipo_pessoa" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione</option>
                <option value="Fisica">Fisica</option>
                <option value="Juridica">Juridica</option>
            </select>
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Empresa *</label>
            <input type="text" id="nomeCompleto" wire:model="rsocial" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o nome completo">
            @error('rsocial')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Fantasia *</label>
            <input type="text" id="fantasia" wire:model="nome_fantasia" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o nome fantasia">
            @error('nome_fantasia')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">CNPJ *</label>
            <input type="text" id="cpf" wire:model="cnpj" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="000.000.000-00" maxlength="14">
            @error('cnpj') 
                <small class="text-danger">{{ $message }}</small> 
            @enderror
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">RG</label>
            <input type="text" wire:model="ie" id="rg" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="00.000.000-0">
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Data Lib</label>
            <input type="date" wire:model="data_lib" id="dataNascimento" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
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
            <label class="block text-sm font-medium text-gray-700 mb-2">CEP *</label>
            <input type="text" wire:model="cep"  wire:change="buscarCep" id="cep" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="00000-000" maxlength="9">
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
        </div>

        <div class="lg:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Cidade *</label>
            <select wire:model="cidade_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
                <option value="">Selecione</option>
                @foreach($cidades as $cidade)
                    <option value="{{ $cidade->id }}" @selected($cidade_id == $cidade->id)>
                        {{ $cidade->nome }}
                    </option>
                @endforeach
            </select>
        </div>
                                
        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Logradouro *</label>
            <input type="text" wire:model="rua" id="logradouro" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Rua, Avenida, etc.">
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Número *</label>
            <input type="text" wire:model="numero" id="numero" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="123">
        </div>
                                
        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Endereco</label>
            <input type="text" id="endereco" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Apto, Bloco, etc.">
        </div>
                                
        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Bairro *</label>
            <input type="text" wire:model="bairro" id="bairro" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Nome do bairro">
        </div>
                                
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">País</label>
                <input type="text" id="pais" value="Brasil" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-gray-50" readonly>
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
                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                <input type="email" wire:moedl="email" id="emailPrincipal" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="email@exemplo.com">
            </div>
                                
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone Celular *</label>
                <input type="text" wire:model="telefone1" id="telefone1" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="(00) 00000-0000" maxlength="15">
            </div>
                                
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone Fixo</label>
                <input type="text" wire:model="telefone2" id="telefone2" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="(00) 0000-0000" maxlength="14">
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