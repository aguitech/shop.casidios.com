<?php
include("includes/includes.php");
//print_r($_GET);

$username = $_GET["name"];

echo $username;
echo "<br />";

//$resultado = $obj->get_row("select * from usuario where usuario = '{$username}'");
//$qry = "select * from usuario where usuario = '{$username}'";
$qry = 'select * from usuario';
//echo $qry;
//$resultado = $obj->get_results($qry);
$username = $obj->get_results($qry);
print($username);

echo "<hr />";

$categorias = $obj->get_results('select * from categoria');
print_r($categorias);
?>
QUE ROLLO