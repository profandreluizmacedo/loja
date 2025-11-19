<?php 
  session_start();
  //Verifica se existe cliente logado, senão existir carrega a página de Cadastro/Login
  if (!$_SESSION["cliente"]){
    include_once("cadastroLogin.php") ;
    exit();
  }

  //Verifica se existe um Endereço Selecionado
?>