<div class="mb-8">
    <div class="flex items-center space-x-2 mb-6">
        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-book text-blue-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Informações Básicas</h3>
    </div>
                            
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Sala *</label>
            <input type="text" wire:model="nome" id="nomeSala" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Ex: Sala 101">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Limite *</label>
            <input type="text" wire:model="limite" id="limite" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Ex: 34">
        </div>
    </div>
</div>

<!-- Descrição e Objetivos -->
<div class="mb-8">
    <div class="flex items-center space-x-2 mb-6">
        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-align-left text-green-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Descrição e Objetivos</h3>
    </div>
                            
    <div class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Descrição da Sala</label>
            <textarea id="descricaoCurso" wire:model="descricao" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none" placeholder="Descreva o que o aluno aprenderá neste curso..."></textarea>
        </div>
                                    
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Objetivos de Aprendizagem</label>
            <textarea id="objetivosCurso" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none" placeholder="Liste os principais objetivos e competências que serão desenvolvidas..."></textarea>
        </div>
    </div>
</div>




<!-- Status do Curso -->
<div class="mb-6">
    <div class="flex items-center space-x-2 mb-6">
        <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-toggle-on text-gray-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Status do Curso</h3>
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
