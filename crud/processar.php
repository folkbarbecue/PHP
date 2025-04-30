<?php
// Configurações do banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "atv";

// Criar conexão
$conexao = mysqli_connect($servidor, $usuario, $senha);

// Verificar conexão
if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Criar banco de dados se não existir
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($conexao, $sql)) {
    // Selecionar o banco de dados
    mysqli_select_db($conexao, $dbname);
    
    // Criar tabela se não existir
    $sql = "CREATE TABLE IF NOT EXISTS valores_mensais (
        id INT AUTO_INCREMENT PRIMARY KEY,
        mes VARCHAR(20) NOT NULL,
        salario DECIMAL(10,2) NOT NULL,
        gastos DECIMAL(10,2) NOT NULL,
        saldo DECIMAL(10,2) NOT NULL,
        status VARCHAR(20) NOT NULL
    )";
    
    if (mysqli_query($conexao, $sql)) {
        // Se receber dados do formulário, processar e salvar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $meses = [
                'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
            ];

            // Limpar a tabela antes de inserir novos dados
            $sql_limpar = "TRUNCATE TABLE valores_mensais";
            mysqli_query($conexao, $sql_limpar);

            for ($i = 1; $i <= 12; $i++) {
                $salario = isset($_POST["sl$i"]) ? floatval($_POST["sl$i"]) : 0;
                $gastos = isset($_POST["gm$i"]) ? floatval($_POST["gm$i"]) : 0;
                $saldo = $salario - $gastos;
                $status = $saldo >= 0 ? 'Positivo' : 'Negativo';

                $sql = "INSERT INTO valores_mensais (mes, salario, gastos, saldo, status) 
                        VALUES (?, ?, ?, ?, ?)";
                
                $stmt = mysqli_prepare($conexao, $sql);
                mysqli_stmt_bind_param($stmt, "sddds", 
                    $meses[$i-1], 
                    $salario, 
                    $gastos, 
                    $saldo, 
                    $status
                );

                if (mysqli_stmt_execute($stmt)) {
                    echo "Dados do mês {$meses[$i-1]} salvos com sucesso!<br>";
                } else {
                    echo "Erro ao salvar dados do mês {$meses[$i-1]}: " . mysqli_error($conexao) . "<br>";
                }

                mysqli_stmt_close($stmt);
            }

            // Redirecionar para o dashboard após salvar
            header("Location: dashboard.php");
            exit();
        }
    } else {
        echo "Erro ao criar tabela: " . mysqli_error($conexao);
    }
} else {
    echo "Erro ao criar banco de dados: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?> 