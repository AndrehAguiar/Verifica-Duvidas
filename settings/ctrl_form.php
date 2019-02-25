<?php
	if ((isset($_GET['user'])=="novo") && isset($_GET['perfil'])!="novo" && isset($_GET['ed_perfil'])==""){
		include(FORMS_PATH."nv_usuario.php");
	}	
	if (isset($_GET['login'])=="erro"){
		include(FORMS_PATH."form-login.php");
	}
	if (isset($_GET['ed_user'])!=""){
		include(FORMS_PATH."ed_usuario.php");	
	}
	if (isset($_GET['ex_user'])!=""){
		include(FORMS_PATH."ex_usuario.php");
	}
	if (isset($_GET['perfil'])=="novo" && isset($_GET['user'])!= ""){
		include(FORMS_PATH."nv_cadastro.php");
	}
	if (isset($_GET['ed_perfil'])=="novo" && isset($_GET['user'])!= ""){
		include(FORMS_PATH."ed_cadastro.php");
	}
	if (isset($_GET['nv_materia'])!=""){
		include(FORMS_PATH."nv_materia.php");
	}
	if (isset($_GET['pergunta'])=="nova" && isset($_GET['resposta'])!="nova"){
		include(FORMS_PATH."nv_pergunta.php");
	}
	if (isset($_GET['resposta'])=="nova" && isset($_GET['pergunta'])!="" && isset($_GET['comentario'])!="novo"){
		include(FORMS_PATH."nv_resposta.php");
	}
	if (isset($_GET['comentario'])=="novo" && isset($_GET['resposta'])!=""){
		include(FORMS_PATH."nv_comenta.php");
	}
	
?>