<!--DESENVOLVIDO POR
  	TOP Artes - Impressões Vídeos e WEB
  	topartes.com
  	André Aguiar
  	andre@topartes.com
  	31 3327-5397
  --><!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php 
	include(SQL_PATH."select.php");

	if (isset($_GET['p']) == "graficos" && $_GET['p'] != "painel"){
	$show = "block";
		$bgColor = "#9C0";
		$txtColor = "#333";
	}else{
	$show = "none";
	 }?>
<div class="tab">
	<a  style="background-color: <?php echo($bgColor); ?>; color:<?php echo($txtColor); ?>" id="btnGraficos" onClick="showGraficos()"><i class="fa fa-pie-chart"> </i> Gr&aacute;ficos</a>
</div>
<div id="graficos" style="display: <?php echo $show ?>">
	<div class="graficos" 
		<?php
			include(CONTENT_PATH."graf_areas.php");
			include(CONTENT_PATH."graf_materias.php");
			include(CONTENT_PATH."graf_perguntas.php");
			include(CONTENT_PATH."graf_respostas.php");
			include(CONTENT_PATH."graf_avaliacoes.php");
			include(CONTENT_PATH."graf_usuarios.php");
		?>
	</div>
</div>
<?php include(CONTENT_PATH."graf_situacao.php");?>