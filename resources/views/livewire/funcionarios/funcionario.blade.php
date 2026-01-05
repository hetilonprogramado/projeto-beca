<div style="background:#5f1123; color:#fff; padding:20px; border-radius:10px; margin-top:20px;">

    <!-- Header -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1 class="text-2xl font-bold mb-4">Funcionários</h1>
    <button class="mb-4 bg-blue-500 text-white px-3 py-1 rounded">
        + Adicionar Funcionário
    </button>

    </div>

    <!-- Contador -->
    <div id="employeeCounter" style="margin-top:20px; font-weight:bold;">
        Total de funcionários: 0
    </div>

    <!-- Card de cadastro -->
    <div style="background:#5f1123; color:#fff; padding:20px; border-radius:10px; margin-top:20px;">
        <input name="employee_name" wire:model="nome" required placeholder="Nome do funcionário" class="campo">
        <input name="employee_position" wire:model="cargo" required placeholder="Cargo" class="campo">
        <input name="employee_phone" wire:model="phone" required placeholder="Telefone" class="campo">
        <input name="employee_email" wire:model="email" required placeholder="Email" class="campo">
        <input name="employee_salary" wire:model="salario" required type="number" placeholder="Salário" class="campo">
        <input name="employee_hire_date" wire:model="admissao" required type="date" class="campo">
        <div class="mt-2 flex gap-2">
            <button class="bg-green-500 text-white px-3 py-1 rounded" type="submit" wire:click.prevent="salvar" wire:target="salvar" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="salvar">Salvar</span>
                <i class="fas fa-spinner fa-spin mr-2" wire:loading wire:target="salvar"></i>
                <span wire:loading wire:target="salvar">Salvando...</span>
            </button>
            <button class="bg-gray-500 text-white px-3 py-1 rounded">Cancelar</button>
        </div>
    </div>

    <!-- Tabela -->
    <table style="width:100%; border-collapse:collapse; margin-top:20px;">
        <thead>
            <tr>
                <th style="border:1px solid #baffd9; padding:10px;">Nome</th>
                <th style="border:1px solid #baffd9; padding:10px;">Cargo</th>
                <th style="border:1px solid #baffd9; padding:10px;">Telefone</th>
                <th style="border:1px solid #baffd9; padding:10px;">Email</th>
                <th style="border:1px solid #baffd9; padding:10px;">Salário</th>
                <th style="border:1px solid #baffd9; padding:10px;">Admissão</th>
            </tr>
        </thead>
        <tbody id="employeeTableBody">
            <!-- Aqui os funcionarios serão renderizados via backend -->
            @foreach($funcionarios as $funcionario)
            <tr class="border-t">
                <td class="p-2">{{ $funcionario->nome }}</td>
                <td class="p-2">{{ $funcionario->cargo }}</td>
                <td class="p-2">{{ $funcionario->phone }}</td>
                <td class="p-2">{{ $funcionario->email }}</td>
                <td class="p-2">{{ $funcionario->salario }}</td>
                <td class="p-2">{{ \Carbon\Carbon::parse($funcionario->admissao)->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>