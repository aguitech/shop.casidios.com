<?php
include("includes/includes.php");
session_start();

$val_codigo_postal = $_POST["codigo_postal"];

$qry_sepomex = "select * from sepomex where codigo_postal = $val_codigo_postal";

$colonias = $obj->get_results($qry_sepomex);


?>
<?php foreach($colonias as $colonia): ?>
<div style="display:flex;">
    <div>
    	<input type="radio" name="add_colonia" value="<?php print_r($colonia->id_sepomex); ?>" />
    </div>
    <div>
    	<div><?php print_r($colonia->colonia); ?></div>
    	<div><?php print_r($colonia->delegacion); ?></div>
    	<div><?php print_r($colonia->estado); ?></div>
    </div>
</div>
<?php endforeach; ?>