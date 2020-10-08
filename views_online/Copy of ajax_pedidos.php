<?php 
include("includes/includes.php");
session_start();

print_r($_SESSION);


$id_mesa = $_SESSION["mesa"];

//$pedidos = $obj->get_results("select * from venta where id_mesa")
//$pedidos = $obj->get_results("select * from venta where id_mesa = ''");
$pedidos = $obj->get_results("select * from venta where id_mesa = {$id_mesa}");

//$mesa_valor = $obj->get_row("select * from mesa where id_mesa = '$id_mesa'");

//print_r($mesa_valor);
?>
dsadsa

<?php foreach($pedidos as $pedido): ?>

	<div>
		<?php print_r($pedido); ?>
		<div><?php echo $pedido->id_venta; ?></div>
		<div><?php echo $pedido->id_venta; ?></div>
		<div><?php echo $pedido->id_venta; ?></div>
		<div><?php echo $pedido->id_venta; ?></div>
		<div><?php echo $pedido->id_venta; ?></div>
		<div><?php echo $pedido->id_venta; ?></div>
		<div><?php echo $pedido->id_venta; ?></div>
		<div><?php echo $pedido->id_venta; ?></div>
		
	</div>
	<?php 
	$id_venta = $pedido->id_venta;
	//$qry_venta_inventario = "select * from venta_inventario where id_venta = {$id_venta}";
	$qry_venta_inventario = "select * from venta_inventario left join inventario on venta_inventario.id_inventario = inventario.id_inventario where venta_inventario.id_venta = {$id_venta}";
	echo $qry_venta_inventario . "<hr />";
	$inventarios = $obj->get_results($qry_venta_inventario);
	?>
	<div>
		<?php print_r($inventarios); ?>
	</div>
	<?php foreach($inventarios as $inventario): ?>
	<div>
		<?php print_r($inventario); ?>
	</div>
	<?php endforeach; ?>
	
<?php endforeach; ?>