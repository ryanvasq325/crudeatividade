<?php
require_once 'conexaoprodutos.php';

$produto = $_POST['produto'];
$valor_compra = $_POST['valor_compra'];
$valor_venda = $_POST['valor_venda'];
$marca = $_POST['marca'];
$grupo = $_POST['grupo'];

$sql = "insert into produto (produto, valor_compra, valor_venda, marca, grupo) values ('{$produto}', '{$valor_compra}', '{$valor_venda}','{$marca}','{$grupo}');";
$result = $conexao->exec($sql);
if ($result) {
$response = [
'msg' => 'Cadastro realizado com sucesso!',
'status' => true
];
echo json_encode($response);
die;
}
$response = [
'msg' => 'Restrição: não possivel realizar o cadastro, tente novamente mais tarde!',
'status' => false
];
echo json_encode($response); 