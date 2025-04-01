<?php

      include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$serie = $_POST['s'];
$data_nascimento = $_POST['data_nascimento'];

$sql="INSERT INTO cadastro(nome, email, senha, s, data_nascimento)
VALUES ('$nome', '$email', '$senha', '$serie', '$data_nascimento')";
if(mysqli_query($conexao, $sql)){
echo "Usuário Cadastrado com sucesso";
}else{
echo "Erro". mysqli_connect_error($conexao);
}

mysqli_close($conexao);

?>
