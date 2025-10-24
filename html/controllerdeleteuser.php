<?php
require_once 'Conexaouser.php';

$id = $_POST['id_usuario'] ?? null;

if (empty($id)) {
    echo json_encode([
        'status' => false,
        'msg' => 'ID do usuário não informado.'
    ]);
    exit;
}

try {
    $sql = "DELETE FROM usuario WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo json_encode([
            'status' => true,
            'msg' => 'Usuário excluído com sucesso!'
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'msg' => 'Usuário não encontrado ou já excluído.'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'status' => false,
        'msg' => 'Erro ao excluir usuário: ' . $e->getMessage()
    ]);
}