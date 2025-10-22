const salvarRegistro = document.getElementById('salvarRegistro');
const Pesquisar = document.getElementById('pesquisa');

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
    const response = await fetch('controlleruser.php', option);
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
    const response = await fetch('controllerpesquisauser.php', option);
    const query = await response.json();
    let html = '';
    query.data.forEach(element => {
        html += `
                  <tr>
                        <td>${element.id}</td>
                        <td>${element.nome_completo}</td>
                        <td>${element.senha}</td>
                        <td>${element.cpf}</td>
                        <td>${element.email}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                     Editar
                                </button>
                                <button type="button" class="btn btn-outline-danger">
                                    <i class="fa-solid fa-trash"></i>
                                    Excluir
                                </button>
                            </div>
                        </td>
                    </tr>
        
        `;

    });
document.getElementById('listaUsuario').innerHTML = html;
}
salvarRegistro.addEventListener('click', async () => {
    const response = await Insert();
    if (!response.status) {
        alert(response.msg);
        return;
    }
    alert(response.msg);
});
document.addEventListener('DOMContentLoaded', async () => {
    await Pesquisa();
});
Pesquisar.addEventListener('keypress', async () => {
    await Pesquisa();
})