<div>
    <h1 class="text-2xl font-bold mb-4">Produtos</h1>
    <button class="mb-4 bg-blue-500 text-white px-3 py-1 rounded">
        + Adicionar Produto
    </button>

    <!-- Card de cadastro -->
    <div style="background:#5f1123; color:#fff; padding:20px; border-radius:10px; margin-top:20px;">
        <input name="produto_nome" placeholder="Nome do produto" class="campo">
        <input name="produto_preco" type="number" placeholder="Preço" class="campo">
        <input name="produto_estoque" type="number" placeholder="Estoque" class="campo">
        <input name="produto_categoria" placeholder="Categoria" class="campo">
        <input name="produto_codigo" placeholder="Código" class="campo">
        <div class="mt-2 flex gap-2">
            <button class="bg-green-500 text-white px-3 py-1 rounded">Salvar</button>
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
            <!-- Aqui os produtos serão renderizados via backend -->
        </tbody>
    </table>
</div>
