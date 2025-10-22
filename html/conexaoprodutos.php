<?php
$usuario = "senac";
$senha = "senac";
$porta = "5432";
$host =  "localhost";
$banco = "produtos";
$dsn = "pgsql:host=$host;port=$porta;dbname=$banco";
try {
    $conexao = new PDO($dsn,$usuario,$senha);
} catch (\PDOException $e) {
    echo "Restrição: " .$e->getMessage();
}