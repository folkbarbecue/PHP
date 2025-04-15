<?php

include("conexao.php");


$sql = "SELECT * FROM cadastro";

$result = mysqli_query($conexao, $sql);
?>



<div class="tabela">
    <h2>Lista de Empresas
    </h2>
    <table>
      <tr>
        <th>cnpj</th>
        <th>senha1</th>
        <th>Alterar</th>  
      </tr>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>   

          <td><?php echo $row['cnpj']; ?></td>
          <td><?php echo $row['senha1']; ?></td>
          <td>
          <a href="editar.php?id_cadastro=<?php echo $row['id_cadastro']; ?>">Editar</a>
          </td>
      
        
        </tr>
      <?php } ?>
    </table>
  </div>