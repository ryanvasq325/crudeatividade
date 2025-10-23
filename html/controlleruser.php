<?php
require_once 'Conexaouser.php';

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$senha = $_POST['senha'];
$email = $_POST['email'];

$sql = "insert into usuario (nome, sobrenome, cpf, rg, senha, email) values ('{$nome}', '{$sobrenome}', '{$cpf}', '{$rg}', '{$senha}', '{$email}');";
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