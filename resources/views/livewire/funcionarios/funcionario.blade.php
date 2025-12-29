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
        <input name="employee_name" placeholder="Nome do funcionário" class="campo">
        <input name="employee_position" placeholder="Cargo" class="campo">
        <input name="employee_phone" placeholder="Telefone" class="campo">
        <input name="employee_email" placeholder="Email" class="campo">
        <input name="employee_salary" type="number" placeholder="Salário" class="campo">
        <input name="employee_hire_date" type="date" class="campo">
        <div class="mt-2 flex gap-2">
            <button class="bg-green-500 text-white px-3 py-1 rounded">Salvar</button>
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
            <!-- Aqui os funcionarios serão renderizados via backend --></tbody>
    </table>

</div>