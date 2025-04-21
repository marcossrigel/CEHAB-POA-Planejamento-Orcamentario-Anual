<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = ''; // padrão do XAMPP é vazio
$dbName = 'formulario';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_errno) {
  echo "Erro na conexão: " . $conexao->connect_error;
} else {
  echo "Conexão efetuada com sucesso!";
}
?>
