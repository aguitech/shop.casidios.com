<?php
include("includes/includes.php");
$id = $_POST["id"];

//$blog = new blog();
//$blog = $blog->get($id);

//$blog->get_query = "select * from blog left join categoria on blog.id_categoria = categoria.id_categoria where id_blog = $id";
$qry_blog = "select * from blog left join categoria on blog.id_categoria = categoria.id_categoria where id_blog = $id";

$blog = $obj->get_results($qry_blog);
$blog = $blog[0];

/**
print_r($blog);
exit();

 * 
$proyectofoto = new blogfoto();
$proyectofoto->get_query = "select * from blogfoto where id_blog = $id order by id_blog desc";
$proyectofotos = $proyectofoto->get();

$conteofoto = new proyectofoto();
$conteofoto->get_query = "select count(*) as conteo from blogfoto where id_blog = $id";
$conteofoto = $conteofoto->get();
*/
//$proyectofoto = new blogfoto();
$qry_proyectofoto = "select * from blogfoto where id_blog = $id order by id_blog desc";
$proyectofotos = $obj->get_results($qry_proyectofoto);



$qry_conteofoto = "select count(*) as conteo from blogfoto where id_blog = $id";
$conteofoto = $obj->get_results($qry_conteofoto);

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
		url:"cargar_foto_blog.php",
		data: { id:id_foto },
		success:function(data){
			//alert("hola");
			//alert(data);
			//alert(ck_lang);
			$("#galeria_cliente").html(data);
			
			
		}
	});
}
</script>
<div style="color:white;">
	<div>
		<div style="height:auto;">
			<?php 
			//print_r($conteofoto);
			//$conteofoto[0]["conteo"];
			?>
			<div style="float:left; margin-left:0px; width:320px;">
				<?php /**
				<div style="text-align:center;">
					<img src="panel/images/blog/<?php echo $proyectologo[0]['imagen']; ?>" class="detalle_imagen" />
				</div>
				*/ ?>
				<div class="titulo_seccion" style="color:<?php echo $blog->color; ?>;"><?php echo $blog->titulo; ?></div>
				<?php if($blog->thumb != ""){ ?>
				<div style="text-align:center;">
					<img src="panel/images/blog/<?php echo $blog->thumb; ?>" class="detalle_imagen" />
				</div>
				<?php } ?>
				<div class="subtitulo_seccion" style="color:<?php echo $blog->color; ?>; border-bottom:1px solid <?php echo $blog->color; ?>;">
					<?php echo $blog->categoria; ?>
					<?php /**
					<?php 
					$categoria = new categoria();
					$categoria = $categoria->get($blog['id_categoria']);
					?>
					<?php echo $categoria["categoria"]; ?>
					*/ ?>
				</div>
				<div class="descripcion_seccion" style="color:<?php echo $blog->color; ?>;">
					<?php echo $blog->resenia; ?>
				</div>
				<div style="text-align:center;">
					<a onclick="window.open('https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=<?php echo urlencode("http://aguitech.com/?blog=" . $blog->id_blog); ?>', '_blank')">
						<img src="blue/images/img_facebook.png" style="width:50px;" />
					</a>
					<a onclick="window.open('https://www.facebook.com/dialog/send?app_id=1145414915474263&link=<?php echo urlencode("aguitech.com/?blog=" . $blog->id_blog); ?>&redirect_uri=<?php echo urlencode("http://aguitech.com/?blog=" . $blog->id_blog); ?>', '_blank')">
						<img src="blue/images/img_messenger.png" style="width:50px;" />
					</a>
					<a onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urlencode($blog->titulo); ?>&hashtags=<?php echo urlencode($blog->hashtags); ?>&url=<?php echo urlencode("http://aguitech.com/?blog=" . $blog->id_blog); ?>&original_referer=<?php echo urlencode("http://aguitech.com/?blog=" . $blog->id_blog); ?>', '_blank')">
						<img src="blue/images/img_twitter.png" style="width:50px;" />
					</a>
					<a onclick="window.open('https://plus.google.com/share?url=<?php echo urlencode("http://aguitech.com/?blog=" . $blog->id_blog); ?>', '_blank')">
						<img src="blue/images/img_googleplus.png" style="width:50px;" />
					</a>
					<a onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode("http://aguitech.com/?blog=" . $blog->id_blog); ?>&title=<?php echo urlencode($blog->titulo); ?>&summary=<?php echo urlencode($blog->resenia); ?>&source=', '_blank')">
						<img src="blue/images/img_linkedin.png" style="width:50px;" />
					</a>
					<?php /**
					<a onclick="window.open('https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>', '_blank')">
						<img src="https://vignette.wikia.nocookie.net/youtubepedia/images/5/55/Facebook.png/revision/latest?cb=20170327031942&path-prefix=es" style="width:50px;" />
					</a>
					<a onclick="window.open('https://www.facebook.com/dialog/send?app_id=1145414915474263&link=<?php echo urlencode("aguitech.com/?blog=" . $blog['id_blog']); ?>&redirect_uri=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>', '_blank')">
						<img src="https://cdn.icon-icons.com/icons2/812/PNG/512/social_facebook_messenger_icon-icons.com_66150.png" style="width:50px;" />
					</a>
					<a onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urlencode($blog['titulo']); ?>&hashtags=<?php echo urlencode($blog['hashtags']); ?>&url=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>&original_referer=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>', '_blank')">
						<img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c53e.png" style="width:50px;" />
					</a>
					<a onclick="window.open('https://plus.google.com/share?url=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>', '_blank')">
						<img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Google-plus-circle-icon-png.png" style="width:50px;" />
					</a>
					<a onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>&title=<?php echo urlencode($blog['titulo']); ?>&summary=<?php echo urlencode($blog['resenia']); ?>&source=', '_blank')">
						<img src="https://cdn.icon-icons.com/icons2/642/PNG/512/linkedin_icon-icons.com_59208.png" style="width:50px;" />
					</a>
					*/ ?>
					
					
					<?php /**
					https://plus.google.com/share?url=https%3A%2F%2Fwww.mdirector.com%2Fmarketing-digital%2F10-tendencias-de-diseno-para-2018.html%3Futm_campaign%3Dshareaholic%26utm_medium%3Dgoogle_plus%26utm_source%3Dsocialnetwork

Compartir LinkedIn

https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fwww.mdirector.com%2Fmarketing-digital%2F10-tendencias-de-diseno-para-2018.html%3Futm_campaign%3Dshareaholic%26utm_medium%3Dlinkedin%26utm_source%3Dsocialnetwork&title=10+tendencias+de+dise%C3%B1o+para+2018&summary=&source=
					
					
					<a onclick="window.open('https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>', '_blank')">
						<img src="https://vignette.wikia.nocookie.net/youtubepedia/images/5/55/Facebook.png/revision/latest?cb=20170327031942&path-prefix=es" style="width:50px;" />
					</a>
					<a onclick="window.open('https://www.facebook.com/dialog/send?app_id=1145414915474263&link=<?php echo urlencode("aguitech.com/?blog=" . $blog['id_blog']); ?>&redirect_uri=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>', '_blank')">
						<img src="https://cdn.icon-icons.com/icons2/836/PNG/512/Facebook_Messenger_icon-icons.com_66796.png" style="width:50px;" />
					</a>
					<a onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urlencode($blog['titulo']); ?>&hashtags=<?php echo urlencode($blog['hashtags']); ?>&url=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>&original_referer=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>', '_blank')">
						<img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c53e.png" style="width:50px;" />
					</a>
					
					<a onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urlencode($blog['titulo']); ?>&hashtags=Oro,Azul,Rojo&url=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>&original_referer=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>', '_blank')">
						<img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c53e.png" style="width:50px;" />
					</a>
					<a onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urlencode($blog['titulo']); ?>&hashtags=Oro%2CLupitaGonz%C3%A1lez%2CMundialDeAtletismoChina&url=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>&original_referer=<?php echo urlencode("http://aguitech.com/?blog=" . $blog['id_blog']); ?>', '_blank')">
						<img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c53e.png" style="width:50px;" />
					</a>
					
					<a onclick="window.open('https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=http%3A%2F%2Fsopit.as%2F2rm9B80&quote=Reportan%20a%20Alex%20Ferguson%20grave%20tras%20sufrir%20hemorragia%20cerebral', '_blank')">
						<img src="https://vignette.wikia.nocookie.net/youtubepedia/images/5/55/Facebook.png/revision/latest?cb=20170327031942&path-prefix=es" style="width:50px;" />
					</a>
					<a onclick="window.open('https://www.facebook.com/dialog/send?app_id=1145414915474263&link=sopit.as%2F2rm9B80&redirect_uri=http%3A%2F%2Fsopit.as%2F2rm9B80', '_blank')">
						<img src="https://cdn.icon-icons.com/icons2/836/PNG/512/Facebook_Messenger_icon-icons.com_66796.png" style="width:50px;" />
					</a>
					<a onclick="window.open('https://twitter.com/intent/tweet?text=%C2%A1Orgullo%20nacional%21%20Lupita%20Gonz%C3%A1lez%20se%20cuelga%20oro%20en%20el%20Mundial%20de%20Marcha%20%F0%9F%87%B2%F0%9F%87%BD&hashtags=Oro%2CLupitaGonz%C3%A1lez%2CMundialDeAtletismoChina&url=http%3A%2F%2Fsopit.as%2F2rnq4tw&original_referer=https%3A%2F%2Fwww.sopitas.com%2F868738-lupita-gonzalez-oro-mundial-china-2%2F', '_blank')">
						<img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c53e.png" style="width:50px;" />
					</a>
					
					<a onclick="window.open('https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=http%3A%2F%2Fsopit.as%2F2rm9B80&quote=Reportan%20a%20Alex%20Ferguson%20grave%20tras%20sufrir%20hemorragia%20cerebral', '_blank')">
						COMPARTIR FB
					</a>
					<a onclick="window.open('https://www.facebook.com/dialog/send?app_id=1145414915474263&link=sopit.as%2F2rm9B80&redirect_uri=http%3A%2F%2Fsopit.as%2F2rm9B80', '_blank')">
						SEND MENSA
					</a>
					<a onclick="window.open('https://twitter.com/intent/tweet?text=%C2%A1Orgullo%20nacional%21%20Lupita%20Gonz%C3%A1lez%20se%20cuelga%20oro%20en%20el%20Mundial%20de%20Marcha%20%F0%9F%87%B2%F0%9F%87%BD&hashtags=Oro%2CLupitaGonz%C3%A1lez%2CMundialDeAtletismoChina&url=http%3A%2F%2Fsopit.as%2F2rnq4tw&original_referer=https%3A%2F%2Fwww.sopitas.com%2F868738-lupita-gonzalez-oro-mundial-china-2%2F', '_blank')">
					COMPARTIR TWITTER
					</a>
					
					
                    COMPARTIR FB
                    https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=http%3A%2F%2Fsopit.as%2F2rm9B80&quote=Reportan%20a%20Alex%20Ferguson%20grave%20tras%20sufrir%20hemorragia%20cerebral
                   
                    SEND MENSA
                    https://www.facebook.com/dialog/send?app_id=1145414915474263&link=sopit.as%2F2rm9B80&redirect_uri=http%3A%2F%2Fsopit.as%2F2rm9B80
                   
                    COMPARTIR TWITTER
                    https://twitter.com/intent/tweet?text=%C2%A1Orgullo%20nacional%21%20Lupita%20Gonz%C3%A1lez%20se%20cuelga%20oro%20en%20el%20Mundial%20de%20Marcha%20%F0%9F%87%B2%F0%9F%87%BD&hashtags=Oro%2CLupitaGonz%C3%A1lez%2CMundialDeAtletismoChina&url=http%3A%2F%2Fsopit.as%2F2rnq4tw&original_referer=https%3A%2F%2Fwww.sopitas.com%2F868738-lupita-gonzalez-oro-mundial-china-2%2F
                     */ ?>
				</div>
			</div>
			
			
			<div style="float:left; margin-left:0px;">
				<div id="galeria_cliente" style="">
					<div class="contenedor_img_proyecto">
						<?php if($proyectofotos == Array()){ ?>
							<div></div>
						<?php }else{ ?>
							<img src="panel/images/blog/<?php echo $proyectofotos[0]->imagen; ?>" style="" class="img_proyecto" />
						<?php } ?>
					</div>
				</div>
				<div class="contenedor_img_proyecto" style="">
				
					<?php if($proyectofotos == Array()){ ?>
						
					<?php }else{ ?>
						<?php foreach($proyectofotos as $foto){ ?>
						<div onclick="cambiar_foto(<?php echo $foto->id_blogfoto; ?>);" class="boton_galeria boton_galeriax" id="btn_galeria_<?php echo $foto->id_blogfoto; ?>">
							&nbsp;
						</div>
						<?php } ?>
						<script>
						cambiar_foto(<?php echo $proyectofotos[0]->id_blogfoto; ?>);
						</script>
						<div style="clear:both;"></div>
					<?php } ?>
					<div class="descripcion_seccion" style="text-align:left; color:rgba(0,0,0,0.8);">
						<?php echo $blog->descripcion; ?> 
					</div>
				</div>
				<style>
				.boton_galeria{
					width:10px; height:10px;
					border-radius:100%;
					background:#dcdcdc;
					margin:10px;
					float:left;
					border:1px solid #cccccc;
/*					box-shadow:1px 1px 1px #dcdcdc;*/
				}
				.boton_galeriax:hover{
					background:#003D7B;
					cursor:pointer;
					
				}
				</style>
				
				<div>
					<a href="?categoria=<?php echo $blog->id_categoria; ?>" onclick="$('.contenidos').hide(); $('#sitio_web').show();">
						<img src="http://aguitech.com/blue/images/flecha_anterior.png" style="width:25px; float:right; margin:10px 10px 0 0; cursor:pointer;" />
					</a>
				</div>
			</div>
			<div style="clear:both;"></div>
			
			
			
			
		</div>
			
	</div>
</div>