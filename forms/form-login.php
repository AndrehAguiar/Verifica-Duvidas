<div class="erro_login">
   <form id="login" action="settings/login.php" method="post">
		<h2>Login</h2>
		<hr/>
		<div id="lable">E&#45;mail:</div>
		<input class="form-control" type="text" name="email" id="email" required="required">

		<div id="lable">Senha: </div>
		<input class="form-control" type="password" name="password" id="password" required="required">

		<input class="form-control confirma" type="submit"  id="botao" value="Entrar"> 
		<div id="link_form">
			<a href=""><small> Esqueci a senha </small></a>
			<h6>Confirme as informa&ccedil;&otilde;es ou cadastre&#45;se.</h6>
		</div>
	</form>
 	<?php include(FORMS_PATH."nv_usuario.php"); ?>
</div>