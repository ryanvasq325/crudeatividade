<?php

include_once 'Conexao.php';

$pesquisa = $_POST['pesquisa'];
$where = '';
if (!is_null($pesquisa) and !empty($pesquisa)) {
    $where = "where nome_completo ilike '%{$pesquisa}%' or cpf ilike '%{$pesquisa}%'";
}
$sql = "select * from cliente $where";
$query = $conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$response = [
    'status' => true,
    'data' => $query
];
echo json_encode($response);