<?php
require_once 'Conexaouser.php';

try {

 $id = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $pesquisa = $_POST['pesquisa'];
    $sql = "update usuario set nome = '{$nome}', sobrenome = '{$sobrenome}', cpf = '{$cpf}', rg = '{$rg}', senha = '{$senha}', email = '{$email} 'where id = {$id}";
    $usuario = $conexao->exec($sql);

    if (!$usuario) {
        echo json_encode([
            'status' => false,
            'msg' => 'Usuario não encontrado.'
        ]);
        exit;
    }

    echo json_encode([
        'status' => true,
        'msg' => 'Alterado com sucesso!'
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'status' => false,
        'msg' => 'Erro ao buscar usuario: ' . $e->getMessage()
    ]);
}