<?php 
  session_start();


  //Verifica se existe cliente logado, senão existir carrega a página de Cadastro/Login
  if (!$_SESSION["cliente"]){
    include_once("cadastroLogin.php") ;
    exit();
  }
  include("admin/includes/conexao.php");
  $id_endereco = (int)$_POST["id_endereco"];
  $id_cliente  = $_SESSION["cliente"]["id"];
  $valor_total = (int)$_SESSION["total_carrinho"];
  //Fazemos o insert do Pedido
  $inserePedido = mysqli_query($conexao, "
      INSERT INTO tb_pedidos VALUES 
      (null, current_date, $id_cliente, $id_endereco, $valor_total)");

  $id_pedido = mysqli_insert_id($conexao);

  foreach ($_SESSION["carrinho"] as $key => $value) {

     $valor = $value["preco"];
     $qtd   = $value["qtd"];
     $id_produto = $value["id"];
     $inserePedido = mysqli_query($conexao, "
      INSERT INTO tb_pedidos_itens VALUES 
      (null, $id_pedido, $id_produto, $valor, $qtd )") or die(mysqli_error($conexao));
  }

  unset($_SESSION["carrinho"]);
  unset($_SESSION["total_carrinho"]);
  echo "Sucesso";

?>