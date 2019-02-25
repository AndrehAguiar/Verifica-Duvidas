	<h3><i class="fa fa-commenting"> </i> Respostas</h3>		
	<?php
		include(SQL_PATH."slc_respostas.php");
		while ($row_RsRespostas = mysqli_fetch_assoc($RsRespostas)){ 
			$id_resposta = $row_RsRespostas['id'];
            if (isLoggedIn() && isset($_GET['comentario'])!='nova'){ 

				switch ($_SESSION['user_formacao']){
					case "Estudante":
						$nota = 1;
						break;
					case "Profissional":
						$nota = 3;
						break;
					case "Mestre":
						$nota = 5;
						break;			
				}		
			}
			$data = explode("-", $row_RsRespostas['data']);
			$data[0]; // ano
			$data[1]; // mês 
			$data[2]; // mês
			$dia = explode(" ", $data[2]);
			$dia[0]; // dia
			$dia[1]; // hora
			$hora = explode(".", $dia[1]);
			$hora[0];	
			$idResposta = $row_RsRespostas['id'];
			$idPergunta = $row_RsRespostas['fk_pergunta'];
		?>
		<div id="respostas">
				
		<?php if (isset($row_RsRespostas['imagem']) != "" && (isset($row_RsRespostas['imagem']) != "null")){ ?>
			<img src="<?php echo $row_RsRespostas['imagem']; ?>" >	
		<?php } ?>     
			
			<p><?php 
			echo nl2br($row_RsRespostas['resposta']); ?></p>
			<h5>
                <big>
                   <?php 
                		if (isLoggedIn()){ 
							
							$user = $_SESSION['user_id'];
							include(SQL_PATH."conta_respostas.php");	
							$user_class = $row_RsNivelUser['cls_respostas'];
							include(SQL_PATH.'classifica_resposta.php');
							
						if ($user_class  <= 0){ 
							$nota = ($row_slc_avaliacao["avaliacao"] + $nota);?>                    
							 <a name="classe" href="<?php echo SQL_PATH; ?>classifica_resposta.php?p=respostas&pergunta=<?php echo $idPergunta ;?>&resposta=<?php echo $idResposta;?>&user=<?php echo ($user); ?>&class=<?php echo ($nota);?>" class="botao"><i class="fa fa-check"></i></a>
                    
                    <?php }if ($user_class >= 0) { 
							$nota = ($row_slc_avaliacao["avaliacao"] - $nota);?>
                    
	                    <a name="classe" href="<?php echo SQL_PATH; ?>classifica_resposta.php?p=respostas&pergunta=<?php echo $idPergunta ;?>&resposta=<?php echo $idResposta;?>&user=<?php echo $user; ?>&class=<?php echo ($nota); ?>" class="botao"><i class="fa fa-close"></i></a>
	                    
                <?php }
				}
			
						$nivel_resposta = $row_RsNivelResposta['cls_respostas'];?>
                </big>
                   
                    Respondido por:
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
			<?php                 
                if (isLoggedIn() && isset($_GET['comentario'])!='nova'){ ?>
                    <div id="botoes">
                        <button value="" class="botao" onclick="MM_goToURL('parent','?p=cadastro&pergunta=<?php echo $idPergunta; ?>&resposta=<?php echo $idResposta; ?>&comentario=novo');return document.MM_returnValue"><big><i class="fa fa-comments-o"></i>&#124; </big> Comentar</button>
                    </div>
            <?php }  ?>
            	
            </h5>
            <hr/>
            <?php include(SQL_PATH."conta_comentarios.php");
				echo($row_RsQtdComentario['qtd_comentarios'])." comentário(s)";
			
				if($row_RsQtdComentario['qtd_comentarios'] > 0){?>
				
					<a class="link" onclick="MM_showHideLayers('<?php echo ($idResposta) ?>','','show')"><h3><i class="fa fa-comments-o"> </i> Coment&aacute;rios</h3></a>
				
					<div id="<?php echo ($idResposta) ?>" class="botao esconder">
						<a id="botoes" class="botao fechar" onclick="MM_showHideLayers('<?php echo ($idResposta) ?>','','hide')">Fechar coment&aacute;rios <i class="fa fa-close"></i></a>
						
						<?php include (CONTENT_PATH."comenta.php");	?>
						
					</div>
				<?php } ?>
		</div>
<?php } ?>