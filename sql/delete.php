<?php

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 

	if(isset($_POST["excluir"])){
	 
	$userDelete = sha1(md5($_POST["usuario"]).$_POST['email']);
	 $ex_usuario = "UPDATE u793605722_tig5.users SET  email='".$userDelete."', data='".$_POST['data']."' WHERE (users.id_usuario = '".$_POST["usuario"]."')";
	 
	//$ex_usuario = "DELETE FROM u793605722_tig5.users WHERE users.id_usuario = '".$_POST['usuario']."'";
	
	if ($TIG->query($ex_usuario)===TRUE) {
	   echo "Cadastro de login excluido";
		include('../settings/logout.php');
	} else {
	   echo "Error: " . $ex_usuario . "" . mysqli_error($TIG);
	}
	$TIG->close();
 } 

?>