<?php

      include("conexao.php");

$sm1 = $_POST['sm1'];
$sm2 = $_POST['sm2'];
$sm3 = $_POST['sm3'];
$sm4 = $_POST['sm4'];
$sm5 = $_POST['sm5'];
$sm6 = $_POST['sm6'];
$sm7 = $_POST['sm7'];
$sm8 = $_POST['sm8'];
$sm9 = $_POST['sm9'];
$sm10 = $_POST['sm10'];
$sm11 = $_POST['sm11'];
$sm12 = $_POST['sm12'];


$sql="INSERT INTO cadastro(cnpj,senha1)
VALUES ('$cnpj', '$senha1')";
if(mysqli_query($conexao, $sql)){
echo "Usuário Cadastrado com sucesso";
}else{
echo "Erro". mysqli_connect_error($conexao);
}

mysqli_close($conexao);

?>