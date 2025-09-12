<?php
  $categoria = $_POST['txtcategoria'];
  include("../../includes/conexao.php");
  $salvou = mysqli_query($conexao,
  "INSERT INTO tb_categorias (categoria) VALUES 
                             ('$categoria')");
  if ($salvou){
    echo "dados Salvos com sucesso!";
  }else{
    echo "Erro ao salvar os dados!";
  } 
  ?>