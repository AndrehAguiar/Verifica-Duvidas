<?php
	if (isset($_REQUEST['p'])){
		switch ($_REQUEST['p']) {
			case 'home':
				$page = "home.php";
				break;
			case 'perfil':
				$page = "panel.php";
				break;
			case 'panel':
				$page = "painel_controle.php";
				break;
			case 'relatorios':
				$page = "relatorios.php";
				break;
			case 'painel':
				$page = "painel_controle.php";
				break;
			case 'graficos':
				$page = "graficos.php";
				break;
			case 'recentes':
				$page = "home.php";
				break;
			case 'categorias':
				$page = "perguntas.php";
				break;
			case 'respostas':
				$page = "pergunta.php";
				break;
			case 'cadastro':
				$page = "../".SETTINGS_PATH."ctrl_form.php";
				break;
			default:
				$page = "home.php";
				break;
		}
	}
?>