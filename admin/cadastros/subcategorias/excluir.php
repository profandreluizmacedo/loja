<?php
  $id = $_POST['id'];
  include("../../includes/conexao.php");

  $excluir = mysqli_query($conexao,
  "delete from tb_subcategorias WHERE id = $id");

  if ($excluir){
    echo "SubCategoria removida com sucesso!";
  }else{
    echo "Erro ao excluir subcategoria!";
  } 
  //TEste de Commite
  ?>