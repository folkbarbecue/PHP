<?php
$host = 'localhost';
$dbname = 'crud';
$username = 'root';
$password = '';

$conexao=mysqli_connect($host, $username, $password, $dbname);
if(!$conexao){
 die("Houve um erro: ".mysqli_connect_error());
}

?>