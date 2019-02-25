<?php 
	require_once SETTINGS_PATH.'init.php';
	require SETTINGS_PATH.'check.php';

	$area = isset($_GET['area']);
	$user = $_SESSION['user_id'];

	include(SQL_PATH."slc_usuario.php");
	$row_User = mysqli_fetch_assoc($sl_user);
	$row_cdUser = mysqli_fetch_assoc($slUser);
	$bgColor = "#9C0";
	$txtColor = "#333";
?>

<h2><i class="fa fa-user-circle"> </i> Painel do Usuário</h2>
<p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?> | <a href="<?php echo SETTINGS_PATH; ?>logout.php">Sair</a></p>
<div class="tab">
	<a style="background-color: <?php echo($bgColor); ?>; color:<?php echo($txtColor); ?>;" id="btnPerguntas" onClick="showPerguntas()"><i class="fa fa-bullhorn"> </i> Minhas Perg.</a>
	<a id="btnRespostas" onClick="showRespostas()"><i class="fa fa-commenting"> </i> Minhas Resp.</a>
	<a id="btnComentarios" onClick="showComentarios()"><i class="fa fa-comments-o"> </i> Meus Coment.</a>
	<a id="btnCadastro" onClick="showCadastro()"><i class="fa fa-drivers-license"> </i> Cadastro</a>
	<a id="btnInteresses" onClick="showInteresses()"><i class="fa fa-check-square-o"> </i> Interesses</a>
</div>
<hr/>
<?php 
	
	include(CONTENT_PATH."perguntasUser.php");
	include(CONTENT_PATH."respostasUser.php");
	include(CONTENT_PATH."comentariosUser.php");
	include(CONTENT_PATH."user_dados.php");
	include(CONTENT_PATH."user_interesses.php"); ?>