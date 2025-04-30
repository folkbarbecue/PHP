<?php
require_once 'db_operations.php';

header('Content-Type: application/json');

try {
    if (!isset($_GET['mes'])) {
        throw new Exception('Mês não especificado');
    }
    
    $mes = intval($_GET['mes']);
    $dados = buscarDados($mes);
    
    if ($dados) {
        echo json_encode([
            'success' => true,
            'salario' => $dados['salario'],
            'gastos' => $dados['gastos'],
            'saldo' => $dados['saldo'],
            'status' => $dados['status']
        ]);
    } else {
        echo json_encode([
            'success' => true,
            'salario' => 0,
            'gastos' => 0,
            'saldo' => 0,
            'status' => 'Neutro'
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?> 