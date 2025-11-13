<?php
    if ($_POST["cpf"]){
        $nome     = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $cpf      = $_POST["cpf"];
        $email    = $_POST['email'];
        $senha    = $_POST["senha"];

        include("admin/includes/conexao.php");
    

        $gravaCliente = mysqli_query($conexao,
        "INSERT INTO tb_clientes VALUES (0, '$nome', '$cpf', '$telefone','$email','$senha')")
        or die (mysqli_error($conexao));

        if ($gravaCliente){
            echo "Dados Gravados com sucesso! Agora você já pode efetuar seu login";
        }


    }

?>