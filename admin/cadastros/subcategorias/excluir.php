<?php
  $id = $_POST['id'];
  include("../../includes/conexao.php");

  $excluir = mysqli_query($conexao,
  "delete from tb_categorias WHERE id = $id");

  if ($excluir){
    echo "Categoria removida com sucesso!";
  }else{
    echo "Erro ao excluir categoria!";
  } 
  //TEste de Commite
  ?>