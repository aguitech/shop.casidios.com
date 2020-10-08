<?php
include("includes/includes.php");
//print_r($_GET);

$username = $_GET["name"];

//echo $username;
//echo "<br />";

//$resultado = $obj->get_row("select * from usuario where usuario = '{$username}'");
//$qry = "select * from usuario where usuario = '{$username}'";
$qry = "select * from usuario where usuario = 'aguitech'";
//echo $qry;
//$resultado = $obj->get_results($qry);
//$categorias = $obj->get_results('select * from usuario');
//$usuario = $obj->get_results('select * from usuario');
//$usuario = $obj->get_results('select * from usuario where usuario = "{$username}"');
$usuario = $obj->get_results("select * from usuario where usuario = '{$username}'");
//print_r($usuario);

//echo "<hr />";

$categorias = $obj->get_results('select * from categoria');
//print_r($categorias);
?>
<script src="http://aguitech.com/js/jquery-3.3.1.js"></script>
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
								url:"cargar_categoria_ajax.php",
								data: { id:id },
								success:function(data){
									//alert("hola");
									//alert(data);
									//alert(ck_lang);
									$("#contenido_blog").html(data);
									comprobar_tamanio_scroll();

									var data_href = "http://aguitech.com" 
									$(".fb-comments").attr('data-href', data_href);
								    FB.XFBML.parse();
									
								}
							});
						}
						function detalle_publicacion(id){

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
								url:"cargar_publicacion_color.php",
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
<div style="display:flex; justify-content:center;">
	<div style="width:70%;">
	dsadsa
	</div>
	<div style="width:30%;">
		<?php foreach($categorias as $categoria): ?>
		<div>
			<?php print_r($categoria->categoria); ?>
		</div>
		<?php endforeach; ?>
	</div>
</div>