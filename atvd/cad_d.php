<?php
include("conexao.php");

$nomed = $_POST['nomed'];
$nomed2 = $_POST['nomed2'];


$sql = "INSERT INTO departamento (nomed, nomed2)
        VALUES ('$nomed', '$nomed2')";

if (mysqli_query($conexao, $sql)) {
    echo "Usuário Cadastrado com sucesso";
} else {
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
