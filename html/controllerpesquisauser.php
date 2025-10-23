<?php
include_once 'Conexaouser.php';

$pesquisa = $_POST['pesquisa'] ?? null;

try {
    $sql = "SELECT * FROM usuario";
    if (is_null($pesquisa) or empty($pesquisa)) {
        $result = $conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['status' => true, 'data' => $result]);
        die;
    }
    $where = " where nome ilike '{$pesquisa}' or sobrenome ilike '$pesquisa' or cpf ilike '{$pesquisa}' or rg ilike '{$pesquisa}';";
    $result = $conexao->query($sql . $where)->fetchAll();
    echo json_encode(['status' => true, 'data' => $result]);
    die;
} catch (PDOException $e) {
    echo json_encode([
        'status' => false,
        'msg' => 'Erro ao buscar usuario: ' . $e->getMessage()
    ]);
}
