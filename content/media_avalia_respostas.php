<?php include(SQL_PATH.'conta_perguntasMateria.php');
		
		while($row_RsMediaRespostasAvalia = mysqli_fetch_assoc($RsMediaRespostasAvalia)){
		$row_RsSomaRespostasAvalia = mysqli_fetch_assoc($RsSomaRespostasAvalia);
		$soma = $row_RsSomaRespostasAvalia["soma_respostaAvalia"] == 0 ? 0 : $row_RsSomaRespostasAvalia["soma_respostaAvalia"];		
			
		$media = number_format($row_RsMediaRespostasAvalia['media_respostaAvalia'] == 0 ? 0 : $row_RsMediaRespostasAvalia["media_respostaAvalia"], 2, ',', ' ');
		if($soma < 0 ){
			$div_class = "critico";
		}elseif($media >= 0 && $media < 1){
			$div_class = "alerta";
		}else{
			$div_class = "satisfatorio";
		}?>
		<div id="cel" class="<?php echo ($div_class) ?>">
			<?php 
				echo $soma." &#124 ";
				echo $media."%"; ?>
		</div>
		<?php }
?>