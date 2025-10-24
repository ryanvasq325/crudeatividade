<?php

require_once 'conexaoprodutos.php';
$id = $_POST['id_produto'];
$sql = "select id, produto, valor_compra, valor_venda, marca, grupo from produto where id = $id";
$produto = $conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
echo json_encode($produto);