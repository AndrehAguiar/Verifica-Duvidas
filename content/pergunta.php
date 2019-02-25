<?php
	$idPergunta = $_GET['pergunta'];
	include(SQL_PATH."slc_pergunta.php");
	$row_RsPerguntas = mysqli_fetch_assoc($RsPergunta);
	$idMateria = $row_RsPerguntas['fk_materia'];
	include(SQL_PATH."select.php");
	$row_sl_materiaPerg = mysqli_fetch_assoc($sl_materiaPerg);
	
?>

<h2><i class="fa fa-bullhorn"> </i> Pergunta: <small><?php echo $row_sl_materiaPerg['materia'];?> &#124; <?php echo $row_RsPerguntas['nivel'];?></small></h2>
 <?php	

	 foreach ($RsPergunta as $row_RsPerguntas): 
		$data = explode("-", $row_RsPerguntas['data']);
		$data[0]; // ano
		$data[1]; // mês 
		$data[2]; // mês
		$dia = explode(" ", $data[2]);
		$dia[0]; // dia
		$dia[1]; // hora
		$hora = explode(".", $dia[1]);
		$hora[0];	
		$id_resposta = isset($row_RsRespostas['id']);
		$id_user_comenta = isset($row_RsComenta['fk_usuario']);
		include(SQL_PATH."conta_respostas.php");
	?>
	<div id="perguntas" >

	<?php if (isset($row_RsPerguntas['imagem']) != "" && ($row_RsPerguntas['imagem']) != null){ ?>
		<img src="<?php echo $row_RsPerguntas['imagem']; ?>">	
	<?php } ?>        

	<h3><?php echo nl2br($row_RsPerguntas['pergunta']);?></h3>

	<h5>Postado por:
		<?php echo $row_RsPerguntas['formacao'];?>,
		<?php echo $row_RsPerguntas['sobrenome'];?>,
		<?php echo $row_RsPerguntas['name'];?> em
		<?php echo $dia[0];?> &#45;
		<?php echo $data[1];?> &#45;
		<?php echo $data[0] ;?> &agrave;s
		<?php echo $hora[0] ;?>
		</h5>
	 </div>
	<div id="rdp_perguntas">
	<?php if (isLoggedIn()){ ?>
		<div id="botoes">
			<button value="" class="botao" onclick="MM_goToURL('parent','?p=cadastro&resposta=nova&pergunta=<?php echo $idPergunta; ?>');return document.MM_returnValue"><big><i class="fa fa-commenting"></i> &#124; </big> Responder</button>
		</div>
		<?php }		
		
		$nivel = $row_RsNivel['cls_respostas'];

		if ($nivel > 0){ ?>
				<big><i class="fa fa-thumbs-up"></i></big>
			<?php }elseif ($nivel < 0){ ?>
				<big><i class="fa fa-thumbs-down"></i></big>
			<?php }else{ ?>
				<big><i class="fa fa-warning"></i></big>
		<?php }
				echo $row_RsQtdResposta['qtd_respostas'];?>
		<small>Resposta(s) </small> 
	</div>
<hr/>
 <?php endforeach;  
	if($row_RsQtdResposta['qtd_respostas'] > 0){
		include (CONTENT_PATH."resposta.php");
	}
?>
