const salvarRegistro = document.getElementById('salvarRegistro');
const excluirRegistro = document.getElementById('excluirRegistro');
const Pesquisar = document.getElementById('pesquisa');

async function DeleteCliente(id) {
    document.getElementById('id_cliente').value = id;
    $('#excluirRegistroCliente').modal('show');
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
    const response = await fetch('controllercliente.php', option);
    return await response.json();
}
async function toggleAtivo(id, ativoAtual) {
  const formData = new FormData();
  formData.append("id", id);
  formData.append("ativo", ativoAtual ? 0 : 1); 
  formData.append("acao", "toggle");

  const response = await fetch("controllerativo.php", {
        method: 'POST',
        body: formData,
        mode: 'cors',
        cache: 'default'
  });
  const json = await response.json();

  alert(json.msg);
  await Pesquisa(); 
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
    const response = await fetch('controllerpesquisa.php', option);
    const query = await response.json();
    let html = '';
    query.data.forEach(element => {
        html += `
                  <tr id="tr${element.id}">
                        <td>${element.id}</td>
                        <td>${element.nome}</td>
                        <td>${element.sobrenome}</td>
                        <td>${element.cpf}</td>
                        <td>${element.rg}</td>
                        <td>                     
                            <span class="badge ${element.ativo ? 'bg-success' : 'bg-danger'}">
                            ${element.ativo ? 'Ativo' : 'Inativo'}
                            </span>
                        </td>
                        <td>
                             <button onclick="toggleAtivo(${element.id}, ${element.ativo})" class="btn btn-outline-info btn-sm">
                            <i class="fa-solid fa-power-off"></i> Alternar
                            </button>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button onclick="AlterarCliente(${element.id});" type="button" class="btn btn-outline-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Editar
                                    </button>
                                        <button onclick="DeleteCliente(${element.id});" type="button" class="btn btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                        Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
        
            `;

    });
    document.getElementById('listaCliente').innerHTML = html;
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
    const response = await fetch('controllerdelete.php', option);
    const json = await response.json();
    if (!json.status) {
        alert(json.msg);
        return;
    }
    $('#excluirRegistroCliente').modal('hide');
    document.getElementById('tr' + document.getElementById('id_cliente').value).remove();
}
async function AlterarCliente(id) {
    document.getElementById('id_cliente').value = id;
    document.getElementById('acao').value = 'editar';
    const form = document.getElementById('form');
    const formData = new FormData(form);
    const option = {
        method: 'POST',
        body: formData,
        mode: 'cors',
        cache: 'default'
    };
    const response = await fetch('controllerselecionarcliente.php', option);
    const json = await response.json();
    document.getElementById('nome_completo').value = json.nome_completo;
    document.getElementById('cpf').value = json.cpf;
    $('#cadastroCliente').modal('show');
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
    const response = await fetch('controllerupdate.php', option);
    return await response.json();
}
salvarRegistro.addEventListener('click', async () => {
    if (document.getElementById('acao').value === 'editar') {
        const response = await Update();
        await Pesquisa();
        $('#cadastroCliente').modal('hide');
        alert(response.msg);
        return;
    }
    const response = await Insert();
    if (!response.status) {
        alert(response.msg);
        return;
    }
    await Pesquisa();
    $('#cadastroCliente').modal('hide');
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