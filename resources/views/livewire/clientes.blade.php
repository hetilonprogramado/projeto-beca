<div style="max-width:1000px; margin:100px auto; background:#3f111c; color:#ffbeba; padding:20px; border-radius:10px; border:2px solid #ffbeba;">

    <!-- Header -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Clientes</h1>
        <button id="openCard" style="background:#3f111c; color:#ffbeba; border:none; padding:10px 15px; border-radius:5px; cursor:pointer;">+ Adicionar Cliente</button>
    </div>

    <!-- Contador -->
    <div id="clientCounter" style="margin-top:20px; font-weight:bold;">Total de clientes: 0</div>

    <!-- Card de cadastro -->
    <style>
    /* placeholder escuro */
    #clientCard input::placeholder,
    #clientCard select::placeholder {
        color: #3f111c; /* placeholder escuro */
    }

    /* foco do input */
    #clientCard input:focus,
    #clientCard select:focus {
        outline: 2px solid #3f111c;
    }
    </style>

    <div id="clientCard" style="display:none; background:#ffbeba; color:#3f111c; padding:20px; border-radius:8px; margin-top:20px;">
        <h3>Cadastrar Cliente</h3>
        <input type="text" id="nome" placeholder="Nome" style="width:100%; padding:8px; margin-bottom:10px; border-radius:4px; border:1px solid #3f111c; background:#ffbeba; color:#3f111c;">
        <input type="tel" id="telefone" placeholder="Telefone" style="width:100%; padding:8px; margin-bottom:10px; border-radius:4px; border:1px solid #3f111c; background:#ffbeba; color:#3f111c;">
        <input type="email" id="email" placeholder="Email" style="width:100%; padding:8px; margin-bottom:10px; border-radius:4px; border:1px solid #3f111c; background:#ffbeba; color:#3f111c;">
        <input type="text" id="endereco" placeholder="Endereço" style="width:100%; padding:8px; margin-bottom:10px; border-radius:4px; border:1px solid #3f111c; background:#ffbeba; color:#3f111c;">
        <input type="date" id="nascimento" placeholder="Data de Nascimento" style="width:100%; padding:8px; margin-bottom:10px; border-radius:4px; border:1px solid #3f111c; background:#ffbeba; color:#3f111c;">
        <input type="date" id="prospeccao" placeholder="Data de Cadastro" style="width:100%; padding:8px; margin-bottom:10px; border-radius:4px; border:1px solid #3f111c; background:#ffbeba; color:#3f111c;">
        <div style="display:flex; justify-content:flex-end; gap:10px;">
            <button id="cancelCard" style="background:#3f111c; color:#ffbeba; padding:8px 12px; border:none; border-radius:5px; cursor:pointer;">Cancelar</button>
            <button id="saveClient" style="background:#3f111c; color:#ffbeba; padding:8px 12px; border:none; border-radius:5px; cursor:pointer;">Salvar</button>
        </div>
    </div>



    <!-- Tabela de clientes -->
    <table style="width:100%; border-collapse:collapse; margin-top:15px;">
        <thead>
            <tr>
                <th style="border:1px solid #ffbeba; background:#3f111c; color:#ffbeba; padding:10px;">Nome</th>
                <th style="border:1px solid #ffbeba; background:#3f111c; color:#ffbeba; padding:10px;">Telefone</th>
                <th style="border:1px solid #ffbeba; background:#3f111c; color:#ffbeba; padding:10px;">Email</th>
                <th style="border:1px solid #ffbeba; background:#3f111c; color:#ffbeba; padding:10px;">Endereço</th>
                <th style="border:1px solid #ffbeba; background:#3f111c; color:#ffbeba; padding:10px;">Data de Nascimento</th>
                <th style="border:1px solid #ffbeba; background:#3f111c; color:#ffbeba; padding:10px;">Data de Cadastro</th>
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

openCardBtn.addEventListener('click', () => clientCard.style.display = 'block');
cancelCardBtn.addEventListener('click', () => { clientCard.style.display = 'none'; clearCardFields(); });

saveClientBtn.addEventListener('click', () => {
    const cliente = {
        nome: document.getElementById('nome').value,
        telefone: document.getElementById('telefone').value,
        email: document.getElementById('email').value,
        endereco: document.getElementById('endereco').value,
        nascimento: document.getElementById('nascimento').value,
        prospeccao: document.getElementById('prospeccao').value
    };
    if(cliente.nome) {
        clients.push(cliente);
        renderTable();
        clientCard.style.display = 'none';
        clearCardFields();
    } else {
        alert('Preencha pelo menos o nome do cliente.');
    }
});

function clearCardFields() {
    ['nome','telefone','email','endereco','nascimento','prospeccao'].forEach(id => document.getElementById(id).value='');
}

function renderTable() {
    clientTableBody.innerHTML = '';
    clients.forEach(c => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td style="border:1px solid #ffbeba; background:#ffbeba; color:#3f111c; padding:10px;">${c.nome}</td>
            <td style="border:1px solid #ffbeba; background:#ffbeba; color:#3f111c; padding:10px;">${c.telefone}</td>
            <td style="border:1px solid #ffbeba; background:#ffbeba; color:#3f111c; padding:10px;">${c.email}</td>
            <td style="border:1px solid #ffbeba; background:#ffbeba; color:#3f111c; padding:10px;">${c.endereco}</td>
            <td style="border:1px solid #ffbeba; background:#ffbeba; color:#3f111c; padding:10px;">${c.nascimento}</td>
            <td style="border:1px solid #ffbeba; background:#ffbeba; color:#3f111c; padding:10px;">${c.prospeccao}</td>
        `;
        clientTableBody.appendChild(tr);
    });
    clientCounter.textContent = 'Total de clientes: ' + clients.length;
}
</script>
