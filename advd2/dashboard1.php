<?php

include("conexao.php");


$sql = "SELECT * FROM cadastro1";

$result = mysqli_query($conexao, $sql);
?>



<div class="tabela">
    <h2>Lista de candidatos
    </h2>
    <table>
      <tr>
        <th>cpf</th>
        <th>senha</th>
        <th>Alterar</th>  
      </tr>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          
          <td><?php echo $row['cpf']; ?></td>
          <td><?php echo $row['senha']; ?></td>
          <td>
          <a href="editar1.php?id_cadastro1=<?php echo $row['id_cadastro1']; ?>">Editar</a>
          </td>
      
        
        </tr>
      <?php } ?>
    </table>
  </div>