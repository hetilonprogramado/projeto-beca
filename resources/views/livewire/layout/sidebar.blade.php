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
                <div class="sidebar-item" onclick="location.href='/inicio'">
                    Inicio
                </div>
                <div class="sidebar-item" onclick="location.href='/caixa'">
                    Caixa
                </div>
                <div class="sidebar-item" onclick="location.href='/clientes'">
                    Clientes
                </div>
            </div>
        </div>

        <!-- Área 2: Estoque e Produtos -->
        <div class="sidebar-section">
            <button class="section-btn">Estoque e Produtos ▾</button>
            <div class="section-items">
                <div class="sidebar-item" onclick="location.href='/produtos'">
                    Produtos
                </div>
                <div class="sidebar-item" onclick="location.href='/estoque'">
                    Estoque
                </div>
                <div class="sidebar-item" onclick="location.href='/fornecedores'">
                    Fornecedores
                </div>
            </div>
        </div>

        <!-- Área 3: Vendas e Funcionários -->
        <div class="sidebar-section">
            <button class="section-btn">Vendas & Funcionários ▾</button>
            <div class="section-items">
                <div class="sidebar-item" onclick="location.href='/vendas'">
                    Vendas
                </div>
                <div class="sidebar-item" onclick="location.href='/funcionarios'">
                    Funcionários
                </div>
                <div class="sidebar-item" onclick="location.href='/delivery'">
                    Delivery
                </div>
            </div>
        </div>

        <!-- Área 4: Biblioteca e Configurações -->
        <div class="sidebar-section">
            <button class="section-btn">Biblioteca & Configurações ▾</button>
            <div class="section-items">
                <div class="sidebar-item" onclick="location.href='/biblioteca'">
                    Biblioteca
                </div>
                <div class="sidebar-item" onclick="location.href='/configuracoes'">
                    Configurações
                </div>
            </div>
        </div>

    </div>



</body>
</html>