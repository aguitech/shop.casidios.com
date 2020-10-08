<?php 
include("includes/includes.php");


$sku = $_POST["sku"];
$id = $_POST["id"];

//$inventarios = $obj->get_results("select * from inventario where id_inventario_categoria = {$id}");
//$inventarios = $obj->get_results("select * from inventario where sku_inventario = '{$sku}'");
//$inventarios = $obj->get_results("select * from inventario where sku_inventario = '%{$sku}%'");
$inventarios = $obj->get_results("select * from inventario where sku_inventario like '%{$sku}%' or inventario like '%{$sku}%'");


?>
<?php if($sku != ""): ?>
    <?php if($inventarios != Array()): ?>
        <?php foreach($inventarios as $inventario): ?>
        <?php if($inventario->sku_inventario == $sku): ?>
        <script>
        agregar_producto(<?php echo $inventario->id_inventario; ?>);
        $("#search_sku").val("");
        </script>
        <?php endif; ?>
        
        <div class="punto_venta_inventario" onclick="agregar_producto(<?php echo $inventario->id_inventario; ?>);">
        	<?php echo $inventario->inventario; ?>
        	<?php if($inventario->imagen != ""): ?>
        	<div style="width:100px; height:90px;">
        		<img src="https://aguitech.casidios.com/panel/images/inventario/<?php echo $inventario->imagen; ?>" class="punto_venta_inventario_imagen" style="" />
        	</div>	
        	<?php endif; ?>
        </div>
        <?php endforeach; ?>
        <div class="clear"></div>
	<?php else: ?>
	<div class="msg_sin_resultados">No se han encontrado resultados</div>
	<?php endif; ?>
    
<?php else: ?>
<!-- <div class="msg_sin_resultados">No se han encontrado resultados</div>-->
<?php endif; ?>

<?php //print_r($_SESSION); ?>
<?php /**
include("../includes/includes.php");
print_r($_POST); ?>

<?php 
$sku = $_POST["sku"];
$resultados = $obj->get_results("select * from inventario where sku_inventario = '{$sku}'");
print_r($resultados);
?>
<br />
*/ ?>