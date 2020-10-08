<?php
include("includes/includes.php");
include("common_files/sesion.php");

$id = $_POST["id"];

//$inventario = $obj->get_row("select * from inventario where id_inventario = {$id}");



//$id_producto = $_POST["id_producto"];
$id_producto = $id;


if($id_producto == 0){
    if(empty($_SESSION["cantidad_productos"])){
        echo 0;
    }else{
        echo $_SESSION["cantidad_productos"];
    }
}else{
    
    
    //$producto = new producto();
    //$producto = $producto->get($id_producto);
    $producto = $obj->get_row("select * from inventario where id_inventario = {$id}");
    
    
    
    //if($_SESSION["producto"][$_POST["id_producto"]] == ""){
    //if(empty($_SESSION)){
    if($_SESSION["cantidad_productos"] == ""){
        $_SESSION["cantidad_productos"] = 1;
    }else{
        $_SESSION["cantidad_productos"];
    }
    
    foreach($_SESSION["producto"] as $clave => $valor){
        $i = $clave;
        if($_SESSION["producto"][$i] == $id_producto){
            $cantidad_productos = $_SESSION["cantidad"][$i];
            $_SESSION["cantidad_productos"] = $_SESSION["cantidad_productos"]-$cantidad_productos;
            unset($_SESSION["producto"][$i]);
            unset($_SESSION["precio"][$i]);
            unset($_SESSION["cantidad"][$i]);
            
            /**
             $_SESSION["producto"][$i] = $_POST["id_producto"];
             $_SESSION["precio"][$i] = $producto["precio"];
             $cantidad_productos = $_SESSION["cantidad"][$i];
             $_SESSION["cantidad"][$i] = $cantidad_productos+1;
             */
            $en_carrito = "1";
        }else{
            
        }
        
    }
    
    
    //echo "en carrito";
    //echo $en_carrito;
    
    
    //print_r($producto);
    //echo "<hr />";
    //print_r($_SESSION);
    //exit;
    
    if($en_carrito == "1"){
        
    }else{
        //echo "test";
        //echo "<hr />";
        //print_r($producto);
        //echo $producto->precio;
        //$_SESSION["producto"][] = $_POST["id_producto"];
        $_SESSION["producto"][] = $_POST["id"];
        //echo "terminamos casi1";
        
        $_SESSION["precio"][] = $producto->precio;
        //echo "terminamos casi2";
        $_SESSION["cantidad"][] = 1;
        
        //echo "terminamos casi3";
    }
    //echo $_SESSION["cantidad_productos"];
}
?>
<?php /**
<div style="display:flex; justify-content:space-around;">
	<div>
		<select class="select_refresh">
    		<?php for($i=1; $i<=100; $i++): ?>
    		<option><?php echo $i; ?></option>
    		<?php endfor; ?>
    	</select>
    </div>
    <div>
    	<?php echo $producto->inventario; ?>
    </div>
    <div>
    	<?php echo $producto->precio; ?>
    </div>
    	
</div>
*/ ?>







<?php if(empty($_SESSION) || $_SESSION["cantidad_productos"] == 0 || $_SESSION["cantidad_productos"] == ""){ ?>
	<div style="text-align:center; font-size:30px; color:#FBC7BC;">
		<img src="images/carrito_compra.png" style="height:25px;" /> El carrito de compras est&aacute; vac&iacute;o
	</div>
	<div style="text-align:center;">
		<div onclick="window.location='./#productos'" style="display:block; margin:20px 325px; width:350px; border:2px solid #FBC7BC; color:#FBC7BC; cursor:pointer;">
			Haz click aqu&iacute; para comprar productos
		</div>
	</div>
<?php }else{ ?>
	<form id = "paypal_checkout" action = "https://www.paypal.com/cgi-bin/webscr" method = "post">
	
	<?php include("punto_venta_actual.php"); ?>
	
	</form>
<?php } ?>
