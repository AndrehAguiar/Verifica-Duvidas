
<?php 
	$resposta = $_GET['resposta'];
	$pergunta = $_GET['pergunta'];

if(isset($_GET['cadastro'])=='erro'){
		   echo "Ocorreu algum erro, confirme os dados e tente novamente!";?>		   
			<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&resposta=nova&pergunta=<?php echo $pergunta; ?>&resposta=<?php echo $resposta; ?>&comentario=novo" >
			
	<?php }elseif($_GET['comentario'] == 'cadastrado'){	
		   echo "Comentário cadastrado com sucesso!";?>
		   
			<meta http-equiv="Refresh" content="3;URL=index.php?p=respostas&pergunta=<?php echo $pergunta; ?>" >
			
	<?php }else{ ?>
<form method="post" name="nv_comentario" action="<?php echo (SQL_PATH); ?>insert.php">
<h2>Cadastrar coment&aacute;rio</h2>
		<div id="image-holder">
		</div>
		<div id="arquivo">
		</div>
		<input type="file" id="file" name="file" class="form-control" accept="image/*"  lang="pt" data-rule-required="true" data-msg-required="Envie uma imagem." />
	
      <textarea name="comentario" id="editor" data-role-required="true"></textarea>
      
      <input id="botao" class="form-control confirma" type="submit" name="comentar" value="Gravar">
    	<input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" required="required">
       	<input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','?p=respostas&pergunta=<?php echo $pergunta ?>');return document.MM_returnValue" value="Cancelar">
    	<input type="hidden" value="<?php echo ($resposta); ?>" name="id_resposta"/>

</form>
<?php 
	$id_resposta = $resposta;
include(SQL_PATH."slc_respostas.php");
include(CONTENT_PATH."respostaComenta.php");
include(CONTENT_PATH."pergunta.php");
			   } ?>
