// Elementos do DOM
const salvarRegistro = document.getElementById('salvarRegistro');
const excluirRegistro = document.getElementById('excluirRegistro');
const pesquisaInput = document.getElementById('pesquisa');

// Função para abrir modal de exclusão
async function DeleteCliente(id) {
    document.getElementById('id_cliente').value = id;
    $('#excluirRegistroCliente').modal('show');
}

// Inserir novo cliente
async function Insert() {
    const nome = document.getElementById("nome").value.trim();
    const sobrenome = document.getElementById("sobrenome").value.trim();
    const cpf = document.getElementById("cpf").value.replace(/\D/g, '');
    const rg = document.getElementById("rg").value.replace(/\D/g, '');

    if (!nome) return alert("O nome é obrigatório!");
    if (!sobrenome) return alert("O sobrenome é obrigatório!");
    if (!cpf || cpf.length !== 11) return alert("CPF inválido!");
    if (!rg) return alert("RG inválido!");

    const form = document.getElementById("form");
    const formData = new FormData(form);

    try {
        const response = await fetch("controllercliente.php", {
            method: "POST",
            body: formData
        });
        const json = await response.json();

        if (!json.status) return alert(json.msg);

        $("#cadastroCliente").modal("hide");
        await Pesquisa();
        alert(json.msg);
        return json;
    } catch (e) {
        alert("Erro ao enviar os dados: " + e.message);
        return { status: false, msg: e.message };
    }
}

// Atualizar cliente existente
async function Update() {
    const form = document.getElementById('form');
    const formData = new FormData(form);

    try {
        const response = await fetch('controllerupdate.php', {
            method: 'POST',
            body: formData
        });
        return await response.json();
    } catch (e) {
        alert("Erro ao atualizar: " + e.message);
        return { status: false, msg: e.message };
    }
}

// Alternar status Ativo/Inativo
async function toggleAtivo(id, ativoAtual) {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("ativo", ativoAtual ? 0 : 1);
    formData.append("acao", "toggle");

    try {
        const response = await fetch("controllerativo.php", {
            method: 'POST',
            body: formData
        });
        const json = await response.json();
        if (!json.status) return alert(json.msg);

        // Atualiza apenas a linha do cliente
        const badge = document.querySelector(`#tr${id} .badge`);
        badge.className = `badge ${ativoAtual ? 'bg-danger' : 'bg-success'}`;
        badge.textContent = ativoAtual ? 'Inativo' : 'Ativo';

        alert(json.msg);
    } catch (e) {
        alert("Erro ao alternar status: " + e.message);
    }
}

// Carregar clientes na tabela
async function Pesquisa() {
    const form = document.getElementById('form');
    const formData = new FormData(form);

    try {
        const response = await fetch('controllerpesquisa.php', {
            method: 'POST',
            body: formData
        });
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
                    <div class="btn-group" role="group">
                        <button onclick="AlterarCliente(${element.id})" type="button" class="btn btn-outline-warning">
                            <i class="fa-solid fa-pen-to-square"></i> Editar
                        </button>
                        <button onclick="DeleteCliente(${element.id})" type="button" class="btn btn-outline-danger">
                            <i class="fa-solid fa-trash"></i> Excluir
                        </button>
                    </div>
                </td>
            </tr>`;
        });
        document.getElementById('listaCliente').innerHTML = html;
    } catch (e) {
        alert("Erro ao carregar clientes: " + e.message);
    }
}

// Excluir cliente
async function Excluir() {
    const form = document.getElementById('form');
    const formData = new FormData(form);

    try {
        const response = await fetch('controllerdelete.php', { method: 'POST', body: formData });
        const json = await response.json();
        if (!json.status) return alert(json.msg);

        $('#excluirRegistroCliente').modal('hide');
        document.getElementById('tr' + document.getElementById('id_cliente').value).remove();
        alert(json.msg);
    } catch (e) {
        alert("Erro ao excluir cliente: " + e.message);
    }
}

// Editar cliente
async function AlterarCliente(id) {
    document.getElementById('id_cliente').value = id;
    document.getElementById('acao').value = 'editar';
    const form = document.getElementById('form');
    const formData = new FormData(form);

    try {
        const response = await fetch('controllerselecionarcliente.php', { method: 'POST', body: formData });
        const json = await response.json();

        document.getElementById('nome').value = json.nome;
        document.getElementById('sobrenome').value = json.sobrenome;
        document.getElementById('cpf').value = json.cpf;
        document.getElementById('rg').value = json.rg;

        $('#cadastroCliente').modal('show');
    } catch (e) {
        alert("Erro ao selecionar cliente: " + e.message);
    }
}

// Event listeners
salvarRegistro.addEventListener('click', async () => {
    if (document.getElementById('acao').value === 'editar') {
        const response = await Update();
        await Pesquisa();
        $('#cadastroCliente').modal('hide');
        alert(response.msg);
        return;
    }

    const response = await Insert();
    if (!response.status) return;

    await Pesquisa();
});

excluirRegistro.addEventListener('click', async () => await Excluir());

document.addEventListener('DOMContentLoaded', async () => await Pesquisa());

// Pesquisa ao pressionar Enter
pesquisaInput.addEventListener('keyup', async (e) => {
    if (e.key === 'Enter') await Pesquisa();
});
