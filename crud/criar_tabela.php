<?php
require_once 'conexao.php';

$sql = "CREATE TABLE IF NOT EXISTS valores_mensais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mes VARCHAR(20) NOT NULL,
    salario DECIMAL(10,2) NOT NULL,
    gastos DECIMAL(10,2) NOT NULL,
    saldo DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) NOT NULL,
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if(mysqli_query($conexao, $sql)) {
    echo "Tabela criada com sucesso!";
} else {
    echo "Erro ao criar tabela: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?> 