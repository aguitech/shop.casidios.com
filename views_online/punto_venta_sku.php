<?php
include("includes/includes.php");
include("common_files/sesion.php");

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
<!--		<link href="https://fonts.googleapis.com/css?family=Fira+Sans:800" rel="stylesheet">-->
<!--		<link href="https://fonts.googleapis.com/css?family=Fira+Sans:800" rel="stylesheet">-->
		<link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,600,800" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="Shortcut Icon" href="aguitech.ico" type="image/x-icon" />
<!--		<link href="" rel="image_src" / >-->
		
		<!-- 
		<meta property="og:url"                content="http://aguitech.com/blue/" />
		<meta property="og:type"               content="article" />
		<meta property="og:title"              content="Aguitech Solutions" />
		<meta property="og:description"        content="Desarrollo de software, aplicaciones y websites" />
		<meta property="og:image"              content="http://aguitech.com/blue/blue/images/logo_aguitech/Aguitech_logo.png" />
		
		-->
		<style>
        td:odd{
        	background:#DCDCDC;
        }
        td:even{
        	background:#CDCDCD;
        }
        </style>
		<meta property="og:image"              content="http://aguitech.com/images/aguitech_fb.png" />
		
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
		
		<!-- <link rel="stylesheet" href="css/styles.css" />-->
<!--		<script src="js/jquery-1.7.2.js"></script>-->
<!-- 
		<script src='http://code.jquery.com/jquery-1.8.3.min.js' type='text/javascript'></script>
		-->
		<script src="/js/jquery-3.3.1.js"></script>
		<link type="text/css" rel="stylesheet" href="http://aguitech.com/materialize/css/materialize.min.css"  media="screen,projection"/>
		<link rel="stylesheet" href="css/aguitech_backend.css" />

        <!--Let browser know website is optimized for mobile-->
        <!-- 
      	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      	-->
		<style>
body{
	font-family:arial;
}
</style>

<script>
/*
    $(function () {
        $('.hamburger').click(function () {
            $('.hamburger').toggleClass('open');
            alert("test");
        });
    });
    */
</script>
<style>

</style>
		<script>
		$(document).ready(function() {
			  $(window).keydown(function(event){
			    if(event.keyCode == 13) {
			      event.preventDefault();
			      return false;
			    }
			  });
			});

		/*
		function validationFunction() {
		  $('input').each(function() {
		    ...

		  }
		  if(good) {
		    return true;
		  }
		  return false;
		}

		$(document).ready(function() {
		  $(window).keydown(function(event){
		    if( (event.keyCode == 13) && (validationFunction() == false) ) {
		      event.preventDefault();
		      return false;
		    }
		  });
		});


		*/
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
				url:"sku_busqueda.php",
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
		<script type="text/javascript" src="js/jquery.jrumble.1.3.min.js"></script>  
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

					var val_categoria = $("#categoria").val();
					var val_page = parseInt($("#page").val()) + 1;
					$("#loader").show();

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

    				$("#page").val(val_page)
					

					
					
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
		</script>
		<!-- 
		$('.contenidos').hide(); $('#cotizador').show();
		 -->
		<?php //if($_GET["clear"] == "true"){ echo "<script>$('.contenidos').hide(); alert(); </script>"; } ?>
	</head>
	<body onload="<?php if($_GET["func"] == "new"): echo "cargar_crear()"; endif; ?>">
		<?php include("common_files/header.php"); ?>
		<?php //print_r($qry_update);?>
		<style>
        body{
	       font-family:arial;
        	font-size:12px;
	   }
	   select{
	   	width:200px;
	   }
	   td{
	   	padding:5px;
	   }
        .dinamic_text{
        	width:200px !important;
        }
	   @media screen and (max-width:440px) {
            select{
                width:60px;
            }
	        /*
            table {
                width: 320px;
            }
            
            table tr td {
                width: 60px;
                word-wrap: break-word;
            }
            
            table tr td {
                display: inline-block;
                margin-top: 2px;
            }
            */
            table.table_dinamic {
                width: 320px;
            }
            
            table.table_dinamic tr.tr_dinamic td.td_dinamic {
                width: 76px;
                word-wrap: break-word;
            }
            
            table.table_dinamic tr.tr_dinamic td.td_dinamic {
                display: inline-block;
                margin-top: 2px;
            }
            
        }
        tr.tr_dinamic > td:nth-child(1){
        	width:10px !important;
        }
        tr.tr_dinamic > td:nth-child(2){
        	width:30px !important;
        }
        tr.tr_dinamic > td:nth-child(3){
        	width:30px !important;
        }
        tr.tr_dinamic > td:nth-child(4){
        	width:30px !important;
        }
	   </style>
	   <script>
	   function cargar_crear(){
		   $("#container").html("");
		   var val_page = "";
		   var val_categoria = "";

		   $.ajax({
				type: "POST",
				url:"crear_venta.php",
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
				url:"crear_venta.php",
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
				url:"punto_venta_inventario.php",
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
				url:"punto_venta_agregar_producto.php",
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
				url:"punto_venta_restar_producto.php",
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
				url:"punto_venta_quitar_producto.php",
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
				url:"guardar_venta.php",
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
	   <div style="position:absolute; top:0; left:0; right:0; bottom:0;">
			<div style="width:100%; height:100%; background:rgba(255,255,255,.65);" class="waves-effect">
				<?php //print_r($clientes); ?>
				<div style="overflow:auto; height:100%; width:100%;">
				
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
                            <div class="contenedor_punto_venta_inventario" id="container_inventario">
                            	&nbsp;
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
        		<?php if(isset($ventas)): ?>
        		<div>
        			
        		</div>
        		<?php else: ?>
        		<div class="flecha_art">
        			<div class="flecha_art_text">Haz click aqu&iacute;!</div>
        			<img src="images/flecha_art.png" class="flecha_art_img" />
        		</div>
        		
        		<?php endif; ?>
        		<?php /**
				<div class="menu_footer btn_main_add" style="" onclick="cargar_crear();">
					
    				+
    				<!--
    				<i class="material-icons">add</i> 
    				<i class="material-icons">add</i>
    				
                	<a class="btn-floating pulse"><i class="material-icons">add</i></a>
                	-->
					
                </div>
                */ ?>
                
                </div>
				
				
				
				
			</div>
			<?php include("common_files/footer.php"); ?>
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
		<script type="text/javascript" src="http://aguitech.com/materialize/js/materialize.min.js"></script>
		<script>

  $('.modal').modal();
  /**
  $(function(){
  	$( "#datepicker, .datepicker" ).datepicker({
      	//dateFormat: 'yy-mm-dd',
  		dateFormat: 'yyyy-mm-dd',
  		//dateFormat: 'Y-m-d',
  		//dateFormat: 'yy-mm-dd',
          defaultDate: Date.now(),
          setDefaultDate: true
      });
  })
  
  */
  document.addEventListener('DOMContentLoaded', function() {
	var options = {
		format: 'yyyy-mm-dd',
		defaultDate: Date.now(),
        setDefaultDate: true
	};
	var elems = document.querySelectorAll('.datepicker_format');
	var instances = M.Datepicker.init(elems, options);
});
/*
  document.addEventListener('DOMContentLoaded', function() {
	    var elems = document.querySelectorAll('select');
	    //var instances = M.FormSelect.init(elems, options);
	    var instances = M.FormSelect.init(elems);
	  });
  */

  $(document).ready(function(){
    $('select').formSelect();
    $(".select_refresh").formSelect();
  });
    
  </script>
	</body>
</html>