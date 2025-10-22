<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Produtos</title>
  <link href="/css/all.css" rel="stylesheet" />
  <link href="/css/bootstrap.css" rel="stylesheet" />
</head>

<body>
  <form id="form">
    <input type="hidden" id="id_produto" name="id_produto">
    <input type="hidden" id="acao" name="acao">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Gerenciamento de Produtos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
          aria-label="Alternar navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="/listafornecedor">Fornecedor</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="modal fade" id="excluirProduto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="excluirProdutoLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="excluirProdutoLabel">Atenção</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Deseja realmente excluir o registro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-ban"></i> Cancelar
                        </button>
                        <button type="button" class="btn btn-outline-danger" id="excluirProduto">
                            <i class="fa-solid fa-trash"></i> Excluir
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal de cadastro -->
    <div class="modal fade" id="cadastroProduto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="cadastroProdutoLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="cadastroProdutoLabel">Cadastro de Produto</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <!-- Produto -->
              <div class="col-6">
                <div class="form-floating mb-3 mt-3">
                  <input type="text" class="form-control" id="produto" name="produto"
                    placeholder="Digite o nome do produto" required>
                  <label for="produto">Produto</label>
                </div>
              </div>
              <!-- Valor de Compra -->
              <div class="col-6">
                <div class="form-floating mb-3 mt-3">
                  <input type="number" step="0.01" class="form-control" id="valor_compra" name="valor_compra"
                    placeholder="Digite o valor de compra" required>
                  <label for="valor_compra">Valor de Compra</label>
                </div>
              </div>
              <!-- Valor de Venda -->
              <div class="col-6">
                <div class="form-floating mb-3 mt-3">
                  <input type="number" step="0.01" class="form-control" id="valor_venda" name="valor_venda"
                    placeholder="Digite o valor de venda" required>
                  <label for="valor_venda">Valor de Venda</label>
                </div>
              </div>
              <!-- Marca -->
              <div class="col-6">
                <div class="form-floating mb-3 mt-3">
                  <input type="text" class="form-control" id="marca" name="marca" placeholder="Digite a marca" required>
                  <label for="marca">Marca</label>
                </div>
              </div>
              <!-- Grupo -->
              <div class="col-6">
                <div class="form-floating mb-3 mt-3">
                  <input type="text" class="form-control" id="grupo" name="grupo" placeholder="Digite o grupo" required>
                  <label for="grupo">Grupo</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
              <i class="fa-solid fa-ban"></i> Cancelar
            </button>
            <button type="button" class="btn btn-outline-success" id="salvarProduto">
              <i class="fa-solid fa-floppy-disk"></i> Salvar
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-3">
      <div class="row">
        <div class="col-12 mb-3">
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadastroProduto">
            <i class="fa-solid fa-plus"></i> Cadastrar Produto
          </button>
        </div>
      <div class="col-12 mb-3">
        <div class="form-floating">
          <input type="search" class="form-control" id="pesquisa" name="pesquisa" placeholder="Pesquisar produto">
          <label for="pesquisa">Pesquisar Produto</label>
        </div>
      </div>
      <div class="col-12">
        <table class="table table-striped table-hover table-bordered mt-3">
          <thead>
            <tr>
              <th>Código</th>
              <th>Produto</th>
              <th>Valor de Compra</th>
              <th>Valor de Venda</th>
              <th>Marca</th>
              <th>Grupo</th>
              <th>Ação</th>
              <th>Ativo</th>
            </tr>
          </thead>
          <tbody id="listaProduto"></tbody>
        </table>
            </div>
        </div>
      </div>
  </form>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="/js/bootstrap.js"></script>
  <script src="/js/all.js"></script>
  <script src="/js/produto.js"></script>
</body>

</html>