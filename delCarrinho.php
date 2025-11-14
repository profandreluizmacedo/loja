<?php
    session_start();
    $id = $_GET["id"];
    unset($_SESSION["carrinho"][$id]);
   
    header("Location: index.php?page=Carrinho");

?>