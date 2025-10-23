const salvarRegistro = document.getElementById('salvarRegistro');
const excluirRegistro = document.getElementById('excluirRegistro');
const Pesquisar = document.getElementById('pesquisa');

async function DeleteUsuario(id) {
    document.getElementById('id_usuario').value = id;
    $('#excluirUsuario').modal('show');
}

async function Insert() {
    const form = document.getElementById('form');
    if (!form) {
        alert('Formulário não encontrado!');
        return;
    }

    const formData = new FormData(form);
    const option = {
        method: 'POST',
        body: formData,
        mode: 'cors',
        cache: 'default'
        };
    const response = await fetch('controlleruser.php', option);
    return await response.json();
}

async function Pesquisa() {
    const formData = new FormData(document.getElementById('form'));
    const option = {  
        method: 'POST',
        body: formData,
        mode: 'cors',
        cache: 'default'};
    const response = await fetch('controllerpesquisauser.php', option);
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
            <td>${element.senha}</td>
            <td>${element.email}</td>
            <td>
                <button 
                    class="btn ${element.ativo ? 'btn-success' : 'btn-secondary'}" 
                    onclick="ToggleAtivo(${element.id}, ${element.ativo ? 1 : 0})">
                    ${element.ativo ? 'Ativo' : 'Inativo'}
                </button>
            </td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button onclick="AlterarUsuario(${element.id});" type="button" class="btn btn-outline-warning">
                        <i class="fa-solid fa-pen-to-square"></i> Editar
                    </button>
                    <button onclick="DeleteUsuario(${element.id});" type="button" class="btn btn-outline-danger">
                        <i class="fa-solid fa-trash"></i> Excluir
                    </button>
                </div>
            </td>
        </tr>
        `;
    });

    document.getElementById('listaUsuario').innerHTML = html;
}

async function Excluir() {
    const formData = new FormData(document.getElementById('form'));
    const option = {  
        method: 'POST',
        body: formData,
        mode: 'cors',
        cache: 'default' };
    const response = await fetch('controllerdeleteuser.php', option);
    const json = await response.json();

    if (!json.status) {
        alert(json.msg);
        return;
    }

    $('#excluirUsuario').modal('hide');
    document.getElementById('tr' + document.getElementById('id_usuario').value).remove();
}

async function AlterarUsuario(id) {
    document.getElementById('id_usuario').value = id;
    document.getElementById('acao').value = 'editar';

    const form = document.getElementById('form');
    const formData = new FormData();
    formData.append('id_usuario', id);

    const option = {  
        method: 'POST',
        body: formData,
        mode: 'cors',
        cache: 'default' };
    const response = await fetch('controllerselecionaruser.php', option);
    const json = await response.json();

    document.getElementById('nome').value = json.nome;
    document.getElementById('sobrenome').value = json.sobrenome;
    document.getElementById('cpf').value = json.cpf;
    document.getElementById('rg').value = json.rg;
    document.getElementById('senha').value = json.senha;
    document.getElementById('email').value = json.email;
    $('#cadastroUsuario').modal('show');
}

async function ToggleAtivo(id, statusAtual) {
    const novoStatus = statusAtual === 1 ? 0 : 1;

    const formData = new FormData();
    formData.append('id_usuario', id);
    formData.append('ativo', novoStatus);

    const option = {
        method: 'POST',
        body: formData,
        mode: 'cors',
        cache: 'default'
    };

    const response = await fetch('controllerativousuario.php', option);
    const json = await response.json();

    if (!json.status) {
        alert(json.msg);
        return;
    }

    await Pesquisa(); 
}

async function Update() {
    const formData = new FormData(document.getElementById('form'));
    const option = {  
        method: 'POST',
        body: formData,
        mode: 'cors',
        cache: 'default' };
    const response = await fetch('controllerupdateuser.php', option);
    return await response.json();
}


async function ToggleAtivo(id, ativo) {
    const novoStatus = ativo === 1 ? 0 : 1;
    const formData = new FormData();
    formData.append('id_usuario', id);
    formData.append('ativo', novoStatus);

    const response = await fetch('controllerativousuario.php', {
         method: 'POST',
        body: formData,
        mode: 'cors',
        cache: 'default'
    });
    const json = await response.json();

    if (json.status) {
        await Pesquisa();
    } else {
        alert(json.msg);
    }
}

salvarRegistro.addEventListener('click', async () => {
    if (document.getElementById('acao').value === 'editar') {
        const response = await Update();
         await Pesquisa();
         $('#cadastroUsuario').modal('hide');
        alert(response.msg);
         return;
    }

    const response = await Insert();
    if (!response.status) {
        alert(response.status);
        return;
    }
});

excluirRegistro.addEventListener('click', async () => {
    await Excluir();
});

document.addEventListener('DOMContentLoaded', async () => {
    await Pesquisa();
});

Pesquisar.addEventListener('keyup', async () => {
    await Pesquisa();
});
