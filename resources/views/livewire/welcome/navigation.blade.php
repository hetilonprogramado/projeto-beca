<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

<style>

/* --- TOPO --- */
.topbar {
    width: 100%;
    height: 60px;
    background: #5d1d2a; /* cor igual à imagem */
    display: flex;
    align-items: center;
    padding: 0 20px;
    justify-content: space-between;
    border-bottom: 4px solid #7a1e42; /* faixa rosa escuro igual */
}

.menu-btn {
    background: #2b0b0b; /* quadrado escuro */
    border: none;
    color: white;
    font-size: 24px;
    width: 50px;
    height: 50px;
    border-radius: 3px;
    cursor: pointer;
}

.user-info {
    color: #f7dade;
    font-weight: bold;
    font-size: 18px;
    margin-right: 20px;
}

body {
    margin: 0;
    background: #3a0d12; /* cor do fundo da imagem */
    font-family: Arial, sans-serif;
}

</style>

</head>
<body>

<!-- BARRA SUPERIOR -->
<div class="topbar">
    <button class="menu-btn">☰</button>
    <span class="user-info">Usuário: Adm</span>
</div>

</body>
</html>