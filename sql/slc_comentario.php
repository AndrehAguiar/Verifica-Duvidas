<?php
	//include("Connections/tig.php");
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );	

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
		$RsComenta = mysqli_query( $TIG, "SELECT * FROM u793605722_tig5.comentario
				WHERE comentario.fk_resposta = '".$idResposta."'" )or die( mysqli_error( $TIG ) );
 ?>