<?php

require_once 'Conexao.php';
$id = $_POST['id_cliente'];
$sql = "select id, nome_completo, cpf from cliente where id = $id";
$cliente = $conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
echo json_encode($cliente);