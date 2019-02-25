<?php 
	include(SQL_PATH."select.php"); 
	if (isset($_GET['categoria']) != ""){
		$showInd = "block";
		$show = "none";
		$bgColor = "#9C0";
		$txtColor = "#333";
	}else{
		$showInd = "none";
	 }?>
<h2><i class="fa fa-dashboard"> </i> Painel de controle</h2>
<hr /> 
<div class="tab">
	<a style="background-color: <?php echo($bgColor); ?>; color:<?php echo($txtColor); ?>" id="btnIndicador" onClick="showIndicadores()"><i class="fa fa-line-chart"> </i> Indicadores</a>
</div>
<div id="indicador" style="display: <?php echo $showInd ?>;">
	<?php 
		while ($row_RsCategorias = mysqli_fetch_assoc($RsCategorias)){ 
		$categoria = $row_RsCategorias['categoria'];
		$idCategoria = $row_RsCategorias["id"]; ?>
		<div class="tab" onclick="MM_goToURL('parent','?p=panel&categoria=<?php echo ($idCategoria); ?>');return document.MM_returnValue">
			<a id="<?php echo ($idCategoria); ?>"> <i class="fa fa-book"> </i> 
			<?php echo $categoria; ?></a>
		</div>
	<?php } ?>
	<div id="<?php echo($idCategoria) ?>" class="col-1">
			<?php 			
				include(CONTENT_PATH."blocks.php");
			?>
	</div>
<hr/>
</div>
<?php include(CONTENT_PATH."relatorios.php");
	include(CONTENT_PATH."graficos.php");?>
