<?php

require_once ("config.php");

$sql = new Sql();
$result = $sql -> select("SELECT * FROM tb_usuario");

echo json_encode($result);

?>