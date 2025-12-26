<div style="max-width:1000px; margin:100px auto; background:#1c3f2a; color:#baffd9; padding:20px; border-radius:10px; border:2px solid #baffd9;">

    <!-- Header -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Funcionários</h1>
        <button id="openEmployeeCard" style="background:#1c3f2a; color:#baffd9; border:none; padding:10px 15px; border-radius:5px; cursor:pointer;">
            + Adicionar Funcionário
        </button>
    </div>

    <!-- Contador -->
    <div id="employeeCounter" style="margin-top:20px; font-weight:bold;">
        Total de funcionários: 0
    </div>

    <!-- Card -->
    <div id="employeeCard" style="display:none; background:#d9ffe9; color:#1c3f2a; padding:20px; border-radius:10px; margin-top:20px;">
        <h3>Cadastrar Funcionário</h3>

        <div class="form-grid">
            <input id="f_nome" placeholder="Nome" class="span-2">
            <input id="f_cargo" placeholder="Cargo">
            <input id="f_telefone" placeholder="Telefone">

            <input id="f_email" placeholder="Email" class="span-2">
            <input id="f_salario" type="number" placeholder="Salário">

            <input id="f_admissao" type="date">
        </div>

        <div class="form-actions">
            <button class="btn btn-cancel" id="cancelEmployee">Cancelar</button>
            <button class="btn btn-save" id="saveEmployee">Salvar</button>
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
        <tbody id="employeeTableBody"></tbody>
    </table>

</div>
<script>
const openEmployeeCard = document.getElementById('openEmployeeCard');
const employeeCard = document.getElementById('employeeCard');
const cancelEmployee = document.getElementById('cancelEmployee');
const saveEmployee = document.getElementById('saveEmployee');
const employeeTableBody = document.getElementById('employeeTableBody');
const employeeCounter = document.getElementById('employeeCounter');

let employees = [];

openEmployeeCard.onclick = () => employeeCard.style.display = 'block';

cancelEmployee.onclick = () => {
    employeeCard.style.display = 'none';
    clearEmployeeFields();
};

saveEmployee.onclick = () => {
    const funcionario = {
        nome: f_nome.value,
        cargo: f_cargo.value,
        telefone: f_telefone.value,
        email: f_email.value,
        salario: f_salario.value,
        admissao: f_admissao.value
    };

    if (!funcionario.nome || !funcionario.cargo) {
        alert('Nome e cargo são obrigatórios');
        return;
    }

    employees.push(funcionario);
    renderEmployees();
    clearEmployeeFields();
    employeeCard.style.display = 'none';
};

function clearEmployeeFields() {
    ['f_nome','f_cargo','f_telefone','f_email','f_salario','f_admissao']
        .forEach(id => document.getElementById(id).value = '');
}

function renderEmployees() {
    employeeTableBody.innerHTML = '';
    employees.forEach(f => {
        employeeTableBody.innerHTML += `
            <tr>
                <td style="border:1px solid #baffd9; padding:10px;">${f.nome}</td>
                <td style="border:1px solid #baffd9; padding:10px;">${f.cargo}</td>
                <td style="border:1px solid #baffd9; padding:10px;">${f.telefone}</td>
                <td style="border:1px solid #baffd9; padding:10px;">${f.email}</td>
                <td style="border:1px solid #baffd9; padding:10px;">R$ ${f.salario}</td>
                <td style="border:1px solid #baffd9; padding:10px;">${f.admissao}</td>
            </tr>
        `;
    });
    employeeCounter.innerHTML = `Total de funcionários: ${employees.length}`;
}
</script>