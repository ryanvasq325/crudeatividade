<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <link href="/css/all.css" rel="stylesheet" />
</head>

<body>
    <form id="form">
 
        <input type="hidden" id="id_usuario" name="id_usuario" value="">
        <input type="hidden" id="acao" name="acao" value="">

   
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navegação</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="/listacliente.php">Lista de Clientes</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="modal fade" id="cadastroUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="cadastroUsuario" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cadastroUsuario">Cadastro de Usuário</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                                    <label for="nome">Nome</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome"
                                        placeholder="Sobrenome">
                                    <label for="sobrenome">Sobrenome</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                                    <label for="cpf">CPF</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="rg" name="rg" placeholder="RG">
                                    <label for="rg">RG</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                                    <label for="email">E-mail</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="password" class="form-control" id="senha" name="senha"
                                        placeholder="Senha">
                                    <label for="senha">Senha</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            <i class="fa-solid fa-ban"></i> Cancelar
                        </button>
                        <button type="button" class="btn btn-outline-success" id="salvarRegistro">
                            <i class="fa-solid fa-floppy-disk"></i> Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="excluirUsuario" tabindex="-1" aria-labelledby="excluirUsuario" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="excluirUsuario">Excluir Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
              </div>
              <div class="modal-body">
                Tem certeza que deseja excluir este usuário?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="excluirRegistro">Excluir</button>
              </div>
            </div>
          </div>
        </div>
        <div class="container mt-3">
            <button type="button" class="btn btn-outline-success" title="Clique para cadastrar um novo usuário"
                data-bs-toggle="modal" data-bs-target="#cadastroUsuario">
                <i class="fa-solid fa-plus"></i> Cadastro
            </button>

            <div class="form-floating mt-3 mb-3">
                <input type="search" class="form-control" id="pesquisa" name="pesquisa" placeholder="Pesquisa">
                <label for="pesquisa">Digite sua pesquisa</label>
            </div>
            <table class="table table-striped table-hover table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Senha</th>
                        <th>Email</th>
                        <th>Ativo</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="listaUsuario"></tbody>
            </table>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/all.js"></script>
    <script src="/js/listausuario.js"></script>
</body>

</html>