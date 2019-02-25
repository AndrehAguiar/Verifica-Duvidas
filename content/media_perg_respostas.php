<?php include(SQL_PATH.'conta_perguntasCateg.php');
	while ($row_RsQtdPerguntasCateg = mysqli_fetch_assoc($RsQtdPerguntasCateg)){
		while($row_RsPerguntasRespondidas = mysqli_fetch_assoc($RsPerguntasRespondidas)){		
			
		$media = number_format($row_RsPerguntasRespondidas['perg_respondidas'] * 100 / ($row_RsQtdPerguntasCateg["qtd_perguntasCateg"] == 0 ? 1 : $row_RsQtdPerguntasCateg["qtd_perguntasCateg"]), 2, ',', ' ');
			
		if($media <= 30 ){
			$div_class = "critico";
		}elseif($media > 30 && $media < 80){
			$div_class = "alerta";
		}else{
			$div_class = "satisfatorio";
		}?>
		<div id="cel" class="<?php echo ($div_class) ?>">
			<?php echo ($media)."%"; ?>
		</div>
		<?php }
	}?>