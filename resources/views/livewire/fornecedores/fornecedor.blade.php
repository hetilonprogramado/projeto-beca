<div style="background:#5f1123; color:#fff; padding:20px; border-radius:10px; margin-top:20px;">

    <!-- Header -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1 class="text-2xl font-bold mb-4">Fornecedores</h1>
        <button class="mb-4 bg-blue-500 text-white px-3 py-1 rounded">
            + Adicionar Fornecedor
        </button>
    </div>

    <!-- Contador -->
    <div id="supplierCounter" style="margin-top:20px; font-weight:bold;">
        Total de fornecedores: 0
    </div>

    <!-- Card de cadastro -->
    <div style="background:#5f1123; color:#fff; padding:20px; border-radius:10px; margin-top:20px;">
        <input name="supplier_name" placeholder="Nome do fornecedor" class="campo">
        <input name="supplier_cnpj" placeholder="CNPJ" class="campo">
        <input name="supplier_phone" placeholder="Telefone" class="campo">
        <input name="supplier_email" placeholder="Email" class="campo">
        <input name="supplier_contact" placeholder="Contato" class="campo">
        <input name="supplier_address" placeholder="Endereço" class="campo">
        <div class="mt-2 flex gap-2">
            <button class="bg-green-500 text-white px-3 py-1 rounded">Salvar</button>
            <button class="bg-gray-500 text-white px-3 py-1 rounded">Cancelar</button>
        </div>
    </div>

    <!-- Tabela -->
    <table style="width:100%; border-collapse:collapse; margin-top:20px;">
        <thead>
            <tr>
                <th style="border:1px solid #ffe1ba; padding:10px;">Nome</th>
                <th style="border:1px solid #ffe1ba; padding:10px;">CNPJ</th>
                <th style="border:1px solid #ffe1ba; padding:10px;">Telefone</th>
                <th style="border:1px solid #ffe1ba; padding:10px;">Email</th>
                <th style="border:1px solid #ffe1ba; padding:10px;">Contato</th>
                <th style="border:1px solid #ffe1ba; padding:10px;">Endereço</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aqui os fornecedores serão renderizados via backend -->
        </tbody>
    </table>

</div>
