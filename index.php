<?php

require_once ("config.php");


//$sql = new Sql();
//$result = $sql -> select("SELECT * FROM tb_usuario");
//echo json_encode($result);

//carrega um usuario
//$root = new Usuario();
//$root -> loadbyId(4);
//echo $root;

//carrega uma lista
//$list = Usuario::getlist();
//echo json_encode($list);

//carrega uma busca
//$search = Usuario::search("ando");
 //echo json_encode($search);

 //CARREGA COM AUETNTICAÇÃO

 $user = new Usuario;
 $user -> login("fernando","fe@102030");
 echo $user;

?>