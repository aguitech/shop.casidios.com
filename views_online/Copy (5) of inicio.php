<?php
include("includes/includes.php");
//print_r($_GET);

$username = $_GET["name"];

echo $username;
echo "<br />";

//$resultado = $obj->get_row("select * from usuario where usuario = '{$username}'");
//$qry = "select * from usuario where usuario = '{$username}'";
$qry = "elect * from usuario where usuario = 'aguitech'";
//echo $qry;
//$resultado = $obj->get_results($qry);
//$categorias = $obj->get_results('select * from usuario');
//$usuario = $obj->get_results('select * from usuario');
//$usuario = $obj->get_results('select * from usuario where usuario = "{$username}"');
$usuario = $obj->get_results("select * from usuario where usuario = '{$username}'");
print_r($usuario);

echo "<hr />";

$categorias = $obj->get_results('select * from categoria');
print_r($categorias);
?>
QUE ROLLO