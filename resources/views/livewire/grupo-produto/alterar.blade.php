<div id="cadastroGrupoContent" class="p-6 ">
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <a href="{{route('grupo-produto')}}" wire:navigate class="text-gray-500 hover:text-gray-700 transition-colors">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <h2 class="text-xl font-semibold text-gray-800">Alterar grupo</h2>
            </div>
            <div class="flex space-x-3">
                <button onclick="showScreen('grupos')" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-all">
                    <i class="fas fa-times mr-2"></i>Cancelar
                </button>
                <button type="submit" wire:click.prevent="atualizar" wire:target="atualizar" wire:loading.attr="disabled" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                    <span wire:loading.remove wire:target="atualizar">Alterar Grupo</span>
                    <i class="fas fa-spinner fa-spin mr-2" wire:loading wire:target="atualizar"></i>
                    <span wire:loading wire:target="atualizar">Alterando...</span>
                </button>
            </div>
        </div>
                    
        <form wire:submit.prevent="atualizar" id="grupoForm" class="p-6">
            @include('livewire.grupo-produto.form')
        </form>
    </div>
</div>
