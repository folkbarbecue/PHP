<?php
include("conexao.php");

$nomef = $_POST['nomef'];
$cpff = $_POST['cpff'];
$cargof = $_POST['cargof'];
$senhaf = $_POST['senhaf'];

$sql = "INSERT INTO funcionario (nomef, cpff, cargof, senhaf)
        VALUES ('$nomef', '$cpff', '$cargof', '$senhaf')";

if (mysqli_query($conexao, $sql)) {
    echo "Usuário Cadastrado com sucesso";
} else {
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
