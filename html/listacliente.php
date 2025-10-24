<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clientes</title>
    <link href="/css/all.css" rel="stylesheet" />
    <link href="/css/bootstrap.css" rel="stylesheet" />
</head>

<body>
    <form id="form">
        <input type="hidden" id="id_cliente" name="id_cliente">
        <input type="hidden" id="acao" name="acao">

        
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navegação</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="/listausuario.php">Lista de Usuários</a>
                        <a class="nav-link active" aria-current="page" href="/fornecedor.php">Lista de Fornecedores</a>
                        <a class="nav-link active" aria-current="page" href="/produto.php">Lista de Produtos</a>
                    </div>
                </div>
            </div>
        </nav>

       
        <div class="modal fade" id="excluirRegistroCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="excluirRegistroClienteLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="excluirRegistroClienteLabel">Atenção</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Deseja realmente excluir o registro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-ban"></i> Cancelar
                        </button>
                        <button type="button" class="btn btn-outline-danger" id="excluirRegistro">
                            <i class="fa-solid fa-trash"></i> Excluir
                        </button>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="cadastroCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="cadastroCliente" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cadastroCliente">Cadastro de Cliente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
                                    <label for="nome">Nome</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite seu sobrenome" required>
                                    <label for="sobrenome">Sobrenome</label>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" required>
                                    <label for="cpf">CPF</label>
                                </div>
                            </div>
                          
                            <div class="col-6">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite seu RG" required>
                                    <label for="rg">RG</label>
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

        
        <div class="container mt-3">
            <div class="row">
                
                <div class="col-12 mb-3">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#cadastroCliente">
                        <i class="fa-solid fa-plus"></i> Cadastro
                    </button>
                </div>

                
                <div class="col-12 mb-3">
                    <div class="form-floating">
                        <input type="search" class="form-control" id="pesquisa" name="pesquisa" placeholder="Digite sua pesquisa">
                        <label for="pesquisa">Pesquisar Cliente</label>
                    </div>
                </div>

                
                <div class="col-12">
                    <table class="table table-striped table-hover table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>CPF</th>
                                <th>RG</th>
                                <th>Ativo</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody id="listaCliente"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/all.js"></script>
    <script src="/js/listacliente.js"></script>
</body>
</html>
