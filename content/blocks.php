<!--DESENVOLVIDO POR
  	TOP Artes - Impressões Vídeos e WEB
  	topartes.com
  	André Aguiar
  	andre@topartes.com
  	31 3327-5397
  -->


<?php include(SQL_PATH."slc_categMateria.php");	

while($row_RsMateriaCateg = mysqli_fetch_assoc($RsMateriaCateg)){
	$materia = $row_RsMateriaCateg["materia"];
	$idMateria = $row_RsMateriaCateg["id"];
	$idCategoria = $row_RsMateriaCateg["fk_categoria"];
	
	include(SQL_PATH."conta_perguntasMateria.php");	
	$row_RsQtdPerguntas = mysqli_fetch_assoc($RsQtdPerguntasMateria);	
	$row_RsPerguntasRespondidas = mysqli_fetch_assoc($RsPerguntasRespondidas);

	$media = $row_RsPerguntasRespondidas['perg_respondidas'] * 100 / ($row_RsQtdPerguntas["qtd_perguntasMateria"] == 0 ? 1 : $row_RsQtdPerguntas["qtd_perguntasMateria"]);

	if($media <= 30 ){
		$div_class = "critico";
	}elseif($media > 30 && $media < 80){
		$div_class = "alerta";
	}else{
		$div_class = "satisfatorio";
	}?>

	<div class="col-3 <?php echo($div_class);?>" onclick="MM_goToURL('parent','?p=categorias&materia=<?php echo ($idMateria); ?>');return document.MM_returnValue">
		<h1>
			<i class="fa fa-book"> </i>
			<?php echo $materia; ?>
		</h1>		
		<h1>
			<?php echo($row_RsQtdPerguntas["qtd_perguntasMateria"]); ?>
		</h1>
		<p>Perguntas</p>
		<p><?php echo ($row_RsPerguntasRespondidas['perg_respondidas']); ?>
			Quest&otilde;es respondidas</p>
	</div>
<?php } ?>