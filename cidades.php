<?php
    $estado = $_POST["estado"];

    include("admin/includes/conexao.php");
    $cidades = mysqli_query($conexao, 
    "select codigo_cidade, nome_cidade from tb_cidades where codigo_estado = '$estado' order by nome_cidade");

    while ($cidade = mysqli_fetch_assoc($cidades)){
      echo '<option value="'.$cidade["codigo_cidade"].'">'.$cidade["nome_cidade"].'</option>';
    }
    
?>