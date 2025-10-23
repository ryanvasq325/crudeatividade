<?php
require_once 'Conexao.php';

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];

$sql = "insert into cliente (nome, sobrenome, cpf, rg) values ('{$nome}', '{$sobrenome}', '{$cpf}','{$rg}');";
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