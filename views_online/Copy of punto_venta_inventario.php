<?php 
include("../includes/includes.php");
include("common_files/sesion.php");

$id = $_POST["id"];

$inventarios = $obj->get_results("select * from inventario where id_inventario_categoria = {$id}");


?>
<?php foreach($inventarios as $inventario): ?>
<div class="punto_venta_inventario" onclick="agregar_producto(<?php echo $inventario->id_inventario; ?>);">
	<?php echo $inventario->inventario; ?>
	<?php if($inventario->imagen != ""): ?>
	<div style="width:100px; height:90px;">
		<img src="images/inventario/<?php echo $inventario->imagen; ?>" class="punto_venta_inventario_imagen" style="" />
	</div>	
	<?php endif; ?>
</div>
<?php endforeach; ?>
<div class="clear"></div>