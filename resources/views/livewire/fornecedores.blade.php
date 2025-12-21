<div style="max-width:1000px; margin:100px auto; background:#3f2a1c; color:#ffe1ba; padding:20px; border-radius:10px; border:2px solid #ffe1ba;">

    <!-- Header -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Fornecedores</h1>
        <button id="openSupplierCard" style="background:#3f2a1c; color:#ffe1ba; border:none; padding:10px 15px; border-radius:5px; cursor:pointer;">
            + Adicionar Fornecedor
        </button>
    </div>

    <!-- Contador -->
    <div id="supplierCounter" style="margin-top:20px; font-weight:bold;">
        Total de fornecedores: 0
    </div>

    <!-- Card -->
    <div id="supplierCard" style="display:none; background:#fff1d9; color:#3f2a1c; padding:20px; border-radius:10px; margin-top:20px;">
        <h3>Cadastrar Fornecedor</h3>

        <div class="form-grid">
            <input id="s_nome" placeholder="Nome do fornecedor" class="span-2">
            <input id="s_cnpj" placeholder="CNPJ">
            <input id="s_telefone" placeholder="Telefone">

            <input id="s_email" placeholder="Email" class="span-2">
            <input id="s_contato" placeholder="Contato responsável">

            <input id="s_endereco" placeholder="Endereço" class="span-4">
        </div>

        <div class="form-actions">
            <button class="btn btn-cancel" id="cancelSupplier">Cancelar</button>
            <button class="btn btn-save" id="saveSupplier">Salvar</button>
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
        <tbody id="supplierTableBody"></tbody>
    </table>

</div>
<script>
const openSupplierCard = document.getElementById('openSupplierCard');
const supplierCard = document.getElementById('supplierCard');
const cancelSupplier = document.getElementById('cancelSupplier');
const saveSupplier = document.getElementById('saveSupplier');
const supplierTableBody = document.getElementById('supplierTableBody');
const supplierCounter = document.getElementById('supplierCounter');

let suppliers = [];

openSupplierCard.onclick = () => supplierCard.style.display = 'block';

cancelSupplier.onclick = () => {
    supplierCard.style.display = 'none';
    clearSupplierFields();
};

saveSupplier.onclick = () => {
    const fornecedor = {
        nome: s_nome.value,
        cnpj: s_cnpj.value,
        telefone: s_telefone.value,
        email: s_email.value,
        contato: s_contato.value,
        endereco: s_endereco.value
    };

    if (!fornecedor.nome) {
        alert('Nome do fornecedor é obrigatório');
        return;
    }

    suppliers.push(fornecedor);
    renderSuppliers();
    clearSupplierFields();
    supplierCard.style.display = 'none';
};

function clearSupplierFields() {
    ['s_nome','s_cnpj','s_telefone','s_email','s_contato','s_endereco']
        .forEach(id => document.getElementById(id).value = '');
}

function renderSuppliers() {
    supplierTableBody.innerHTML = '';
    suppliers.forEach(s => {
        supplierTableBody.innerHTML += `
            <tr>
                <td style="border:1px solid #ffe1ba; padding:10px;">${s.nome}</td>
                <td style="border:1px solid #ffe1ba; padding:10px;">${s.cnpj}</td>
                <td style="border:1px solid #ffe1ba; padding:10px;">${s.telefone}</td>
                <td style="border:1px solid #ffe1ba; padding:10px;">${s.email}</td>
                <td style="border:1px solid #ffe1ba; padding:10px;">${s.contato}</td>
                <td style="border:1px solid #ffe1ba; padding:10px;">${s.endereco}</td>
            </tr>
        `;
    });

    supplierCounter.innerHTML = `Total de fornecedores: ${suppliers.length}`;
}
</script>
