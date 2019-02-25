

<?php if(isset($_GET['cadastro'])=='erro'){
		   echo "Ocorreu algum erro, confirme os dados e tente novamente!";?>		   
			<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&resposta=nova&pergunta=<?php echo $pergunta?>" >
			
	<?php }elseif($_GET['resposta'] == 'cadastrada'){	
		   echo "Resposta cadastrada com sucesso!";?>
		   
			<meta http-equiv="Refresh" content="3;URL=index.php?p=respostas&pergunta=<?php echo $_GET['pergunta'] ?>" >
			
	<?php }else{ ?>
	<form id="nv_resposta" method="post" name="nv_resposta" action="<?php echo (SQL_PATH); ?>insert.php">
		<h2>Cadastrar resposta</h2>
		<hr/>
		<div id="image-holder">
		</div>
		<div id="arquivo">
		</div>
		<input type="file" id="file" name="file" class="form-control" accept="image/*"  lang="pt" data-rule-required="true" data-msg-required="Envie uma imagem." />
		
		<textarea name="resposta" id="editor" required></textarea>

		<input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" required="required">

		  <input id="botao" class="form-control confirma" type="submit" name="responder" value="Gravar">

		<input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','?p=respostas&pergunta=<?php echo $_GET["pergunta"] ?>');return document.MM_returnValue" value="Cancelar">

		<input type="hidden" value="<?php echo($_GET["pergunta"])?>" name="id_pergunta" />
	</form>
	<?php include(CONTENT_PATH."pergunta.php");?>
<?php } ?>
