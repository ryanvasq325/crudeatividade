<?php
include_once 'Conexaouser.php';

$id = $_POST['id_usuario'] ?? null;

if (!$id) {
    echo json_encode(['status' => false, 'msg' => 'ID inválido!']);
    exit;
}

try {
    $sql = "SELECT id, nome, sobrenome, cpf, rg, email FROM usuario WHERE $id = :id_usuario";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id_usuario', $id, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($usuario);
} catch (PDOException $e) {
    echo json_encode(['status' => false, 'msg' => $e->getMessage()]);
}