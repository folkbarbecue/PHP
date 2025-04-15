<?php

      include("conexao.php");

$cnpj = $_POST['cnpj'];
$senha1 = $_POST['senha1'];


$sql="INSERT INTO cadastro(cnpj,senha1)
VALUES ('$cnpj', '$senha1')";
if(mysqli_query($conexao, $sql)){
echo "Usuário Cadastrado com sucesso";
}else{
echo "Erro". mysqli_connect_error($conexao);
}

mysqli_close($conexao);

?>