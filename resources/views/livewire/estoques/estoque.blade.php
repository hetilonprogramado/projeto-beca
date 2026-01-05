<div style="background:#5f1123; color:#fff; padding:20px; border-radius:10px; margin-top:20px;">

    <h1>Controle de Estoque</h1>

    <!-- Movimento -->
    <div style="background:#d9ffe9; color:#1c3f2a; padding:20px; border-radius:10px; margin-top:20px;">
        <h3>Registrar Movimento</h3>

        <div class="form-grid">
            <input id="m_codigo" wire:model="codigo_barra" required placeholder="Código de barras">

            <select id="m_tipo" wire:model="tipo_de_movimento" required>
                <option value="">Tipo de movimento</option>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>

            <input id="m_quantidade" type="number" wire:model="quantidade" required placeholder="Quantidade">
        </div>

        <div class="form-actions">
            <button onclick="registrarMovimento()" class="btn btn-save"type="submit" wire:click.prevent="salvar" wire:target="salvar" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="salvar">Registrar Movimento</span>
                <i class="fas fa-spinner fa-spin mr-2" wire:loading wire:target="salvar"></i>
                <span wire:loading wire:target="salvar">Registrando...</span>
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
            <!-- Aqui os movimentos dde estoque serão renderizados via backend -->
            @foreach($estoques as $estoque)
            <tr class="border-t">
                <td class="p-2">{{ $estoque->codigo }}</td>
                <td class="p-2">{{ $estoque->produto }}</td>
                <td class="p-2">{{ $estoque->tipo }}</td>
                <td class="p-2">{{ $estoque->quantidade }}</td>
                <td class="p-2">{{ \Carbon\Carbon::parse($estoque->data)->format('d/m/Y') }}</td>
            </tr>
            @endforeach    
        </tbody>
    </table>

</div>