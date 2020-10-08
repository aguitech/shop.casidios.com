<?php 
include("includes/includes.php");
session_start();




$limit_val = 1;
$id_categoria = $_POST["categoria"];
if($_POST["page"] != ""){
    $page = $_POST["page"];
}else{
    $page = 0;
}


$offset_val = $page * $limit_val;

if($page == 0){
    
}
if($page > 0){
    //$blog = new blog();
    //$blog->get_query = "select * from blog limit 5 offset 0";
    //$blog->get_query = "select * from blog limit 5 offset $offset_val";
    //$blog->get_query = "select * from blog limit 5 offset $offset_val";
    //$blog->get_query = "select * from blog where id_categoria = $id_categoria limit 5 offset $offset_val";
    //$blog->get_query = "select * from blog where id_categoria = $id_categoria order by id_blog desc limit 5 offset $offset_val";
    //$qry_blog = "select * from blog left join categoria on blog.id_categoria = categoria.id_categoria where blog.id_categoria = $id_categoria order by blog.id_blog desc limit 5 offset $offset_val";
    //$qry_blog = "select * from blog left join categoria on blog.id_categoria = categoria.id_categoria where blog.id_categoria = $id_categoria order by blog.id_blog desc limit 1 offset $offset_val";
    $qry_blog = "select * from blog left join categoria on blog.id_categoria = categoria.id_categoria where blog.id_categoria = $id_categoria order by blog.id_blog desc limit 1 offset $page";
    ////echo $qry_blog;
    ////exit();
    $blogs = $obj->get_results($qry_blog);
    
}else{
    $blogs == Array();
}
/*
if($_SESSION["page"] == 0){
    
}
if($page > $_SESSION["page"]){
    $blog = new blog();
    //$blog->get_query = "select * from blog limit 5 offset 0";
    //$blog->get_query = "select * from blog limit 5 offset $offset_val";
    //$blog->get_query = "select * from blog limit 5 offset $offset_val";
    $blog->get_query = "select * from blog where id_categoria = $id_categoria limit 5 offset $offset_val";
    $blogs = $blog->get();
    
    $_SESSION["page"] = $page;
}else{
    $blogs == Array();
}




*/





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

<?php //print_r($blogs); ?>
<?php if($blogs == Array()): ?>

<?php else: ?>

<?php foreach($blogs as $blog): ?>
<div onclick="detalle_publicacion(<?php echo $blog->id_blog; ?>);">
	<h3 class="blog_titulo" style="color:<?php echo $blog->color; ?>; border-top:2px solid <?php echo $blog->color; ?>; padding-top:17px;"><?php echo $blog->titulo; ?></h3>
	<h5 class="blog_resenia"><?php echo $blog->blog; ?></h5>
	<div class="blog_descripcion"><?php echo $blog->descripcion; ?></div>
	<?php if($blog->thumb != ""): ?>
	<div style="text-align:center;">
		<img src="<?php echo $url_intranet; ?>panel/images/blog/<?php echo $blog->thumb; ?>" class="detalle_imagen" />
	</div>
	<?php endif; ?>
	
	<?php //print_r($blog); ?>
	
	<?php if($blog->id_youtube != ""): ?>
	<div style="text-align:center;">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $blog->id_youtube; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
	<?php endif; ?> 
	 
	 
	 
	<div id="fb-root"></div>
	
	
	<!-- 
	<script type="text/javascript">
      window.fbAsyncInit = function() {
        FB.init({appId: '434406806608345', status: true, cookie: true,
                 xfbml: true});
      };

      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>
    -->
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
	<?php /**
	<div class="fb-comments" data-href="http://aguitech.com/cats5.php?blog=<?php echo $blog->id_blog; ?>" data-numposts="1"></div>
	*/ ?>
	<div class="fb-comments" data-href="http://online.casidios.com/<?php echo $blog->id_blog; ?>" data-numposts="1"></div>
	
</div>
<?php endforeach; ?>
<?php endif; ?>