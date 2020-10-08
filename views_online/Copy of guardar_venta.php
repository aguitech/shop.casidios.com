<?php 
include("./includes/includes.php");
//include("common_files/sesion.php");

$id = $_POST["id"];

//$inventario = $obj->get_row("select * from inventario where id_inventario = {$id}");

$username = $_GET["name"];

//print_r($_SERVER);
echo $username;
$exploded_url = explode( "/", $username );
echo $exploded_url[1];

?>
<?php $inc = 1; ?>

<?php 
if(empty($_SESSION["cantidad_productos"])){
    //echo 0;
}else{
    print_r($exploded_url);
    echo $username;
    echo "select * from usuario left join sucursal on sucursal.id_sucursal = usuario.id_usuario where usuario.usuario like = '{$exploded_url[1]}'";
    $valor_usuario = $obj->get_row("select * from usuario left join sucursal on sucursal.id_sucursal = usuario.id_usuario where usuario.usuario like = '{$exploded_url[0]}'");
    
    print_r($valor_usuario);
    
    
    $id_sucursal = $_SESSION["web_suc"];
    $id_usuario = $_SESSION["web_idusuario"];
    /*
    $val_empresa = $_POST["empresa"];
    $qry_add = "insert into empresa (empresa, id_creador) values ('{$val_empresa}', {$id_usuario})";
    $obj->query($qry_add);
    
    //$empresa_creada = $obj->get_row("select * from empresa where (empresa = '{$val_empresa}' and id_creador = {$id_usuario})");
    $empresa_creada = $obj->get_row("select * from empresa where (empresa = '{$val_empresa}' and id_creador = {$id_usuario}) order by id_empresa desc");
    
    $id_empresa_creada = $empresa_creada->id_empresa;
    
    $qry_add_empresa = "insert into usuario_empresa (id_usuario, id_empresa) values ({$id_usuario}, {$id_empresa_creada})";
    $obj->query($qry_add_empresa);
    
    
    
    
    
    $val_venta = $_POST["venta"];
    $qry_add = "insert into venta (venta, id_sucursal) values ('{$val_venta}', {$id_sucursal})";
    $obj->query($qry_add);
    
    //$empresa_creada = $obj->get_row("select * from empresa where (empresa = '{$val_empresa}' and id_creador = {$id_usuario})");
    //$venta_creada = $obj->get_row("select * from empresa where (empresa = '{$val_empresa}' and id_creador = {$id_usuario}) order by id_empresa desc");
    //$venta_creada = $obj->get_row("select * from venta where (venta = '{$val_venta}' and id_sucursal = {$id_usuario}) order by id_venta desc");
    $venta_creada = $obj->get_row("select * from venta where (venta = '{$val_venta}' and id_sucursal = {$id_sucursal}) order by id_venta desc");
    $id_venta_creada = $venta_creada->id_venta;
    */
    //$val_venta = $_POST["venta"];
    $val_venta = "";
    //$qry_add = "insert into venta (venta, id_sucursal) values ('{$val_venta}', {$id_sucursal})";
    $qry_add = "insert into venta (venta, id_sucursal, id_usuario) values ('{$val_venta}', {$id_sucursal}, {$id_usuario})";
    
    $obj->query($qry_add);
    
    //$empresa_creada = $obj->get_row("select * from empresa where (empresa = '{$val_empresa}' and id_creador = {$id_usuario})");
    //$venta_creada = $obj->get_row("select * from empresa where (empresa = '{$val_empresa}' and id_creador = {$id_usuario}) order by id_empresa desc");
    //$venta_creada = $obj->get_row("select * from venta where (venta = '{$val_venta}' and id_sucursal = {$id_usuario}) order by id_venta desc");
    //$venta_creada = $obj->get_row("select * from venta where (venta = '{$val_venta}' and id_sucursal = {$id_sucursal}) order by id_venta desc");
    $venta_creada = $obj->get_row("select * from venta where (venta = '{$val_venta}' and id_sucursal = {$id_sucursal} and id_usuario = {$id_usuario}) order by id_venta desc");
    
    $id_venta_creada = $venta_creada->id_venta;
    
    
    //$qry_add_empresa = "insert into usuario_empresa (id_usuario, id_empresa) values ({$id_usuario}, {$id_empresa_creada})";
    //$obj->query($qry_add_empresa);
    
    
    //echo $_SESSION["cantidad_productos"];
    $cantidad_productos = $_SESSION["cantidad_productos"];
    
    foreach($_SESSION["producto"] as $clave => $valor){
        $i = $clave;
        if($_SESSION["cantidad"][$i] != 0){
            $producto = $obj->get_row("select * from inventario where id_inventario = {$_SESSION['producto'][$i]}");
            
            //echo "<br />";
            //echo $_SESSION["cantidad"][$i] . "<br />";
            
            //echo $producto->inventario . "<br />";
            //echo $producto->precio . "<br />";
            
            $cantidad_precio = $producto->precio * $_SESSION["cantidad"][$i];
            //$importe_total+=$cantidad_precio;
            
            $val_cantidad = $_SESSION["cantidad"][$i];;
            
            
            
            $val_precio_normal = $producto->precio;
            
            $porcentaje_descuento = (($producto->precio / 100) * $producto->descuento);
            $precio_descuento = $producto->precio - $porcentaje_descuento;
            
            $val_descuento_total = $precio_descuento*$val_cantidad;
            
            $val_precio_venta = $producto->precio;
            $val_precio_total = $cantidad_precio;
            $val_id_inventario = $producto->id_inventario;
            
            $porcentaje_descuento_cantidad = $porcentaje_descuento * $val_cantidad;
            
            
            //precio_normal
            //descuento
            $total_precio_normal = $cantidad_precio;
            
            //$total_descuento += $val_descuento_total;
            //$total_descuento += $val_descuento_total;
            $total_descuento += $porcentaje_descuento_cantidad;
            //$porcentaje_descuento_cantidad
            
            $total_precio_resultado += $val_descuento_total;
            
            
            
            $nueva_cantidad_inventario = ($producto->cantidad - $_SESSION["cantidad"][$i]);
            
            //CANTIDAD
            //
            //precio_normal ES SU PRECIO DE LA TABLA INVENTARIO
            //descuento_unitario $porcentaje_descuento = (($producto->precio / 100) * $producto->descuento);
            //$precio_descuento = $producto->precio - $porcentaje_descuento;
            
            //descuento_total
            
            
            //$qry_add = "insert into venta (venta, id_sucursal, id_usuario) values ('{$val_venta}', {$id_sucursal}, {$id_usuario})";
            //$qry_add = "insert into venta_inventario (id_venta, id_sucursal, id_usuario) values ('{$id_venta_creada}', {$id_sucursal}, {$id_usuario})";
            //$qry_add = "insert into venta_inventario (id_venta, id_sucursal, id_usuario, cantidad, precio_venta, precio_total) values ({$id_venta_creada}, {$id_sucursal}, {$id_usuario}, {$val_cantidad}, '{$val_precio_venta}', '{$val_precio_total}')";
            //$qry_add = "insert into venta_inventario (id_venta, id_inventario, id_sucursal, id_usuario, cantidad, precio_venta, precio_total) values ({$id_venta_creada}, {$val_id_inventario}, {$id_sucursal}, {$id_usuario}, {$val_cantidad}, '{$val_precio_venta}', '{$val_precio_total}')";
            //$qry_add = "insert into venta_inventario (id_venta, id_inventario, id_sucursal, id_usuario, cantidad, precio_venta, precio_total) values ({$id_venta_creada}, {$val_id_inventario}, {$id_sucursal}, {$id_usuario}, {$val_cantidad}, '{$val_precio_venta}', '{$val_precio_total}')";
            //$qry_add = "insert into venta_inventario (id_venta, id_inventario, id_sucursal, id_usuario, cantidad, precio_venta, precio_total) values ({$id_venta_creada}, {$val_id_inventario}, {$id_sucursal}, {$id_usuario}, {$val_cantidad}, '{$val_precio_venta}', '{$val_precio_total}')";
            //$qry_add = "insert into venta_inventario (id_venta, id_inventario, id_sucursal, id_usuario, cantidad, precio_normal, descuento_unitario, precio_venta, descuento_total, precio_total) values ({$id_venta_creada}, {$val_id_inventario}, {$id_sucursal}, {$id_usuario}, {$val_cantidad}, '{$val_precio_normal}', '{$porcentaje_descuento}', '{$val_precio_venta}', '{$porcentaje_descuento_cantidad}', '{$val_precio_total}')";
            //$qry_add = "insert into venta_inventario (id_venta, id_inventario, id_sucursal, id_usuario, cantidad, precio_normal, descuento_unitario, precio_venta, descuento_total, precio_total) values ({$id_venta_creada}, {$val_id_inventario}, {$id_sucursal}, {$id_usuario}, {$val_cantidad}, '{$val_precio_normal}', '{$porcentaje_descuento}', '{$val_precio_venta}', '{$porcentaje_descuento_cantidad}', '{$val_descuento_total}')";
            $qry_add = "insert into venta_inventario (id_venta, id_inventario, id_sucursal, id_usuario, cantidad, precio_normal, descuento_unitario, precio_venta, descuento_total, precio_total) values ({$id_venta_creada}, {$val_id_inventario}, {$id_sucursal}, {$id_usuario}, {$val_cantidad}, '{$val_precio_normal}', '{$porcentaje_descuento}', '{$precio_descuento}', '{$porcentaje_descuento_cantidad}', '{$val_descuento_total}')";
            
            
            $obj->query($qry_add);
            
            
            //$qry_update_inventario = "insert into venta_inventario (id_venta, id_inventario, id_sucursal, id_usuario, cantidad, precio_venta, precio_total) values ({$id_venta_creada}, {$val_id_inventario}, {$id_sucursal}, {$id_usuario}, {$val_cantidad}, '{$val_precio_venta}', '{$val_precio_total}')";
            //$qry_update_inventario = "update inventario set cantidad = ";
            $qry_update_inventario = "update inventario set cantidad = {$nueva_cantidad_inventario} where id_inventario = {$val_id_inventario}";
            $obj->query($qry_update_inventario);
        }
    }
    
    //$qry_update_venta = "update inventario set cantidad = {$nueva_cantidad_inventario} where id_inventario = {$val_id_inventario}";
    //precio_normal
    //descuento
    //$qry_update_venta = "update venta set precio_total = '{$importe_total}', cantidad = {$cantidad_productos} where id_venta = {$id_venta_creada}";
    //$qry_update_venta = "update venta set precio_total = '{$importe_total}', cantidad = {$cantidad_productos} where id_venta = {$id_venta_creada}";
    //$qry_update_venta = "update venta set precio_normal = '{$importe_total}', descuento = '{$total_descuento}', precio_total = '{$total_precio_resultado}', cantidad = {$cantidad_productos} where id_venta = {$id_venta_creada}";
    $qry_update_venta = "update venta set precio_normal = '{$total_precio_normal}', descuento = '{$total_descuento}', precio_total = '{$total_precio_resultado}', cantidad = {$cantidad_productos} where id_venta = {$id_venta_creada}";
    
    $obj->query($qry_update_venta);
}

/**
if($_POST["empresa"] != ""){
    
    if($_POST["editar"] == ""){
        $val_empresa = $_POST["empresa"];
        //$qry_add = "insert into usuario (usuario) values ('{$val_usuario}')";
        //$qry_add = "insert into usuario (usuario, id_sistema) values ('{$val_usuario}', {$id_sistema})";
        //$qry_add = "insert into empresa (empresa) values ('{$val_empresa}')";
        $qry_add = "insert into empresa (empresa, id_creador) values ('{$val_empresa}', {$id_usuario})";
        $obj->query($qry_add);
        
        //$empresa_creada = $obj->get_row("select * from empresa where (empresa = '{$val_empresa}' and id_creador = {$id_usuario})");
        $empresa_creada = $obj->get_row("select * from empresa where (empresa = '{$val_empresa}' and id_creador = {$id_usuario}) order by id_empresa desc");
        
        $id_empresa_creada = $empresa_creada->id_empresa;
        
        $qry_add_empresa = "insert into usuario_empresa (id_usuario, id_empresa) values ({$id_usuario}, {$id_empresa_creada})";
        $obj->query($qry_add_empresa);
        
        
    }else{
        $id_editar = $_POST["editar"];
        $val_empresa = $_POST["empresa"];
        $val_razon_social = $_POST["razon_social"];
        $val_rfc = $_POST["rfc"];
        $val_direccion = $_POST["direccion"];
        //$qry_edit = "update usuario set usuario = '{$val_usuario}' where id_usuario = {$id_editar}";
        //$qry_edit = "update usuario set usuario = '{$val_usuario}', id_sistema = {$id_sistema} where id_usuario = {$id_editar}";
        //$qry_edit = "update empresa set empresa = '{$val_empresa}' where id_empresa = {$id_editar}";
        $qry_edit = "update empresa set empresa = '{$val_empresa}', razon_social = '{$val_razon_social}', rfc = '{$val_rfc}', direccion = '{$val_direccion}' where id_empresa = {$id_editar}";
        $obj->query($qry_edit);
    }
    
    
} 
*/
?>

<?php //include("punto_venta_actual.php"); ?>
		<input type="hidden" name="charset" value="utf-8">
        <input name = "cmd" value = "_cart" type = "hidden">
        <input name = "upload" value = "1" type = "hidden">
        <input name = "no_note" value = "0" type = "hidden">
        <input name = "bn" value = "PP-BuyNowBF" type = "hidden">
        <input name = "tax" value = "0" type = "hidden">
        <input name = "rm" value = "2" type = "hidden">
        
        <!-- Supongo es de descuento -->
<!--        <input type="hidden" name="baseamt" value="10.00" />-->
<!--        <input type="hidden" name="basedes" value="2nd Item @20.00" />-->
<!--        <input type="hidden" name="basedes" value="@20.00" />-->
     
<!--        <input name = "business" value = "hector@aguitech.com" type = "hidden">-->
        <input name = "business" value = "m_carrasco_@hotmail.com" type = "hidden">
        <input name = "handling_cart" value = "0" type = "hidden">
        <input name = "currency_code" value = "MXN" type = "hidden">
        <input name = "lc" value = "MX" type = "hidden">
<!--					        <input name = "return" value = "http://mysite/myreturnpage" type = "hidden">-->
<!--					        <input name = "cbt" value = "Return to My Site" type = "hidden">-->
<!--					        <input name = "cancel_return" value = "http://mysite/mycancelpage" type = "hidden">-->
        <input name = "return" value = "https://sevignemexico.com/transaccion.php" type = "hidden">
        <input name = "cbt" value = "Return to My Site" type = "hidden">
        <input name = "cancel_return" value = "https://sevignemexico.com/revisar-carrito.php" type = "hidden">
        <input name = "custom" value = "" type = "hidden">
        
        
<!--        <input name = "return" value = "http://blacklionsoftwarecompany.com/sevigne/transaccion.php" type = "hidden">-->
<!--        <input name = "cbt" value = "Return to My Site" type = "hidden">-->
<!--        <input name = "cancel_return" value = "http://blacklionsoftwarecompany.com/sevigne/revisar-carrito.php" type = "hidden">-->
<!--        <input name = "custom" value = "" type = "hidden">-->
        
     
<!--					        <div id = "item_1" class = "itemwrap">-->
<!--					            <input name = "item_name_1" value = "Gold Tickets" type = "hidden">-->
<!--					            <input name = "quantity_1" value = "4" type = "hidden">-->
<!--					            <input name = "amount_1" value = "30" type = "hidden">-->
<!--					            <input name = "shipping_1" value = "0" type = "hidden">-->
<!--					        </div>-->
<table>
	<tr>
		<td>&nbsp;</td>
		<td colspan="3">CANTIDAD</td>
		<td>PRODUCTO</td>
		<td>PRECIO UNITARIO</td>
		<td>DESC. UNIT.</td>
		<td>PRECIO TOTAL</td>
	</tr>
	<?php foreach($_SESSION["producto"] as $clave => $valor){ ?>
	<tr>
		<?php $i = $clave; ?>
		<?php if($_SESSION["cantidad"][$i] != 0){ ?>
		<td>
			<?php 
			//$producto = new producto();
			//$producto = $producto->get($_SESSION["producto"][$i]);
			
			$producto = $obj->get_row("select * from inventario where id_inventario = {$_SESSION['producto'][$i]}");
			?>
			<?php //echo $producto->imagen; ?>
			<?php if($producto->imagen != ""): ?>
			<img src="https://aguitech.casidios.com/panel/images/inventario/<?php echo $producto->imagen; ?>" style="height:50px;" />
			<?php endif; ?>
		</td>
		<td>
			<div style="float:left; width:25px; cursor:pointer;" onclick="restar_producto('<?php echo $producto->id_inventario; ?>', 'agregar')">
				(-)
			</div>
		</td>
		<?php /**
		<td>
			<?php if($_SESSION["cantidad"][$i] == 1){ ?>
			<div style="float:left; width:25px;" onclick="">
				&nbsp;
			</div>
			<?php }else{ ?>
			<div style="float:left; width:25px; cursor:pointer;" onclick="restar_producto('<?php echo $producto->id_inventario; ?>', 'restar');">
				(-)
			</div>
			<?php } ?>
		</td>
		*/ ?>
		<td><?php echo $_SESSION["cantidad"][$i]; ?></td>
		<td>
			<div style="float:left; width:25px; cursor:pointer;" onclick="agregar_producto('<?php echo $producto->id_inventario; ?>', 'agregar');">
				(+)
			</div>
		</td>
		<td><?php echo $producto->inventario; ?></td>
		<td><?php echo "$ " . number_format($producto->precio, 2); ?></td>
		
			
			<?php /**
			<?php if($producto['descuento'] == "" || $producto['descuento'] == "0"){ ?>
				<div style="float:left; width:110px; text-align:right;">
					<?php echo "$ " . number_format(0, 2); ?>
				</div>
				<div style="float:left; width:120px; text-align:right;">
					<?php
						//$cantidad_precio = $producto["precio"] * $_SESSION["cantidad"][$i];
						$cantidad_precio = $producto["precio"] * $_SESSION["cantidad"][$i];
						$importe_total+=$cantidad_precio;
						echo "$ " . number_format($cantidad_precio, 2);
					?>
				</div>
			<?php }else{ ?>
				<div style="float:left; width:110px; text-align:right;">
					<?php 
					$porcentaje_descuento = (($producto["precio"] / 100) * $producto["descuento"]);
					$precio_descuento = $producto["precio"] - $porcentaje_descuento;
					?>
					<?php echo "$ " . number_format($porcentaje_descuento, 2); ?>
				</div>
				<div style="float:left; width:120px; text-align:right;">
					<?php
						//$cantidad_precio = $producto["precio"] * $_SESSION["cantidad"][$i];
						$cantidad_precio = $precio_descuento * $_SESSION["cantidad"][$i];
						$importe_total+=$cantidad_precio;
						echo "$ " . number_format($cantidad_precio, 2);
					?>
				</div>
			<?php } ?>
			*/ ?>
		
			<?php if($producto->descuento == "" || $producto->descuento == "0"){ ?>
				<td style="">
					<?php echo "$ " . number_format(0, 2); ?>
				</td>
				<td style="">
					<?php
						//$cantidad_precio = $producto["precio"] * $_SESSION["cantidad"][$i];
						$cantidad_precio = $producto->precio * $_SESSION["cantidad"][$i];
						$importe_total+=$cantidad_precio;
						echo "$ " . number_format($cantidad_precio, 2);
					?>
				</td>
			<?php }else{ ?>
				<td style="">
					<?php 
					$porcentaje_descuento = (($producto->precio / 100) * $producto->descuento);
					$precio_descuento = $producto->precio - $porcentaje_descuento;
					?>
					<?php echo "$ " . number_format($porcentaje_descuento, 2); ?>
				</td>
				<td style="">
					<?php
						//$cantidad_precio = $producto["precio"] * $_SESSION["cantidad"][$i];
						$cantidad_precio = $precio_descuento * $_SESSION["cantidad"][$i];
						$importe_total+=$cantidad_precio;
						echo "$ " . number_format($cantidad_precio, 2);
					?>
				</td>
			<?php } ?>
		<td>
			<div style="float:left; margin-left:20px; width:100px; cursor:pointer;" onclick="quitar_producto('<?php echo $producto->id_inventario; ?>', 'quitar');">
				Quitar
			</div>
			
			<?php //$inc = $i+1; ?>
			<div id = "item_<?php echo $inc; ?>" class = "itemwrap">
	            <input name = "item_name_<?php echo $inc; ?>" value = "<?php echo $producto->inventario; ?>" type = "hidden">
	            <input name = "quantity_<?php echo $inc; ?>" value = "<?php echo $_SESSION["cantidad"][$i]; ?>" type = "hidden">
	            <?php /**
	            <input name = "amount_<?php echo $inc; ?>" value = "<?php echo $producto["precio"] * (100 - $producto["descuento"]); ?>" type = "hidden">
	            <input name = "amount_<?php echo $inc; ?>" value = "<?php echo $producto["precio"] - ((100 / $producto["precio"]) * ($producto["descuento"])); ?>" type = "hidden">
	            */ ?>
	            <?php if($producto->descuento == "" || $producto->descuento == "0"){ ?>
	            <input name = "amount_<?php echo $inc; ?>" value = "<?php echo $producto->precio; ?>" type = "hidden">
	            <?php }else{ ?>
	            <input name = "amount_<?php echo $inc; ?>" value = "<?php echo $precio_descuento; ?>" type = "hidden">
	            <?php } ?>
	            
	            <input name = "shipping_<?php echo $inc; ?>" value = "0" type = "hidden">
	        </div>
	        <?php $inc++; ?>
			<?php /**
			<?php $inc = $i+1; ?>
			<div id = "item_<?php echo $i; ?>" class = "itemwrap">
	            <input name = "item_name_<?php echo $inc; ?>" value = "<?php echo $producto["nombre_producto"]; ?>" type = "hidden">
	            <input name = "quantity_<?php echo $inc; ?>" value = "<?php echo $_SESSION["cantidad"][$i]; ?>" type = "hidden">
	            <input name = "amount_<?php echo $inc; ?>" value = "<?php echo $producto["precio"]; ?>" type = "hidden">
	            <input name = "shipping_<?php echo $inc; ?>" value = "0" type = "hidden">
	        </div>
	        */ ?>
			
		</td>
		
		<?php } ?>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="7">
			&nbsp;
		</td>
		<td><b>$ <?php echo number_format($importe_total, 2); ?></b></td>
	</tr>
	
</table>


<?php /**
		<?php if($importe_total <= 1500){ ?>
			<div style="padding:3px 0;">
				<?php 
				//$producto = new producto();
				//$producto = $producto->get($_SESSION["producto"][$i]);
				
				$producto = $obj->get_row("select * from inventario where id_inventario = {$_SESSION['producto'][$i]}");
				?>
				<div style="float:left; width:50px; cursor:pointer;">
					<img src="images/fletes.png" style="height:50px;" />
				</div>
				<?php if($_SESSION["cantidad"][$i] == 1){ ?>
				<div style="float:left; width:25px;" onclick="">
					&nbsp;
				</div>
				<?php }else{ ?>
				<div style="float:left; width:25px; cursor:pointer;" onclick="">
					&nbsp;
				</div>
				<?php } ?>
			
				<div style="float:left; width:50px; text-align:center;">
					1
				</div>
				<div style="float:left; width:25px; cursor:pointer;" onclick="">
					&nbsp;
				</div>
				<div style="float:left; width:330px; margin-left:30px;">
					Costo de env&iacute;o
				</div>
				<div style="float:left; width:110px; text-align:right;">
					<?php echo "$ " . number_format(200, 2); ?>
				</div>
				<div style="float:left; width:110px; text-align:right;">
					<?php echo "$ " . number_format(0, 2); ?>
				</div>
				<div style="float:left; width:120px; text-align:right;">
					<?php
						$cantidad_precio = 200;
						$importe_total+=$cantidad_precio;
						echo "$ " . number_format(200, 2);
					?>
				</div>
				<div style="float:left; margin-left:20px; width:100px; cursor:pointer;" onclick="">
					&nbsp;
				</div>
				<div id = "item_<?php echo $inc; ?>" class = "itemwrap">
		            <input name = "item_name_<?php echo $inc; ?>" value = "Costo de envio" type = "hidden">
		            <input name = "quantity_<?php echo $inc; ?>" value = "1" type = "hidden">
		            <input name = "amount_<?php echo $inc; ?>" value = "200" type = "hidden">
		            <input name = "shipping_<?php echo $inc; ?>" value = "0" type = "hidden">
		            
		        </div>
		        <?php $inc++; ?>
				<div style="clear:both;"></div>
			</div>
		<?php }else{ ?>
			<div style="padding:3px 0;">
				<?php 
				
				
				$producto = $obj->get_row("select * from inventario where id_inventario = {$_SESSION["producto"][$i]}");
				?>
				<div style="float:left; width:50px; cursor:pointer;">
					<img src="images/fletes.png" style="height:50px;" />
				</div>
				<?php if($_SESSION["cantidad"][$i] == 1){ ?>
				<div style="float:left; width:25px;" onclick="">
					&nbsp;
				</div>
				<?php }else{ ?>
				<div style="float:left; width:25px; cursor:pointer;" onclick="">
					&nbsp;
				</div>
				<?php } ?>
			
				<div style="float:left; width:50px; text-align:center;">
					1
				</div>
				<div style="float:left; width:25px; cursor:pointer;" onclick="">
					&nbsp;
				</div>
				<div style="float:left; width:330px; margin-left:30px;">
					Env&iacute;o gratis
				</div>
				<div style="float:left; width:110px; text-align:right;">
					<?php echo "$ " . number_format(0, 2); ?>
				</div>
				<div style="float:left; width:110px; text-align:right;">
					<?php echo "$ " . number_format(200, 2); ?>
				</div>
				<div style="float:left; width:120px; text-align:right;">
					<?php
						$cantidad_precio = 0;
						$importe_total+=$cantidad_precio;
						echo "$ " . number_format(0, 2);
					?>
				</div>
				<div style="float:left; margin-left:20px; width:100px; cursor:pointer;" onclick="">
					&nbsp;
				</div>
				<div id = "item_<?php echo $inc; ?>" class = "itemwrap">
		            <input name = "item_name_<?php echo $inc; ?>" value = "Costo de envio" type = "hidden">
		            <input name = "quantity_<?php echo $inc; ?>" value = "1" type = "hidden">
		            <input name = "amount_<?php echo $inc; ?>" value = "0" type = "hidden">
		            <input name = "shipping_<?php echo $inc; ?>" value = "0" type = "hidden">
		        </div>
		        <?php $inc++; ?>
				<div style="clear:both;"></div>
			</div>
		<?php } ?>
	<div style="border-top:2px solid #FBC7BC; padding:3px 0;">
		<div style="float:left; width:50px;">
			&nbsp;
		</div>
		<div style="float:left; width:100px; margin-left:30px;">
			&nbsp;
		</div>
		<div style="float:left; width:370px;">
			&nbsp;
		</div>
		<div style="float:left; width:150px;">
			&nbsp;
		</div>
		<div style="float:left; width:150px; text-align:right;">
			<?php echo "$ " . number_format($importe_total, 2); ?>
		</div>
		<div style="clear:both;"></div>
	</div>
	*/ ?>