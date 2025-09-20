<?php
  $id = $_POST['id'] ?? 0;
  $categoria = $_POST['txtcategoria'];
  include("../../includes/conexao.php");
  
  if ($id > 0) {
    // Atualiza a categoria existente
    $salvou = mysqli_query($conexao,
      "UPDATE tb_categorias SET categoria = '$categoria' WHERE id = $id");
  }else{
  $salvou = mysqli_query($conexao,
  "INSERT INTO tb_categorias (categoria) VALUES 
                             ('$categoria')");
  }
  
  if ($salvou){
    echo "dados Salvos com sucesso!";
  }else{
    echo "Erro ao salvar os dados!";
  } 
  ?>