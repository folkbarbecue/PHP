<?php
include("conexao.php");

$id = $_POST['id_cadastro1'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$sql = "UPDATE cadastro1 SET cpf='$cpf', senha='$senha' WHERE id_cadastro1=$id";

if (mysqli_query($conexao, $sql)) {
    header("Location: dashboard1.php");
} else {
    echo "Erro ao atualizar: " . mysqli_error($conexao);
}
?>
