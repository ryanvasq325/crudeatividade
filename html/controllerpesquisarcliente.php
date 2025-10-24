<?php
include_once 'Conexao.php';

$id = $_POST['id_cliente'] ?? null;

if (empty($id)) {
    echo json_encode([
        'status' => false,
        'msg' => 'ID do cliente não informado.'
    ]);
    exit;
}

try {
    $sql = "SELECT id, nome, sobrenome, cpf, rg, ativo 
            FROM cliente 
            WHERE id = :id_cliente";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':id_cliente', $id, PDO::PARAM_INT);
    $stmt->execute();

    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        echo json_encode([
            'status' => false,
            'msg' => 'Cliente não encontrado.'
        ]);
        exit;
    }

    echo json_encode([
        'status' => true,
        'data' => $cliente
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'status' => false,
        'msg' => 'Erro ao buscar cliente: ' . $e->getMessage()
    ]);
}