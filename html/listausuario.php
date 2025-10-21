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
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navegação</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="/listacliente.php">Lista de Clientes</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="cadastroUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cadastroUsuario">Cadastro de usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="search" class="form-control" id="nome_completo" name="nome_completo" placeholder="pesquisa">
                                    <label for="nome_completo">Digite seu nome completo</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="search" class="form-control" id="senha" name="senha" placeholder="pesquisa">
                                    <label for="senha">Digite sua senha</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="search" class="form-control" id="cpf" name="cpf" placeholder="pesquisa">
                                    <label for="cpf">Digite seu CPF</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="search" class="form-control" id="email" name="email" placeholder="pesquisa">
                                    <label for="email">Digite seu E-mail</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            <i class="fa-solid fa-ban"></i>
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-outline-success" id="salvarRegistro">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 mt-2">
                    <button type="button" class="btn btn-outline-success" title="Clique para cadastrar um novo usuario" data-bs-toggle="modal" data-bs-target="#cadastroUsuario">
                        <i class="fa-solid fa-plus"></i>
                        Cadastro
                    </button>
                </div>
                <div class="col-12">
                    <div class="col-12">
                        <div class="form-floating mb-3 mt-3">
                            <input type="search" class="form-control" id="pesquisa" name="pesquisa" placeholder="pesquisa">
                            <label for="pesquisa">Digite sua pesquisa</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <table class="table table-strip table-hover table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th>Senha</th>
                                    <th>E-mail</th>
                                    <th>Ativo</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody id="listaUsuario"></tbody>
                        </table>
                    </div>
                </div>
            </div>
    </form>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/all.js"></script>
    <script src="/js/listausuario.js"></script>
</body>

</html>