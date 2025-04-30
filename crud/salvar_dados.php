<?php
require_once 'db_operations.php';

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($data['mes']) || !isset($data['salario']) || !isset($data['gastos']) || !isset($data['saldo']) || !isset($data['status'])) {
        throw new Exception('Dados incompletos');
    }
    
    $result = salvarDados(
        $data['mes'],
        $data['salario'],
        $data['gastos'],
        $data['saldo'],
        $data['status']
    );
    
    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        throw new Exception('Erro ao salvar dados');
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?> 