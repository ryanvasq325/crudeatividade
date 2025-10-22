<?php

require_once 'conexaoprodutos.php';

$id = $_POST['id_produto'];
$produto = $_POST['produto'];
$valor_compra = $_POST['valor_compra'];
$valor_venda = $_POST['valor_venda'];
$marca = $_POST['marca'];
$grupo = $_POST['grupo'];

$sql = "update produto set produto = '{$produto}', valor_compra = '{$valor_compra}', valor_venda = '{$valor_venda}', marca = '{$marca}', grupo = '{$grupo}' where id = $id";

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