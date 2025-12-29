<div>
    <h1 class="text-2xl font-bold mb-4">Clientes</h1>
    <button class="mb-4 bg-blue-500 text-white px-3 py-1 rounded">+ Adicionar Cliente</button>

    <div style="background:#5f1123; color:#fff; padding:20px; border-radius:10px; margin-top:20px;">
        <input placeholder="Nome" class="campo">
        <input placeholder="Telefone" class="campo">
        <input placeholder="Email" class="campo">
        <input placeholder="Endereço" class="campo">
        <input type="date" class="campo">
        <input type="date" class="campo">
        <button class="bg-green-500 text-white px-3 py-1 rounded mt-2">Salvar</button>
            <button class="bg-gray-500 text-white px-3 py-1 rounded">Cancelar</button>
    </div>

    <table class="w-full bg-white text-black rounded">
        <thead>
            <tr>
                <th class="p-2">Nome</th>
                <th class="p-2">Telefone</th>
                <th class="p-2">Email</th>
                <th class="p-2">Endereço</th>
                <th class="p-2">Nascimento</th>
                <th class="p-2">Prospecção</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <!-- Aqui os clientes serão renderizados via backend -->
            </tr>
        </tbody>
    </table>
</div>
