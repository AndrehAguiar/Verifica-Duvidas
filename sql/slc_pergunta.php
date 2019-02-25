<?php

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
 
	// Seleciona e imprimi a pergunta selecionada

	$RsPergunta = mysqli_query( $TIG, "SELECT * FROM u793605722_tig5.pergunta
											
										LEFT JOIN (u793605722_tig5.users)
											ON (users.id_usuario = pergunta.fk_usuario)
											
										WHERE pergunta.id = '".$idPergunta."'" )
		or die( mysqli_error( $TIG ) );
	$TIG->close();
?>