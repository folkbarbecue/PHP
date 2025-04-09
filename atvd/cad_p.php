<?php
include("conexao.php");

$nomep = $_POST['nomep'];
$nomep2 = $_POST['nomep2'];
$descrp = $_POST['descrp'];

$sql = "INSERT INTO projetos (nomep, nomep2, descrp)
        VALUES ('$nomep', '$nomep2', '$descrp')";

if (mysqli_query($conexao, $sql)) {
    echo "Usuário Cadastrado com sucesso";
} else {
    echo "Erro: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
