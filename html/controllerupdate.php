<?php

require_once 'Conexao.php';

$id = $_POST['id_cliente'];
$nome_completo = $_POST['nome_completo'];
$cpf = $_POST['cpf'];

$sql = "update cliente set nome_completo = '{$nome_completo}', cpf = '{$cpf}' where id = $id";

$query = $conexao->exec($sql);

if ($query) {
    $response = [
        'msg' => 'Alteração realizada com sucesso!',
        'status' => true
    ];
    echo json_encode($response);
    die;
}
$response = [
        'msg' => 'Restrição não foi possivel realizar a alteração!',
        'status' => false,
];
echo json_encode($response);