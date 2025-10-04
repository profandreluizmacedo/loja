<?php
  $id = $_POST['id'];
  include("../../includes/conexao.php");

  $linha = mysqli_fetch_array(mysqli_query($conexao, "SELECT foto FROM tb_produtos WHERE id = $id"));
  $foto = $linha['foto'];

  if (unlink("fotos/" . $foto) ){    
      $excluir = mysqli_query($conexao,
    "DELETE FROM tb_produtos WHERE id = $id");

    if ($excluir){
      echo "Produto removido com sucesso!";
    }else{
      echo "Erro ao excluir produto!";
    } 
  }else{
     echo "Erro ao excluir foto do produto!"; 
  }

 
  //TEste de Commite
  ?>