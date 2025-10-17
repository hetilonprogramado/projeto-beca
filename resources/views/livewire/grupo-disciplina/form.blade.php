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
            <input type="text" id="nome" wire:model="nome" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o nome do grupo disciplina">
            @error('nome')
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
