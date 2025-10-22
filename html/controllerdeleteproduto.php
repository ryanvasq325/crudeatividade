<?php

require_once 'conexaoprodutos.php';

$id = $_POST['id_produto'];

$sql = "DELETE FROM produto WHERE id = $id";

$query = $conexao->exec($sql);

if ($query) {
    echo json_encode(['status'=> true,'msg'=>'Registro excluido com sucesso!', 'id' =>$id]);
    die;
}
 echo json_encode(['status'=> false,'msg'=>'Não foi possivel excluir o registro', 'id' =>0]);
    die;