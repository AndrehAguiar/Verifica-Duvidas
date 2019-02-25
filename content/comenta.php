<?php include(SQL_PATH."slc_comentario.php");

		while ($row_RsComenta = mysqli_fetch_assoc($RsComenta)){ 
		$data = explode("-", $row_RsComenta['data']);
		$data[0]; // ano
		$data[1]; // mês 
		$data[2]; // mês
		$dia = explode(" ", $data[2]);
		$dia[0]; // dia
		$dia[1]; // hora
		$hora = explode(".", $dia[1]);
		$hora[0];		
		?>
	<div id="comentarios">
		<?php if(isset($row_RsComenta['imagem']) != "" && ($row_RsComenta['imagem']) != null){ ?>
			<img src="<?php echo($row_RsComenta['imagem'])?>">
		<?php } ?>
		<p><?php echo nl2br($row_RsComenta['comentario']);?></p>
		<h5>
			Comentado por:
			<?php echo $row_RsRespostas['sobrenome'];?>,
			<?php echo $row_RsRespostas['name'];?> em
			<?php echo $dia[0];?> &#45;
			<?php echo $data[1];?> &#45;
			<?php echo $data[0] ;?> &agrave;s 
			<?php echo $hora[0] ;
	
		if ($nivel_resposta > 0){ ?>
			<big><i class="fa fa-thumbs-up"></i></big>
			<?php }elseif ($nivel_resposta < 0){ ?>
			<big><i class="fa fa-thumbs-down"></i></big>
			<?php }else{ ?>
			<big><i class="fa fa-warning"></i></big>
			<?php } ?>

		</h5>
	</div>
<?php } ?>