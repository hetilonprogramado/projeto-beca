
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Painel Interno</title>

<style>
    body {
        margin: 0;
        font-family: 'Georgia', serif;
        background: #3b0f0f;
        color: #4d0c0c;
    }

    .painel-container {
        width: 100%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* CARDS SUPERIORES */
    .cards {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        background: #f7b7b7;
        width: 180px;
        padding: 20px;
        border-radius: 15px;
        text-align: center;
        font-weight: bold;
    }

    .card .numero {
        font-size: 40px;
        color: #4a0e0e;
    }

    .card img {
        width: 45px;
        margin-top: 5px;
    }

    /* TABELA */
    .tabela-clientes {
        background: #f7b7b7;
        padding: 15px;
        border-radius: 10px;
        width: 220px;
        font-size: 17px;
        font-weight: bold;
    }

    .tabela-clientes table {
        width: 100%;
        border-collapse: collapse;
    }

    .tabela-clientes tr {
        border-bottom: 2px solid #4a0e0e;
    }

    .tabela-clientes td {
        padding: 7px 0;
    }

    /* GRÁFICOS */
    .graficos {
        display: flex;
        gap: 40px;
        margin-top: 20px;
    }

    .grafico-barra {
        width: 380px;
        height: 260px;
        background: #4a0e0e;
        border-radius: 8px;
        position: relative;
    }

    .grafico-barra canvas {
        width: 100%;
        height: 100%;
    }

    .grafico-pizza {
        width: 250px;
        height: 250px;
        background: #4a0e0e;
        border-radius: 8px;
        position: relative;
    }

    .grafico-pizza canvas {
        width: 100%;
        height: 100%;
    }

    .titulo-grafico {
        text-align: center;
        color: #f7b7b7;
        font-size: 14px;
        padding-top: 5px;
    }
</style>

</head>
<body>

<div class="painel-container">

    <!-- CARDS -->
    <div class="cards">

        <div class="card">
            <div class="numero">150</div>
            <img src="https://cdn-icons-png.flaticon.com/512/3144/3144456.png">
            <div>Vendas hoje</div>
        </div>

        <div class="card">
            <div class="numero">30%</div>
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png">
            <div>Vendas (período)</div>
        </div>

        <div class="card">
            <div class="numero">67</div>
            <img src="https://cdn-icons-png.flaticon.com/512/833/833472.png">
            <div>Concluídos</div>
        </div>

        <div class="card">
            <div class="numero">15</div>
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828843.png">
            <div>Pendentes</div>
        </div>

    </div>

    <!-- CONTEÚDOS PRINCIPAIS -->
    <div style="display: flex; gap: 30px;">

        <!-- TABELA -->
        <div class="tabela-clientes">
            <table>
                <tr><td>Clientes</td><td>Total</td></tr>
                <tr><td>Cirilo</td><td>45</td></tr>
                <tr><td>Zé</td><td>45</td></tr>
                <tr><td>Zack</td><td>45</td></tr>
                <tr><td>Mathias</td><td>45</td></tr>
                <tr><td>Pedro</td><td>45</td></tr>
                <tr><td>Jonas</td><td>45</td></tr>
                <tr><td>Mateus</td><td>45</td></tr>
                <tr><td>Hetilon</td><td>45</td></tr>
            </table>
        </div>

        <!-- GRÁFICOS -->
        <div class="graficos">

            <div class="grafico-barra">
                <div class="titulo-grafico">Vendas no último mês</div>
                <canvas id="graficoBarra"></canvas>
            </div>

            <div class="grafico-pizza">
                <div class="titulo-grafico">Doces mais vendidos</div>
                <canvas id="graficoPizza"></canvas>
            </div>

        </div>

    </div>

</div>

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // GRÁFICO DE BARRAS
    new Chart(document.getElementById("graficoBarra"), {
        type: "bar",
        data: {
            labels: ["Item 1", "Item 2", "Item 3", "Item 4", "Item 5"],
            datasets: [{
                data: [18, 27, 23, 37, 39],
                backgroundColor: "#f7b7b7"
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                x: { ticks: { color: "#f7b7b7" } },
                y: { ticks: { color: "#f7b7b7" } }
            }
        }
    });

    // GRÁFICO DE PIZZA
    new Chart(document.getElementById("graficoPizza"), {
        type: "pie",
        data: {
            labels: ["Item 1", "Item 2", "Item 3"],
            datasets: [{
                data: [60, 25, 15],
                backgroundColor: ["#f7b7b7", "#e7a1a1", "#b97d7d"]
            }]
        },
        options: {
            plugins: { legend: { labels: { color: "#f7b7b7" } } }
        }
    });
</script>

</body>
</html>
