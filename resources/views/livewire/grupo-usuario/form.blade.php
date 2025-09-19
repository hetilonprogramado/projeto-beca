<!-- Informações Básicas -->
<div class="mb-8">
    <div class="flex items-center space-x-2 mb-6">
        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-users-cog text-blue-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Informações do Grupo</h3>
    </div>
                            
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Grupo *</label>
            <input type="text" wire:model="nome" id="nomeGrupo" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Ex: Coordenadores">
            <p class="text-xs text-gray-500 mt-1">Nome que identificará o grupo no sistema</p>
             @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Data de Início *</label>
            <input type="date" wire:model="data_inicial" id="dataInicio" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
        </div>
    </div>
</div>

<!-- Status do Grupo -->
<div class="mb-6">
    <div class="flex items-center space-x-2 mb-6">
        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-toggle-on text-green-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Status do Grupo</h3>
    </div>
                            
    <div class="flex items-center space-x-6">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="statusGrupo" value="ativo" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Ativo</span>
        </label>
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="statusGrupo" value="inativo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Inativo</span>
        </label>
    </div>
    <p class="text-xs text-gray-500 mt-2">Grupos inativos não podem ser atribuídos a novos usuários</p>
</div>