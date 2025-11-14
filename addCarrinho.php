<?php
    session_start();

    $id_produto = $_GET["id_produto"];
    include("admin/includes/conexao.php");

    $produto = mysqli_query($conexao, "select *, 1 as qtd from tb_produtos where id = '$id_produto'");

    if (!isset($_SESSION["carrinho"])){ //Se a avriavel de Sessão não existir
        $_SESSION["carrinho"] = array(); //Cria um Array Vazio
    }
    
    array_push($_SESSION["carrinho"],mysqli_fetch_assoc($produto));

    header("Location: index.php?page=Carrinho");

?>