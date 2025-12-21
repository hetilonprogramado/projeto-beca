<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bolos & Beca - Sistema</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #f5f5f5;
    color: #fff;
}

/* TOPO */
.topbar {
    position: fixed;
    top:0; left:0;
    width:100%;
    height:60px;
    background:#5f1123;
    color:white;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 20px;
    z-index:100;
}
.top-left { display:flex; align-items:center; gap:10px; }
.menu-btn { width:24px; cursor:pointer; }
.top-logo {
    width:50px; height:50px;
    border-radius:50%;
    border:3px solid white;
}

/* SIDEBAR */
.sidebar {
    width:260px;
    background:#5f1123;
    height:calc(100vh - 60px);
    position:fixed;
    top:60px;
    left:0;
    padding-top:20px;
    overflow-y:auto;
}
.section-btn {
    width:100%;
    background:#5f1123;
    color:white;
    font-weight:bold;
    border:none;
    padding:10px 15px;
    text-align:left;
    cursor:pointer;
}
.section-btn:hover { background:#7c1a32; }
.section-items {
    display:none;
    flex-direction:column;
}
.sidebar-item {
    display:flex;
    gap:10px;
    padding:8px 12px;
    margin:3px 10px;
    border-radius:6px;
    cursor:pointer;
    font-weight:bold;
    color:#5f1123;
    background:#f7c4c3;
}
.sidebar-item:hover { background:#e9aaaa; }

/* CONTEÚDO */
.content {
    margin-left:260px;
    margin-top:60px;
    padding:20px;
}

/* SOCIAL */
.social-bar {
    width:200px;
    background:#f7c4c3;
    position:fixed;
    top:60px;
    right:0;
    height:calc(100vh - 60px);
    padding:15px;
}
.social-btn {
    background:#5f1123;
    color:white;
    padding:10px;
    margin:8px 0;
    border-radius:5px;
    cursor:pointer;
}
.social-btn:hover { background:#7c1a32; }

.content {
    background: #3f111c;
    margin-left: 260px;
    margin-top: 60px;
    margin-right: 200px; /* espaço da social-bar */
    padding: 20px;
    height: calc(100vh - 60px);
    overflow: hidden; /* trava o vazamento */
}

.content-inner {
    background: #3f111c;
    border-radius: 12px;
    padding: 20px;
    height: 100%;
    overflow-y: auto; /* scroll só aqui */
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
}
.toast-message {
    animation: message-enter 0.5s ease forwards, message-exit 0.5s ease 3s forwards;
}
.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    margin-bottom: 15px;
}

.form-grid input {
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #3f111c;
    background: #ffbeba;
    color: #3f111c;
}

.form-grid input::placeholder {
    color: #3f111c;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}
@keyframes message-enter {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
.campo {
    width: 100%;
    padding: 10px;
    margin-bottom: 12px;
    border-radius: 6px;
    border: 1px solid #3f111c;
    background: #ffbeba;
    color: #3f111c;
}
.campo::placeholder {
    color: #3f111c;
}
@keyframes message-exit {
    0% {
        opacity: 1;
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        transform: translateY(-20px);
    }
}
</style>
</head>

<body>

<!-- TOPO -->
<div class="topbar">
    <div class="top-left">
        <i class="fas fa-bars menu-btn"></i>
        <img src="imgs/logo.png" class="top-logo">
    </div>
    <div>Usuário: Adm</div>
</div>

<!-- SIDEBAR -->
<div class="sidebar">

    <!-- OPERAÇÕES -->
    <div class="sidebar-section">
        <button class="section-btn">Operações ▾</button>
        <div class="section-items">
            <div class="sidebar-item" onclick="loadDashboard()">
                <i class="fas fa-house"></i> Início
            </div>
            <div class="sidebar-item" onclick="loadClients()">
                <i class="fas fa-users"></i> Clientes
            </div>
            <div class="sidebar-item" onclick="loadCaixa()">
                <i class="fas fa-cash-register"></i> Caixa
            </div>
        </div>
    </div>

    <!-- ESTOQUE -->
    <div class="sidebar-section">
        <button class="section-btn">Estoque & Produtos ▾</button>
        <div class="section-items">
            <div class="sidebar-item" onclick="loadProdutos()">
                <i class="fas fa-box"></i> Produtos
            </div>
            <div class="sidebar-item" onclick="loadEstoque()">
                <i class="fas fa-warehouse"></i> Estoque
            </div>
            <div class="sidebar-item" onclick="loadFornecedores()">
                <i class="fas fa-truck"></i> Fornecedores
            </div>
        </div>
    </div>

    <!-- VENDAS -->
    <div class="sidebar-section">
        <button class="section-btn">Vendas & Equipe ▾</button>
        <div class="section-items">
            <div class="sidebar-item" onclick="loadVendas()">
                <i class="fas fa-chart-line"></i> Vendas
            </div>
            <div class="sidebar-item" onclick="loadFuncionarios()">
                <i class="fas fa-id-badge"></i> Funcionários
            </div>
            <div class="sidebar-item" onclick="loadDelivery()">
                <i class="fas fa-motorcycle"></i> Delivery
            </div>
        </div>
    </div>

    <!-- CONFIG -->
    <div class="sidebar-section">
        <button class="section-btn">Configurações ▾</button>
        <div class="section-items">
            <div class="sidebar-item" onclick="loadBiblioteca()">
                <i class="fas fa-book"></i> Biblioteca
            </div>
            <div class="sidebar-item" onclick="loadConfiguracoes()">
                <i class="fas fa-gear"></i> Configurações
            </div>
        </div>
    </div>

</div>


<!-- CONTEÚDO -->
<div class="content">
    <div class="content-inner" id="mainContent"></div>
</div>



<!-- SOCIAL -->
<div class="social-bar">
    <h4 class="font-bold">Redes sociais</h4>
    <div class="social-btn">Instagram</div>
    <div class="social-btn">Whatsapp</div>
    <div class="social-btn">Facebook</div>
</div>
<script>
function renderPage(title, content){
    mainContent.innerHTML = `
        <h1 class="text-2xl font-bold mb-4">${title}</h1>
        <div>${content}</div>
    `;
}
</script>

<script>
/* SIDEBAR */
document.querySelectorAll('.section-btn').forEach(btn=>{
    btn.onclick = () => {
        const items = btn.nextElementSibling;
        items.style.display = items.style.display === 'flex' ? 'none' : 'flex';
    }
});

/* CONTROLLER CENTRAL */
function renderPage(title, content){
    mainContent.innerHTML = `
        <h1 class="text-2xl font-bold mb-4">${title}</h1>
        <div>${content}</div>
    `;
}

/* DASHBOARD */
function loadDashboard(){
    renderPage(
        'Dashboard',
        `<p>Visão geral do sistema Bolos & Beca.</p>`
    );
}

/* CLIENTES */
let clients = [];

function loadClients(){
    mainContent.innerHTML = `
    <div style="max-width:1000px; margin:auto;">

        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h1 class="text-2xl font-bold">Clientes</h1>
            <button onclick="openCard()" class="social-btn">+ Adicionar</button>
        </div>

        <p class="mt-2">Total de clientes: <b>${clients.length}</b></p>

        <div id="clientCard" style="display:none; background:#ffbeba; color:#3f111c; padding:20px; border-radius:8px; margin-top:20px;">
            <h3 class="font-bold mb-3">Cadastrar Cliente</h3>

            <div class="form-grid">
                <input id="nome" placeholder="Nome">
                <input id="telefone" placeholder="Telefone">
                <input id="email" placeholder="Email">
                <input id="endereco" placeholder="Endereço">
                <input id="nascimento" type="date">
                <input id="prospeccao" type="date">
            </div>

            <div class="form-actions">
                <button onclick="closeCard()" class="social-btn">Cancelar</button>
                <button onclick="saveClient()" class="social-btn">Salvar</button>
            </div>
        </div>

        <table style="width:100%; margin-top:20px; border-collapse:collapse;">
            <thead>
                <tr>
                    ${['Nome','Telefone','Email','Endereço','Nascimento','Prospecção']
                        .map(t=>`<th style="border:1px solid #ffbeba; padding:10px;">${t}</th>`).join('')}
                </tr>
            </thead>
            <tbody id="clientTableBody"></tbody>
        </table>

    </div>
    `;

    renderClients();
}

/* OUTRAS PÁGINAS */
function loadDashboard(){
    renderPage('Dashboard', 'Visão geral do sistema Bolos & Beca.');
}

function loadCaixa(){
    renderPage('Caixa', 'Controle de entradas e saídas.');
}

/* PRODUTOS */
let products = [];

function loadProdutos(){
    mainContent.innerHTML = `
    <div style="max-width:1000px; margin:auto;">

        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h1 class="text-2xl font-bold">Produtos</h1>
            <button onclick="openProductCard()" class="social-btn">+ Adicionar</button>
        </div>

        <p class="mt-2">Total de produtos: <b>${products.length}</b></p>

        <div id="productCard" style="display:none; background:#ffbeba; color:#3f111c; padding:20px; border-radius:8px; margin-top:20px;">
            <h3 class="font-bold mb-3">Cadastrar Produto</h3>

            <div class="form-grid">
                <input id="p_nome" placeholder="Nome do produto">
                <input id="p_preco" type="number" placeholder="Preço">
                <input id="p_estoque" type="number" placeholder="Estoque">
                <input id="p_categoria" placeholder="Categoria">
                <input id="p_codigo" placeholder="Código">
            </div>

            <div class="form-actions">
                <button onclick="closeProductCard()" class="social-btn">Cancelar</button>
                <button onclick="saveProduct()" class="social-btn">Salvar</button>
            </div>
        </div>

        <table style="width:100%; margin-top:20px; border-collapse:collapse;">
            <thead>
                <tr>
                    ${['Nome','Preço','Estoque','Categoria','Código']
                        .map(t=>`<th style="border:1px solid #cbe0ff; padding:10px;">${t}</th>`).join('')}
                </tr>
            </thead>
            <tbody id="productTableBody"></tbody>
        </table>

    </div>
    `;

    renderProducts();
}
/* ESTOQUE */
let produtos = [
  { codigo: '789123', nome: 'Bolo Chocolate', estoque: 10 },
  { codigo: '789456', nome: 'Bolo Morango', estoque: 5 }
];

let movimentos = [];

function loadEstoque(){
    renderPage('Estoque', `
        <div style="max-width:1000px; margin:auto;">

            <h2 class="text-2xl font-bold">Controle de Estoque</h2>

            <div style="background:#ffbeba; color:#3f111c; padding:20px; border-radius:10px; margin-top:20px;">
                <h3>Registrar Movimento</h3>

                <div class="form-grid">
                    <input id="m_codigo" placeholder="Código de barras">
                    
                    <select id="m_tipo">
                        <option value="">Tipo</option>
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saída</option>
                    </select>

                    <input id="m_quantidade" type="number" placeholder="Quantidade">
                </div>

                <div class="form-actions">
                    <button onclick="registrarMovimento()" class="btn btn-save">
                        Registrar Movimento
                    </button>
                </div>
            </div>

            <table style="width:100%; border-collapse:collapse; margin-top:20px;">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Tipo</th>
                        <th>Qtd</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody id="movimentoTableBody"></tbody>
            </table>

        </div>
    `);

    renderMovimentos();
}

/* FORNECEDORES */

let suppliers = [];

function loadFornecedores(){
    mainContent.innerHTML = `
    <div style="max-width:1000px; margin:auto;">

        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h1 class="text-2xl font-bold">Fornecedores</h1>
            <button onclick="openSupplierCard()" class="social-btn">
                + Adicionar Fornecedor
            </button>
        </div>

        <p class="mt-2">
            Total de fornecedores: <b>${suppliers.length}</b>
        </p>

        <div id="supplierCard" style="display:none; background:#fff1d9; color:#3f2a1c; padding:20px; border-radius:8px; margin-top:20px;">
            <h3 class="font-bold mb-3">Cadastrar Fornecedor</h3>

            <div class="form-grid">
                <input id="s_nome" placeholder="Nome do fornecedor">
                <input id="s_cnpj" placeholder="CNPJ">
                <input id="s_telefone" placeholder="Telefone">
                <input id="s_email" placeholder="Email">
                <input id="s_contato" placeholder="Contato responsável">
                <input id="s_endereco" placeholder="Endereço">
            </div>

            <div class="form-actions">
                <button onclick="closeSupplierCard()" class="social-btn">Cancelar</button>
                <button onclick="saveSupplier()" class="social-btn">Salvar</button>
            </div>
        </div>

        <table style="width:100%; margin-top:20px; border-collapse:collapse;">
            <thead>
                <tr>
                    ${['Nome','CNPJ','Telefone','Email','Contato','Endereço']
                        .map(t=>`<th style="border:1px solid #ffe1ba; padding:10px;">${t}</th>`)
                        .join('')}
                </tr>
            </thead>
            <tbody id="supplierTableBody"></tbody>
        </table>

    </div>
    `;

    renderSuppliers();
}

function loadVendas(){
    renderPage('Vendas', 'Relatórios e histórico de vendas.');
}

/* FUNCIONÁRIOS */

let employees = [];

function loadFuncionarios(){
    mainContent.innerHTML = `
    <div style="max-width:1000px; margin:auto;">

        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h1 class="text-2xl font-bold">Funcionários</h1>
            <button onclick="openEmployeeCard()" class="social-btn">
                + Adicionar Funcionário
            </button>
        </div>

        <p class="mt-2">
            Total de funcionários: <b>${employees.length}</b>
        </p>

        <div id="employeeCard" style="display:none; background:#ffbeba; color:#3f111c; padding:20px; border-radius:8px; margin-top:20px;">
            <h3 class="font-bold mb-3">Cadastrar Funcionário</h3>

            <div class="form-grid">
                <input id="f_nome" placeholder="Nome">
                <input id="f_cargo" placeholder="Cargo">
                <input id="f_telefone" placeholder="Telefone">
                <input id="f_email" placeholder="Email">
                <input id="f_salario" type="number" placeholder="Salário">
                <input id="f_admissao" type="date">
            </div>

            <div class="form-actions">
                <button onclick="closeEmployeeCard()" class="social-btn">Cancelar</button>
                <button onclick="saveEmployee()" class="social-btn">Salvar</button>
            </div>
        </div>

        <table style="width:100%; margin-top:20px; border-collapse:collapse;">
            <thead>
                <tr>
                    ${['Nome','Cargo','Telefone','Email','Salário','Admissão']
                        .map(t=>`<th style="border:1px solid #baffd9; padding:10px;">${t}</th>`)
                        .join('')}
                </tr>
            </thead>
            <tbody id="employeeTableBody"></tbody>
        </table>

    </div>
    `;

    renderEmployees();
}

function loadDelivery(){
    renderPage('Delivery', 'Pedidos e entregas.');
}

function loadBiblioteca(){
    renderPage('Biblioteca', 'Arquivos e documentos.');
}

function loadConfiguracoes(){
    renderPage('Configurações', 'Preferências do sistema.');
}

/* CLIENTES CRUD */
function openCard(){
    clientCard.style.display = 'block';
}

function closeCard(){
    clientCard.style.display = 'none';
}

function saveClient(){
    if(!nome.value) return alert('Nome obrigatório');

    clients.push({
        nome: nome.value,
        telefone: telefone.value,
        email: email.value,
        endereco: endereco.value,
        nascimento: nascimento.value,
        prospeccao: prospeccao.value
    });

    loadClients();
}

function renderClients(){ 
    const tbody = document.getElementById('clientTableBody');
    if(!tbody) return;

    tbody.innerHTML = clients.map(c=>`
        <tr>
            <td>${c.nome}</td>
            <td>${c.telefone}</td>
            <td>${c.email}</td>
            <td>${c.endereco}</td>
            <td>${c.nascimento}</td>
            <td>${c.prospeccao}</td>
        </tr>
    `).join('');
}

/* PRODUTOS CRUD */
function openProductCard(){
    productCard.style.display = 'block';
}

function closeProductCard(){
    productCard.style.display = 'none';
}
function saveProduct(){
    if(!p_nome.value) return alert('Nome do produto obrigatório');

    products.push({
        nome: p_nome.value,
        preco: p_preco.value,
        estoque: p_estoque.value,
        categoria: p_categoria.value,
        codigo: p_codigo.value
    });

    loadProdutos();
}
function renderProducts(){ 
    const tbody = document.getElementById('productTableBody');
    if(!tbody) return;

    tbody.innerHTML = products.map(p=>`
        <tr>
            <td>${p.nome}</td>
            <td>R$ ${p.preco}</td>
            <td>${p.estoque}</td>
            <td>${p.categoria}</td>
            <td>${p.codigo}</td>
        </tr>
    `).join('');
}

/* FUNCIONARIOS CRUD */
function openEmployeeCard(){
    employeeCard.style.display = 'block';
}  
function closeEmployeeCard(){
    employeeCard.style.display = 'none';
}
function saveEmployee(){
    if(!f_nome.value || !f_cargo.value) 
        return alert('Nome e cargo são obrigatórios');
    employees.push({
        nome: f_nome.value,
        cargo: f_cargo.value,
        telefone: f_telefone.value,
        email: f_email.value,
        salario: f_salario.value,
        admissao: f_admissao.value
    });
    loadFuncionarios();
}
function renderEmployees(){ 
    const tbody = document.getElementById('employeeTableBody');
    if(!tbody) return;
    tbody.innerHTML = employees.map(f=>`
        <tr>
            <td>${f.nome}</td>
            <td>${f.cargo}</td>
            <td>${f.telefone}</td>
            <td>${f.email}</td>
            <td>R$ ${f.salario}</td>
            <td>${f.admissao}</td>
        </tr>
    `).join('');
}

/* FORNECEDORES CRUD */
function openSupplierCard(){
    supplierCard.style.display = 'block';
}  
function closeSupplierCard(){
    supplierCard.style.display = 'none';
}
function saveSupplier(){
    if(!s_nome.value) 
        return alert('Nome do fornecedor é obrigatório');
    suppliers.push({
        nome: s_nome.value,
        cnpj: s_cnpj.value,
        telefone: s_telefone.value,
        email: s_email.value,
        contato: s_contato.value,
        endereco: s_endereco.value
    });
    loadFornecedores();
}
function renderSuppliers(){ 
    const tbody = document.getElementById('supplierTableBody');
    if(!tbody) return;
    tbody.innerHTML = suppliers.map(s=>`
        <tr>
            <td>${s.nome}</td>
            <td>${s.cnpj}</td>
            <td>${s.telefone}</td>
            <td>${s.email}</td>
            <td>${s.contato}</td>
            <td>${s.endereco}</td>
        </tr>
    `).join('');
}

/* ESTOQUE CRUD */
function registrarMovimento(){
    const codigo = m_codigo.value;
    const tipo = m_tipo.value;
    const quantidade = Number(m_quantidade.value);
    if(!codigo || !tipo || quantidade <= 0){
        alert('Preencha todos os campos corretamente');
        return;
    }
    const produto = produtos.find(p => p.codigo === codigo);
    if(!produto){
        alert('Produto não encontrado');
        return;
    }
    if(tipo === 'saida' && produto.estoque < quantidade){
        alert('Estoque insuficiente');
        return;
    }
    // Atualiza estoque
    if(tipo === 'entrada'){
        produto.estoque += quantidade;
    } else {
        produto.estoque -= quantidade;
    }
    movimentos.push({
        codigo,
        produto: produto.nome,
        tipo,
        quantidade,
        data: new Date().toLocaleString()   
    });
    renderMovimentos();
    limparCampos();
}
function renderMovimentos(){
    movimentoTableBody.innerHTML = '';
    movimentos.forEach(m => {
        movimentoTableBody.innerHTML += `
            <tr>
                <td>${m.codigo}</td>
                <td>${m.produto}</td>
                <td>${m.tipo}</td>
                <td>${m.quantidade}</td>
                <td>${m.data}</td>
            </tr>
        `;
    });
}
function limparCampos(){
    ['m_codigo','m_tipo','m_quantidade']
        .forEach(id => document.getElementById(id).value = '');
}
/* LOAD INICIAL */
loadDashboard();
</script>
</body>
</html>