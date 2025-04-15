<?php
include("conexao.php");

    $id = $_GET['id_cadastro1'];
    $sql = "SELECT * FROM cadastro1 WHERE id_cadastro1 = $id";
    $result = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($result);

?>

<h2>Editar Empresa</h2>
<form action="atualizar1.php" method="POST">
  <input type="hidden" name="id_cadastro1" value="<?php echo $dados['id_cadastro1']; ?>">
  CNPJ: <input type="text" name="cpf" value="<?php echo $dados['cpf']; ?>"><br>
  Senha: <input type="text" name="senha" value="<?php echo $dados['senha']; ?>"><br>
  <button type="submit">Atualizar</button>
</form>
