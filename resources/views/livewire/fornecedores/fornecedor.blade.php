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
        <input name="supplier_name" wire:model="nome" required placeholder="Nome do fornecedor" class="campo">
        <input name="supplier_cnpj" wire:model="cnpj" required placeholder="CNPJ" class="campo">
        <input name="supplier_phone" wire:model="phone" required placeholder="Telefone" class="campo">
        <input name="supplier_email" wire:model="email" required placeholder="Email" class="campo">
        <input name="supplier_contact" wire:model="contato" required placeholder="Contato" class="campo">
        <input name="supplier_address" wire:model="address" required placeholder="Endereço" class="campo">
        <div class="mt-2 flex gap-2">
            <button class="bg-green-500 text-white px-3 py-1 rounded" type="submit" wire:click.prevent="salvar" wire:target="salvar" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="salvar">Salvar</span>
                <i class="fas fa-spinner fa-spin mr-2" wire:loading wire:target="salvar"></i>
                <span wire:loading wire:target="salvar">Salvando...</span>
            </button>
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
            @foreach ($fornecedores as $fornecedor)
                <tr class="border-t">
                    <td class="p-2">{{ $fornecedor->nome }}</td>
                    <td class="p-2">{{ $fornecedor->cnpj }}</td>
                    <td class="p-2">{{ $fornecedor->phone }}</td>
                    <td class="p-2">{{ $fornecedor->email }}</td>
                    <td class="p-2">{{ $fornecedor->contato }}</td>
                    <td class="p-2">{{ $fornecedor->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
