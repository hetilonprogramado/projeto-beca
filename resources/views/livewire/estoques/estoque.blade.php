<div style="background:#5f1123; color:#fff; padding:20px; border-radius:10px; margin-top:20px;">

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
        <tbody id="movimentoTableBody">
            <!-- Aqui os movimentos dde estoque serão renderizados via backend --></tbody>
    </table>

</div>