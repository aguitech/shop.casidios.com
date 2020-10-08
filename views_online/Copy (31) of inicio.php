<?php
include("includes/includes.php");
session_start();


//http://order.casidios.com/admin#10

$_SESSION["page"] = 0;

//$categoria = new categoria();
//$categorias = $categoria->get();

$username = $_GET["name"];


//print_r($_SERVER);
//echo $username;
$exploded_url = explode( "/", $username );
//echo $exploded_url[1];


//echo $mesa_md5;
//echo "<hr />";

//print_r($mesa_valor);
//exit();


//$valor_usuario = $obj->get_row("select * from usuario left join sucursal on sucursal.id_sucursal = usuario.id_usuario where usuario.usuario like '{$exploded_url[0]}'");

$qry_usuario = "select * from usuario where usuario like '{$exploded_url[0]}'";

$valor_usuario = $obj->get_row($qry_usuario);

$id_usuario = $valor_usuario->id_usuario;

//$qry_empresa = "select * from empresa where empresa = '{$exploded_url[1]}'";
//$qry_empresa = "select * from empresa left join usuario_empresa on usuario_empresa.id_empresa = empresa.id_empresa where empresa.empresa = '{$exploded_url[1]}' and usuario_empresa.id_usuario = $id_usuario";

//$qry_sucursal = "select * from sucursal left join usuario_sucursal on usuario_sucursal.id_sucursal = sucursal.id_sucursal where sucursal = '{$exploded_url[2]}' and usuario_sucursal.id_usuario = $id_usuario";
//$qry_sucursal = "select * from sucursal left join usuario_sucursal on usuario_sucursal.id_sucursal = sucursal.id_sucursal left join empresa on empresa.id_empresa = sucursal.id_empresa where sucursal = '{$exploded_url[2]}' and usuario_sucursal.id_usuario = $id_usuario";
$qry_sucursal = "select * from sucursal left join usuario_sucursal on usuario_sucursal.id_sucursal = sucursal.id_sucursal left join empresa on empresa.id_empresa = sucursal.id_empresa where sucursal = '{$exploded_url[2]}' and usuario_sucursal.id_usuario = $id_usuario and empresa = '{$exploded_url[1]}'";

$valor_sucursal = $obj->get_row($qry_sucursal);
//echo "<hr />SUC";
//print_r($valor_sucursal);
//echo "<hr />";
//echo "select * from usuario left join sucursal on sucursal.id_sucursal = usuario.id_usuario where usuario.usuario like '{$exploded_url[0]}'";
//echo "select * from usuario left join sucursal on sucursal.id_sucursal = usuario.id_usuario where usuario.usuario like '{$exploded_url[0]}' and sucursal like '{$exploded_url[1]}'";
//print_r($valor_usuario);



$qry_empresa = "select * from empresa left join usuario_empresa on usuario_empresa.id_empresa = empresa.id_empresa where empresa.empresa = '{$exploded_url[1]}' and usuario_empresa.id_usuario = $id_usuario";

$valor_empresa = $obj->get_row($qry_empresa);
//echo "<hr />EMP";
//print_r($valor_empresa);





$qry_username = "select * from usuario where usuario = 'aguitech'";
//$usuario_value = $obj->get_row("select * from usuario where usuario = '{$username}'");
//$exploded_url[1]
$usuario_value = $obj->get_row("select * from usuario where usuario = '{$exploded_url[0]}'");

$id_sucursal = $valor_sucursal->id_sucursal;
//echo "<hr />";
//print_r($id_sucursal);
$id_usuario = $usuario_value->id_usuario;

if($id_sucursal != "" && $id_usuario != ""):
    $_SESSION["web_suc"] = $id_sucursal;
    $_SESSION["web_idusuario"] = $id_usuario;
    
    
    //print_r($_SESSION);
endif; 

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

//print_r($web_sucursal);

//$id_sucursal = $web_sucursal->id_sucursal;
$id_sucursal = 14;

//print_r($web_sucursal);
//print_r($id_sucursal);
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


$_SESSION["mesamd5"] = "";
$_SESSION["mesa_md5"] = "";
$_SESSION["mesaid"] = "";
$_SESSION["mesax"] = "";
$_SESSION["mesa"] = "";

unset ($_SESSION["mesamd5"]);
unset ($_SESSION["mesa_md5"]);
unset ($_SESSION["mesaid"]);
unset ($_SESSION["mesax"]);
unset ($_SESSION["mesa"]);



/*
$mesa_md5 = $exploded_url[3];
echo $mesa_md5;
*/
/*
if($mesa_md5 != ""){
    $mesa_valor = $obj->get_row("select * from mesa where md5(id_mesa) = '$mesa_md5'");
    //$_SESSION["mesamd5"] = "dsakmdklsamdksamkdmsakdmkas0mdkamsk";
    //$_SESSION["mesamd5"] = $mesa_md5 . "_";
    print_r($mesa_valor);
    $_SESSION["mesa"] = $mesa_valor->id_mesa;
    //$_SESSION["mesa_md5"] = $exploded_url[3];
    echo $_SESSION["mesa"];
    sleep(1);
    print_r($_SESSION);
    
    
    
    
}
*/
/*
$mesa_valor = $obj->get_row("select * from mesa where md5(id_mesa) = '$mesa_md5'");
//$_SESSION["mesamd5"] = "dsakmdklsamdksamkdmsakdmkas0mdkamsk";
//$_SESSION["mesamd5"] = $mesa_md5 . "_";
print_r($mesa_valor);
$_SESSION["mesax"] = $mesa_valor->id_mesa;
//$_SESSION["mesa_md5"] = $exploded_url[3];
echo $_SESSION["mesax"];
sleep(1);
*/

//print_r($_SESSION);


$_SESSION["cantidad_productos"] = "";
$_SESSION["producto"] = "";
$_SESSION["precio"] = "";
$_SESSION["cantidad"] = "";

unset ($_SESSION["cantidad_productos"]);
unset ($_SESSION["producto"]);
unset ($_SESSION["precio"]);
unset ($_SESSION["cantidad"]);


if(isset($_SESSION["web_suc"])){
    $id_sucursal = $_SESSION["web_suc"];
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
/*
$mesa_md5 = $exploded_url[3];
//$mesa_valor = $obj->get_row("select * from mesa where MD5(id_mesa) = '$mesa_md5'");
//$mesa_valor = $obj->get_row("select * from mesa where id_mesa = 7");
$mesa_valor = $obj->get_row("select * from mesa where MD5(id_mesa) = '{$mesa_md5}'");
echo $mesa_valor->id_mesa;
//sleep(2);
echo "<hr />";
print_r($mesa_valor);
echo "<hr />";
print_r($mesa_valor->id_mesa);

$id_mesa = $mesa_valor->id_mesa;

if($id_mesa != 0){
    $_SESSION["mesa"] = "x10" . $id_mesa;
    
}else{
    $_SESSION["mesa"] = "xxx" . $id_mesa;
    
}
*/
//echo $exploded_url[3];
//sexit();
$mesa_md5 = $exploded_url[3];
//$mesa_valor = $obj->get_row("select * from mesa where MD5(id_mesa) = '$mesa_md5'");
//$mesa_valor = $obj->get_row("select * from mesa where id_mesa = 7");
//$mesa_valor = $obj->get_row("select * from mesa where id_mesa = '{$mesa_md5}'");
//echo $mesa_valor->id_mesa;
//sleep(2);
//echo "<hr />";
//print_r($mesa_valor);
//echo "<hr />";
//print_r($mesa_valor->id_mesa);

$id_mesa = $mesa_md5;

//echo $id_mesa;
//exit();
$_SESSION["mesa"] = "a";

//if($id_mesa != 0){
if(isset($id_mesa) && !empty($id_mesa)){
    $_SESSION["mesa"] = "" . $id_mesa;
    echo $_SESSION["mesa"] . "as";
    
    
}
echo "hola";
print_r($_SESSION);
//exit();



if($_POST["id"] != ""){
    $id = $_POST["id"];
    $qry_id = "select * from venta where id_venta = {$id}";
    $resultado = $obj->get_row($qry_id);
    //print_r($resultado);
}




$color_llamada = array("gray", "pink", "#81D15D", "#1AACE0", "red", "brown", "#F0CA4D", "#B24BDE");

$status_llamada = array("Sin realizar", "Intento fallido", "Cita agendada", "Cliente frecuente",  "Cliente perdido",  "Numero equivocado", "NPR", "Segunda vuelta");

$_SESSION["page"] = 0;

//$categorias = $obj->get_results('select * from categoria');




//$clientes = $obj->get_results('select * from cliente');
$id_usuario = $_SESSION["web_idusuario"];



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
				//url:"views_online/sku_busqueda.php",
				url:"/views_online/sku_busqueda.php",
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
						<?php /**MENU
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
						*/ ?>
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
		<script>

		function mostrar_pedidos(id_mesa){
			$('#menu_pedidos').slideToggle('slow');
			var val_page = 0;
			var val_categoria = 0;
			$.ajax({
				type: "POST",
				//url:"entradas_proximas_ajax.php",
				url:"/views_online/ajax_pedidos.php",
				//data: { limit:val_limit, offset:val_offset },
				data: { page:val_page, categoria:val_categoria, id_mesa:id_mesa },
				success:function(data){
					//$("#resultado_votos_detalle").html(data);
					//$("#publicaciones_adicionales").html(data);
					//$("#publicaciones_adicionales").append(data);
					//$("#contenido_blog").append(data);
					//$("#hora").html(time);
					//$("#salida").append(data);
					//$("#menu_pedidos").prepend(data);
					$("#menu_pedidos").html(data);
				}
			});
		}
		</script>
		<div style="width:40px; height:40px; position:fixed; bottom:20px; left:0; background:gray;" onclick="mostrar_pedidos('<?php echo md5($mesa_valor->id_mesa); ?>');">
			d
		</div>
		<div style="display:none; position:fixed; left:40px; right:0; top:50px; bottom:0; background:white; z-index:1;" id="menu_pedidos">
			
		</div>
	</body>
</html>