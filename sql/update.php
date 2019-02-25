<?php

	$hostname_TIG = "localhost";
	$database_TIG = "u793605722_tig5";
	$username_TIG = "u793605722_gti5t";
	$password_TIG = "LqDyNy:?I1Sgehv`sZ";

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
	
	if(isset($_POST["edit_user"])){

		$senha = sha1(md5($_POST["password"]));
		$ed_user = "UPDATE u793605722_tig5.users SET  email='".$_POST["email"]."', formacao='".$_POST["formacao"]."', name='".$_POST["name"]."', sobrenome='".$_POST["sobrenome"]."', password='".$senha."' WHERE (users.id_usuario = '".$_POST["user"]."')";

		if (mysqli_query($TIG, $ed_user)) {
				header(sprintf('location: %s&user=atualizado', $_SERVER['HTTP_REFERER']));
		} else {
		   //echo "Error: " . $ed_user . "" . mysqli_error($TIG);
			header(sprintf('location: %s&cadastro=erro', $_SERVER['HTTP_REFERER']));
		}
		$TIG->close();
	 } 

	if(isset($_POST["form_ed_perfil"])){
		$ed_perfil = "UPDATE u793605722_tig5.cadastro SET telefone='".$_POST["celular"]."', endereco='".$_POST["endereco"]."', numero='".$_POST["numero"]."',  complemento='".$_POST["complemento"]."', bairro='".$_POST["bairro"]."', cidade='".$_POST["cidade"]."', estado='".$_POST["estado"]."', pais='".$_POST["pais"]."',  cep='".$_POST["cep"]."' WHERE (cadastro.fk_usuario = '".$_POST["usuario"]."')";

		if (mysqli_query($TIG, $ed_perfil)) {
				header(sprintf('location: %s&dados=atualizado', $_SERVER['HTTP_REFERER']));
		} else {
			//echo "Error: " . $ed_perfil . "" . mysqli_error($TIG);
			header(sprintf('location: %s&cadastro=erro', $_SERVER['HTTP_REFERER']));
		}
		$TIG->close();
	 }

?>