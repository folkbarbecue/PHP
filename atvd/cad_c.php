<?php
include("conexao.php");

$nomec = $_POST['nomec'];
$cpfc = $_POST['cpfc'];
$telefonec = $_POST['telefonec'];

$sql = "INSERT INTO cliente (nomec, cpfc, telefonec)
        VALUES ('$nomec', '$cpfc', '$telefonec')";

if (mysqli_query($conexao, $sql)) {
    echo "Usuário Cadastrado com sucesso";
} else {
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
