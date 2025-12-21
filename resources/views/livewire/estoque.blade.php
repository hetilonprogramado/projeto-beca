<div style="max-width:1000px; margin:100px auto; background:#1c3f2a; color:#baffd9; padding:20px; border-radius:10px; border:2px solid #baffd9;">

    <h1>Controle de Estoque</h1>

    <!-- Movimento -->
    <div style="background:#d9ffe9; color:#1c3f2a; padding:20px; border-radius:10px; margin-top:20px;">
        <h3>Registrar Movimento</h3>

        <div class="form-grid">
            <input id="m_codigo" placeholder="Código de barras">
            
            <select id="m_tipo">
                <option value="">Tipo de movimento</option>
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

    <!-- Tabela -->
    <table style="width:100%; border-collapse:collapse; margin-top:20px;">
        <thead>
            <tr>
                <th>Código</th>
                <th>Produto</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody id="movimentoTableBody"></tbody>
    </table>

</div>
<script>
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
</script>
