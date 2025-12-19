<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Lateral</title>

<style>

/* ESTILOS GERAIS */
body {
    margin: 0;
    background: #2a0206;
    font-family: 'Poppins', sans-serif;
}

/* MENU LATERAL */
        .sidebar {
            width: 260px;
            background-color: #5f1123;
            height: 100vh;
            position: fixed;
            height: calc(100vh - 60px); 
            top: 60px; /* deixa o topo acima do sidebar */
            left: 0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .sidebar-section {
            margin-bottom: 20px; /* separa áreas */
        }

        .sidebar-item {
            background-color: #f7c4c3;
            padding: 10px 12px;
            margin: 5px 10px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
        }

        .sidebar-item img {
            width: 20px;
            height: 20px;
            object-fit: contain;
        }

        .sidebar-item:hover {
            background-color: #e9aaaa;
        }

        .sidebar-section {
        margin-bottom: 15px;
    }

    .section-btn {
        width: 100%;
        background: #5f1123;
        color: white;
        font-weight: bold;
        border: none;
        padding: 10px 15px;
        text-align: left;
        cursor: pointer;
        font-size: 14px;
        border-radius: 5px;
    }

    .section-btn:hover {
        background: #7c1a32;
    }

    .section-items {
        display: none;
        flex-direction: column;
        margin-top: 5px;
    }

    .sidebar-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px;
        margin: 3px 10px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        color: #5f1123;
        background-color: #f7c4c3;
    }

    .sidebar-item:hover {
        background-color: #e9aaaa;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.section-btn').forEach(btn => {
        btn.addEventListener('click', function () {

            const items = this.nextElementSibling;
            const isOpen = items.style.display === 'flex';

            // Abre ou fecha o clicado
            items.style.display = isOpen ? 'none' : 'flex';
        });
    });

});
</script>


</head>
<body>

<!-- MENU LATERAL -->
    <div class="sidebar">
        
        <!-- Área 1: Operações principais -->
        <div class="sidebar-section">
            <button class="section-btn">Operações Principais ▾</button>
            <div class="section-items">
                <div class="sidebar-item" onclick="location.href='{{ url("/inicio") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9v9a3 3 0 01-3 3h-12a3 3 0 01-3-3v-9z"/>
                    </svg>
                    Inicio
                </div>
                <div class="sidebar-item" onclick="location.href='{{ url("/caixa") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="7" width="18" height="13" rx="2"/>
                        <path d="M16 3h-8v4h8V3z"/>
                    </svg>
                    Caixa
                </div>
                <div class="sidebar-item" onclick="location.href='{{ url("/clientes") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="7" r="4"/>
                        <path d="M5.5 21a6.5 6.5 0 0113 0"/>
                    </svg>
                    Clientes
                </div>
            </div>
        </div>

        <!-- Área 2: Estoque e Produtos -->
        <div class="sidebar-section">
            <button class="section-btn">Estoque e Produtos ▾</button>
            <div class="section-items">
                <div class="sidebar-item" onclick="location.href='{{ url("/produtos") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 9l9-6 9 6v12H3V9z"/>
                        <path d="M9 21V9"/>
                        <path d="M15 21V9"/>
                    </svg>
                    Produtos
                </div>
                <div class="sidebar-item" onclick="location.href='{{ url("/estoque") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <path d="M3 9h18"/>
                        <path d="M9 3v18"/>
                    </svg>
                    Estoque
                </div>
                <div class="sidebar-item" onclick="location.href='{{ url("/fornecedores") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 3h18v18H3V3z"/>
                        <path d="M3 9h18"/>
                    </svg>
                    Fornecedores
                </div>
            </div>
        </div>

        <!-- Área 3: Vendas e Funcionários -->
        <div class="sidebar-section">
            <button class="section-btn">Vendas & Funcionários ▾</button>
            <div class="section-items">
                <div class="sidebar-item" onclick="location.href='{{ url("/vendas") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="9" cy="21" r="1"/>
                        <circle cx="20" cy="21" r="1"/>
                        <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/>
                    </svg>
                    Vendas
                </div>
                <div class="sidebar-item" onclick="location.href='{{ url("/funcionarios") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="7" r="4"/>
                        <path d="M5.5 21a6.5 6.5 0 0113 0"/>
                    </svg>
                    Funcionários
                </div>
                <div class="sidebar-item" onclick="location.href='{{ url("/delivery") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 3h18v12H3z"/>
                        <path d="M7 15h10v6H7z"/>
                    </svg>
                    Delivery
                </div>
            </div>
        </div>

        <!-- Área 4: Biblioteca e Configurações -->
        <div class="sidebar-section">
            <button class="section-btn">Biblioteca & Configurações ▾</button>
            <div class="section-items">
                <div class="sidebar-item" onclick="location.href='{{ url("/biblioteca") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 016.5 17H20"/>
                        <path d="M4 4.5A2.5 2.5 0 016.5 7H20"/>
                        <path d="M4 4v16"/>
                    </svg>
                    Biblioteca
                </div>
                <div class="sidebar-item" onclick="location.href='{{ url("/configuracoes") }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09a1.65 1.65 0 00-1-1.51 1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 110-4h.09a1.65 1.65 0 001.51-1 1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 114 0v.09a1.65 1.65 0 001 1.51h.09a1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 110 4h-.09a1.65 1.65 0 00-1.51 1z"/>
                    </svg>
                    Configurações
                </div>
            </div>
        </div>

    </div>

</body>
</html>