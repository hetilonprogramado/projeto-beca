<div>
    <h1 class="text-2xl font-bold mb-4">Produtos</h1>
    <button class="mb-4 bg-blue-500 text-white px-3 py-1 rounded">
        + Adicionar Produto
    </button>

    <!-- Card de cadastro -->
    <div style="background:#5f1123; color:#fff; padding:20px; border-radius:10px; margin-top:20px;">
        <input name="produto_nome" wire:model="nome" placeholder="Nome do produto" class="campo">
        <input name="produto_preco" wire:model="preco" type="number" placeholder="Preço" class="campo">
        <input name="produto_estoque" wire:model="estoque" type="number" placeholder="Estoque" class="campo">
        <input name="produto_categoria" wire:model="categoria" placeholder="Categoria" class="campo">
        <input name="produto_codigo" wire:model="codigo" placeholder="Código" class="campo">
        <div class="mt-2 flex gap-2">
            <button class="bg-green-500 text-white px-3 py-1 rounded mt-2" type="submit" wire:click.prevent="salvar" wire:target="salvar" wire:loading.attr="disabled">
            <span wire:loading.remove wire:target="salvar">Salvar</span>
            <i class="fas fa-spinner fa-spin mr-2" wire:loading wire:target="salvar"></i>
            <span wire:loading wire:target="salvar">Salvando...</span>
        </button>
            <button class="bg-gray-500 text-white px-3 py-1 rounded">Cancelar</button>
        </div>
    </div>

    <!-- Tabela -->
    <table class="w-full bg-white text-black rounded mt-4">
        <thead>
            <tr>
                <th class="p-2">Nome</th>
                <th class="p-2">Preço</th>
                <th class="p-2">Estoque</th>
                <th class="p-2">Categoria</th>
                <th class="p-2">Código</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr class="border-t">
                <td class="p-2">{{ $produto->nome }}</td>
                <td class="p-2">{{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td class="p-2">{{ $produto->estoque }}</td>
                <td class="p-2">{{ $produto->categoria }}</td>
                <td class="p-2">{{ $produto->codigo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
