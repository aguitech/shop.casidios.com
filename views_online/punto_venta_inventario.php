<?php 
include("includes/includes.php");
include("common_files/sesion.php");

$id = $_POST["id"];

$inventarios = $obj->get_results("select * from inventario where id_inventario_categoria = {$id}");


?>
<?php foreach($inventarios as $inventario): ?>
<div class="punto_venta_inventario" onclick="agregar_producto(<?php echo $inventario->id_inventario; ?>);">
	<?php echo $inventario->inventario; ?>
	<?php if($inventario->imagen != ""): ?>
	<div style="width:100px; height:60px; margin:0 auto;">
		<img src="https://aguitech.casidios.com/panel/images/inventario/<?php echo $inventario->imagen; ?>" class="punto_venta_inventario_imagen" style="" />
	</div>	
	<?php endif; ?>
	<?php if($inventario->descripcion != ""): ?>
	<div style="font-size:10px;">
		<?php echo $inventario->descripcion; ?>
	</div>
	<?php endif; ?>
</div>
<?php endforeach; ?>
<div class="clear"></div>

<?php //print_r($_SESSION); ?>