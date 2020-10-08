<?php if(empty($_SESSION) || $_SESSION["cantidad_productos"] == 0 || $_SESSION["cantidad_productos"] == ""): ?>
sin resultados
<?php else: ?>
<!--	<form id = "paypal_checkout" action = "https://www.paypal.com/cgi-bin/webscr" method = "post">-->
<!--							<INPUT TYPE="hidden" name="charset" value="utf-8">-->
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
			<img src="images/inventario/<?php echo $producto->imagen; ?>" style="height:50px;" />
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


<button class="btn waves-effect waves-light bg_aguitech" type="button" name="action" onclick="guardar_venta()"><?php if(isset($resultado->id_venta) && $resultado->id_venta != ""): ?>ACTUALIZAR<?php else: ?>COBRAR<?php endif; ?> <i class="material-icons right">send</i></button>


<?php endif; ?>