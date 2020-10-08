<div style="height:440px; margin-top:10px; width:320px;">
	<form method="post" action="" id="form_log_in">
    	<h3 class="textgold goldtext">Agregar direcci&oacute;n</h3>
    	<div class="content_titles_sign">
    		Calle
    	</div>
    	<div>
    		<input type="text" class="text_sign_up" placeholder="Calle" name="direccion_calle" />
    	</div>
    	<div style="display:flex;">
    		<div>
            	<div class="content_titles_sign">
            		No. Interior
            	</div>
            	<div>
            		<input type="text" class="text_sign_up" placeholder="N&uacte;mero exterior" name="direccion_numero_exterior" />
            	</div>
        	</div>
        	<div>
        		<div class="content_titles_sign">
            		No. Exterior
            	</div>
            	<div>
            		<input type="text" class="text_sign_up" placeholder="N&uacte;mero interior" name="direccion_numero_interior" />
            	</div>
        	</div>
    	</div>
    	
    	
    	<div class="content_titles_sign">
    		C&oacute;digo postal
    	</div>
    	<div>
    		<input type="text" class="text_sign_up" placeholder="C&oacute;digo postal" name="direccion_codigo_postal" id="add_codigo_postal" onkeyup="validar_codigo_postal()" onchange="validar_codigo_postal()" />
    	</div>
    	<div id="resultado_codigo_postal">
    		
    	</div>
    	<div class="content_titles_sign" style="text-align:right;">
    		&iquest;Olvidaste tu contrase&ntilde;a?
    	</div>
    	
    	
    	<div class="content_titles_sign">
    		<div class="btn_sign" onclick="$('#form_log_in').submit();">
    			Log-in
    		</div>
    	</div>
    </form>
</div>