<?php
    session_start();
    $id_cliente = $_SESSION["cliente"]["id"];
    $descricao = $_POST["descricao"];  
    $endereco  = $_POST["endereco"];  
    $numero    = $_POST["numero"];  
    $bairro    = $_POST["bairro"];  
    $cep       = $_POST["cep"];  
    $cidade    = $_POST["cidade"]; 
    
    include("admin/includes/conexao.php");

    $grava = mysqli_query($conexao,"INSERT INTO tb_cliente_enderecos 
    VALUES (null, $id_cliente, '$descricao', '$endereco', '$numero', '$bairro', '$cep', $cidade)");

    
?>