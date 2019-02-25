<?php

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	}
	if(isset($idPergunta) != ""){
	$RsRespostas = mysqli_query( $TIG, "SELECT * FROM u793605722_tig5.users
										LEFT JOIN u793605722_tig5.resposta
											ON (users.id_usuario = resposta.fk_usuario)
										WHERE resposta.fk_pergunta = '".$idPergunta."'
										 ORDER BY resposta.id DESC" )or die( mysqli_error( $TIG ) );
	}
	if(isset($id_resposta) != ""){
		$RsResposta = mysqli_query( $TIG, "SELECT * FROM u793605722_tig5.users
										LEFT JOIN u793605722_tig5.resposta
											ON (users.id_usuario = resposta.fk_usuario)
										WHERE resposta.id = '".$id_resposta."'" )or die( mysqli_error( $TIG ) );
	}

	$TIG->close();
?>