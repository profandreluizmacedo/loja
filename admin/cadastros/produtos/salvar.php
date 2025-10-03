<?php
  $id = $_POST['id'] ?? 0;
  $subcategoria = $_POST['id_subcategoria'];
  $nome         = $_POST['nome'];
  $descricao    = $_POST['descricao'];
  $estoque      = $_POST['estoque'];
  $preco = str_replace(['R$', '.', ','], ['', '', '.'], $_POST['preco']);

  include("../../includes/conexao.php");

  if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $novo_nome = uniqid() . '.' . $extensao;
    $diretorio = "fotos/";
    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio . $novo_nome);
    $foto = $novo_nome;
  } else {
    $foto = null; // Ou algum valor padrão
  }
  
  if ($id > 0) {
    // Atualiza a categoria existente
    $salvou = mysqli_query($conexao,
      "UPDATE tb_subcategorias SET id_categoria = '$categoria', subcategoria = '$subcategoria' WHERE id = $id");
  }else{
  $salvou = mysqli_query($conexao,
  "INSERT INTO tb_produtos (id_subcategoria, nome, descricao, estoque, preco, foto) VALUES 
                         ('$subcategoria', '$nome', '$descricao', '$estoque', $preco, '$foto')") or die(mysqli_error($conexao));
  }
  
  if ($salvou){
    echo "dados Salvos com sucesso!";
  }else{
    echo "Erro ao salvar os dados!";
  } 
  ?>