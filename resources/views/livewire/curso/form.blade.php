<div class="mb-8">
    <div class="flex items-center space-x-2 mb-6">
        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
            <i class="fas fa-book text-blue-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Informações Básicas</h3>
    </div>
                            
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Curso *</label>
            <input type="text" wire:model="nome" id="nomeCurso" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Ex: Desenvolvimento Web Completo">
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nível do Curso *</label>
            <select id="nivelCurso" wire:model="nivel_id" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione o nível</option>
                @foreach ($niveis as $nivel)
                    <option value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
                @endforeach
            </select>
        </div>
                                
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Carga Horária *</label>
            <div class="relative">
                <input type="number" wire:model="hora_aula" id="cargaHoraria" required min="1" max="2000" class="w-full px-4 py-3 pr-16 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="120">
                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">horas</span>
            </div>
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
            <label class="block text-sm font-medium text-gray-700 mb-2">Descrição do Curso</label>
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
                            
    <div class="flex items-center space-x-6">
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="statusCurso" value="ativo" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Ativo</span>
        </label>
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="statusCurso" value="rascunho" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Rascunho</span>
        </label>
        <label class="flex items-center space-x-2 cursor-pointer">
            <input type="radio" name="statusCurso" value="inativo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
            <span class="text-sm font-medium text-gray-700">Inativo</span>
        </label>
    </div>
</div>
