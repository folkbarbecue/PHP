<?php
$host = 'localhost';
$dbname = 'crud';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

function salvarDados($mes, $salario, $gastos, $saldo, $status) {
    global $pdo;
    
    try {
        // Verifica se já existe registro para o mês
        $stmt = $pdo->prepare("SELECT id FROM controle_financeiro WHERE mes = ?");
        $stmt->execute([$mes]);
        $existe = $stmt->fetch();
        
        if ($existe) {
            // Atualiza o registro existente
            $stmt = $pdo->prepare("UPDATE controle_financeiro SET salario = ?, gastos = ?, saldo = ?, status = ? WHERE mes = ?");
            $stmt->execute([$salario, $gastos, $saldo, $status, $mes]);
        } else {
            // Insere novo registro
            $stmt = $pdo->prepare("INSERT INTO controle_financeiro (mes, salario, gastos, saldo, status) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$mes, $salario, $gastos, $saldo, $status]);
        }
        
        return true;
    } catch(PDOException $e) {
        return false;
    }
}

function buscarDados($mes) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM controle_financeiro WHERE mes = ?");
        $stmt->execute([$mes]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return false;
    }
}
?> 