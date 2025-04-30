<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $meses = [
        'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
    ];

    // Primeiro, limpar a tabela para evitar duplicatas
    $sql_limpar = "TRUNCATE TABLE valores_mensais";
    mysqli_query($conexao, $sql_limpar);

    for ($i = 1; $i <= 12; $i++) {
        $salario = isset($_POST["sl$i"]) ? floatval($_POST["sl$i"]) : 0;
        $gastos = isset($_POST["gm$i"]) ? floatval($_POST["gm$i"]) : 0;
        $saldo = isset($_POST["saldo$i"]) ? floatval($_POST["saldo$i"]) : 0;
        $status = isset($_POST["status$i"]) ? $_POST["status$i"] : 'Negativo';

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

mysqli_close($conexao);
?> 