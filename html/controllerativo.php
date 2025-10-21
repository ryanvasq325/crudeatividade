<?php
require_once 'Conexao.php'; 

header('Content-Type: application/json');

try {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'toggle') {
        $id = $_POST['id'] ?? 0;
        $ativo = $_POST['ativo'] ?? 1;

        $sql = "UPDATE usuario SET ativo = $1 WHERE id = $2";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ativo, $id]);

        echo json_encode([
            'status' => true,
            'msg' => $ativo ? 'Usuário ativado com sucesso!' : 'Usuário desativado com sucesso!'
        ]);
        exit;
    }

    echo json_encode(['status' => false, 'msg' => 'Ação inválida.']);
} catch (Exception $e) {
    echo json_encode(['status' => false, 'msg' => 'Erro: ' . $e->getMessage()]);
}
?>
