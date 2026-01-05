<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bolos & Beca - Sistema</title>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<!-- CSS do Projeto -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@livewireStyles
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
            <a href="{{ route('dashboard') }}" class="sidebar-item">
                <i class="fas fa-house"></i> Início
            </a>
            <a href="{{ route('clientes') }}" class="sidebar-item">
                <i class="fas fa-users"></i> Clientes
            </a>
            <a href="{{ route('caixa') }}" class="sidebar-item">
                <i class="fas fa-cash-register"></i> Caixa
            </a>
        </div>
    </div>

    <!-- ESTOQUE & PRODUTOS -->
    <div class="sidebar-section">
        <button class="section-btn">Estoque & Produtos ▾</button>
        <div class="section-items">
            <a href="{{ route('produtos') }}" class="sidebar-item">
                <i class="fas fa-box"></i> Produtos
            </a>
            <a href="{{ route('estoque') }}" class="sidebar-item">
                <i class="fas fa-warehouse"></i> Estoque
            </a>
            <a href="{{ route('fornecedores') }}" class="sidebar-item">
                <i class="fas fa-truck"></i> Fornecedores
            </a>
        </div>
    </div>

    <!-- VENDAS & EQUIPE -->
    <div class="sidebar-section">
        <button class="section-btn">Vendas & Equipe ▾</button>
        <div class="section-items">
            <a href="{{ route('vendas') }}" class="sidebar-item">
                <i class="fas fa-chart-line"></i> Vendas
            </a>
            <a href="{{ route('funcionarios') }}" class="sidebar-item">
                <i class="fas fa-id-badge"></i> Funcionários
            </a>
            <a href="{{ route('delivery') }}" class="sidebar-item">
                <i class="fas fa-motorcycle"></i> Delivery
            </a>
        </div>
    </div>

    <!-- CONFIGURAÇÕES -->
    <div class="sidebar-section">
        <button class="section-btn">Configurações ▾</button>
        <div class="section-items">
            <a href="{{ route('biblioteca') }}" class="sidebar-item">
                <i class="fas fa-book"></i> Biblioteca
            </a>
            <a href="{{ route('configuracoes') }}" class="sidebar-item">
                <i class="fas fa-gear"></i> Configurações
            </a>
        </div>
    </div>

</div>

<!-- CONTEÚDO -->
<div class="content">
    <div class="content-inner">
        {{ $slot }}
    </div>
</div>


<!-- SOCIAL -->
<div class="social-bar">
    <h4 class="font-bold">Redes sociais</h4>
    <div class="social-btn">Instagram</div>
    <div class="social-btn">Whatsapp</div>
    <div class="social-btn">Facebook</div>
</div>

@livewireScripts

<!-- JS -->
<script>
// Função para inicializar o estado do sidebar
function initSidebar() {
    document.querySelectorAll('.section-btn').forEach((btn, index) => {
        const items = btn.nextElementSibling;
        const state = localStorage.getItem('sidebar-section-' + index);
        if(state === 'open') items.classList.add('open');

        btn.onclick = () => {
            items.classList.toggle('open');
            localStorage.setItem('sidebar-section-' + index, items.classList.contains('open') ? 'open' : 'closed');
        };
    });
}

// Inicializa ao carregar
initSidebar();

// Toggle sidebar recolhimento e expand content
const menuBtn = document.querySelector('.menu-btn');
const sidebar = document.querySelector('.sidebar');
const content = document.querySelector('.content');

menuBtn.addEventListener('click', () => {
    sidebar.classList.toggle('hidden');
    content.classList.toggle('expanded');
});

// Reaplica o estado do sidebar após Livewire atualizar o DOM
document.addEventListener('livewire:load', () => {
    Livewire.hook('message.processed', (message, component) => {
        initSidebar();
    });
});
</script>

</body>
</html>
