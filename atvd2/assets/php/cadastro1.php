<?php

      include("./assets/php/conexao.php");

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];


$sql="INSERT INTO cadastro1(cpf,senha)
VALUES ('$cpf', '$senha')";
if(mysqli_query($conexao, $sql)){
echo "Usuário Cadastrado com sucesso";
}else{
echo "Erro". mysqli_connect_error($conexao);
}

mysqli_close($conexao);

?>