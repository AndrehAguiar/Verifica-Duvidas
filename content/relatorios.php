<?php 
	include(SQL_PATH."select.php");

	if (isset($_GET['p']) == "relatorios" && $_GET['p'] != "painel"){
		$show = "block";
		$bgColor = "#9C0";
		$txtColor = "#333";
	}else{
		$show = "none";
	 }?>
<div class="tab">
	<a style="background-color: <?php echo($bgColor); ?>; color:<?php echo($txtColor); ?>" id="btnRel_area" onClick="showRel_area()" ><i class="fa fa-search"> </i> Relat&oacute;rio &aacute;reas</a>
</div>
<div id="rel_area" style="display:<?php echo $show ?>">
	<?php include(CONTENT_PATH."relArea.php");?>
<hr/>
</div>
<div class="tab">
	<a style="background-color: <?php echo($bgColor); ?>; color:<?php echo($txtColor); ?>" id="btnRel_materia" onClick="showRel_materia()"><i class="fa fa-search"> </i> Relat&oacute;rio mat&eacute;rias</a>
</div>
<div id="rel_materia" style="display:<?php echo $show ?>">
	<?php include(CONTENT_PATH."relMateria.php");?>
<hr/>
</div>