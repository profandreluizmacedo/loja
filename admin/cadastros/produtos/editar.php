<?php
  $id = $_GET['id'];
  include("../../includes/conexao.php");

   $linha = mysqli_query($conexao, "SELECT * FROM tb_produtos WHERE id = $id");
   $data = mysqli_fetch_assoc($linha);
   echo json_encode($data);

?>