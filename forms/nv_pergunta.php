<?php	
	$user = $_SESSION['user_id'];	
	$area = isset($_GET['area']);	
?>
<h2>Cadastrar pergunta</h2>
<hr/>

<?php if(isset($_GET['cadastro'])=='erro'){
		   echo "Ocorreu algum erro, confirme as informa&ccedil;&otilde;s e tente novamente!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&pergunta=nova" >
	<?php }elseif($_GET['pergunta']=='cadastrada'){
		   echo "Pergunta cadastrada com sucesso!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php" >
	<?php }else{ ?>
		<form id="nv_pergunta" method="post" name="in_pergunta" action="<?php echo (SQL_PATH); ?>insert.php" enctype="multipart/form-data">
				<?php if (isset($_GET['area']) == "") {	
						include(SQL_PATH."select.php");	 
						?>
						<select name="id_categ" class="form-control" id="categ" onchange="MM_jumpMenu('parent',this,0)" required>
							<option value="">Selecione a &aacute;rea da mat&eacute;ria</option>
							<?php while ($row_sl_categ = mysqli_fetch_assoc($sl_categ)){ ?>
								<option  value="?p=cadastro&pergunta=nova&area=<?php echo ($row_sl_categ['id']); ?>"><?php echo ($row_sl_categ['categoria']); ?></option>
							<?php } ?>
						</select>

						<input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Cancelar">
				<?php }else{ ?>
						<select id="mater" class="form-control" name="id_mater" required>
							<option value="">Selecione a &aacute;rea da mat&eacute;ria</option>
							<?php 
								include(SQL_PATH."select.php");
								$area = $_GET['area'];
								while ($row_sl_mater = mysqli_fetch_assoc($sl_mater)){ ?>
								<option value="<?php echo ($row_sl_mater['id']); ?>"><?php echo ($row_sl_mater['materia']); ?></option>
							<?php } ?>
						</select>	
						<select id="nivel" class="form-control" name="nivel" required>
							<option value="">Selecione o n&iacute;vel da pergunta</option>
							<option value="B&aacute;sico">B&aacute;sico</option>
							<option value="M&eacute;dio">M&eacute;dio</option>
							<option value="Avan&ccedil;ado">Avan&ccedil;ado</option>
						</select>
						<div id="image-holder">
						</div>
						<div id="arquivo">
						</div>
							<input type="file" id="file" name="file" class="form-control" accept="image/*"  lang="pt" data-rule-required="true" data-msg-required="Envie uma imagem." />
							<textarea name="pergunta" id="editor" required></textarea>
						<input class="form-control" type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
						<input id="botao" class="form-control confirma" type="submit" name="perguntar" value="Gravar">
						<input name="cancela" type="button" class="form-control alerta" id="botao" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Cancelar">
				<?php } ?>
			<input type="hidden" name="MM_insert" value="nv_pergunta">
		</form>
<?php } ?>
