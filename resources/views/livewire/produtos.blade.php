<div style="max-width:1000px; margin:100px auto; background:#111f3f; color:#cbe0ff; padding:20px; border-radius:10px; border:2px solid #cbe0ff;">

    <!-- Header -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h1>Produtos</h1>
        <button id="openProductCard" style="background:#111f3f; color:#cbe0ff; border:none; padding:10px 15px; border-radius:5px; cursor:pointer;">
            + Adicionar Produto
        </button>
    </div>

    <!-- Contador -->
    <div id="productCounter" style="margin-top:20px; font-weight:bold;">
        Total de produtos: 0
    </div>

    <!-- Card -->
    <div id="productCard" style="display:none; background:#dbe9ff; padding:20px; border-radius:10px; margin-top:20px;">
        <h3>Cadastrar Produto</h3>

        <div style="display:grid; grid-template-columns:2fr 1fr 1fr; gap:12px; margin-top:15px;">
            <input id="produto_nome" placeholder="Nome do produto">
            <input id="produto_preco" type="number" placeholder="Preço">
            <input id="produto_estoque" type="number" placeholder="Estoque">

            <input id="produto_categoria" placeholder="Categoria" style="grid-column: span 2;">
            <input id="produto_codigo" placeholder="Código">
        </div>

        <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:15px;">
            <button id="cancelProduct" style="background:transparent; border:none; cursor:pointer;">Cancelar</button>
            <button id="saveProduct" style="background:#111f3f; color:#cbe0ff; border:none; padding:8px 14px; border-radius:6px;">
                Salvar
            </button>
        </div>
    </div>

    <!-- Tabela -->
    <table style="width:100%; border-collapse:collapse; margin-top:20px;">
        <thead>
            <tr>
                <th style="border:1px solid #cbe0ff; padding:10px;">Nome</th>
                <th style="border:1px solid #cbe0ff; padding:10px;">Preço</th>
                <th style="border:1px solid #cbe0ff; padding:10px;">Estoque</th>
                <th style="border:1px solid #cbe0ff; padding:10px;">Categoria</th>
                <th style="border:1px solid #cbe0ff; padding:10px;">Código</th>
            </tr>
        </thead>
        <tbody id="productTableBody"></tbody>
    </table>

</div>
<script>
const openProductCard = document.getElementById('openProductCard');
const productCard = document.getElementById('productCard');
const cancelProduct = document.getElementById('cancelProduct');
const saveProduct = document.getElementById('saveProduct');
const productTableBody = document.getElementById('productTableBody');
const productCounter = document.getElementById('productCounter');

let products = [];

openProductCard.onclick = () => productCard.style.display = 'block';

cancelProduct.onclick = () => {
    productCard.style.display = 'none';
    clearProductFields();
};

saveProduct.onclick = () => {
    const produto = {
        nome: produto_nome.value,
        preco: produto_preco.value,
        estoque: produto_estoque.value,
        categoria: produto_categoria.value,
        codigo: produto_codigo.value
    };

    if (!produto.nome) {
        alert('Nome do produto é obrigatório');
        return;
    }

    products.push(produto);
    renderProducts();
    clearProductFields();
    productCard.style.display = 'none';
};

function clearProductFields() {
    ['produto_nome','produto_preco','produto_estoque','produto_categoria','produto_codigo']
        .forEach(id => document.getElementById(id).value = '');
}

function renderProducts() {
    productTableBody.innerHTML = '';
    products.forEach(p => {
        productTableBody.innerHTML += `
            <tr>
                <td style="border:1px solid #cbe0ff; padding:10px;">${p.nome}</td>
                <td style="border:1px solid #cbe0ff; padding:10px;">R$ ${p.preco}</td>
                <td style="border:1px solid #cbe0ff; padding:10px;">${p.estoque}</td>
                <td style="border:1px solid #cbe0ff; padding:10px;">${p.categoria}</td>
                <td style="border:1px solid #cbe0ff; padding:10px;">${p.codigo}</td>
            </tr>
        `;
    });

    productCounter.textContent = `Total de produtos: ${products.length}`;
}
</script>
