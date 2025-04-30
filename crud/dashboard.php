<?php
require_once 'conexao.php';

$sql = "SELECT * FROM valores_mensais ORDER BY id ASC";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Controle Financeiro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .table-container {
            margin: 20px;
        }
        .status-positivo {
            color: green;
        }
        .status-negativo {
            color: red;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Dashboard</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Voltar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container table-container">
        <h2>Histórico Financeiro</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mês</th>
                    <th>Salário</th>
                    <th>Gastos</th>
                    <th>Saldo</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['mes']); ?></td>
                    <td>R$ <?php echo number_format($row['salario'], 2, ',', '.'); ?></td>
                    <td>R$ <?php echo number_format($row['gastos'], 2, ',', '.'); ?></td>
                    <td>R$ <?php echo number_format($row['saldo'], 2, ',', '.'); ?></td>
                    <td class="<?php echo $row['status'] === 'Positivo' ? 'status-positivo' : 'status-negativo'; ?>">
                        <?php echo htmlspecialchars($row['status']); ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
mysqli_close($conexao);
?>
