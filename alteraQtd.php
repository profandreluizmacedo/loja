<?php
    session_start();
    $id = $_GET["id"];
    if ($_GET["acao"]== "subtrair"){
        if ($_SESSION["carrinho"][$id]["qtd"] > 1 ){
            $_SESSION["carrinho"][$id]["qtd"] = intval($_SESSION["carrinho"][$id]["qtd"]) - 1;   
        }
        
    }else{
        $_SESSION["carrinho"][$id]["qtd"] = intval($_SESSION["carrinho"][$id]["qtd"]) + 1;  
    }
    
   
    header("Location: index.php?page=Carrinho");

?>