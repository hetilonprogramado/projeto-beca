<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

<style>

    body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #3b0a18;
            color: #3b0a18;
            overflow: hidden;
        }

/* TOPO */
        .topbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: #5f1123;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
            z-index: 100;
        }

        .top-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .menu-btn {
            width: 24px;
            cursor: pointer;
        }

        .top-logo {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .search-box {
            width: 250px;
            background-color: #7c1a32;
            padding: 5px 10px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .search-box input {
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            color: white;
            font-size: 13px;
        }

        .top-right {
            font-size: 14px;
            white-space: nowrap;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
</style>

</head>
<body>

<!-- TOPO -->
    <div class="topbar">
        <div style="display:flex; align-items:center; gap:10px;">
            <!-- Ícone Menu -->
            <svg xmlns="http://www.w3.org/2000/svg" style="width:24px; height:24px; color:white; cursor:pointer;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>

            <!-- Logo no canto esquerdo -->
            <img src="{{ asset('imgs/logo.png') }}" style="
                width:50px; 
                height:50px; 
                object-fit:contain;
                border: 3px solid white; 
                border-radius:50px; 
                box-shadow: 0 0 15px white;
                position: relative;
                left: 30px; /* ajusta o quanto quiser para a esquerda */
            ">
        </div>

        <!-- Caixa de pesquisa levemente à esquerda -->
        <div class="search-box" style="
            height: 30px;
            width:400px; 
            background-color:#7c1a32; 
            padding:6px 12px; 
            border-radius:25px; 
            display:flex; 
            align-items:center; 
            gap:8px;
            margin:0 auto;
            position: relative;
            left: -330px; /* ajusta o quanto quiser para a esquerda */
        ">
            <svg xmlns="http://www.w3.org/2000/svg" style="width:18px; height:18px; color:white;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/>
            </svg>
            <input type="text" placeholder="Pesquisar..." style="width:100%; background:transparent; border:none; outline:none; color:white; font-size:14px;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width:18px; height:18px; color:white;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 1v11m0 0a4 4 0 004-4H8a4 4 0 004 4zm0 0v6m-4 4h8"/>
            </svg>
        </div>


        <!-- Usuário no canto direito -->
        <div style="font-size:14px; white-space:nowrap; position:absolute; right:20px;">Usuário: Adm</div>
    </div>

</body>
</html>