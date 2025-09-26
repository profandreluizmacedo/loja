<?php
  $id = $_POST['id'] ?? 0;
  $categoria = $_POST['txtcategoria'];
  $subcategoria = $_POST['txtsubcategoria'];
  include("../../includes/conexao.php");
  
  if ($id > 0) {
    // Atualiza a categoria existente
    $salvou = mysqli_query($conexao,
      "UPDATE tb_subcategorias SET id_categoria = '$categoria', subcategoria = '$subcategoria' WHERE id = $id");
  }else{
  $salvou = mysqli_query($conexao,
  "INSERT INTO tb_subcategorias (id_categoria, subcategoria) VALUES 
                             ('$categoria', '$subcategoria')") or die(mysqli_error($conexao));
  }
  
  if ($salvou){
    echo "dados Salvos com sucesso!";
  }else{
    echo "Erro ao salvar os dados!";
  } 
  ?>