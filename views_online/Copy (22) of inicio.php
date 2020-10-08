<?php
include("includes/includes.php");
session_start();

$_SESSION["page"] = 0;

//$categoria = new categoria();
//$categorias = $categoria->get();

$username = $_GET["name"];
$qry_username = "select * from usuario where usuario = 'aguitech'";
$usuario_value = $obj->get_row("select * from usuario where usuario = '{$username}'");
$id_usuario = $usuario_value->id_usuario;

//print_r($id_usuario);
//exit();

//$categorias = $obj->get_results('select * from categoria');
$categorias = $obj->get_results("select * from categoria where id_usuario = $id_usuario");

//$servicios = $obj->get_results("select * from servicio where id_usuario = $id_usuario");
$servicios = $obj->get_results("select * from servicio");

$web = $obj->get_row("select * from web where id_usuario = $id_usuario");

//$web_sucursal = $obj->get_row("select * from usuario where id_usuario = $id_usuario");
//$web_sucursal = $obj->get_row("select * from usuario_sucursal where id_usuario = $id_usuario");
//$qry_get_sucursal = "select * from usuario_sucursal left join sucursal on usuario_sucursal.id_sucursal = sucursal.id_sucursal where usuario_sucursal.id_usuario = $id_usuario";

//print_r($qry_get_sucursal);

$web_sucursal = $obj->get_row("select * from usuario_sucursal left join sucursal on usuario_sucursal.id_sucursal = sucursal.id_sucursal where usuario_sucursal.id_usuario = $id_usuario");

print_r($web_sucursal);

//$id_sucursal = $web_sucursal->id_sucursal;
$id_sucursal = 14;

print_r($web_sucursal);
print_r($id_sucursal);
//exit();

if($_GET["clear"] == "true"){
    
    session_start();
    function logout(){
        session_destroy();
        session_unset();
        //$location = "location: " . $domain_url . $project_url . "php/login.php";
        //header("location: ../../login.php");
        
        
        //header("location: http://10me.net/php/login.php");
    }
    logout();
    
    
    
    
}




$_SESSION["cantidad_productos"] = "";
$_SESSION["producto"] = "";
$_SESSION["precio"] = "";
$_SESSION["cantidad"] = "";

unset ($_SESSION["cantidad_productos"]);
unset ($_SESSION["producto"]);
unset ($_SESSION["precio"]);
unset ($_SESSION["cantidad"]);


if(isset($_SESSION["suc"])){
    $id_sucursal = $_SESSION["suc"];
    if($_POST["venta"] != ""){
        
        if($_POST["editar"] == ""){
            $val_fecha_creacion = date("Y-m-d");
            $val_hora_creacion = date("H:i:s");
            
            $val_venta = $_POST["venta"];
            //$qry_add = "insert into cliente (cliente, id_sucursal) values ('{$val_cliente}', $id_sucursal)";
            $qry_add = "insert into venta (venta, id_sucursal, fechacreacion, horacreacion) values ('{$val_venta}', $id_sucursal, '{$val_fecha_creacion}', '{$val_hora_creacion}')";
            $obj->query($qry_add);
        }else{
            $id_editar = $_POST["editar"];
            $val_venta = $_POST["venta"];
            $qry_edit = "update venta set venta = '{$val_venta}', id_sucursal = {$id_sucursal} where id_venta = {$id_editar}";
            $obj->query($qry_edit);
        }
        
        
    }
    
    
    
}
if($_POST["id"] != ""){
    $id = $_POST["id"];
    $qry_id = "select * from venta where id_venta = {$id}";
    $resultado = $obj->get_row($qry_id);
    //print_r($resultado);
}




$color_llamada = array("gray", "pink", "#81D15D", "#1AACE0", "red", "brown", "#F0CA4D", "#B24BDE");

$status_llamada = array("Sin realizar", "Intento fallido", "Cita agendada", "Cliente frecuente",  "Cliente perdido",  "Numero equivocado", "NPR", "Segunda vuelta");

$_SESSION["page"] = 0;

$categorias = $obj->get_results('select * from categoria');




//$clientes = $obj->get_results('select * from cliente');
$id_usuario = $_SESSION["idusuario"];



//$clientes = $obj->get_results('select * from cliente');
//$clientes = $obj->get_results("select * from cliente where id_sucursal = {$id_sucursal}");
//$inventarios = $obj->get_results("select * from activo_fijo where id_sucursal = {$id_sucursal}");
//$activos_fijos = $obj->get_results("select * from activo_fijo where id_sucursal = {$id_sucursal}");
$ventas = $obj->get_results("select * from venta where id_sucursal = {$id_sucursal}");
$inventario_categorias = $obj->get_results("select * from inventario_categoria where id_sucursal = {$id_sucursal}");

if($_GET["clear"] == "true"){
    
    session_start();
    function logout(){
        session_destroy();
        session_unset();
        //$location = "location: " . $domain_url . $project_url . "php/login.php";
        //header("location: ../../login.php");
        
        
        //header("location: http://10me.net/php/login.php");
    }
    logout();
    
    
    
    
}



?>
<!-- 
	 *************************************   _____   _____   _   _   _   _____   ____   ____   _   _ 
	 ***      Hector Aguilar           *** .|  _  |.| ____|.| | | |.| |.|_   _|.| ___|.|  __|.| |_| |.
	 ***      CEO Aguitech             *** .|  _  |.|  _  |.| |_| |.| |.  | |  .| _|_ .| |__ .|  _  |.
	 ***      www.aguitech.com         *** .|_| |_|.|_____|.|_____|.|_|.  |_|  .|____|.|____|.|_| |_|.
	 ***      hector@aguitech.com      ***                     by Hector Aguilar [ www.aguitech.com ]
	 *************************************
	 
	 Gracias por visitar el codigo fuente, y lo mas seguro es que estes aqui para plagiar. Asi que adelante pase usted.
	 
	 Thanks 4 view our source code, and i'm sure that you're here just to copy a few source code. So, coming and welcome.
 -->
<!DOCTYPE html>
<html>
	<head>
		<!-- 
		<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
		 -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="Author" content="Hector Aguilar [ www.aguitech.com ]" lang="es">
		<meta name="theme-color" content="#297FCA" />
<!--		<link href="https://fonts.googleapis.com/css?family=Fira+Sans:800" rel="stylesheet">-->
<!--		<link href="https://fonts.googleapis.com/css?family=Fira+Sans:800" rel="stylesheet">-->
		<link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,600,800" rel="stylesheet">
		
		<link rel="Shortcut Icon" href="aguitech.ico" type="image/x-icon" />
<!--		<link href="" rel="image_src" / >-->
		
		<!-- 
		<meta property="og:url"                content="http://aguitech.com/blue/" />
		<meta property="og:type"               content="article" />
		<meta property="og:title"              content="Aguitech Solutions" />
		<meta property="og:description"        content="Desarrollo de software, aplicaciones y websites" />
		<meta property="og:image"              content="http://aguitech.com/blue/blue/images/logo_aguitech/Aguitech_logo.png" />
		
		-->
		<meta property="og:image"              content="https://aguitech.com/images/aguitech_fb.png" />
		
		<!--
		<link rel="Shortcut Icon" href="http://www.aguitech.com/icono.ico" type="image/x-icon" />
		
		<title>ADMINISTRADOR</title>
		 -->
		<?php if(!empty($_GET["blog"])){ ?>
		<?php 
		$tituloblog = new blog();
		$tituloblog = $tituloblog->get($_GET["blog"]);
		
		$categoriablog = new categoria();
		$categoriablog = $categoriablog->get($tituloblog["id_categoria"]);
		?>
		<title><?php echo $categoriablog["categoria"]; ?> | <?php echo $tituloblog["titulo"]; ?></title>
		<meta name="description" content="<?php echo $tituloblog["resenia"]; ?>">
		<meta name="keywords" content="<?php echo $tituloblog["hashtags"]; ?>">
		
		<?php }else{ ?>
		<title>Aguitech | Desarrollo de Software | www.aguitech.com</title>
		<meta name="description" content="Desarrollo de software, websites, aplicaciones android & iOS, con sede en la Ciudad de M&eacute;xico. Contacto: hola@aguitech.com">
		<meta name="keywords" content="desarrollo de software, agencia digital, sitios web, aplicaciones android, aplicaciones ios, php consultor, php developer, programador orientado a web">
		<?php } ?>
		<link rel="stylesheet" href="/views_online/css/styles.css" />
<!--		<script src="js/jquery-1.7.2.js"></script>-->
		<script src='https://code.jquery.com/jquery-1.8.3.min.js' type='text/javascript'></script>
		<script>
		$(document).on('click', 'a.smooth', function(e) {
			//alert("hola");
			
		    var $link = $(this);
		    //alert(this);
		    var anchor  = $link.attr('href');
		    $('html, body').stop().animate({
		        scrollTop: $(anchor).offset().top
		    }, 1000);

		    $("#menu_mobile").hide();
		    
		});
		$(document).ready(function(){

			animar_clientes();
			animar_home();

			<?php if($_GET["clear"] == "true"){ ?>
			$('.contenidos').hide(); $('#cotizador').show();
			<?php } ?>

			/*cargar_blog(1);*/
			
			<?php if(!empty($_GET["categoria"])){ ?>
			cargar_blog(<?php echo $_GET["categoria"]; ?>);
			<?php } ?>

			<?php if(!empty($_GET["blog"])){ ?>
			detalle_publicacion(<?php echo $_GET["blog"]; ?>);
			<?php } ?>
			
		});
		function animar_clientes(){
			//$('.cliente_logo').fadeIn('slow');
			//$('.cliente_logo').fadeIn('slow');
			//$('.cliente_logo').css({'-moz-transform':'rotate(2deg)', WebkitTransform:'rotate(2deg)'});
			//$('.cliente_logo').css({'-moz-transform':'rotate(3deg)', WebkitTransform:'rotate(3deg)'});
			//$('.cliente_logo').css({'-moz-transform':'rotate(2deg)', WebkitTransform:'rotate(2deg)'});
			$('.cliente_logo').css({'-moz-transform':'rotate(-2deg)', WebkitTransform:'rotate(-2deg)'});
			$('.menu_header').css({'-moz-transform':'rotate(2deg)', WebkitTransform:'rotate(2deg)'});
			$('.menu_header_mobile').css({'-moz-transform':'rotate(2deg)', WebkitTransform:'rotate(2deg)'});
			setTimeout("desanimar_clientes()", "500");
		}
		function desanimar_clientes(){
			//$('.cliente_logo').fadeOut('slow');
			//$('.cliente_logo').fadeOut('slow');
			//setTimeout("$('#2').css({'-moz-transform':'rotate(-2deg)', WebkitTransform:'rotate(-2deg)'})", 2300);
			//$('.cliente_logo').css({'-moz-transform':'rotate(-2deg)', WebkitTransform:'rotate(-2deg)'});
			//$('.cliente_logo').css({'-moz-transform':'rotate(-3deg)', WebkitTransform:'rotate(-3deg)'});
			//$('.cliente_logo').css({'-moz-transform':'rotate(-2deg)', WebkitTransform:'rotate(-2deg)'});
			$('.cliente_logo').css({'-moz-transform':'rotate(2deg)', WebkitTransform:'rotate(2deg)'});
			$('.menu_header').css({'-moz-transform':'rotate(-2deg)', WebkitTransform:'rotate(-2deg)'});
			$('.menu_header_mobile').css({'-moz-transform':'rotate(-2deg)', WebkitTransform:'rotate(-2deg)'});
			
			
			
			setTimeout("animar_clientes()", "500");
		}


		function animar_procesos(){
			$('#img_procesos2').css({'-moz-transform':'rotate(45deg)', WebkitTransform:'rotate(45deg)'});
			$('#img_procesos2').css({'-moz-transform':'rotate(-45deg)', WebkitTransform:'rotate(-45deg)'});
			$('#img_procesos2').css({'-moz-transform':'rotate(-45deg)', WebkitTransform:'rotate(-45deg)'});

			$('#img_procesos2').animate({'marginTop':'-150px'}, 1500);
		}
		
		function animar_home(){

			setTimeout("$('#text_home').html('s_')", "0");
			setTimeout("$('#text_home').html('so_')", "150");
			setTimeout("$('#text_home').html('sof_')", "300");
			setTimeout("$('#text_home').html('soft_')", "450");
			setTimeout("$('#text_home').html('softw_')", "600");
			setTimeout("$('#text_home').html('softwa_')", "750");
			setTimeout("$('#text_home').html('softwar_')", "900");
			setTimeout("$('#text_home').html('software_')", "1050");
			setTimeout("$('#text_home').html('software_')", "1200");
			setTimeout("$('#text_home').html('softwar_')", "1350");
			setTimeout("$('#text_home').html('softwa_')", "1500");
			setTimeout("$('#text_home').html('softw_')", "1650");
			setTimeout("$('#text_home').html('soft_')", "1800");
			setTimeout("$('#text_home').html('sof_')", "1950");
			setTimeout("$('#text_home').html('so_')", "2100");
			setTimeout("$('#text_home').html('s_')", "2250");
			setTimeout("$('#text_home').html('a_')", "2400");
			setTimeout("$('#text_home').html('ap_')", "2550");
			setTimeout("$('#text_home').html('apl_')", "2700");
			setTimeout("$('#text_home').html('apli_')", "2850");
			setTimeout("$('#text_home').html('aplic_')", "3000");
			setTimeout("$('#text_home').html('aplica_')", "3150");
			setTimeout("$('#text_home').html('aplicac_')", "3300");
			setTimeout("$('#text_home').html('aplicaci_')", "3450");
			setTimeout("$('#text_home').html('aplicacio_')", "3600");
			setTimeout("$('#text_home').html('aplicacion_')", "3750");
			setTimeout("$('#text_home').html('aplicacione_')", "3900");
			setTimeout("$('#text_home').html('aplicaciones_')", "4050");
			setTimeout("$('#text_home').html('aplicaciones_')", "4200");
			setTimeout("$('#text_home').html('aplicacione_')", "4350");
			setTimeout("$('#text_home').html('aplicacion_')", "4500");
			setTimeout("$('#text_home').html('aplicacio_')", "4650");
			setTimeout("$('#text_home').html('aplicaci_')", "4800");
			setTimeout("$('#text_home').html('aplicac_')", "4950");
			setTimeout("$('#text_home').html('aplica_')", "5100");
			setTimeout("$('#text_home').html('aplic_')", "5250");
			setTimeout("$('#text_home').html('apli_')", "5400");
			setTimeout("$('#text_home').html('apl_')", "5500");
			setTimeout("$('#text_home').html('ap_')", "5700");
			setTimeout("$('#text_home').html('a_')", "5850");
			setTimeout("$('#text_home').html('s_')", "6000");
			setTimeout("$('#text_home').html('si_')", "6150");
			setTimeout("$('#text_home').html('sit_')", "6300");
			setTimeout("$('#text_home').html('siti_')", "6450");
			setTimeout("$('#text_home').html('sitio_')", "6600");
			setTimeout("$('#text_home').html('sitios_')", "6750");
			setTimeout("$('#text_home').html('sitios _')", "6900");
			setTimeout("$('#text_home').html('sitios w_')", "7050");
			setTimeout("$('#text_home').html('sitios we_')", "7200");
			setTimeout("$('#text_home').html('sitios web_')", "7350");
			setTimeout("$('#text_home').html('sitios web_')", "7500");
			setTimeout("$('#text_home').html('sitios we_')", "7650");
			setTimeout("$('#text_home').html('sitios w_')", "7800");
			setTimeout("$('#text_home').html('sitios _')", "7950");
			setTimeout("$('#text_home').html('sitios_')", "8100");
			setTimeout("$('#text_home').html('sitio_')", "8250");
			setTimeout("$('#text_home').html('siti_')", "8400");
			setTimeout("$('#text_home').html('sit_')", "8550");
			setTimeout("$('#text_home').html('si_')", "8700");
			setTimeout("$('#text_home').html('s_')", "8850");
			


			
			setTimeout("desanimar_home()", "9000");
		}
		/**
		function animar_home(){

			setTimeout("$('#text_home').html('s_')", "0");
			setTimeout("$('#text_home').html('so_')", "200");
			setTimeout("$('#text_home').html('sof_')", "400");
			setTimeout("$('#text_home').html('soft_')", "600");
			setTimeout("$('#text_home').html('softw_')", "800");
			setTimeout("$('#text_home').html('softwa_')", "1000");
			setTimeout("$('#text_home').html('softwar_')", "1200");
			setTimeout("$('#text_home').html('software_')", "1400");
			setTimeout("$('#text_home').html('software_')", "1600");
			setTimeout("$('#text_home').html('softwar_')", "1800");
			setTimeout("$('#text_home').html('softwa_')", "2000");
			setTimeout("$('#text_home').html('softw_')", "2200");
			setTimeout("$('#text_home').html('soft_')", "2400");
			setTimeout("$('#text_home').html('sof_')", "2600");
			setTimeout("$('#text_home').html('so_')", "2800");
			setTimeout("$('#text_home').html('s_')", "3000");
			setTimeout("$('#text_home').html('a_')", "3200");
			setTimeout("$('#text_home').html('ap_')", "3400");
			setTimeout("$('#text_home').html('apl_')", "3600");
			setTimeout("$('#text_home').html('apli_')", "3800");
			setTimeout("$('#text_home').html('aplic_')", "4000");
			setTimeout("$('#text_home').html('aplica_')", "4200");
			setTimeout("$('#text_home').html('aplicac_')", "4400");
			setTimeout("$('#text_home').html('aplicaci_')", "4600");
			setTimeout("$('#text_home').html('aplicacio_')", "4800");
			setTimeout("$('#text_home').html('aplicacion_')", "5000");
			setTimeout("$('#text_home').html('aplicacione_')", "5200");
			setTimeout("$('#text_home').html('aplicaciones_')", "5400");
			setTimeout("$('#text_home').html('aplicaciones_')", "5600");
			setTimeout("$('#text_home').html('aplicacione_')", "5800");
			setTimeout("$('#text_home').html('aplicacion_')", "6000");
			setTimeout("$('#text_home').html('aplicacio_')", "6200");
			setTimeout("$('#text_home').html('aplicaci_')", "6400");
			setTimeout("$('#text_home').html('aplicac_')", "6600");
			setTimeout("$('#text_home').html('aplica_')", "6800");
			setTimeout("$('#text_home').html('aplic_')", "7000");
			setTimeout("$('#text_home').html('apli_')", "7200");
			setTimeout("$('#text_home').html('apl_')", "7400");
			setTimeout("$('#text_home').html('ap_')", "7600");
			setTimeout("$('#text_home').html('a_')", "7800");
			setTimeout("$('#text_home').html('s_')", "8000");
			setTimeout("$('#text_home').html('si_')", "8200");
			setTimeout("$('#text_home').html('sit_')", "8400");
			setTimeout("$('#text_home').html('siti_')", "8600");
			setTimeout("$('#text_home').html('sitio_')", "8800");
			setTimeout("$('#text_home').html('sitios_')", "9000");
			setTimeout("$('#text_home').html('sitios _')", "9200");
			setTimeout("$('#text_home').html('sitios w_')", "9400");
			setTimeout("$('#text_home').html('sitios we_')", "9600");
			setTimeout("$('#text_home').html('sitios web_')", "9800");
			setTimeout("$('#text_home').html('sitios web_')", "10000");
			setTimeout("$('#text_home').html('sitios we_')", "10200");
			setTimeout("$('#text_home').html('sitios w_')", "10400");
			setTimeout("$('#text_home').html('sitios _')", "10600");
			setTimeout("$('#text_home').html('sitios_')", "10800");
			setTimeout("$('#text_home').html('sitio_')", "11000");
			setTimeout("$('#text_home').html('siti_')", "11200");
			setTimeout("$('#text_home').html('sit_')", "11400");
			setTimeout("$('#text_home').html('si_')", "11600");
			setTimeout("$('#text_home').html('s_')", "11800");


			
			setTimeout("desanimar_home()", "12000");
		}
		*/
		function desanimar_home(){

			setTimeout("$('#text_home').html('s_')", "0");
			setTimeout("$('#text_home').html('so_')", "150");
			setTimeout("$('#text_home').html('sof_')", "300");
			setTimeout("$('#text_home').html('soft_')", "450");
			setTimeout("$('#text_home').html('softw_')", "600");
			setTimeout("$('#text_home').html('softwa_')", "750");
			setTimeout("$('#text_home').html('softwar_')", "900");
			setTimeout("$('#text_home').html('software_')", "1050");
			setTimeout("$('#text_home').html('software_')", "1200");
			setTimeout("$('#text_home').html('softwar_')", "1350");
			setTimeout("$('#text_home').html('softwa_')", "1500");
			setTimeout("$('#text_home').html('softw_')", "1650");
			setTimeout("$('#text_home').html('soft_')", "1800");
			setTimeout("$('#text_home').html('sof_')", "1950");
			setTimeout("$('#text_home').html('so_')", "2100");
			setTimeout("$('#text_home').html('s_')", "2250");
			setTimeout("$('#text_home').html('a_')", "2400");
			setTimeout("$('#text_home').html('ap_')", "2550");
			setTimeout("$('#text_home').html('apl_')", "2700");
			setTimeout("$('#text_home').html('apli_')", "2850");
			setTimeout("$('#text_home').html('aplic_')", "3000");
			setTimeout("$('#text_home').html('aplica_')", "3150");
			setTimeout("$('#text_home').html('aplicac_')", "3300");
			setTimeout("$('#text_home').html('aplicaci_')", "3450");
			setTimeout("$('#text_home').html('aplicacio_')", "3600");
			setTimeout("$('#text_home').html('aplicacion_')", "3750");
			setTimeout("$('#text_home').html('aplicacione_')", "3900");
			setTimeout("$('#text_home').html('aplicaciones_')", "4050");
			setTimeout("$('#text_home').html('aplicaciones_')", "4200");
			setTimeout("$('#text_home').html('aplicacione_')", "4350");
			setTimeout("$('#text_home').html('aplicacion_')", "4500");
			setTimeout("$('#text_home').html('aplicacio_')", "4650");
			setTimeout("$('#text_home').html('aplicaci_')", "4800");
			setTimeout("$('#text_home').html('aplicac_')", "4950");
			setTimeout("$('#text_home').html('aplica_')", "5100");
			setTimeout("$('#text_home').html('aplic_')", "5250");
			setTimeout("$('#text_home').html('apli_')", "5400");
			setTimeout("$('#text_home').html('apl_')", "5500");
			setTimeout("$('#text_home').html('ap_')", "5700");
			setTimeout("$('#text_home').html('a_')", "5850");
			setTimeout("$('#text_home').html('s_')", "6000");
			setTimeout("$('#text_home').html('si_')", "6150");
			setTimeout("$('#text_home').html('sit_')", "6300");
			setTimeout("$('#text_home').html('siti_')", "6450");
			setTimeout("$('#text_home').html('sitio_')", "6600");
			setTimeout("$('#text_home').html('sitios_')", "6750");
			setTimeout("$('#text_home').html('sitios _')", "6900");
			setTimeout("$('#text_home').html('sitios w_')", "7050");
			setTimeout("$('#text_home').html('sitios we_')", "7200");
			setTimeout("$('#text_home').html('sitios web_')", "7350");
			setTimeout("$('#text_home').html('sitios web_')", "7500");
			setTimeout("$('#text_home').html('sitios we_')", "7650");
			setTimeout("$('#text_home').html('sitios w_')", "7800");
			setTimeout("$('#text_home').html('sitios _')", "7950");
			setTimeout("$('#text_home').html('sitios_')", "8100");
			setTimeout("$('#text_home').html('sitio_')", "8250");
			setTimeout("$('#text_home').html('siti_')", "8400");
			setTimeout("$('#text_home').html('sit_')", "8550");
			setTimeout("$('#text_home').html('si_')", "8700");
			setTimeout("$('#text_home').html('s_')", "8850");
			
			
			setTimeout("animar_home()", "9000");
		}
		/**
		function desanimar_home(){

			setTimeout("$('#text_home').html('s_')", "0");
			setTimeout("$('#text_home').html('so_')", "100");
			setTimeout("$('#text_home').html('sof_')", "200");
			setTimeout("$('#text_home').html('soft_')", "300");
			setTimeout("$('#text_home').html('softw_')", "400");
			setTimeout("$('#text_home').html('softwa_')", "500");
			setTimeout("$('#text_home').html('softwar_')", "600");
			setTimeout("$('#text_home').html('software_')", "700");
			setTimeout("$('#text_home').html('software_')", "800");
			setTimeout("$('#text_home').html('softwar_')", "900");
			setTimeout("$('#text_home').html('softwa_')", "1000");
			setTimeout("$('#text_home').html('softw_')", "1100");
			setTimeout("$('#text_home').html('soft_')", "1200");
			setTimeout("$('#text_home').html('sof_')", "1300");
			setTimeout("$('#text_home').html('so_')", "1400");
			setTimeout("$('#text_home').html('s_')", "1500");
			setTimeout("$('#text_home').html('a_')", "1600");
			setTimeout("$('#text_home').html('ap_')", "1700");
			setTimeout("$('#text_home').html('apl_')", "1800");
			setTimeout("$('#text_home').html('apli_')", "1900");
			setTimeout("$('#text_home').html('aplic_')", "2000");
			setTimeout("$('#text_home').html('aplica_')", "2100");
			setTimeout("$('#text_home').html('aplicac_')", "2200");
			setTimeout("$('#text_home').html('aplicaci_')", "2300");
			setTimeout("$('#text_home').html('aplicacio_')", "2400");
			setTimeout("$('#text_home').html('aplicacion_')", "2500");
			setTimeout("$('#text_home').html('aplicacione_')", "2600");
			setTimeout("$('#text_home').html('aplicaciones_')", "2700");
			setTimeout("$('#text_home').html('aplicaciones_')", "2800");
			setTimeout("$('#text_home').html('aplicacione_')", "2900");
			setTimeout("$('#text_home').html('aplicacion_')", "3000");
			setTimeout("$('#text_home').html('aplicacio_')", "3100");
			setTimeout("$('#text_home').html('aplicaci_')", "3200");
			setTimeout("$('#text_home').html('aplicac_')", "3300");
			setTimeout("$('#text_home').html('aplica_')", "3400");
			setTimeout("$('#text_home').html('aplic_')", "3500");
			setTimeout("$('#text_home').html('apli_')", "3600");
			setTimeout("$('#text_home').html('apl_')", "3700");
			setTimeout("$('#text_home').html('ap_')", "3800");
			setTimeout("$('#text_home').html('a_')", "3900");
			setTimeout("$('#text_home').html('s_')", "4000");
			setTimeout("$('#text_home').html('si_')", "4100");
			setTimeout("$('#text_home').html('sit_')", "4200");
			setTimeout("$('#text_home').html('siti_')", "4300");
			setTimeout("$('#text_home').html('sitio_')", "4400");
			setTimeout("$('#text_home').html('sitios_')", "4500");
			setTimeout("$('#text_home').html('sitios _')", "4600");
			setTimeout("$('#text_home').html('sitios w_')", "4700");
			setTimeout("$('#text_home').html('sitios we_')", "4800");
			setTimeout("$('#text_home').html('sitios web_')", "4900");
			setTimeout("$('#text_home').html('sitios web_')", "5000");
			setTimeout("$('#text_home').html('sitios we_')", "5100");
			setTimeout("$('#text_home').html('sitios w_')", "5200");
			setTimeout("$('#text_home').html('sitios _')", "5300");
			setTimeout("$('#text_home').html('sitios_')", "5400");
			setTimeout("$('#text_home').html('sitio_')", "5500");
			setTimeout("$('#text_home').html('siti_')", "5600");
			setTimeout("$('#text_home').html('sit_')", "5700");
			setTimeout("$('#text_home').html('si_')", "5800");
			setTimeout("$('#text_home').html('s_')", "5900");
			
			
			setTimeout("animar_home()", "6000");
		}
		*/
		</script>
		
		<script type="text/javascript" src="js/jquery.jrumble.1.3.min.js"></script>
		<!--  
		<script type="text/javascript" src="js/prettify.js"></script>
		-->
		<script>
		var timer;
		$(window).scroll(function() {

			if(timer) {
				window.clearTimeout(timer);
			}
			timer = window.setTimeout(function() {
				//alert(window.innerWidth);
				//alert(window.innerHeight);
				//var altura_del_navegador = $(window).outerHeight(true);
				//var altura_del_navegador = $(window).height();
				var altura_del_navegador = window.innerHeight;
				
				//alert($(document).height());
				//alert(altura_del_navegador);
				//alert(altura_del_navegador);
				//var porcentaje_altura_pagina = (100 / $(document).height()) * ($(window).scrollTop() + altura_del_navegador);
				var porcentaje_altura_pagina = (100 / ($(document).height() - + altura_del_navegador)) * $(window).scrollTop();
				//alert(porcentaje_altura_pagina);
				//Math.floor(1.6)
				//Redondeando para abajo
				//var res_altura_pantalla = Math.floor(porcentaje_altura_pagina) + "%";
				var res_altura_pantalla = Math.round(porcentaje_altura_pagina) + "%";

				if(Math.round(porcentaje_altura_pagina) > 80){
					//alert(res_altura_pantalla);
					//alert(res_altura_pantalla);
		
					//$("#altura_pagina").stop().animate({"width":"20%"}, "100");

					

					//setTimeout("desanimar_clientes()", "500");
					

						var val_categoria = $("#categoria").val();
						var val_page = parseInt($("#page").val()) + 1;
						$("#loader").show();
						$.ajax({
	    					type: "POST",
	    					//url:"entradas_proximas_ajax.php",
	    					url:"/views_online/entradas_proximas_ajax.php",
	    					//data: { limit:val_limit, offset:val_offset },
	    					data: { page:val_page, categoria:val_categoria },
	    					success:function(data){
	    						//$("#resultado_votos_detalle").html(data);
	    						//$("#publicaciones_adicionales").html(data);
	    						//$("#publicaciones_adicionales").append(data);
	    						$("#contenido_blog").append(data);
	    						//var data_href = "http://aguitech.com"
	    						var data_href = "https://online.casidios.com/" + val_categoria + "/" + val_page; 
								$(".fb-comments").attr('data-href', data_href);
							    FB.XFBML.parse();
	    					}
	    				});

	    				$("#page").val(val_page)


	    				
					/**
					setTimeout(function (){

						var val_categoria = $("#categoria").val();
						var val_page = parseInt($("#page").val()) + 1;
						$("#loader").show();
						$.ajax({
	    					type: "POST",
	    					//url:"entradas_proximas_ajax.php",
	    					url:"/views_online/entradas_proximas_ajax.php",
	    					//data: { limit:val_limit, offset:val_offset },
	    					data: { page:val_page, categoria:val_categoria },
	    					success:function(data){
	    						//$("#resultado_votos_detalle").html(data);
	    						//$("#publicaciones_adicionales").html(data);
	    						//$("#publicaciones_adicionales").append(data);
	    						$("#contenido_blog").append(data);
	    					}
	    				});

	    				$("#page").val(val_page)

	    				
						}, "500");
					*/
					
					

					
					
				}else{
					$("#loader").show();
				}
				$("#altura_pagina").stop().animate({"width":res_altura_pantalla}, "100");
		
				if($(window).scrollTop() == 0){
					$("#imagen_logo").stop().animate({ 
						height: "65px"
					}, "100");
	        		//$("#cont_principal").stop().animate({"width":"20px"}, "100");
	        	//}else if($(window).scrollTop() > 1 && $(window).scrollTop() < 200) {
				}else if($(window).scrollTop() > 20) {
					$("#imagen_logo").stop().animate({ 
						height: "50px"
					}, "100");
					
	            	//deactivateHeader();
	            }
			}, 100);
        });

        function comprobar_tamanio_scroll(){
			var altura_del_navegador = window.innerHeight;
			console.log(altura_del_navegador);
			
			var porcentaje_altura_pagina = (100 / ($(document).height() - + altura_del_navegador)) * $(window).scrollTop();

			console.log(porcentaje_altura_pagina);

			var res_altura_pantalla = Math.round(porcentaje_altura_pagina) + "%";

			console.log(res_altura_pantalla);

			if(isNaN(porcentaje_altura_pagina)){
				$("#altura_pagina").stop().animate({"width":"100%"}, "100");
			}else{
				$("#altura_pagina").stop().animate({"width":res_altura_pantalla}, "100");
			}

			
        }

		function calcular_proyecto(pregunta, cantidad, respuesta){
			$.ajax({
				type: "POST",
				url:"calcular_proyecto.php",
				data: { pregunta:pregunta, cantidad:cantidad, respuesta:respuesta },
				success:function(data){
					//alert("hola");
					//alert(data);
					$("#resultado_cotizador").html(data);
				}
			});
		}
		function detalle_blog(id_blog){
			
			alert(id_blog);

			
			$.ajax({
				type: "POST",
				//url:"cargar_publicacion.php",
				url:"cargar_publicacion.php",
				data: { id:id_foto },
				success:function(data){
					//alert("hola");
					//alert(data);
					//alert(ck_lang);
					$("#detalle_publicacion").html(data);
					
					
				}
			});
			
		}
		function buscar_sku(){
			var val_sku = $("#search_sku").val();
			//$("#loader").show();

			$(".punto_venta_categoria").removeClass("punto_venta_categoria_selected");
			/*
			$.ajax({
				type: "POST",
				url:"entradas_proximas_ajax.php",
				//data: { limit:val_limit, offset:val_offset },
				data: { page:val_page, categoria:val_categoria },
				success:function(data){
					//$("#resultado_votos_detalle").html(data);
					//$("#publicaciones_adicionales").html(data);
					//$("#publicaciones_adicionales").append(data);
					$("#contenido_blog").append(data);
				}
			});
			*/
			$.ajax({
				type: "POST",
				url:"views_online/sku_busqueda.php",
				//data: { limit:val_limit, offset:val_offset },
				data: { sku:val_sku },
				success:function(data){
					//$("#resultado_votos_detalle").html(data);
					//$("#publicaciones_adicionales").html(data);
					//$("#publicaciones_adicionales").append(data);
					//$("#contenido_blog").append(data);
					//$("#resultado_sku").append(data);
					//$("#resultado_sku").html(data);
					$("#container_inventario").html(data);
					
				}
			});
		}
		</script>
		<!-- 
		$('.contenidos').hide(); $('#cotizador').show();
		 -->
		<?php //if($_GET["clear"] == "true"){ echo "<script>$('.contenidos').hide(); alert(); </script>"; } ?>
	</head>
	<body onload="">
		<div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2&appId=434406806608345&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
		<div style="position:fixed; top:50px; left:0; right:0; z-index:1; background:white;">
			<div style="widith:100%; margin-top:2px;" id="">
				<div style="background:#003D7B; width:0%; height:7px; border-bottom:1px solid #297FCA; box-shadow:0 2px 6px rgba(220,220,220,1);" id="altura_pagina">
					&nbsp;
				</div>
			</div>
		</div>
		<?php /**
		<div style="position:fixed; top:0; left:0; right:0; bottom:0; z-index:2; display:none;" id="menu_mobile">
			<div style="width:100%; height:100%; z-index:2;" class="bg_menu">
				
				<div style="" class="contenedor_principal">
					<div class="header">
						<div class="logo">
							<img src="blue/images/logo_aguitech/Aguitech_logo.png" style="padding:0 0 0 0; height:50px;" />
						</div>
						<div class="menu_mobile" onclick="$('#menu_mobile').hide();" style="cursor:pointer;">
							<img src="blue/images/cerrar.png" style="width:20px;" />
						</div>
						<div style="clear:both;"></div>
					</div>
					<div class="contenidos_menu">
						<a class="menu_header_mobile smooth" href="#inicio" style="" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#sitio_web').show();">
							Inicio
						</a>
						<a class="menu_header_mobile smooth" href="#servicios" style="" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#sitio_web').show();">
							Servicios
						</a>
						<a class="menu_header_mobile smooth" href="#nosotros" style="" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#sitio_web').show();">
							Clientes
						</a>
						<a class="menu_header_mobile smooth" href="#contacto" style="" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#sitio_web').show();">
							Contacto
						</a>
						<a class="menu_header_mobile smooth" href="cotizador/" style="color:white; background:#22568f; font-size:12px; padding:6px 0; border-radius:5px; width:126px; text-align:center; cursor:pointer;">
							Solicitar Cotizaci&oacute;n
						</a>
						
						<!--
						<a class="menu_header_mobile smooth" style="color:white; background:#22568f; font-size:12px; padding:6px 0; border-radius:5px; width:126px;" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#cotizador').css({'display':'inline'});">
							Solicitar Cotizaci&oacute;n
						</a>
						
						<a class="menu_header_mobile smooth" style="color:white; background:#22568f; font-size:12px; padding:6px 0; border-radius:5px; width:126px;" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#cotizador').show();">
							Solicitar Cotizaci&oacute;n
						</a> 
						<a class="menu_header_mobile smooth" href="cotizador/" style="color:white; background:#22568f; font-size:12px; padding:6px 0; border-radius:5px; width:126px;" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#cotizador').show();">
							Solicitar Cotizaci&oacute;n
						</a>
						-->
					</div>
				</div>
				
				
				
			</div>
		</div>
		*/ ?>
		
		<div style="position:absolute; top:0; left:0; right:0; bottom:0;">
			<div style="width:100%; height:100%;">
				<div style="" class="contenedor_principal">
					<div class="header">
						<div class="logo" style="">
							<img src="https://aguitech.com/blue/images/logo_aguitech/Aguitech_logo.png" style="padding:0 0 0 0; height:50px;" id="imagen_logo" />
						</div>
						<!--
						<a class="menu_header smooth" href="#contacto" style="color:#99D3E4; background:yellow; font-size:13px; border-radius:5px;" onclick="$('#menu_mobile').hide();">
						
						<a class="menu_header smooth" style="color:#99D3E4; background:yellow; font-size:13px; border-radius:5px;" onclick="$('#sitio_web').hide(); $('#cotizador').show();">
							Solicitar Cotizaci&oacute;n
						</a>
						<a class="menu_header smooth" href="#contacto" style="color:#99D3E4;" onclick="$('#menu_mobile').hide(); $('#sitio_web').show(); $('#cotizador').hide();">
							Contacto
						</a>
						<a class="menu_header smooth" href="#nosotros" style="color:#E799D8;" onclick="$('#menu_mobile').hide(); $('#sitio_web').show(); $('#cotizador').hide();">
							Clientes
						</a>
						<a class="menu_header smooth" href="#servicios" style="color:#C9A099;" onclick="$('#menu_mobile').hide(); $('#sitio_web').show(); $('#cotizador').hide();">
							Servicios
						</a>
						<a class="menu_header smooth" href="#inicio" style="color:#DAEB99;" onclick="$('#menu_mobile').hide(); $('#sitio_web').show(); $('#cotizador').hide();">
							Inicio
						</a>
						<a class="menu_header smooth" href="cotizador/" style="color:white; background:#22568f; font-size:12px; padding:6px 0; border-radius:5px; width:126px;" onclick="$('.contenidos').hide(); $('#cotizador').show();">
							Solicitar Cotizaci&oacute;n
						</a>
						<a class="menu_header smooth" href="#step01" style="color:white; background:#22568f; font-size:12px; padding:6px 0; border-radius:5px; width:126px;" onclick="$('.contenidos').hide(); $('#cotizador').show();">
							Solicitar Cotizaci&oacute;n
						</a>
						-->
						<a class="menu_header smooth" href="cotizador/" style="color:white; background:#22568f; font-size:12px; padding:6px 0; border-radius:5px; width:126px;">
							Solicitar Cotizaci&oacute;n
						</a>
						<a class="menu_header smooth" href="#contacto" style="" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#sitio_web').show();">
							Contacto
						</a>
						<a class="menu_header smooth" href="#nosotros" style="" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#sitio_web').show(); ">
							Clientes
						</a>
						<a class="menu_header smooth" href="#servicios" style="" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#sitio_web').show();">
							Servicios
						</a>
						<a class="menu_header smooth" href="#inicio" style="" onclick="$('#menu_mobile').hide(); $('.contenidos').hide(); $('#sitio_web').show();">
							Inicio
						</a>
						<div class="menu_mobile" onclick="$('#menu_mobile').show();">
							<img src="https://aguitech.com/blue/images/menu.png" style="width:20px;" />
						</div>
						<div style="clear:both;"></div>
					</div>
					
					<div class="contenidos" id="detalle_cliente" style="display:none;">
						
						<?php /**
						<div class="titulo_seccion">Detalle cliente</div>
						<div class="contenedor_izquierdo_seccion">
							<img src="http://aguitech.com/blue/images/imagenes_stock/Macbook_Pro_Open.png" class="imagen_seccion" />
<!--							<img src="blue/images/imagenes_stock/Dell_Monitor.png" class="imagen_seccion" />-->
<!--							<img src="blue/images/imagenes_stock/Apple_Keyboard.png" class="imagen_seccion" />-->
						</div>
						*/ ?>
						<div id="contenido_cliente">
							
						</div>
						<div style="clear:both;"></div>
						<a href="#nosotros" onclick="$('.contenidos').hide(); $('#sitio_web').show();">
							<img src="blue/images/flecha_anterior.png" style="width:25px; float:right; margin:10px 10px 0 0; cursor:pointer;" />
						</a>
						<div style="clear:both;"></div>
						<br />
						<br />
						<br />
						
					</div>
					<div class="contenidos" id="detalle_publicacion" style="display:none;">
						
						<?php /**
						<div class="titulo_seccion">Detalle cliente</div>
						<div class="contenedor_izquierdo_seccion">
							<img src="http://aguitech.com/blue/images/imagenes_stock/Macbook_Pro_Open.png" class="imagen_seccion" />
<!--							<img src="blue/images/imagenes_stock/Dell_Monitor.png" class="imagen_seccion" />-->
<!--							<img src="blue/images/imagenes_stock/Apple_Keyboard.png" class="imagen_seccion" />-->
						</div>
						*/ ?>
						<div id="contenido_publicacion">
							
						</div>
						<div style="clear:both;"></div>
						<?php /**
						<a href="#nosotros" onclick="$('.contenidos').hide(); $('#sitio_web').show();">
							<img src="blue/images/flecha_anterior.png" style="width:25px; float:right; margin:10px 10px 0 0; cursor:pointer;" />
						</a>
						<div style="clear:both;"></div>
						*/ ?>
						<br />
						<br />
						<br />
						
					</div>
					<script>
	   function cargar_crear(){
		   $("#container").html("");
		   var val_page = "";
		   var val_categoria = "";

		   $.ajax({
				type: "POST",
				url:"/views_online/crear_venta.php",
				//data: { limit:val_limit, offset:val_offset },
				data: { page:val_page, categoria:val_categoria },
				success:function(data){
					console.log(data);
					//$("#resultado_votos_detalle").html(data);
					//$("#publicaciones_adicionales").html(data);
					//$("#publicaciones_adicionales").append(data);
					$("#container").html(data);
				}
			});
		   
	   }
	   function cargar_editar(id){
		   $("#container").html("");
		   var val_page = "";
		   var val_categoria = "";
		   
		   $.ajax({
				type: "POST",
				url:"/views_online/crear_venta.php",
				//data: { limit:val_limit, offset:val_offset },
				data: { id:id },
				success:function(data){
					console.log(data);
					//$("#resultado_votos_detalle").html(data);
					//$("#publicaciones_adicionales").html(data);
					//$("#publicaciones_adicionales").append(data);
					$("#container").html(data);
				}
			});
		   
	   }
	   function cargar_categoria_inventario(id, value){
		   console.log(value);
		   console.log(value);
		   $(".punto_venta_categoria").removeClass("punto_venta_categoria_selected");
		   $(value).addClass("punto_venta_categoria_selected");
		   $("#container_inventario").html("");
		   var val_page = "";
		   var val_categoria = "";
		   
		   $.ajax({
				type: "POST",
				url:"/views_online/punto_venta_inventario.php",
				//data: { limit:val_limit, offset:val_offset },
				data: { id:id },
				success:function(data){
					console.log(data);
					//$("#resultado_votos_detalle").html(data);
					//$("#publicaciones_adicionales").html(data);
					//$("#publicaciones_adicionales").append(data);
					$("#container_inventario").html(data);
				}
			});
		   
	   }
	   function agregar_producto(id, secundario){
		   //alert("dsadas");
		   //$("#container_inventario").html("");
		   var val_page = "";
		   var val_categoria = "";
		   
		   $.ajax({
				type: "POST",
				url:"/views_online/punto_venta_agregar_producto.php",
				//data: { limit:val_limit, offset:val_offset },
				data: { id:id },
				success:function(data){
					console.log(data);
					//$("#resultado_votos_detalle").html(data);
					//$("#publicaciones_adicionales").html(data);
					//$("#publicaciones_adicionales").append(data);
					//$("#container_inventario").html(data);
					//$("#form_venta").append(data);
					$("#form_venta").html(data);
					$(".select_refresh").formSelect();
				}
			});
		   
	   }
	   function restar_producto(id, secundario){
		   //$("#container_inventario").html("");
		   var val_page = "";
		   var val_categoria = "";
		   
		   $.ajax({
				type: "POST",
				url:"/views_online/punto_venta_restar_producto.php",
				//data: { limit:val_limit, offset:val_offset },
				data: { id:id },
				success:function(data){
					console.log(data);
					//$("#resultado_votos_detalle").html(data);
					//$("#publicaciones_adicionales").html(data);
					//$("#publicaciones_adicionales").append(data);
					//$("#container_inventario").html(data);
					//$("#form_venta").append(data);
					$("#form_venta").html(data);
					$(".select_refresh").formSelect();
				}
			});
		   
	   }
	   function quitar_producto(id, secundario){
		   //$("#container_inventario").html("");
		   var val_page = "";
		   var val_categoria = "";
		   
		   $.ajax({
				type: "POST",
				url:"/views_online/punto_venta_quitar_producto.php",
				//data: { limit:val_limit, offset:val_offset },
				data: { id:id },
				success:function(data){
					console.log(data);
					//$("#resultado_votos_detalle").html(data);
					//$("#publicaciones_adicionales").html(data);
					//$("#publicaciones_adicionales").append(data);
					//$("#container_inventario").html(data);
					//$("#form_venta").append(data);
					$("#form_venta").html(data);
					$(".select_refresh").formSelect();
				}
			});
		   
	   }
	   
	   function guardar_venta(){
		   var id = 0;
		   $.ajax({
				type: "POST",
				url:"/views_online/guardar_venta.php",
				//data: { limit:val_limit, offset:val_offset },
				data: { id:id },
				success:function(data){
					console.log(data);
					//$("#resultado_votos_detalle").html(data);
					//$("#publicaciones_adicionales").html(data);
					//$("#publicaciones_adicionales").append(data);
					//$("#container_inventario").html(data);
					//$("#form_venta").append(data);
					$("#form_venta").html(data);
					$(".select_refresh").formSelect();
				}
			});
	   }
	   
	   
	   </script>
					<style>
					
					</style>
					<div class="contenidos" id="sitio_web">
						<div id="inicio">
							
							<a href="#servicios" class="smooth" style="text-decoration:none;">
								
								<div class="titulo_home">
									<?php if($web->slogan != ""): ?>
										<?php echo $web->slogan; ?>
									<?php endif; ?>
									<span id="text_home">software_</span>
									<div>
										<?php if($web->texto_bienvenida != ""): ?>
											<?php echo $web->texto_bienvenida; ?>
										<?php endif; ?>
									</div>
								</div>
								<!-- 
								<div class="titulo_home">Desarrollo<br />de <span id="text_home">software_</div>
								-->
<!--								<div class="titulo_home">Desarrollo<br />de software_</div>-->
<!-- 
								<img src="blue/images/flecha_home.png" style="" class="flecha_inicio" />
								-->
								<img src="views_online/images/flecha_home.png" style="" class="flecha_inicio" />
<!--								<br />-->
<!--								<img src="blue/images/imagenes_stock/desarrollo_software.png" style="" class="logo_inicio" />-->
								
							</a>
							<!-- 
							<img src="blue/images/aguila_logo.png" style="width:200px;" />
							<img src="blue/images/Aguila_calva_volando.png" style="width:200px;" />
							-->
							<!-- 
							<img src="blue/images/imagenes_stock/desarrollo_software.png" style="width:300px;" />
							<br />
							IDENTIDAD VISUAL Y DESARROLLO DE SOFTWARE
							-->
						</div>
						<div>
							
							<div id="container">
            					<div style="width:100%; padding:0 10%;" class="content_form_crear">
            						<div>
                            			<?php include("search_sku.php"); ?>
                            		</div>
            						<div style="display:flex; justify-content:space-between;">
            							<div class="contenedor_punto_venta_categorias">
                                        	<?php foreach($inventario_categorias as $categoria): ?>
                                        	<div class="punto_venta_categoria" onclick="cargar_categoria_inventario(<?php echo $categoria->id_inventario_categoria; ?>, this);">
                                        		<?php echo $categoria->inventario_categoria; ?>
                                        	</div>
                                        	<?php endforeach; ?>
                                        </div>
                                        <div class="contenedor_punto_venta_inventario">
                                        	<div class="contenedor_punto_venta_inventario_interior" >
                                        		<div id="container_inventario" style="" class="contenedor_punto_venta_inventario_interior_b">
                                        			QUE ROOLLLOO
                                        			&nbsp;
                                        		</div>
                                        	</div>
                                        </div>
                                    </div>
                                    <div>
            							<div class="contenedor_punto_venta">
            								<?php /**<form id="" method="post">*/ ?>
                    						<form id="" method="post" action="">
                    							<div id="form_venta"></div>
                    							<?php /**
                                        		<input type="hidden" name="editar" value="<?php echo $resultado->id_venta; ?>" />
                                        		<div>
                                        			<h3><?php if($_POST["id"] != ""): echo "Actualizar"; else: echo "Crear"; endif; ?> venta</h3>
                                        			<input type="text" placeholder="Nombre de venta" name="venta" id="venta" value="<?php echo $resultado->venta; ?>" />
                                        		</div>
                                        		
                                        		<div>
                                        			<!-- <input type="submit" />-->
                                        			<button class="btn waves-effect waves-light bg_aguitech" type="submit" name="action"><?php if(isset($resultado->id_venta) && $resultado->id_venta != ""): ?>ACTUALIZAR<?php else: ?>CREAR<?php endif; ?> <i class="material-icons right">send</i></button>
                                        		</div>
                                        		*/ ?>
                                        		
                                        		<div>
                                        			<!-- <input type="submit" />-->
                                        			<?php /**
                                        			<button class="btn waves-effect waves-light bg_aguitech" type="button" name="action" onclick="guardar_venta()"><?php if(isset($resultado->id_venta) && $resultado->id_venta != ""): ?>ACTUALIZAR<?php else: ?>COBRAR<?php endif; ?> <i class="material-icons right">send</i></button>
                                        			*/ ?>
                                        		</div>
                                        	</form>
                                        </div>
            						</div>
            						<?php /**
                                	<form id="" method="post">
                                		<input type="hidden" name="editar" value="<?php echo $resultado->id_venta; ?>" />
                                		<div>
                                			<h3><?php if($_POST["id"] != ""): echo "Actualizar"; else: echo "Crear"; endif; ?> venta</h3>
                                			<input type="text" placeholder="Nombre de venta" name="venta" id="venta" value="<?php echo $resultado->venta; ?>" />
                                		</div>
                                		<div>
                                			<!-- <input type="submit" />-->
                                			<button class="btn waves-effect waves-light bg_aguitech" type="submit" name="action"><?php if(isset($resultado->id_venta) && $resultado->id_venta != ""): ?>ACTUALIZAR<?php else: ?>CREAR<?php endif; ?> <i class="material-icons right">send</i></button>
                                		</div>
                                	</form>
                                	*/ ?>
                                </div>
                    			<div style="height:100px;">
                    			
            					</div>
                    		</div>
							
							
						</div>
						<div id="servicios">
							<div class="titulo_seccion"><?php if($web->titulo_servicios == ""): ?>Soluciones integrales<?php else: ?><?php echo $web->titulo_servicios; ?><?php endif; ?></div>
							<div class="descripcion_seccion">
								<?php if($web->texto_servicios == ""): ?>Contamos con la experiencia y el equipo para el desarrollo de software sofisticado.<?php else: ?><?php echo $web->texto_servicios; ?><?php endif; ?>
								
								<!-- 
								Lorem ipsum dolor sit amet, consectetur adispiscing elit, sed do eiusmod tempor<br />incididunt ut labore et dolore magna aliqua.
								-->
							</div>
							<div style="text-align:center;">
								<?php if($servicios == Array()): ?>
								<a href="#desarrollo_software" class="servicios smooth" onclick="$('#sitio_web').hide(); $('#desarrollo_software').show();">
    								<div class="titulo_servicios">
    									Desarrollo<br />de software
    								</div>
    								<div class="descripcion_servicios">
    									Programaci&oacute;n Orientada a Objetos, Webservices, aplicaciones Android & iOS, software a la medida.
    								</div>
    								<div class="mas_informacion">
    									M&aacute;s informaci&oacute;n &gt;
    								</div>
    							</a>
    							<a href="#consultoria_procesos" class="servicios smooth" onclick="$('#sitio_web').hide(); $('#consultoria_procesos').show(); animar_procesos();">
    								<div class="titulo_servicios">
    									Consultoria<br />y Procesos
    								</div>
    								<div class="descripcion_servicios">
    									An&aacute;lisis y gesti&oacute;n de recursos.<br />
    									Manejo y control de almac&eacute;n.<br />
    									Consultoria Integral de Mercadotecnia
    								</div>
    								<div class="mas_informacion">
    									M&aacute;s informaci&oacute;n &gt;
    								</div>
    							</a>
    							<a href="#graphic_design" class="servicios smooth" onclick="$('#sitio_web').hide(); $('#graphic_design').show();">
    								<div class="titulo_servicios">
    									Dise&ntilde;o<br />Gr&aacute;fico
    								</div>
    								<div class="descripcion_servicios">
    									Identidad visual, creaci&oacute;n de logotipos, Sitio Web, UX y UI, branding corporativo.
    								</div>
    								<div class="mas_informacion">
    									M&aacute;s informaci&oacute;n &gt;
    								</div>
    							</a>
    							<a href="#asistencia_legal" class="servicios smooth" onclick="$('#sitio_web').hide(); $('#asistencia_legal').show();">
    								<div class="titulo_servicios">
    									Asistencia<br />Legal
    								</div>
    								<div class="descripcion_servicios">
    									Registro de marca, creaci&oacute;n de contratos, conversi&oacute;n en franquicia, derechos de autor.
    								</div>
    								<div class="mas_informacion">
    									M&aacute;s informaci&oacute;n &gt;
    								</div>
    							</a>
								<?php else: ?>
								<?php foreach($servicios as $servicio): ?>
								<a href="#desarrollo_software" class="servicios smooth" onclick="$('#sitio_web').hide(); $('#desarrollo_software').show();">
    								<div class="titulo_servicios">
    									<?php echo $servicio->servicio; ?>
    								</div>
    								<div class="descripcion_servicios">
    									<?php echo $servicio->descripcion; ?>
    								</div>
    								<div class="mas_informacion">
    									M&aacute;s informaci&oacute;n &gt;
    								</div>
    							</a>
    							<?php endforeach; ?>
    							<?php endif; ?>
    							<div style="clear:both;"></div>
    						</div>
						</div>
						<div id="nosotros">
							<div>
								<div class="titulo_seccion"><?php if($web->titulo_clientes == ""): ?>Casos de &eacute;xito<?php else: ?><?php echo $web->titulo_clientes; ?><?php endif; ?></div>
    							<div class="descripcion_seccion">
    								<?php if($web->texto_clientes == ""): ?>Hemos realizado websites, sistemas administrativos personalizados, aplicaciones Android & iOS, trivias y concusos digitales para empresas reconocidas nacional e internacionalmente.<?php else: ?><?php echo $web->texto_clientes; ?><?php endif; ?>
    							</div>
								<!-- 
								<ul>
									<li class="titulo">Casos de &eacute;xito</li>
								</ul>
								<div style="clear:both;"></div>
								-->
								<script>
								function rollover_cliente(id){
									logo_id = "#cliente_logo_" + id;
									id_cliente = "#cliente_hover_" + id;
									$(logo_id).hide();
									$(id_cliente).show();
								}
								function rollout_cliente(id){
									logo_id = "#cliente_logo_" + id;
									id_cliente = "#cliente_hover_" + id;
									$(id_cliente).hide();
									$(logo_id).show();
								}
								
								</script>
								<script>
								/**
								function cargar_entrada(id){
									$.ajax({
										type: "POST",
										url:"cargar_blog.php",
										data: { id:id },
										success:function(data){
											//alert("hola");
											//alert(data);
											//alert(ck_lang);
											$("#banner_contenido").html(data);
										}
									});
								}
								*/
								function cargar_cliente(id){

									$(".contenidos").hide();
									$("#detalle_cliente").show();


									//.scrollTop()
									$('html, body').stop().animate({
								        scrollTop: $("#detalle_cliente").offset().top
								    }, 1000);
									
									
									$.ajax({
										type: "POST",
										url:"cargar_cliente.php",
										data: { id:id },
										success:function(data){
											//alert("hola");
											//alert(data);
											//alert(ck_lang);
											$("#contenido_cliente").html(data);
											
										}
									});
								}
								/**
								function cargar_blog(id){

									//$(".contenidos").hide();
									//$("#blog").show();
									var cat_blog = "#categoria_blog_" + id;

									$('.categoria_blog').css({'background':'white'});
									$('.categoria_blog').css({'color':'#297fca'});
									$(cat_blog).css({'background':'#297fca'});
									$(cat_blog).css({'color':'white'});
									

									//.scrollTop()
									$('html, body').stop().animate({
								        scrollTop: $("#blog").offset().top
								    }, 1000);
									
									
									$.ajax({
										type: "POST",
										url:"cargar_categoria_blog.php",
										data: { id:id },
										success:function(data){
											//alert("hola");
											//alert(data);
											//alert(ck_lang);
											$("#contenido_blog").html(data);
											comprobar_tamanio_scroll();
											
										}
									});
								}
								function iniciar_blog(id){

									//$(".contenidos").hide();
									//$("#blog").show();
									var cat_blog = "#categoria_blog_" + id;

									$('.categoria_blog').css({'background':'white'});
									$('.categoria_blog').css({'color':'#297fca'});
									$(cat_blog).css({'background':'#297fca'});
									$(cat_blog).css({'color':'white'});
									
									$.ajax({
										type: "POST",
										url:"cargar_categoria_blog.php",
										data: { id:id },
										success:function(data){
											//alert("hola");
											//alert(data);
											//alert(ck_lang);
											$("#contenido_blog").html(data);
											
										}
									});
								}
								function detalle_publicacion(id){

									$(".contenidos").hide();
									$("#detalle_publicacion").show();

									//alert(id);

									
									//.scrollTop()
									
									
									
									$.ajax({
										type: "POST",
										url:"cargar_publicacion.php",
										data: { id:id },
										success:function(data){
											//alert("hola");
											//alert(data);
											//alert(ck_lang);
											$("#contenido_publicacion").html(data);
											comprobar_tamanio_scroll();
											
										}
									});
									

									$('html, body').stop().animate({
								        scrollTop: $("#detalle_publicacion").offset().top
								    }, 1000);
								    
									
								}
								*/
								
								
								</script>
								<div class="contenedor_marcas">
									<div class="cliente" onmouseover="rollover_cliente(1)" onmouseout="rollout_cliente(1)" onclick="cargar_cliente(19);">
										<img src="images/logos/corona.jpg" class="cliente_logo" style="" id="cliente_logo_1" />
										<div id="cliente_hover_1" class="cliente_hover">
											<div class="cliente_nombre">Corona</div>
											<div class="cliente_linea"></div>
											<div class="cliente_tipo">Aplicaci&oacute;n Facebook</div>
										</div>
									</div>
									<div class="cliente" onmouseover="rollover_cliente(2)" onmouseout="rollout_cliente(2)" onclick="cargar_cliente(3);">
										<img src="images/logos/google.png" class="cliente_logo" style="" id="cliente_logo_2" />
										<div id="cliente_hover_2" class="cliente_hover">
											<div class="cliente_nombre">Google</div>
											<div class="cliente_linea"></div>
											<div class="cliente_tipo">Sitio Web<br />Google Developer Fest</div>
										</div>
									</div>
									<div class="cliente" onmouseover="rollover_cliente(3)" onmouseout="rollout_cliente(3)" onclick="cargar_cliente(33);">
										<img src="images/logos/la_cetto.png" class="cliente_logo" style="" id="cliente_logo_3" />
										<div id="cliente_hover_3" class="cliente_hover">
											<div class="cliente_nombre">Vinos L.A. Cetto</div>
											<div class="cliente_linea"></div>
											<div class="cliente_tipo">Sitio Web</div>
										</div>
									</div>
									<div class="cliente" onmouseover="rollover_cliente(4)" onmouseout="rollout_cliente(4)" onclick="cargar_cliente(48);">
										<img src="images/logos/mi_gusto_es.jpg" class="cliente_logo" style="" id="cliente_logo_4" />
										<div id="cliente_hover_4" class="cliente_hover">
											<div class="cliente_nombre">Mi Gusto Es</div>
											<div class="cliente_linea"></div>
											<div class="cliente_tipo">Promoci&oacute;n con<br />Fiesta Americana</div>
										</div>
									</div>
									<div class="cliente" onmouseover="rollover_cliente(5)" onmouseout="rollout_cliente(5)" onclick="cargar_cliente(20);">
										<img src="images/logos/mcdonalds.jpg" class="cliente_logo" style="" id="cliente_logo_5" />
										<div id="cliente_hover_5" class="cliente_hover">
											<div class="cliente_nombre">McDonald's</div>
											<div class="cliente_linea"></div>
											<div class="cliente_tipo">Sitio Web</div>
										</div>
									</div>
									<div class="cliente" onmouseover="rollover_cliente(6)" onmouseout="rollout_cliente(6)" onclick="cargar_cliente(42);">
										<img src="images/logos/sanborns.png" class="cliente_logo" style="" id="cliente_logo_6" />
										<div id="cliente_hover_6" class="cliente_hover">
											<div class="cliente_nombre">Sanborns</div>
											<div class="cliente_linea"></div>
											<div class="cliente_tipo">Internet Gratis<br />con Cisco Meraki</div>
										</div>
									</div>
									<div class="cliente" onmouseover="rollover_cliente(7)" onmouseout="rollout_cliente(7)" onclick="cargar_cliente(34);">
										<img src="images/logos/vina_real.png" class="cliente_logo" style="" id="cliente_logo_7" />
										<div id="cliente_hover_7" class="cliente_hover">
											<div class="cliente_nombre">Vi&ntilde;a Real</div>
											<div class="cliente_linea"></div>
											<div class="cliente_tipo">Sitio Web</div>
										</div>
									</div>
									<div class="cliente" onmouseover="rollover_cliente(8)" onmouseout="rollout_cliente(8)" onclick="cargar_cliente(35);">
										<img src="images/logos/hpnotiq.png" class="cliente_logo" style="" id="cliente_logo_8" />
										<div id="cliente_hover_8" class="cliente_hover">
											<div class="cliente_nombre">Hpnotiq</div>
											<div class="cliente_linea"></div>
											<div class="cliente_tipo">Sitio Web</div>
										</div>
									</div>
									<!-- 
									<div class="cliente">
										<img src="../blue/images/logos/eluniversal.jpg" class="cliente_logo" style="margin-top:83px;" />
									</div>
									-->
									<div style="clear:both;"></div>
								</div>
							</div>
							<?php /**
							Especialistas en websites, sistemas administrativos personalizados, aplicaciones Android &amp; iOS.
							*/ ?>
							
						</div>
						<script>
						function cargar_blog(id){

							//$(".contenidos").hide();
							//$("#blog").show();

							$("#categoria").val(id);
							$("#page").val(0);
							
							var cat_blog = "#categoria_blog_" + id;

							$('.categoria_blog').css({'opacity':'0.3'});
							$(cat_blog).css({'opacity':'1'});
							
							//$('.categoria_blog').css({'background':'white'});
							//$('.categoria_blog').css({'color':'black'});
							//$(cat_blog).css({'background':'black'});
							//$(cat_blog).css({'color':'white'});
							/*

							.css('opacity', '0.6');
							
							$('.categoria_blog').css({'background':'white'});
							$('.categoria_blog').css({'color':'#297fca'});
							$(cat_blog).css({'background':'#297fca'});
							$(cat_blog).css({'color':'white'});
							*/

							//.scrollTop()
							$('html, body').stop().animate({
						        //scrollTop: $("#blog").offset().top
								scrollTop: $("#contenedor_blog").offset().top
						    }, 1000);
							
							
							$.ajax({
								type: "POST",
								//url:"cargar_categoria_blog.php",
								//url:"cargar_categoria_ajax.php",
								//url:"views_online/cargar_categoria_ajax.php",
								url:"/views_online/cargar_categoria_ajax.php",
								data: { id:id },
								success:function(data){
									//alert("hola");
									//alert(data);
									//alert(ck_lang);
									$("#contenido_blog").html(data);
									comprobar_tamanio_scroll();

									//var data_href = "http://aguitech.com"
									var data_href = "https://online.casidios.com/" + id + "/"; 
									$(".fb-comments").attr('data-href', data_href);
								    FB.XFBML.parse();
								}
							});
						}
						function detalle_publicacion(id){

							console.log("test");
							
							$(".contenidos").hide();
							$("#detalle_publicacion").show();

							//alert(id);

							
							//.scrollTop()
							$('html, body').stop().animate({
						        scrollTop: $("#detalle_publicacion").offset().top
						    }, 1000);
							
							
							$.ajax({
								type: "POST",
								//url:"cargar_publicacion.php",
								//url:"cargar_publicacion_color.php",
								url:"/views_online/cargar_publicacion_color.php",
								data: { id:id },
								success:function(data){
									//alert("hola");
									//alert(data);
									//alert(ck_lang);
									$("#contenido_publicacion").html(data);
									comprobar_tamanio_scroll();
									
								}
							});
							
						}
						
						
						</script>
						<div id="contacto">
							<br /><br /><br />
							<div class="titulo_seccion"><?php if($web->titulo_contacto == ""): ?>Contacto<?php else: ?><?php echo $web->titulo_contacto; ?><?php endif; ?></div>
							<div class="descripcion_seccion">
								<?php if($web->texto_contacto == ""): ?>Nuestro objetivo es que nos contactes para encontrar esa primera interacci&oacute;n,<br />de ah&iacute; haremos proyectos interesantes juntos.<?php else: ?><?php echo $web->texto_contacto; ?><?php endif; ?>
							</div>
							<form method="post" action="">
								<div>
								
									<div style="" class="contenedor_contacto">
										
										<div id="maps_web">
											<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.061723535475!2d-99.23422764943642!3d19.36647988685766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20058f869eea9%3A0xa460f258089cec3e!2sAv.+Sta.+Lucia+1120%2C+Colina+del+Sur%2C+01430+Ciudad+de+M%C3%A9xico%2C+CDMX!5e0!3m2!1ses!2smx!4v1521696819791" frameborder="0" style="border:0" allowfullscreen class="maps_size"></iframe>
											
											
										</div>
										<div class="direccion">
											Av. Santa Luc&iacute;a 1120 Int. 204<br />
											Col. Colinas del Sur<br />
											Del. &Aacute;lvaro Obreg&oacute;n, C.P. 01430<br />
											Ciudad de M&eacute;xico, M&eacute;xico<br /><br />
											Tel&eacute;fono: 55 45 24 99 06<br />
											E-mail: hector@aguitech.com<br />
											<!-- 
											E-mail: hola@aguitech.com<br />
											-->
											Web: aguitech.com<br />
											<br />
										</div>
										
										
										
									</div>
									<div style="" class="contenedor_contacto">
										<div>
											<input type="text" class="text_field" name="nombre" id="" placeholder="NOMBRE" />
										</div>
										<div>
											<input type="text" class="text_field" name="telefono" id="" placeholder="TEL&Eacute;FONO" />
										</div>
										<div>
											<input type="text" class="text_field" name="correo" id="" placeholder="CORREO" />
										</div>
										<div style="padding-top:20px;">
											<textarea type="text" class="text_field" name="mensaje" id="" placeholder="MENSAJE" rows="4" ></textarea>
										</div>
										<div style="cursor:pointer;">
											<input type="submit" class="text_field" name="" id="" value="ENVIAR" style="cursor:pointer;" />
										</div>
									</div>
									
									<div style="clear:both;"></div>
								</div>
								<br />
								
							</form>
							
							

							
							<!--
							<div id="maps_mobile">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.061723535475!2d-99.23422764943642!3d19.36647988685766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20058f869eea9%3A0xa460f258089cec3e!2sAv.+Sta.+Lucia+1120%2C+Colina+del+Sur%2C+01430+Ciudad+de+M%C3%A9xico%2C+CDMX!5e0!3m2!1ses!2smx!4v1521696819791" width="300" height="150" frameborder="0" style="border:0" allowfullscreen class="maps_size"></iframe>
							</div>
							
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.061723535475!2d-99.23422764943642!3d19.36647988685766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20058f869eea9%3A0xa460f258089cec3e!2sAv.+Sta.+Lucia+1120%2C+Colina+del+Sur%2C+01430+Ciudad+de+M%C3%A9xico%2C+CDMX!5e0!3m2!1ses!2smx!4v1521696819791" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							 
							<iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=19.3664799,-99.2342223&amp;num=1&amp;sll=19.3664799,-99.2342223&amp;sspn=0.021048,0.032015&amp;hl=es&amp;ie=UTF8&amp;ll=19.3664799,-99.2342223&amp;spn=0.018782,0.038581&amp;z=14&amp;layer=c&amp;cbll=19.3664799,-99.2342223&amp;panoid=FLaz8Br0w7o5_5y5KvZVjA&amp;cbp=12,187.08,,0,1.37&amp;source=embed&amp;output=svembed"></iframe>
							<!-- 
							<iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=19.401973,-99.059608&amp;num=1&amp;sll=19.410307,-99.065402&amp;sspn=0.021048,0.032015&amp;hl=es&amp;ie=UTF8&amp;ll=19.413335,-99.055309&amp;spn=0.018782,0.038581&amp;z=14&amp;layer=c&amp;cbll=19.402094,-99.060527&amp;panoid=FLaz8Br0w7o5_5y5KvZVjA&amp;cbp=12,187.08,,0,1.37&amp;source=embed&amp;output=svembed"></iframe>
							-->
							<br /><br />
							
						</div>
						<div id="blog">
							<br /><br /><br />
							
							<input type="hidden" id="categoria" />
							<input type="hidden" id="page" />
							
							
							<div class="titulo_seccion"><?php if($web->titulo_blog == ""): ?>Blog<?php else: ?><?php echo $web->titulo_blog; ?><?php endif; ?></div>
							<div class="descripcion_seccion">
								<?php if($web->texto_blog == ""): ?>Nuestros contenidos mas recientes.<?php else: ?><?php echo $web->texto_blog; ?><?php endif; ?>
							</div>
							<div style="text-align:center;">
								<?php foreach($categorias as $categoria){ ?>
								<div id="categoria_blog_<?php echo $categoria->id_categoria; ?>" class="categoria_blog" onclick="cargar_blog(<?php echo $categoria->id_categoria; ?>);" style="color:<?php echo $categoria->color; ?>; border:2px solid <?php echo $categoria->color; ?>;"><?php echo $categoria->categoria; ?></div>
								<?php } ?>
								<div style="clear:both;"></div>
							</div>
							
							<div id="fb-root"></div>
							<?php /**
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2&appId=434406806608345&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-comments" data-href="http://aguitech.com/cats5.php" data-numposts="5"></div>
        */ ?>
        <div class="fb-comments" data-href="https://online.casidios.com/<?php echo $usuario_value->usuario; ?>" data-numposts="5"></div>
        <!-- 
		<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
		-->
		
							
							
							<div id="contenedor_blog" style="padding-top:55px;">
								&nbsp;
								<div id="contenido_blog"></div>
								<div id="loader" style="display:none; text-align:center; margin-top:33px;">
									<img src="https://aguitech.com/blue/images/spinner.gif" style="width:77px;" />
								</div>
							</div>
							
							<div style="clear:both;"></div>
						</div>
						<div class="footer">
<!--							Dise&ntilde;o MONOMETRICO &copy; <?php echo date("Y"); ?><br />-->
<!--							Dise&ntilde;o Web y Desarrollo AGUITECH &copy; <?php echo date("Y"); ?><br />-->
								<div>
									<img src="https://aguitech.com/blue/images/logo_aguitech/Aguitech_logo.png" style="height:40px;" />
								</div>
								AGUITECH &copy; <?php echo date("Y"); ?>
<!--							Desarrollado por AGUITECH &copy; <?php echo date("Y"); ?>-->
						</div>
					</div>
					

				</div>
			</div>
		</div>
		<!-- Analytics Aguitech 2018 -->
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116916309-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-116916309-1');
		</script>
		
		
	</body>
</html>