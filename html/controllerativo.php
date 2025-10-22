<?php
include_once 'Conexao.php';

$id = $_POST['id_cliente'] ?? null;
$ativo = $_POST['ativo'] ?? null;

if (!$id) {
    echo json_encode(['status' => false, 'msg' => 'ID do cliente não informado!']);
    exit;
}

try {
    $sql = "UPDATE cliente SET ativo = :ativo WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':ativo', $ativo, PDO::PARAM_BOOL);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo json_encode(['status' => true, 'msg' => 'Status atualizado com sucesso!']);
} catch (PDOException $e) {
    echo json_encode(['status' => false, 'msg' => 'Erro: ' . $e->getMessage()]);
}
?>
