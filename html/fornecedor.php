<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de Fornecedores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body data-bs-theme="dark">
  <div class="container mt-4">

    <h2><i class="fa-solid fa-truck"></i> Lista de Fornecedores</h2>
    <hr>

    <!-- Botão Novo Fornecedor -->
    <button type="button" class="btn btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#cadastroFornecedor">
      <i class="fa-solid fa-plus"></i> Novo Fornecedor
    </button>

    <!-- Campo de pesquisa -->
    <div class="form-floating mb-3">
      <input type="search" class="form-control" id="pesquisaFornecedor" placeholder="Pesquisar fornecedor">
      <label for="pesquisaFornecedor">Pesquisar fornecedor</label>
    </div>

    <!-- Tabela -->
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nome/Nome Fantasia</th>
          <th>Sobrenome/Razão Social</th>
          <th>CPF/CNPJ</th>
          <th>RG/Inscrição Estadual</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody id="listaFornecedor">
        <!-- Linhas adicionadas dinamicamente -->
      </tbody>
    </table>

    <!-- Modal de cadastro/edição -->
    <div class="modal fade" id="cadastroFornecedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cadastro de Fornecedor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="forn_nome" placeholder="Nome ou Nome Fantasia">
                  <label for="forn_nome">Nome ou Nome Fantasia</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="forn_sobrenome" placeholder="Sobrenome ou Razão Social">
                  <label for="forn_sobrenome">Sobrenome ou Razão Social</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="forn_cpfcnpj" placeholder="CPF ou CNPJ">
                  <label for="forn_cpfcnpj">CPF ou CNPJ</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="forn_rg" placeholder="RG ou Inscrição Estadual">
                  <label for="forn_rg">RG ou Inscrição Estadual</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-danger" data-bs-dismiss="modal">
              <i class="fa-solid fa-ban"></i> Cancelar
            </button>
            <button class="btn btn-outline-success" id="salvarFornecedor">
              <i class="fa-solid fa-floppy-disk"></i> Salvar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    /* ======================= FORNECEDORES ======================= */

    // Carrega do localStorage
    let fornecedores = JSON.parse(localStorage.getItem("fornecedores")) || [];
    let editandoFornecedor = null;

    const listaFornecedor = document.getElementById("listaFornecedor");
    const fornNome = document.getElementById("forn_nome");
    const fornSobrenome = document.getElementById("forn_sobrenome");
    const fornCpfCnpj = document.getElementById("forn_cpfcnpj");
    const fornRg = document.getElementById("forn_rg");
    const salvarFornecedor = document.getElementById("salvarFornecedor");
    const modalFornecedor = new bootstrap.Modal(document.getElementById("cadastroFornecedor"));

    // Salva no localStorage
    function salvarLocal() {
      localStorage.setItem("fornecedores", JSON.stringify(fornecedores));
    }

    // Renderiza tabela
    function renderFornecedores() {
      listaFornecedor.innerHTML = "";

      if (fornecedores.length === 0) {
        const tr = document.createElement("tr");
        tr.innerHTML = `<td colspan="6" class="text-center text-muted">Nenhum fornecedor cadastrado.</td>`;
        listaFornecedor.appendChild(tr);
        return;
      }

      fornecedores.forEach(f => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${f.id}</td>
          <td>${f.nome}</td>
          <td>${f.sobrenome}</td>
          <td>${f.cpfcnpj}</td>
          <td>${f.rg}</td>
          <td>
            <div class="btn-group">
              <button class="btn btn-outline-warning" onclick="editarFornecedor(${f.id})" title="Editar">
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
              <button class="btn btn-outline-danger" onclick="excluirFornecedor(${f.id})" title="Excluir">
                <i class="fa-solid fa-trash-can"></i>
              </button>
            </div>
          </td>`;
        listaFornecedor.appendChild(tr);
      });
    }

    // Editar fornecedor
    function editarFornecedor(id) {
      const f = fornecedores.find(x => x.id === id);
      if (!f) return;
      fornNome.value = f.nome;
      fornSobrenome.value = f.sobrenome;
      fornCpfCnpj.value = f.cpfcnpj;
      fornRg.value = f.rg;
      editandoFornecedor = id;
      modalFornecedor.show();
    }

    // Excluir fornecedor
    function excluirFornecedor(id) {
      if (confirm("Deseja excluir este fornecedor?")) {
        fornecedores = fornecedores.filter(x => x.id !== id);
        salvarLocal();
        renderFornecedores();
      }
    }

    // Salvar (novo ou edição)
    salvarFornecedor.addEventListener("click", () => {
      const nome = fornNome.value.trim();
      const sobrenome = fornSobrenome.value.trim();
      const cpfcnpj = fornCpfCnpj.value.trim();
      const rg = fornRg.value.trim();

      if (!nome || !sobrenome || !cpfcnpj || !rg) {
        alert("Preencha todos os campos!");
        return;
      }

      if (editandoFornecedor) {
        const f = fornecedores.find(x => x.id === editandoFornecedor);
        f.nome = nome;
        f.sobrenome = sobrenome;
        f.cpfcnpj = cpfcnpj;
        f.rg = rg;
        editandoFornecedor = null;
      } else {
        const novoId = fornecedores.length ? fornecedores[fornecedores.length - 1].id + 1 : 1;
        fornecedores.push({ id: novoId, nome, sobrenome, cpfcnpj, rg });
      }

      salvarLocal(); // salva no localStorage

      fornNome.value = "";
      fornSobrenome.value = "";
      fornCpfCnpj.value = "";
      fornRg.value = "";
      modalFornecedor.hide();
      renderFornecedores();
    });

    // Pesquisa dinâmica
    document.getElementById("pesquisaFornecedor").addEventListener("input", e => {
      const termo = e.target.value.toLowerCase();
      document.querySelectorAll("#listaFornecedor tr").forEach(tr => {
        tr.style.display = tr.textContent.toLowerCase().includes(termo) ? "" : "none";
      });
    });

    // Render inicial
    renderFornecedores();
  </script>
</body>

</html>
