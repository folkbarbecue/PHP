<?php
include("conexao.php");

    $id = $_GET['id_cadastro'];
    $sql = "SELECT * FROM cadastro WHERE id_cadastro = $id";
    $result = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($result);

?>

<h2>Editar Empresa</h2>
<form action="atualizar.php" method="POST">
  <input type="hidden" name="id_cadastro" value="<?php echo $dados['id_cadastro']; ?>">
  CNPJ: <input type="text" name="cnpj" value="<?php echo $dados['cnpj']; ?>"><br>
  Senha: <input type="text" name="senha1" value="<?php echo $dados['senha1']; ?>"><br>
  <button type="submit">Atualizar</button>
</form>
