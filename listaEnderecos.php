<?php
    session_start();
    $id_cliente = $_SESSION["cliente"]["id"];

    include("admin/includes/conexao.php");
    $enderecos = mysqli_query($conexao, 
    "select * from tb_clientes_enderecos where id_cliente = '$id_cliente' 
    order by descricao") or die (mysqli_error($conexao));

    while ($endereco = mysqli_fetch_assoc($enderecos)){
      echo '<input type="radio" name="endereco_entrega" id="endereco_entrega" 
      value="'.$endereco["id"].'">'.$endereco["descricao"].'<br>';
    }
    
?>