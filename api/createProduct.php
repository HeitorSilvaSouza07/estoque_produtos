<?php

require_once 'config.php';

$descricao = $_POST['descricao'];
$valorCompra = $_POST['valorCompra'];
$valorVenda = $_POST['valorVenda'];
$categoria = $_POST['categoria'];
$quantidade = $_POST['quantidade'];

$sql = "INSERT INTO produto (descricao, categoria, valorCompra, valorVenda, quantidade) 
        VALUES ('$descricao', '$categoria', '$valorCompra', '$valorVenda', '$quantidade')";

if(mysqli_query($conexao, $sql)){
    echo json_encode(['sucesso' => true, 'mensagem' => 'Cadastrado com sucesso']);
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro no cadastro: ' . mysqli_error($conexao)]);
}

?>