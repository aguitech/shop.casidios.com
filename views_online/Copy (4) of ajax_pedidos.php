<?php 
include("includes/includes.php");
session_start();

$status_arr = ["Recibido", "En Progreso", "Cancelado", "Entregado", "Pagado", "Incidencia"];

//print_r($_SESSION);


//$id_mesa = $_SESSION["mesa"];
$md5_mesa = $_POST["id_mesa"];

//$qry_mesa = "select * from mesa where md5(id_mesa) = '{$md5_mesa}'";
$qry_mesa = "select * from mesa where md5(id_mesa) = '{$md5_mesa}'";
$mesa_valor = $obj->get_row($qry_mesa);

$id_mesa = $mesa_valor->id_mesa;
//$pedidos = $obj->get_results("select * from venta where id_mesa")
//$pedidos = $obj->get_results("select * from venta where id_mesa = ''");
//$ventas = $obj->get_results("select * from venta where id_mesa = {$id_mesa}");

//echo "select * from venta where id_mesa = {$id_mesa}";

//$ventas = $obj->get_results("select * from venta where id_mesa = {$id_mesa}");
$ventas = $obj->get_results("select * from venta where id_mesa = {$id_mesa} order by id_venta desc");

//$mesa_valor = $obj->get_row("select * from mesa where id_mesa = '$id_mesa'");

//print_r($mesa_valor);
?>
<style>
.statuspedido{
	width:200px;
	color:white;
	padding:10px;
	border-radius:20px;
	text-align:center;
	text-shadow:2px 2px 2px black;
	font-size:20px;
	font-family:verdana;
}
.statusventa0{
	background:#DCDCDC;
}
.statusventa1{
	background:#088DCA;
}

.statusventa2{
	background:#d60000;
}
.statusventa3{
	background:yellowgreen;
}
.statusventa4{
	background:green;
}
.statusventa5{
	background:#F7C700;
}
.contenedor_pedido{
	font-family:verdana;
}
.contenedor_superior_pedido{
	width:100%;
	display:flex;
	justify-content:space-between;
}
.fecha_pedido{
	font-size:14px;
}
.precio_pedido{
	font-size:27px;
}
.cantidad_pedido{
	font-size:14px;
}
</style>
<div style="width:100%; height:100%; background:white; overflow-y:scroll;">
	<div style="padding:40px;">
    <?php foreach($ventas as $venta): ?>
    	<?php //print_r($venta); ?>
    	<hr />
    	<div class="contenedor_pedido venta<?php echo $venta->id_venta; ?>">
        	
    	
        	<div>
        		<div class="contenedor_superior_pedido">
        			<div>
        				<?php /**
        				<div>
                			<select onclick="cambiar_estatus_pedido(this.value, '<?php echo $venta->id_venta; ?>');">
                				<option <?php if( $venta->status == 0): ?>selected="selected"<?php endif; ?> value="0">Recibido</option>
                				<option <?php if( $venta->status == 1): ?>selected="selected"<?php endif; ?> value="1">En progreso</option>
                				<option <?php if( $venta->status == 2): ?>selected="selected"<?php endif; ?> value="2">Cancelado</option>
                				<option <?php if( $venta->status == 3): ?>selected="selected"<?php endif; ?> value="3">Entregado</option>
                				<option <?php if( $venta->status == 4): ?>selected="selected"<?php endif; ?> value="4">Pagado</option>
                				<option <?php if( $venta->status == 5): ?>selected="selected"<?php endif; ?> value="5">Incidencia</option>
                				
                			</select>
                		</div>
                		*/ ?>
            			<div class="cantidad_pedido"><?php echo $venta->cantidad; ?> productos</div>
                		<div class="precio_pedido">$ <?php echo number_format($venta->precio_total, 2); ?></div>
                		<div class="fecha_pedido"><?php echo $venta->fechaupdate; ?></div>
            			
            		</div>
            		<div>
            			<div class="statuspedido statusventa<?php echo $venta->status; if($venta->status == 0){ } ?>"><?php echo $status_arr[$venta->status]; ?></div>
                		
            		</div>
            		
        		</div>
        		
        	</div>
    	<table>
    	<?php 
    	   $id_venta = $venta->id_venta;
        	//$venta_inventarios = $obj->get_results("select * from venta_inventario where id_venta = {$id_venta_inventario}");
        	$venta_inventarios = $obj->get_results("select *, venta_inventario.cantidad as cantidad from venta_inventario left join inventario on venta_inventario.id_inventario = inventario.id_inventario where id_venta = {$id_venta}");
        	?>
        	<?php foreach($venta_inventarios as $inventario): ?>
        	<tr class="ventainventario<?php echo $inventario->id_venta_inventario; ?>">
        		<td class="td_dinamic">
        			<?php
        			$producto = $obj->get_row("select * from inventario where id_inventario = {$inventario->id_inventario}");
        			
        			?>
        			<img src="https://aguitech.casidios.com/panel/images/inventario/<?php echo $producto->imagen; ?>" style="height:50px;" />
        		</td>
        		<td class="td_dinamic"><div style="background:<?php echo $color_llamada[$inventario->status_llamada]; ?>; width:10px; height:10px; border-radius:100%;">&nbsp;</div></td>
        		<td class="td_dinamic"><?php //print_r($inventario); ?></td>
        		<td class="td_dinamic"><?php echo $inventario->cantidad; ?></td>
        		<td class="td_dinamic">
        			<?php echo $inventario->inventario; ?>
        		</td>
        		<td class="td_dinamic">
        			<?php echo $inventario->precio_normal; ?>
        		</td>
        		<td class="td_dinamic">
        			<?php echo $inventario->descuento_unitario; ?>
        		</td>
        		<td class="td_dinamic">
        			<?php echo $inventario->precio_venta; ?>
        		</td>
        		<td class="td_dinamic">
        			<?php echo $inventario->descuento_total; ?>
        		</td>
        		<td class="td_dinamic">
        			<?php echo $inventario->precio_total; ?>
        		</td>
        		<td class="td_dinamic" onclick="cambiar_status_venta_inventario(1, '<?php echo $inventario->id_venta_inventario; ?>')">
            		<?php if($inventario->status == 0): ?>
            			<div style="color:gray;">Entregado</div>
            		<?php endif; ?>
            		<?php if($inventario->status == 1): ?>
            			<div style="color:green;">Entregado</div>
            		<?php endif; ?>
            		<?php if($inventario->status == 2): ?>
            			<div style="color:gray;">Entregado</div>
            		<?php endif; ?>
            	</td>
            	<td class="td_dinamic" onclick="cambiar_status_venta_inventario(2, '<?php echo $inventario->id_venta_inventario; ?>')">
            		<?php if($inventario->status == 0): ?>
            			<div style="color:gray;">Cancelado</div>
            		<?php endif; ?>
            		<?php if($inventario->status == 1): ?>
            			<div style="color:gray;">Cancelado</div>
            		<?php endif; ?>
            		<?php if($inventario->status == 2): ?>
            			<div style="color:red;">Cancelado</div>
            		<?php endif; ?>
            	</td>
        	</tr>
        	<?php endforeach; ?>
    	</table>
    	</div>
    <?php endforeach; ?>
	</div>
</div>
<?php /**?>
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
	//echo $qry_venta_inventario . "<hr />";
	$inventarios = $obj->get_results($qry_venta_inventario);
	?>
	<div>
		<?php //print_r($inventarios); ?>
	</div>
	<div>
		<table>
    	<?php foreach($inventarios as $inventario): ?>
    	<tr>
    		<?php //print_r($inventario); ?>
    		<td><?php echo $inventario->cantidad; ?></td>
    		<td><?php echo $inventario->inventario; ?></td>
    		<td><?php echo $inventario->imagen; ?></td>
    		<td><?php echo $inventario->precio; ?></td>
    		<td><?php echo $inventario->descuento; ?></td>
    		
    		
    	</tr>
    	<?php endforeach; ?>
    	</table>
	</div>
<?php endforeach; ?>
</div>
*/ ?>