<?php 

$host = 'localhost';
$user = 'root';
$password = 'usbw';
$db = 'loja';

$conexao = mysqli_connect($host, $user, $password, $db);

if(!$conexao){
    die('Erro na conexão com o banco: ' . mysqli_connect_error());
}

?>