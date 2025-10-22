<?php

require_once 'Conexaouser.php';

$nome_completo = $_POST['nome_completo'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];

$sql = "insert into usuario (nome_completo,senha,cpf,email) values ('{$nome_completo}', '{$senha}', '{$cpf}', '{$email}');";
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