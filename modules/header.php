<?php
session_start();
 
require 'settings/init.php';
?>
<div id="logo_topo">
	<img src="<?php echo MEDIA_PATH ?>logo_verifica_duvidas.png" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" />
</div>
<?php if (isLoggedIn()): ?>
	<div id="identidade">

		<p>Olá, <a href="?p=cadastro&ed_user=<?php echo $_SESSION['user_id'];?>"/>
			<?php echo $_SESSION['user_name']; ?>
			<big><i class="fa fa-edit"></i> </big></a>
			<a href="?p=perfil&user=<?php echo $_SESSION['user_id']; ?>">
				Perfil <big><i class="fa fa-user"></i> </big>
			</a>
			<a href="<?php echo SETTINGS_PATH ?>logout.php">
				Sair <big><i class="fa fa-sign-out"></i> </big>
			</a>
		</p>
		<p>
			<button value="Tirar D&uacute;vida" type="button" class="form-control solicita" id="botao" onclick="MM_goToURL('parent','?p=cadastro&pergunta=nova');return document.MM_returnValue">
				Perguntar <big>&#124; <i class="fa fa-bullhorn"></i></big>
			</button>
		</p>
		<p>
			<a href="?p=painel" class="botao"><i class="fa fa-dashboard"> </i> Painel de Controle</a>
			<a href="?p=relatorios" class="botao"><i class="fa fa-binoculars"> </i> Relat&oacute;rios</a>
			<a href="?p=graficos" class="botao"><i class="fa fa-pie-chart"> </i> Gr&aacute;ficos</a>
		</p>		
	</div>
<?php elseif(isset($_GET['login'])!= 'erro') : ?>
	<div id="visita">
		<p>Olá, visitante.</p>
		<div id="form">
			<form action="<?php echo SETTINGS_PATH ?>login.php" method="POST" />
				<input name="email" type="email" id="email"  placeholder="E&#45;mail" size="30" maxlength="35"/>
				<input name="password" type="password" id="password"  placeholder="Senha" size="30" maxlength="18"/>
				<button class="botao" name="logar" type="submit" value="" id="logar" > Entrar <big><i class="fa fa-sign-in"></i> </big></button>
			</form>	
		</div>
		<div id="link_form">
			<a href="?p=cadastro&user=novo">Cadastrar </a>
			<a href=""> Esqueci a senha </a>
		 	<a href="?p=painel" class="botao">Painel de Controle</a>
		</div>
	 </div>
<?php endif; ?>