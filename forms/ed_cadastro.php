<?php
	require_once 'settings/init.php';
	require 'settings/check.php';

	$user = $_SESSION['user_id'];

	include(SQL_PATH."slc_usuario.php");
	$row_cdUser = mysqli_fetch_assoc($slUser);

	if(isset($_GET['cadastro'])=='erro')
	{
		echo "Ocorreu algum erro, confirme as informa&otilde;es e tente novamente!";?>
		<meta http-equiv="Refresh" content="3;URL=index.php?p=cadastro&ed_perfil=<?php echo($user);?>" >
	<?php }
		elseif (isset($_GET['dados'])=='atualizado')
	{
		echo "Usu&aacute;rio atualizado com sucesso!";?>
			<meta http-equiv="Refresh" content="3;URL=index.php?p=perfil&user=<?php echo ($user); ?>" >
<?php }
	else
	{
?>
	<h2>Atualizar cadastro <?php echo ($_SESSION['user_name']); ?>&#58; <?php echo ($_SESSION['user_email']); ?></h2>
	<hr>
	<form id="ed_perfil" name="ed_perfil" method="post" action="<?php echo (SQL_PATH); ?>update.php">

		<div class="row">
			<div class="label">Telefone móvel:
			</div>
			<span id="movel">
				<input type="text" name="celular" class="form-control" data-rule-required="true" data-rule-celular="true" required placeholder="Telefone m&oacute;vel"  value="<?php echo($row_cdUser['telefone']) ?>">
			</span>
		</div>

		<div class="row">
			<div class="label">CEP:
			</div>
			<input class="form-control" id="cep" name="cep" size="15" maxlength="9" placeholder="Informe seu CEP" onblur="pesquisacep(this.value);" required value="<?php echo($row_cdUser['cep']) ?>"><br>
		</div>

		<div class="row endereco">
			<div class="label">Endere&ccedil;o:
			</div><br>
			<input class="form-control" id="endereco" name="endereco" placeholder="Informe seu endere&ccedil;o" required value="<?php echo($row_cdUser['endereco']) ?>">
			<input class="form-control" id="numero" name="numero" placeholder="N&uacute;mero" required value="<?php echo($row_cdUser['numero']) ?>">
			<input class="form-control" id="complemento" name="complemento" placeholder="Complemmento" value="<?php echo($row_cdUser['complemento']) ?>"><br>
		</div>

		<div class="row bairro">
			<div class="label">Bairro:
			</div><br>
			<input class="form-control" id="bairro" name="bairro" placeholder="Informe seu bairro" required value="<?php echo($row_cdUser['bairro']) ?>">
			<input class="form-control" id="cidade" name="cidade" placeholder="Cidade" required value="<?php echo($row_cdUser['cidade']) ?>">
			<input class="form-control" id="estado" name="estado" placeholder="UF" required value="<?php echo($row_cdUser['estado']) ?>">		
			<input class="form-control" id="pais" name="pais" placeholder="Pa&iacute;s" required value="<?php echo($row_cdUser['pais']) ?>">
		</div>
		<input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="usuario">
		<input type="hidden" id="ibge" name="ibge">

		<input class="form-control confirma" type="submit" name="form_ed_perfil" value="Gravar">
		<button type="reset" class="form-control alerta" onclick="MM_goToURL('parent','?p=perfil&user=<?php echo ($_SESSION['user_id']); ?>');return document.MM_returnValue" id="botao">Cancelar</button>
	</form>
<?php } ?>
