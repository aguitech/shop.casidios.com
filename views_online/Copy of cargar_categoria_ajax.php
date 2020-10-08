<?php
include("includes/includes.php");
$id = $_POST["id"];

$categoria = new categoria();
$categoria = $categoria->get($id);


$blog = new blog();
//$blog->get_query = "select * from blog where id_categoria = $id";
//$blog->get_query = "select * from blog where mostrar = 1 and id_categoria = $id";
//$blog->get_query = "select * from blog where mostrar = 1 and id_categoria = $id";
//$blog->get_query = "select * from blog left join categoria on blog.id_categoria = categoria.id_categoria where blog.mostrar = 1 and blog.id_categoria = $id";
//$blog->get_query = "select * from blog left join categoria on blog.id_categoria = categoria.id_categoria where blog.mostrar = 1 and blog.id_categoria = $id order by blog.id_blog desc";
//$blog->get_query = "select * from blog left join categoria on blog.id_categoria = categoria.id_categoria where blog.mostrar = 1 and blog.id_categoria = $id limit 5 offset 0 order by blog.id_blog desc";
$blog->get_query = "select * from blog left join categoria on blog.id_categoria = categoria.id_categoria where blog.mostrar = 1 and blog.id_categoria = $id order by blog.id_blog desc limit 5 offset 0";
$blogs = $blog->get();


?>
<style>
.detalle_imagen{
	width:300px;
}
</style>
<div>
	
</div>
<script>

function cambiar_foto(id_foto){

	var btn_galeria = "#btn_galeria_" + id_foto;


	
	
/**
	$(".boton_galeria").hover(function(){
		$(this).css("background-color", "#003D7B");
	}, function(){
		$(this).css("background-color", "#DCDCDC");
	});



	$(".boton_galeria").css({"background":"#DCDCDC"});
	
	$(btn_galeria).css({"background":"#003D7B;"});
	$(btn_galeria).css({"background":"#003D7B;"});
	$(btn_galeria).css({"backgroundColor":"#003D7B;"});

	$(btn_galeria).css({"background-color":"#003D7B;"});

	$(btn_galeria).css({"background-color":"#003D7B;"});

	$(btn_galeria).css("background-color":"#003D7B;");

	$(btn_galeria).css({"width":"30px"});
	*/
	$(".boton_galeria").css({"background":"#DCDCDC"});
	$(btn_galeria).css({"background-color":"#003D7B"});
	
	
	

	

	
	//alert(btn_galeria);
	
	$.ajax({
		type: "POST",
		url:"cargar_foto.php",
		data: { id:id_foto },
		success:function(data){
			//alert("hola");
			//alert(data);
			//alert(ck_lang);
			$("#galeria_cliente").html(data);
			
			
		}
	});
}
/*
function detalle_blog(id_blog){
	
	alert(id_blog);

	
	$.ajax({
		type: "POST",
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
*/
</script>
<div style="color:white;">
	<div>
		<div style="height:auto;">
			<?php 
			//print_r($conteofoto);
			//$conteofoto[0]["conteo"];
			?>
			<?php /**
			<div style="float:left; margin-left:0px; width:320px;">
				<?php foreach($blogs as $blog){ ?>
				<div><?php echo $blog["titulo"]; ?></div>
				<div><?php echo $blog["descripcion"]; ?></div>
				<div><?php echo $blog["imagen"]; ?></div>
				<?php } ?>
			</div>
			*/ ?>
			
			
		</div>
	</div>
</div>
<div style="text-align:center;">
	<div style="color:<?php echo $categoria["color"]; ?>"><?php echo $categoria["categoria"]; ?></div>
	<?php foreach($blogs as $blog): ?>
	<div>
		<h3 class="blog_titulo" style="color:<?php echo $blog["color"]; ?>; border-top:2px solid <?php echo $blog["color"]; ?>; padding-top:17px;"><?php echo $blog["titulo"]; ?></h3>
		<h5 class="blog_resenia"><?php echo $blog["blog"]; ?></h5>
		<div class="blog_descripcion"><?php echo $blog["descripcion"]; ?></div>
		<?php if($blog['thumb'] != ""): ?>
		<div style="text-align:center;">
			<img src="panel/images/blog/<?php echo $blog['thumb']; ?>" class="detalle_imagen" />
		</div>
		<?php endif; ?>
		<div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2&appId=434406806608345&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- 
		<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
		-->
		<div class="fb-comments" data-href="http://aguitech.com/cats5.php?blog=<?php echo $blog['id_blog']; ?>" data-numposts="5"></div>
	</div>
	<?php endforeach; ?>
	
	
	<?php /**
	<?php foreach($blogs as $blog){ ?>
	<?php //<a href="#graphic_design" class="servicios smooth" onclick="$('#sitio_web').hide(); $('#graphic_design').show(); detalle_blog(<?php echo $blog['id_blog']; ?>);"> ?>
	<a class="publicaciones smooth" onclick="detalle_publicacion(<?php echo $blog['id_blog']; ?>);" style="border:1px solid <?php echo $blog['color']; ?>;">
		<div class="titulo_servicios" style="color:<?php echo $blog['color']; ?>;">
			<?php echo $blog["titulo"]; ?>
		</div>
		<div class="descripcion_servicios" style="color:<?php echo $blog['color']; ?>;">
			<?php if($blog["descripcion"] == "" && $blog["thumb"] != ""): ?>
			<img src="panel/images/blog/<?php echo $blog["thumb"]; ?>" style="max-height:120px !important; max-width:100% !important;" />
			<?php else: ?>
			<?php echo $blog["resenia"]; ?>
			<?php endif; ?>
			<?php //print_r($blog["thumb"]); ?>
		</div>
		<div class="mas_informacion" style="color:<?php echo $blog['color']; ?>;">
			M&aacute;s informaci&oacute;n &gt;
		</div>
	</a>
	<?php } ?>
	*/ ?>
</div>