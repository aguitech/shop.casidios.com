$(document).ready(function() {
	/**
	$('.datepicker').each(function(){
	    $(this).datepicker();
	});
	*/
	//$(".datepicker_search").multiselect();

	$(".datepicker_crear").datepicker({
		onSelect: function(date) {
            //alert(date);
            $('#datepicker_fecha').fadeOut(300);
            $('.fecha_seleccionada_search').html(date);
            $("input[name='fecha_fin']").val(date);
        },
        selectWeek: true,
        inline: true,
        //startDate: '01/01/2000',
        firstDay: 1
		//inline: true
        
        
	});
	
	$(".datepicker_search").datepicker({
		onSelect: function(date) {
            //alert(date);
            $('#datepicker_fecha').fadeOut(300);
            $('.fecha_seleccionada_search').html(date);
        },
        selectWeek: true,
        inline: true,
        //startDate: '01/01/2000',
        firstDay: 1
		//inline: true
        
        
	});

	/**
	$(".datepicker_search").datepicker({
		onSelect: function(date) {
            alert(date);
            $('#datepicker_fecha').fadeOut(300);
            $('.fecha_seleccionada_search').html(date);
        },
        selectWeek: true,
        inline: true,
        startDate: '01/01/2000',
        firstDay: 1
		//inline: true
        
        
	});
	 * 
	 * $(".datepicker").datepicker({
		onSelect: function(date) {
            alert(date);
            $('#datepicker_fecha').fadeOut(300);
        },
        selectWeek: true,
        inline: true,
        startDate: '01/01/2000',
        firstDay: 1
		//inline: true
        
        
	});
	 * 
	$('.datepicker2').each(function(){
	    $(this).datepicker();
	});
	*/
	$("#usuario").focus();
	
	
	//$( ".selectmenu" ).selectmenu();
	
	//keypress dont works in Chrome, so we use keydown. hector@aguitech.com
	//$("body").bind('keypress', function(event){
	$("body").on('keydown', function(event){
		//alert("test");
		//alert(event.type);
		//alert(event.which);
		if(event.wich == 13){
			validar_usuario();
			//alert("Presionaste Enter");
		}else if(event.which == 27){
			$("#contenedor_carga").fadeOut("500");
			$("#contenedor_carga_detalle").fadeOut("500");
			$("#fondo_carga").fadeOut("500");

			$("#menu_cuentas_detalle_mobile").fadeOut("500");
			
			$('#crear_carpeta_yoin_cloud').fadeOut(500);
			$('.edit_text_name_yoin_cloud').hide(); $('.flat_text_name_yoin_cloud').show();
		}else{
			//alert("Presionaste otra tecla");
			//alert(event.keyCode);
		}
		//$( "#log" ).html( event.type + ": " +  event.which );
		/*
		if(event.wich == '13'){
			validar_usuario();
			//alert("Precionaste Enter");
		}else if(event.keyCode == '27'){
			$("#contenedor_carga").fadeOut("500");
			$("#fondo_carga").fadeOut("500");

			$("#menu_cuentas_detalle_mobile").fadeOut("500");
			
			
			$('.edit_text_name_yoin_cloud').hide(); $('.flat_text_name_yoin_cloud').show();
		}else{
			//alert("Presionaste otra tecla");
			//alert(event.keyCode);
		}
		*/
	});
	
	
	$("#myfile_yoin_cloud").change(function() {
        //alert('changed!');
		$("#permisos_archivo_yoin_cloud").fadeIn(300);
		
		
		/*
		var path = "C:\\fakepath\\example.doc";
		var filename = path.replace(/^.*\\/, "");
		console.log(filename);
		*/
		var path = $("#myfile_yoin_cloud").val();
		var filename = path.replace(/^.*\\/, "");
		//console.log(filename);
		
		//document.getElementById("yourInputElement").files[0].name
		//document.getElementById("myfile_yoin_cloud").files[0].name
		
		//$("#flat_text_name_yoin_cloud_new").html(filename);
		//$("#flat_text_name_yoin_cloud_new").html("puto el roy");
		
		$(".edit_text_name_yoin_cloud").hide();
		$(".flat_text_name_yoin_cloud").show();
		
		
		$("#flat_text_name_yoin_cloud_new").html(document.getElementById("myfile_yoin_cloud").files[0].name);
		$("#flat_text_size_yoin_cloud_new").html(document.getElementById("myfile_yoin_cloud").files[0].size + " bytes");
		//$("#flat_text_filetype_yoin_cloud_new").html(document.getElementById("myfile_yoin_cloud").files[0].type);
		
		var tipo_archivo = document.getElementById("myfile_yoin_cloud").files[0].type;
		//alert(tipo_archivo);
		if(tipo_archivo == "image/svg+xml"){
			//alert("svg");
		}else if(tipo_archivo == "image/png"){
			//alert("png");
			//$("#img_file_cloud_new").html(document.getElementById("myfile_yoin_cloud").files[0].type);
			//$("#img_file_cloud_new").html(document.getElementById("myfile_yoin_cloud").files[0].type);
			document.getElementById("img_file_cloud_new").src = "images/ic_imagen.png";
			$("#flat_text_filetype_yoin_cloud_new").html("Archivo de imagen");
		}else if(tipo_archivo == "application/pdf"){
			//alert("pdf");
			document.getElementById("img_file_cloud_new").src = "images/ic_pdf.png";
			$("#flat_text_filetype_yoin_cloud_new").html("PDF Document");
		}else if(tipo_archivo == "text/xml"){
			alert("xml");
		}else if(tipo_archivo == "image/jpeg"){
			document.getElementById("img_file_cloud_new").src = "images/ic_imagen.png";
			$("#flat_text_filetype_yoin_cloud_new").html("Archivo de imagen");
		}else if(tipo_archivo == "application/zip"){
			//alert("zip");
			
		}else if(tipo_archivo == "application/vnd.ms-excel.sheet.macroenabled.12" || tipo_archivo == "application/vnd.ms-excel" ){
			document.getElementById("img_file_cloud_new").src = "images/ic_xls.png";
			$("#flat_text_filetype_yoin_cloud_new").html("Excel");
		}else if(tipo_archivo == "application/msword"){
			document.getElementById("img_file_cloud_new").src = "images/ic_doc.png";
			$("#flat_text_filetype_yoin_cloud_new").html("Word");
		}else{
			alert("archivo no permitido");
			$("#flat_text_filetype_yoin_cloud_new").html(document.getElementById("myfile_yoin_cloud").files[0].type);
		}
		
    });
	
	
	
	/*
	 * $(".js-file-upload").on('change','#myfile' , function(){ alert("dasds"); })
	 * 
	 * 
	 * $(parent_element_selector_here or document ).on('change','#imageFile' , function(){ uploadFile(); })
	 * 
	$(".js-file-upload").on("change", function(e){
		 var files = e.target.files;
		 alert("test");
		 // your own logic to filter files etc.
		 // upload your file
		});

	file.on("upload.progress", function(e){
		  //value show progress
		  var value = Math.floor(e.loaded / e.total * 100);
		});
		file.on("load", function(response){ alert("sdadsad");//logic });

		*/
		
	/*
	$("body").bind('keypress', function(event){
		//alert("test");
		if(event.keyCode == '13'){
			validar_usuario();
			//alert("Precionaste Enter");
		}else if(event.keyCode == '27'){
			$("#contenedor_carga").fadeOut("500");
			$("#fondo_carga").fadeOut("500");

			$("#menu_cuentas_detalle_mobile").fadeOut("500");
			
			
			$('.edit_text_name_yoin_cloud').hide(); $('.flat_text_name_yoin_cloud').show();
		}else{
			//alert("Presionaste otra tecla");
			//alert(event.keyCode);
		}
	});
	*/
});
$( window ).resize(function() {
	
	if( $(window).width() >1 &&  $(window).width() <= 440){

		

/*
		$('.menu_administradores').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 20);
		//$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		//$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		//$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		
		$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_superior_instrucciones').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 20);
		$('.menu_superior_instrucciones').css({'background':'yellow'});


		$('.menu_administradores').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 20);
		//$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		//$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		//$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		*/
		
		$('.menu_administradores').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_superior_instrucciones').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 20);
		//$('.menu_superior_instrucciones').css({'background':'yellow'});
		
		
	}else if( $(window).width() >441 &&  $(window).width() <= 999){
		//alert($('.menu_administradores').height());
		//alert($('.contenedor_instrucciones_entrada').height());
		/*
		$('.menu_administradores').css({"color:":"red"});
		$('.menu_administradores').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 10);
		$('.menu_administradores').css({"marginTop:":"-10px"});
		
		//$('.menu_administradores').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 100);
		//$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		//$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		//$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		
		//$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		//$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		//$('.menu_superior_instrucciones').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 60);
		//$('.menu_superior_instrucciones').css({'background':'yellowgreen'});

		$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());

		$('.menu_administradores').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 100);
		
		*/
		
		//$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		//$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		//$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		
		
		
		$('.menu_administradores').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_superior_instrucciones').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 20);
		
		//$('.menu_superior_instrucciones').css({'background':'yellowgreen'});
	}else{
		//$(window).width()
		//alert($('.menu_administradores').height());
		$('.menu_administradores').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		
		//$('.menu_superior_instrucciones').css({'background':'orange'});
	}
	
	/*
	if( $(window).width() >1 &&  $(window).width() <= 440){
		$('.menu_administradores').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 20);
		//$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		//$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		//$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		
		$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_superior_instrucciones').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 20);
		$('.menu_superior_instrucciones').css({'background':'yellow'});
		
	}else if( $(window).width() >441 &&  $(window).width() <= 1000){
		//alert($('.menu_administradores').height());
		$('.menu_administradores').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 100);
		//$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		//$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		//$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		
		$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_superior_instrucciones').height(parseInt($('.contenedor_instrucciones_entrada').height()) - 60);
		$('.menu_superior_instrucciones').css({'background':'yellowgreen'});
	}else{
		//$(window).width()
		//alert($('.menu_administradores').height());
		//$('.menu_administradores').height($('.contenedor_instrucciones_entrada').height());
		//$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		//$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		//$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		
		//$('.menu_administradores').height($('.contenedor_instrucciones_entrada').height());
		//$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_instrucciones_entrada').height($('.contenedor_instrucciones_entrada').height());
		$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
		
		$('.menu_superior_instrucciones').css({'background':'orange'});
	}
	*/
	//alert($(window).width());
	//$( "body" ).prepend( "<div>" + $( window ).width() + "</div>" );
	/*
	$('.menu_administradores').height($('.contenedor_instrucciones_entrada').height());
	$('.menu_administradores_contenido').height($('.contenedor_instrucciones_entrada').height());
	$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height());
	$('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
	$('.menu_superior_instrucciones').css({'background':'yellow'});
	*/
	//$('.organizacion_flex_instrucciones').height($('.contenedor_administradores').height()); $('.menu_superior_instrucciones').height($('.contenedor_administradores').height());
	//$('.organizacion_flex_instrucciones').height($('.contenedor_administradores').height()); $('.menu_superior_instrucciones').height($('.contenedor_administradores').height());

	//$('.organizacion_flex_instrucciones').height($('.informacion_tarjeta_instrucciones').height() - 20); $('.menu_superior_instrucciones').height($('.informacion_tarjeta_instrucciones').height() - 20);
	
	//$('.organizacion_flex_instrucciones').height($('.contenedor_instrucciones_entrada').height()); $('.menu_superior_instrucciones').height($('.contenedor_instrucciones_entrada').height());
	
	//menu_administradores_contenido
});
/*
$(document).keydown(function(e) {
	alert("asd");
	if(e.keyCode == 27) { 
		alert("hey");
 
	}
}
*/
/**
$(function(){
	$( ".selectmenu" ).selectmenu();
	$( "#selectmenu" ).selectmenu();
});
*/

$( ".selectmenu" ).selectmenu();

$(document).ready(function(){
    $.each($('select'), function () {
        $(this).selectmenu({ width : $(this).attr("width")})
    })
})

function agregar_grupo_invitados(este, valor){
	//var html_str = "<div class='grupoinvitado" + valor + "'>" + $(este).html() + "</div>";
	var html_str = "<div class='grupoinvitado grupoinvitado" + valor + "' onclick='quitar_grupo_invitados(this, " + valor + ")'>" + $(este).html() + "</div>";
	//quitar_grupo_invitados
	
	var variable_invitado = ".grupoinvitado" + valor;
	//$('#grupo_invitados').append(html_str);
	//$(este).css({'background':'#1ECBC8'});
	
	//if($('#grupo_invitados').hasClass('seleccion_invitados_active')){
	//alert(este);
	
	if($(este).hasClass('seleccion_invitados_active')){
		//$(este).addClass('seleccion_invitados_active');
		//alert("1");
		$(este).removeClass('seleccion_invitados_active');
		
		$(variable_invitado).remove()
		
		//$('#grupo_invitados').append(html_str);
	}else{
		$(este).addClass('seleccion_invitados_active');
		$('#grupo_invitados').append(html_str);
		//alert("2");
		
		
	}
	/*
	if(este).hasClass('seleccion_invitados_active')){
		//$(este).addClass('seleccion_invitados_active');
		alert("1");
		$(este).removeClass('seleccion_invitados_active');
		
		//$('#grupo_invitados').append(html_str);
	}else{
		$(este).addClass('seleccion_invitados_active');
		$('#grupo_invitados').append(html_str);
		alert("2");
		
		
	}
	*/
	/**
	if($('#grupo_invitados').has(html_str)){
		$('#grupo_invitados').append('ya estaba');
	}else{
		//$('#grupo_invitados').append(html_str);
		
	}
	*/	
}

function quitar_grupo_invitados(este, valor){
	//alert($(este).html());
	
	$(este).remove();
	
	var variable_selector_invitado = ".selectorinvitado" + valor; 
	
	//alert(variable_selector_invitado);
	$(variable_selector_invitado).removeClass('seleccion_invitados_active');
	
	
	
}

function agregar_invitado(){
	//$("#invitados_recientes").append($('#nombre_invitado').val());
	//$("#invitados_recientes").append('<div class="visitantes_recientes selectorinvitado8" onclick="agregar_grupo_invitados(this, 8);">' + $('#nombre_invitado').val() + 'Santiago Carrancedo</div>');
	//$("#invitados_recientes").append('<div class="visitantes_recientes selectorinvitado8" onclick="agregar_grupo_invitados(this, 8);">' + $('#nombre_invitado').val() + '</div>');
	//Math.floor((Math.random() * 100) + 1);
	var random_number = Math.floor((Math.random() * 99999) + 1);
	//$("#invitados_recientes").append('<div class="visitantes_recientes selectorinvitado8" onclick="agregar_grupo_invitados(this, 8);">' + $('#nombre_invitado').val() + '</div>');
	//$("#invitados_recientes").append('<div class="visitantes_recientes selectorinvitado' + random_number + '" onclick="agregar_grupo_invitados(this, ' + random_number + ');">' + $('#nombre_invitado').val() + '</div>');
	//$("#invitados_recientes").append('<div class="visitantes_recientes selectorinvitado' + random_number + '" onclick="agregar_grupo_invitados(this, ' + random_number + ');">' + $('#nombre_invitado').val() + '</div>');
	$("#invitados_recientes").append('<div class="visitantes_recientes selectorinvitado' + random_number + ' seleccion_invitados_active" onclick="agregar_grupo_invitados(this, ' + random_number + ');">' + $('#nombre_invitado').val() + '</div>');
	
	
	
	//var html_str = "<div class='grupoinvitado grupoinvitado" + valor + "' onclick='quitar_grupo_invitados(this, " + valor + ")'>" + $(este).html() + "</div>";
	//var html_str = "<div class='grupoinvitado grupoinvitado" + valor + "' onclick='quitar_grupo_invitados(this, " + valor + ")'>gando</div>";
	//var html_str = "<div class='grupoinvitado grupoinvitado" + random_number + "' onclick='quitar_grupo_invitados(this, " + random_number + ")'>gando</div>";
	var html_str = "<div class='grupoinvitado grupoinvitado" + random_number + "' onclick='quitar_grupo_invitados(this, " + random_number + ")'>" + $('#nombre_invitado').val() + "</div>";
	//$(este).addClass('seleccion_invitados_active');
	$('#grupo_invitados').append(html_str);
	
	//<div class="visitantes_recientes selectorinvitado7" onclick="agregar_grupo_invitados(this, 7);">Santiago Carrancedo</div>
	
	$('#nombre_invitado').val('');
	$('#nombre_invitado').focus();
	
	$(".visitantes_recientes").show();
	
}
function buscar_invitado(){
	//var nombre = $('#nombre_invitado').val().toLowerCase();
	//var nombre = $('#nombre_invitado').val().toUpperCase();
	//var nombre = $('#nombre_invitado').val().toLowerCase();
	//var nombre = $('#nombre_invitado').val().toUpperCase();
	
	/*
	$('#nombre_invitado').css({
		"text-transform":"capitalize"
	})
	*/
	var nombre = $('#nombre_invitado').val();
	
	//alert(nombre);
	//var contains = "#invitados_recientes:contains('" + nombre + "')";
	//var contains = ".visitantes_recientes:contains('" + nombre + "')";
	//var contains = ".visitantes_recientes:containsIN('" + nombre + "')";
	var contains = ".visitantes_recientes:contains('" + nombre + "')";
	
	
	//if($(this).is(':contains("Replace Me")'))
	
	//if($('.visitantes_recientes').is(':contains("Replace Me")')){
	//var contains_check = ":containsIN('" + nombre + "')";
	var contains_check = ":contains('" + nombre + "')";
	
	//if($('.visitantes_recientes').is(':contains("' + nombre + '")')){
	if(nombre == ""){
		$(".visitantes_recientes").show();
	}else{
		if($('.visitantes_recientes').is(contains_check)){
			//alert("si");
			//alert(contains);
			$(".visitantes_recientes").hide();
			$(contains).show();
		}else{
			//alert("no");
			$(".visitantes_recientes").hide();
			//$(contains).hide();
		}
	}
		
	
	
	if(contains){
		//alert(contains);
		$(contains).show();
	}else{
		//alert(contains);
		$(contains).hide();
	}
	
	
	
	
}
/**
$.expr[":"].contains = $.expr.createPseudo(function(arg) {
	  return function( elem ) {
	   return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
	  };
	});
*/
/**
$.expr[':'].contains = function(a, i, m) {
	return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
};

*/

//New selector
jQuery.expr[':'].Contains = function(a, i, m) {
return jQuery(a).text().toUpperCase()
  .indexOf(m[3].toUpperCase()) >= 0;
};

//Overwrites old selecor
jQuery.expr[':'].contains = function(a, i, m) {
return jQuery(a).text().toUpperCase()
  .indexOf(m[3].toUpperCase()) >= 0;
};

$.extend($.expr[":"], {
	"containsIN": function(elem, i, match, array){
		return (elem.textContent || elem.innerText || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
});

function cargar_ticket(id){
	$.ajax({
		url: "chat_tickets_detalle.php",
		cache: false
	})
	.done(function( html ) {
		$(".menu_chat_superior").removeClass("menu_chat_superior_activo");
		$("#chat_tickets").addClass("menu_chat_superior_activo");
		
		$( "#subseccion_chat" ).html("");
		$( "#subseccion_chat" ).append( html );
		
		var usuario_chat = "#usuario_chat" + id;
		$('.usuarios_chat').removeClass("usuarios_chat_seleccionado");
		$(usuario_chat).addClass("usuarios_chat_seleccionado");
		
		
	});
}

function cargar_chat(tipo, id){
	$("#usuario_seleccionado_chat").val(id);
	if(tipo == "1"){
		//alert(id);
		$.ajax({
			url: "chat_form.php",
			cache: false
		})
		.done(function( html ) {
			$( "#fondo_carga" ).show();
			$( "#contenedor_carga" ).show();
			$( "#contenedor_carga_informacion" ).html("");

			
			$( "#contenedor_carga_informacion" ).append( html );
			
			//alert(id);
			
			cargar_chat('tickets', id);
		});
	}
	
	if(tipo == "tickets"){
		$.ajax({
			url: "chat_tickets.php",
			cache: false
		})
		.done(function( html ) {
			$(".menu_chat_superior").removeClass("menu_chat_superior_activo");
			$("#chat_tickets").addClass("menu_chat_superior_activo");
			
			$( "#subseccion_chat" ).html("");
			$( "#subseccion_chat" ).append( html );
			
			var usuario_chat = "#usuario_chat" + id;
			$('.usuarios_chat').removeClass("usuarios_chat_seleccionado");
			$(usuario_chat).addClass("usuarios_chat_seleccionado");
			
			
		});
		
		$('html, body').stop().animate({
	        scrollTop: $("#ultimos_resultados_chat").offset().top
	    }, 0);
	}
	if(tipo == "accesos"){
		$.ajax({
			url: "chat_accesos.php",
			cache: false
		})
		.done(function( html ) {
			$(".menu_chat_superior").removeClass("menu_chat_superior_activo");
			$("#chat_accesos").addClass("menu_chat_superior_activo");
			
			$( "#subseccion_chat" ).html("");
			$( "#subseccion_chat" ).append( html );
			
			var usuario_chat = "#usuario_chat" + id;
			$('.usuarios_chat').removeClass("usuarios_chat_seleccionado");
			$(usuario_chat).addClass("usuarios_chat_seleccionado");
			
			
		});
		
		$('html, body').stop().animate({
	        scrollTop: $("#ultimos_resultados_chat").offset().top
	    }, 0);
	}
	if(tipo == "chat"){
		$.ajax({
			url: "chat_interior.php",
			cache: false
		})
		.done(function( html ) {
			
			$(".menu_chat_superior").removeClass("menu_chat_superior_activo");
			$("#chat_chat").addClass("menu_chat_superior_activo");
			
			$( "#subseccion_chat" ).html("");
			$( "#subseccion_chat" ).append( html );
			
			var usuario_chat = "#usuario_chat" + id;
			$('.usuarios_chat').removeClass("usuarios_chat_seleccionado");
			$(usuario_chat).addClass("usuarios_chat_seleccionado");
			
			
			
		});
		
		$('html, body').stop().animate({
	        scrollTop: $("#ultimos_resultados_chat").offset().top
	    }, 0);
	}
	
	
	if(tipo == "2"){

		$( "#contenedor_carga_informacion" ).html("");
		$('html, body').stop().animate({
	        scrollTop: $("#contenedor_carga").offset().top
	    }, 1000);
	    
		$.ajax({
			url: "cloud_subir_archivo_form.php",
			cache: false
		})
		.done(function( html ) {
			$( "#fondo_carga" ).show();
			$( "#contenedor_carga" ).show();
			$( "#contenedor_carga_informacion" ).html("");

			
			
			
			$( "#contenedor_carga_informacion" ).append( html );
		});
	}
	if(tipo == "3"){
		
		$( "#contenedor_carga_informacion" ).html("");
		$.ajax({
			url: "residente_form.php",
			cache: false
		})
		.done(function( html ) {
			$( "#fondo_carga" ).show();
			$( "#contenedor_carga" ).show();
			$( "#contenedor_carga_informacion" ).html("");
			$( "#contenedor_carga_informacion" ).append( html );
		});


		
		$('html, body').stop().animate({
	        scrollTop: $("#contenedor_carga").offset().top
	    }, 0);
	}
	
	
}



/*
$(".datepicker .datepicker_search").datepicker({
	inline: true
});
$('.datepick').each(function(){
    $(this).datepicker();
});
*/
//$(function(){
/*
$(document).ready(function(){
	$('.datepicker').each(function(){
	    $(this).datepicker();
	});

	$('.datepicker2').each(function(){
	    $(this).datepicker();
	});
});
*/





function cargar_seccion(tipo, este, id){
	if(tipo == "acceso_entradas"){
		$.ajax({
			//url: "acceso_form_crear.php",
			url: "accesos_entrada.php",
			cache: false
		})
		.done(function( html ) {
			$( "#carga_seccion" ).html("");
			$( "#carga_seccion" ).append( html );
		});
	}
	if(tipo == "acceso_salidas"){
		$.ajax({
			url: "accesos_entrada.php",
			cache: false
		})
		.done(function( html ) {
			$( "#carga_seccion" ).html("");
			$( "#carga_seccion" ).append( html );
		});
	}
	if(tipo == "acceso_historial"){
		$.ajax({
			url: "accesos_entrada.php",
			cache: false
		})
		.done(function( html ) {
			$( "#carga_seccion" ).html("");
			$( "#carga_seccion" ).append( html );
		});


	}
	
	$(".enlace_accesos").removeClass("enlace_accesos_activo");
	/**$(este).css({"color":"#1ECBC8"});*/
	//$(".enlace_accesos").addClass("enlace_accesos_activo");
	$(este).addClass("enlace_accesos_activo");
	
}

function agregar_respuesta(){
	
	var html = "<div class='content_input'>";
	
	html += "<div class='content_input_registro'>";
	
	html += "2. <input type='text' name='respuesta[]' id='respuesta[]' class='input_registro' placeholder='' onkeyup='' />";
	html += "<input type='file' name='respuesta_imagen[]' />";
	
	html += "</div>";
	html += "</div>";
	
	
	$("#contenedor_respuestas").append(html);
	
	
}
function agregar_respuesta_detalle(){
	
	var html = "<div class='content_input'>";
	
	html += "<div class='content_input_registro'>";
	
	html += "2. <input type='text' name='respuesta[]' id='respuesta[]' class='input_registro' placeholder='' onkeyup='' />";
	html += "<input type='file' name='respuesta_imagen[]' />";
	
	html += "</div>";
	html += "</div>";
	
	
	$("#contenedor_respuestas_detalle").append(html);
	
	
}
/**
	<div class="content_input">
	<div class="content_input_registro">
		2. <input type="text" name="nombre_invitado" id="nombre_invitado" class="input_registro" placeholder="" onkeyup="buscar_invitado();" />
	</div>
</div>


}
*/
function guardar_respuestas_encuesta(){
	/**
	$.post( "encuesta_guardar_respuestas.php", $( "#respuestas_adicionales" ).serialize() )
	  .done(function( data ) {
	    alert( "Data Loaded: " + data );
	  });
	*/
	
	//var encuesta_pregunta_val = $('#encuesta_pregunta').val();
	
	
	//document.body.innerHTML
	//document.body.innerHTML
	//$.post( "encuesta_guardar.php", $( "#crear_encuesta" ).serialize() )
	//$.post( "encuesta_guardar.php", document.body.innerHTML )
	
	
	
	var formData = new FormData(document.getElementById("respuestas_adicionales"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "encuesta_guardar_respuestas.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function(res){
        	alert(res);
            //$("#mensaje").html("Respuesta: " + res);
        });
	
}

function guardar_encuesta(){
	/*
	$( "#contenedor_carga_informacion" ).html("");
	$('html, body').stop().animate({
        scrollTop: $("#contenedor_carga").offset().top
    }, 1000);
	*/
	var encuesta_pregunta_val = $('#encuesta_pregunta').val();
	
	
	//document.body.innerHTML
	//document.body.innerHTML
	//$.post( "encuesta_guardar.php", $( "#crear_encuesta" ).serialize() )
	//$.post( "encuesta_guardar.php", document.body.innerHTML )
	
	
	
	var formData = new FormData(document.getElementById("crear_encuesta"));
    formData.append("dato", "valor");
    //formData.append(f.attr("name"), $(this)[0].files[0]);
    $.ajax({
        url: "encuesta_guardar.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function(res){
        	alert(res);
            $("#mensaje").html("Respuesta: " + res);
        });
	/*
	$.post( "encuesta_guardar.php", $( "#crear_encuesta" ).serialize() )
	  .done(function( data ) {
	    alert( "Data Loaded: " + data );
	  });;
	  
	  */
	
	
	
	
	/**
	 * $.post( "encuesta_guardar.php", $( "#crear_encuesta" ).serialize() )
	  .done(function( data ) {
	    alert( "Data Loaded: " + data );
	  });;
	
	 * 
	 * 
	//var respuestas_val = $('#respuesta[]').val();
	//alert(respuestas_val);
	//alert("fdfds");
	//alert(encuesta_pregunta_val);
	//alert(respuestas_val);
    //, respuestas:respuestas_val
	
	//var group = $('input[name="attr1"]');
	
	var group = $('input[name="respuesta"]');
	
	alert($('input[name="respuesta[]"]').val());

	alert(group);
	
	if (group.length > 1){
	   group.each(function () {
	        $(this).attr("name",$(this).attr("name")+"[]");
	        alert($(this).value);
	   });
	}
	
	$.ajax({
		method: "POST",
		url: "encuesta_guardar.php",
		cache: false,
		data: {encuesta_pregunta:encuesta_pregunta_val}
	})
	.done(function( html ) {
		//$( "#fondo_carga" ).show();
		//$( "#contenedor_carga" ).show();
		//$( "#contenedor_carga_informacion" ).html("");
		
		//$( "#resultado_obtenido" ).append( html );
		
		alert(html);
		$( "#resultado_obtenido" ).append( html );
		
		alert(encuesta_pregunta_val);
	});
	*/
}

/**
$( "#contenedor_carga_informacion" ).html("");
$('html, body').stop().animate({
    scrollTop: $("#contenedor_carga").offset().top
}, 1000);

$.ajax({
	method: "POST",
	url: "encuesta_detalle.php",
	cache: false,
	data: {id_encuesta: id}
})
.done(function( html ) {
	$( "#fondo_carga" ).show();
	$( "#contenedor_carga" ).show();
	$( "#contenedor_carga_informacion" ).html("");

	
	
	
	$( "#contenedor_carga_informacion" ).append( html );
});
*/


function realizar_voto(id_encuesta, id_respuesta, id_usuario){
	$.ajax({
		method: "POST",
		url: "encuesta_votar.php",
		cache: false,
		data: {id_encuesta:id_encuesta, id_respuesta:id_respuesta, id_usuario:id_usuario}
	})
	.done(function( html ) {
		$( "#after_voto" ).append( html );
		
	});
	
	$.ajax({
		method: "POST",
		url: "encuesta_detalle.php",
		cache: false,
		data: {id_encuesta: id_encuesta}
	})
	.done(function( html ) {
		$( "#fondo_carga" ).show();
		$( "#contenedor_carga" ).show();
		$( "#contenedor_carga_informacion" ).html("");

		
		
		
		$( "#contenedor_carga_informacion" ).append( html );
	});
}

function eliminar_encuesta(id_encuesta){
	if(confirm("Seguro de eliminar?")){
		//alert(id_encuesta);
		$.ajax({
			method: "POST",
			url: "encuesta_eliminar.php",
			cache: false,
			data: {edit:"delete", id_encuesta:id_encuesta}
		})
		.done(function( html ) {
					
			//alert(html);
			//$('.encuesta_respuesta_editar').hide();
			//$('.encuesta_respuesta_detalle').show();
			
			//$( "#contenedor_carga_informacion" ).append( html );
			//$( contenedor_afectado ).html( html );
			alert(html);
			
		});
	}
}

function actualizar_respuesta_encuesta(string_respuesta, id_respuesta_editar, incremento){
	//alert(string_respuesta);
	//alert(id_respuesta_editar);
	//alert(incremento);
	
	//var contenedor_afectado = incremento;
	var contenedor_afectado = ".respuesta_detalle" + incremento;
	
	$.ajax({
		method: "POST",
		url: "encuesta_actualizar.php",
		cache: false,
		data: {edit:"respuesta", string_respuesta:string_respuesta, id_respuesta_editar:id_respuesta_editar, incremento:incremento}
	})
	.done(function( html ) {
				
		//alert(html);
		$('.encuesta_respuesta_editar').hide();
		$('.encuesta_respuesta_detalle').show();
		
		//$( "#contenedor_carga_informacion" ).append( html );
		$( contenedor_afectado ).html( html );
		
	});
	
}
function actualizar_titulo_encuesta(string_titulo, id_encuesta_editar){
	$.ajax({
		method: "POST",
		url: "encuesta_actualizar.php",
		cache: false,
		data: {edit:"titulo", string_titulo:string_titulo, id_encuesta_editar:id_encuesta_editar}
	})
	.done(function( html ) {
				
		//alert(html);
		$('.encuesta_editar_titulo').hide();
		$('.encuesta_detalle_titulo').show();
		
		//$( "#contenedor_carga_informacion" ).append( html );
		$(".encuesta_detalle_titulo").html( html );
		
	});
}

