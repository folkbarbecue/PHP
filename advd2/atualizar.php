<?php
include("conexao.php");

$id = $_POST['id_cadastro'];
$cnpj = $_POST['cnpj'];
$senha1 = $_POST['senha1'];

$sql = "UPDATE cadastro SET cnpj='$cnpj', senha1='$senha1' WHERE id_cadastro=$id";

if (mysqli_query($conexao, $sql)) {
    header("Location: dashboard.php");
} else {
    echo "Erro ao atualizar: " . mysqli_error($conexao);
}
?>
