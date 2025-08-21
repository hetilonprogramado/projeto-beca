<div id="cadastroCursoContent" class="p-6 ">
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="{{route('curso')}}" wire:navigate class="text-gray-500 hover:text-gray-700 transition-colors">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <h2 class="text-xl font-semibold text-gray-800">Alterar Curso</h2>
            </div>
            <div class="flex space-x-3">
                <button onclick="showScreen('cursos')" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-all">
                    <i class="fas fa-times mr-2"></i>Cancelar
                </button>
                <button type="submit" wire:click.prevent="atualizar" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                    <i class="fas fa-save mr-2"></i>Alterar Curso
                </button>
            </div>
        </div>
                    
        <form wire:submit.prevent="atualizar" id="cursoForm" class="p-6">
            @include('livewire.curso.form')
        </form>
    </div>
</div>
