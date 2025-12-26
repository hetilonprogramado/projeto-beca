<div style="max-width:1000px; margin:100px auto; background:#3f111c; color:#ffbeba; padding:20px; border-radius:10px; border:2px solid #ffbeba;">

    <!-- Header -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Clientes</h1>
        <button id="openCard" style="background:#3f111c; color:#ffbeba; border:none; padding:10px 15px; border-radius:5px; cursor:pointer;">
            + Adicionar Cliente
        </button>
    </div>

    <!-- Contador -->
    <div id="clientCounter" style="margin-top:20px; font-weight:bold;">
        Total de clientes: 0
    </div>

    <!-- Estilos do card -->
    <style>
    /* CARD */
    #clientCard {
        display: none;
        background: #ffc5c0;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
        max-width: 100%;
    }


    /* GRID DO FORM */
    .form-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 12px;
        margin-top: 15px;
    }

    /* INPUT PADRÃO */
    .form-grid input {
        padding: 10px;
        border-radius: 6px;
        border: none;
        background: #fff;
        color: #3f111c;
        font-size: 14px;
    }

    /* CAMPOS GRANDES */
    .form-grid .span-2 {
        grid-column: span 2;
    }
    .form-grid .span-4 {
        grid-column: span 4;
    }

    /* PLACEHOLDER */
    .form-grid input::placeholder {
        color: #999;
    }

    /* BOTÕES */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 15px;
    }

    .btn {
        padding: 8px 14px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-cancel {
        background: transparent;
        color: #3f111c;
    }

    .btn-save {
        background: #3f111c;
        color: #ffbeba;
    }

    /* RESPONSIVO */
    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        .form-grid .span-2,
        .form-grid .span-4 {
            grid-column: span 1;
        }
    }
    </style>


    <!-- Card de cadastro -->
    <div id="clientCard">
        <h3>Cadastrar Cliente</h3>

        <div class="form-grid">
            <input wire:model="nome" required id="nome" placeholder="Nome" class="span-2">
            <input wire:model="telefone" required id="telefone" placeholder="Telefone">
            <input wire:model="email" required id="email" placeholder="Email">

            <input wire:model="endereco" required id="endereco" placeholder="Endereço" class="span-4">

            <input wire:model="data_nasc" required id="nascimento" type="date">
            <input id="prospeccao" type="date">
        </div>

        <div class="form-actions">
            <button wire:click.prevent="salvar" wire:target="salvar" class="btn btn-cancel" id="cancelCard">Cancelar</button>
            <button class="btn btn-save" id="saveClient">Salvar</button>
        </div>
    </div>


    <!-- Tabela -->
    <table style="width:100%; border-collapse:collapse; margin-top:20px;">
        <thead>
            <tr>
                <th style="border:1px solid #ffbeba; padding:10px;">Nome</th>
                <th style="border:1px solid #ffbeba; padding:10px;">Telefone</th>
                <th style="border:1px solid #ffbeba; padding:10px;">Email</th>
                <th style="border:1px solid #ffbeba; padding:10px;">Endereço</th>
                <th style="border:1px solid #ffbeba; padding:10px;">Nascimento</th>
                <th style="border:1px solid #ffbeba; padding:10px;">Prospecção</th>
            </tr>
        </thead>
        <tbody id="clientTableBody"></tbody>
    </table>

</div>

<script>
const openCardBtn = document.getElementById('openCard');
const clientCard = document.getElementById('clientCard');
const cancelCardBtn = document.getElementById('cancelCard');
const saveClientBtn = document.getElementById('saveClient');
const clientTableBody = document.getElementById('clientTableBody');
const clientCounter = document.getElementById('clientCounter');

let clients = [];

openCardBtn.onclick = () => clientCard.style.display = 'block';

cancelCardBtn.onclick = () => {
    clientCard.style.display = 'none';
    clearFields();
};

saveClientBtn.onclick = () => {
    const cliente = {
        nome: nome.value,
        telefone: telefone.value,
        email: email.value,
        endereco: endereco.value,
        nascimento: nascimento.value,
        prospeccao: prospeccao.value
    };

    if (!cliente.nome) {
        alert('Nome é obrigatório');
        return;
    }

    clients.push(cliente);
    renderTable();
    clearFields();
    clientCard.style.display = 'none';
};

function clearFields() {
    ['nome','telefone','email','endereco','nascimento','prospeccao']
        .forEach(id => document.getElementById(id).value = '');
}

function renderTable() {
    clientTableBody.innerHTML = '';
    clients.forEach(c => {
        clientTableBody.innerHTML += `
            <tr>
                <td style="border:1px solid #ffbeba; padding:10px;">${c.nome}</td>
                <td style="border:1px solid #ffbeba; padding:10px;">${c.telefone}</td>
                <td style="border:1px solid #ffbeba; padding:10px;">${c.email}</td>
                <td style="border:1px solid #ffbeba; padding:10px;">${c.endereco}</td>
                <td style="border:1px solid #ffbeba; padding:10px;">${c.nascimento}</td>
                <td style="border:1px solid #ffbeba; padding:10px;">${c.prospeccao}</td>
            </tr>
        `;
    });

    clientCounter.textContent = `Total de clientes: ${clients.length}`;
}
</script>
