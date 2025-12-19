<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Redes Sociais</title>

<style>

body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #3b0a18;
            overflow: hidden;
        }

/* BARRA SOCIAL */
        .social-bar {
            width: 200px;
            background-color: #f7c4c3;
            position: fixed;
            top: 60px;
            right: 0;
            height: calc(100vh - 60px);
            padding: 15px;
            display: flex;
            flex-direction: column;
        }

        .social-bar h4 {
            margin-top: 10px;
            font-size: 18px;
            color: #3b0a18;
        }

        .social-btn {
            background-color: #5f1123;
            color: white;
            padding: 10px 5px;
            margin: 8px 0;
            text-align: center;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
        }

        .social-btn:hover {
            background-color: #7c1a32;
        }
</style>
</head>
<body>

<!-- BARRA SOCIAL -->
    <div class="social-bar">
        <h4>Redes sociais</h4>
        <div class="social-btn">Instagram</div>
        <div class="social-btn">Whatsapp</div>
        <div class="social-btn">Facebook</div>
    </div>

</body>
</html>