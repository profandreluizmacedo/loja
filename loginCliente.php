<?php
    session_start();
    $email = $_POST["login"];
    $senha = $_POST["senha"];
    include("admin/includes/conexao.php");

    $testaLogin = mysqli_query($conexao,
    "select * from tb_clientes where email = '$email' and senha = '$senha'")
    or die(mysqli_error($conexao));

    if (mysqli_num_rows($testaLogin)>0){
            $_SESSION["cliente"] = mysqli_fetch_assoc($testaLogin);
            echo "1";
    }else{
        echo "Email e/ou senha inválidos";
    }
?>