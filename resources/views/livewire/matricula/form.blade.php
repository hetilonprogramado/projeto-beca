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
            <label class="block text-sm font-medium text-gray-700 mb-2">Curso *</label>
            <select id="cursoMatricula" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione o curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Sala *</label>
            <select id="salasMatricula" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione a sala</option>
                @foreach($salas as $sala)
                    <option value="{{ $sala->id }}">{{ $sala->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Turma *</label>
            <select id="turmaMatricula" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione a Turma</option>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Cliente *</label>
            <select id="clienteMatricula" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione o Cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Valor *</label>
            <input type="text" id="valor" wire:model="valor" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o valor">
            @error('valor')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Desconto *</label>
            <input type="text" id="desconto" wire:model="desconto" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite o desconto">
            @error('desconto')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Ordem *</label>
            <input type="text" id="ondem" wire:model="ordem" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite a ordem">
            @error('ordem')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Obs Carteira *</label>
            <input type="text" id="obs_carteira" wire:model="obs_carteira" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite a observação da carteira">
            @error('obs_carteira')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="lg:col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">Instituição Anterior *</label>
            <input type="text" id="instituicao_anterior" wire:model="instituicao_anterior" required class="uppercase w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Digite a instituição anterior">
            @error('instituicao_anterior')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">SINC</label>
            <select id="sinc" wire:model="sinc" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione</option>
                <option value="Sim">Sim</option>
                <option value="Nao">Não</option>
            </select>
            @error('sexo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Aluno-Curso</label>
            <select id="aluno_curso" wire:model="aluno_curso" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Selecione</option>
                <option value="Sim">Sim</option>
                <option value="Nao">Não</option>
                <option value="Ex aluno">Ex aluno</option>
            </select>
            @error('sexo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Data de cadastro</label>
            <input type="date" wire:model="data_cad" required id="dataCad" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
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
