-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS atv;

-- Usar o banco de dados
USE atv;

-- Criar a tabela de valores mensais
CREATE TABLE IF NOT EXISTS valores_mensais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mes VARCHAR(20) NOT NULL,
    salario DECIMAL(10,2) NOT NULL,
    gastos DECIMAL(10,2) NOT NULL,
    saldo DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserir alguns dados de exemplo (opcional)
INSERT INTO valores_mensais (mes, salario, gastos, saldo, status) VALUES
('Janeiro', 3000.00, 2500.00, 500.00, 'Positivo'),
('Fevereiro', 3000.00, 3200.00, -200.00, 'Negativo'),
('Março', 3000.00, 2800.00, 200.00, 'Positivo'); 