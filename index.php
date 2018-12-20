<?php 
  

  require_once("config.php");



   //Carrega um usuario só
  //$root = new Usuario();

  //$root->loadById(1); 
  //echo $root;

  //Carrega um lista de usuarios
  //$lista = Usuario::getList();

  //echo json_encode($lista);

  //Carrega uma lista de usuarios buscando pelo login 

  //$busca = Usuario::search("o");

  //echo json_encode($busca);


  //Carrega um usuario usando login e senha 
  $Usuario = new Usuario();


  $Usuario->login("user",);
  echo $Usuario;

?> 