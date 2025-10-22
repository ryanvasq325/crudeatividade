<?php

include_once 'conexaoprodutos.php';

$pesquisa = $_POST['pesquisa'];
$where = '';
if (!is_null($pesquisa) and !empty($pesquisa)) {
    $where = "where produto ilike '%{$pesquisa}%' or valor_compra ilike '%{$pesquisa}%'or valor_venda ilike '%{$pesquisa}%' or marca ilike '%{$pesquisa}%'or grupo ilike '%{$pesquisa}%'";
}
$sql = "select * from produto $where";
$query = $conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$response = [
    'status' => true,
    'data' => $query
];
echo json_encode($response);