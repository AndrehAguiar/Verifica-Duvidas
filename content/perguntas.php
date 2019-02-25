<?php
	$idMateria = $_GET['materia'];
	include(SQL_PATH."pag_categoria.php"); 
		include(SQL_PATH."select.php");
		$row_sl_materia = mysqli_fetch_assoc($sl_materiaPerg);?>
<h2><i class="fa fa-bullhorn"> </i> Perguntas Recentes &#124; <small><?php echo $row_sl_materia["materia"]; ?></small></h2>
<hr />    
<?php if (!empty($dados)):

	 foreach ($dados as $row_RsPerguntas): 
		$data = explode("-", $row_RsPerguntas->data);
		$data[0]; // ano
		$data[1]; // mês 
		$data[2]; // mês
		$dia = explode(" ", $data[2]);
		$dia[0]; // dia
		$dia[1]; // hora
		$hora = explode(".", $dia[1]);
		$hora[0];	
		$idPergunta = $row_RsPerguntas->id;
		?>
		<div id="perguntas" onclick="MM_goToURL('parent','?p=respostas&pergunta=<?php echo $idPergunta; ?>');return document.MM_returnValue">
			<?php  if (isset($row_RsPerguntas->imagem) != ""){ ?>
				<img src="<?php echo $row_RsPerguntas->imagem; ?>">	
			<?php } ?> 
			<p><?php echo nl2br($row_RsPerguntas->pergunta); ?></p>
			<h5>
				Postado por: <?php
				echo $row_RsPerguntas->formacao;?>
				<?php echo $row_RsPerguntas->sobrenome;?>,
				<?php echo $row_RsPerguntas->name;?> em
				<?php echo $dia[0];?> &#45;
				<?php echo $data[1];?> &#45;
				<?php echo $data[0];?> &agrave;s 
				<?php echo $hora[0];?>
			</h5>                
		</div>
		<div id="rdp_perguntas">
		<?php if (isLoggedIn()){ ?>
			<div id="botoes">
				<button value="" class="botao" onclick="MM_goToURL('parent','?p=cadastro&resposta=nova&pergunta=<?php echo $idPergunta; ?>');return document.MM_returnValue"><big><i class="fa fa-commenting"></i> &#124; </big> Responder</button>
			</div>
			<?php } ?>
			<?php
			include(SQL_PATH."conta_respostas.php");
				
				$classe = $row_RsNivelResp['cls_respostas'];
				
				if ($classe > 0){ ?>
						<big><i class="fa fa-thumbs-up"></i></big>
						<?php }elseif ($classe < 0){ ?>
						<big><i class="fa fa-thumbs-down"></i></big>
						<?php }else{ ?>
						<big><i class="fa fa-warning"></i></big>
					<?php }
				echo $row_RsQtdResposta['qtd_respostas']; ?>

			<small>Resposta(s) </small> 
		</div> 
 <?php endforeach; ?> 
 <div class='box-paginacao'>     
	   <a class='box-navegacao <?=$exibir_botao_inicio?>' href="index.php?page=<?=$primeira_pagina?>" title="Primeira Página">&#124; Primeira  &#124; </a> 
	   <a class='box-navegacao <?=$exibir_botao_inicio?>' href="index.php?page=<?=$pagina_anterior?>" title="Página Anterior">Anterior  &#124; </a> 
	<?php
  /* Loop para montar a páginação central com os números */   
  for ($i=$range_inicial; $i <= $range_final; $i++):   
	$destaque = ($i == $pagina_atual) ? 'destaque' : '' ;  ?>   
	<a class='box-numero <?=$destaque?>' href="index.php?page=<?=$i?>"><?=$i?> </a>   
  <?php endfor; ?>    
	<a class='box-navegacao <?=$exibir_botao_final?>' href="index.php?page=<?=$proxima_pagina?>" title="Próxima Página">&#124; Pr&oacute;xima  &#124; </a>  
	<a class='box-navegacao <?=$exibir_botao_final?>' href="index.php?page=<?=$ultima_pagina?>" title="Última Página">&Uacute;ltimo  &#124; </a> 
 </div>   
<?php else: ?>   
 <p class="bg-danger">Nenhum registro foi encontrado!</p>  
<?php endif; ?>
