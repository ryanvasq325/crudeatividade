const salvarProduto = document.getElementById('salvarProduto');
const excluirRegistro = document.getElementById('excluirProduto');
const Pesquisar = document.getElementById('pesquisa');

async function DeleteProduto(id) {
  document.getElementById('id_produto').value = id;
  $('#excluirProduto').modal('show');
}

async function Insert() {
  const form = document.getElementById('form');
  if (!form) {
    alert('Formulário com os dados não encontrados!');
    return;
  }
  const formData = new FormData(form);
  const option = {
    method: 'POST',
    body: formData,
    mode: 'cors',
    cache: 'default'
  };
  const response = await fetch('controllerprodutos.php', option);
  return await response.json();
}

async function Pesquisa() {
  const form = document.getElementById('form');
  if (!form) {
    alert('Formulário com os dados não encontrado!');
    return;
  }
  const formData = new FormData(form);
  const option = {
    method: 'POST',
    body: formData,
    mode: 'cors',
    cache: 'default'
  };
  const response = await fetch('controllerpesquisaprodutos.php', option);
  const query = await response.json();
  let html = '';
  query.data.forEach(element => {
    html += `
                  <tr id="tr${element.id}">
                        <td>${element.id}</td>
                        <td>${element.produto}</td>
                        <td>${element.valor_compra}</td>
                        <td>${element.valor_venda}</td>
                        <td>${element.marca}</td>
                        <td>${element.grupo}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button onclick="AlterarProduto(${element.id});" type="button" class="btn btn-outline-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                     Editar
                                </button>
                                <button onclick="DeleteProduto(${element.id});" type="button" class="btn btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                    Excluir
                                </button>
                            </div>
                        </td>
                    </tr>
        
        `;

  });
  document.getElementById('listaProduto').innerHTML = html;
}
async function Excluir() {
  const form = document.getElementById('form');
  const formData = new FormData(form);
  const option = {
    method: 'POST',
    body: formData,
    mode: 'cors',
    cache: 'default'
  };
  const response = await fetch('controllerdeleteproduto.php', option);
  const json = await response.json();
  if (!json.status) {
    alert(json.msg);
    return;
  }
  $('#excluirProduto').modal('hide');
  document.getElementById('tr' + document.getElementById('id_produto').value).remove();
}
async function AlterarProduto(id) {
  document.getElementById('id_produto').value = id;
  document.getElementById('acao').value = 'editar';
  const form = document.getElementById('form');
  const formData = new FormData(form);
  const option = {
    method: 'POST',
    body: formData,
    mode: 'cors',
    cache: 'default'
  };
  const response = await fetch('controllerselecionarproduto.php', option);
  const json = await response.json();
  document.getElementById('produto').value = json.produto;
  document.getElementById('valor_compra').value = json.valor_compra;
  document.getElementById('valor_venda').value = json.valor_venda;
  document.getElementById('marca').value = json.marca;
  document.getElementById('grupo').value = json.grupo;
  $('#cadastroProduto').modal('show');
}
async function Update() {
  const form = document.getElementById('form');
  if (!form) {
    alert('Formulário com os dados não encontrados!');
    return;
  }
  const formData = new FormData(form);
  const option = {
    method: 'POST',
    body: formData,
    mode: 'cors',
    cache: 'default'
  };
  const response = await fetch('controllerupdateproduto.php', option);
  return await response.json();
}
salvarProduto.addEventListener('click', async () => {
  if (document.getElementById('acao').value === 'editar') {
    const response = await Update();
    await Pesquisa();
    $('#cadastroProduto').modal('hide');
    alert(response.msg);
    return;
  }
  const response = await Insert();
  if (!response.status) {
    alert(response.msg);
    return;
  }
  await Pesquisa();
  $('#cadastroProduto').modal('hide');
  alert(response.msg);
});

excluirRegistro.addEventListener('click', async () => {
  await Excluir();
});

document.addEventListener('DOMContentLoaded', async () => {
  await Pesquisa();
});
Pesquisar.addEventListener('keypress', async () => {
  await Pesquisa();
});