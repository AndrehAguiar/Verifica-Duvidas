<?php

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 

	$RsQtdComentarios =  "SELECT COUNT(*) AS qtd_comentarios 
			FROM u793605722_tig5.comentario 
			WHERE (comentario.fk_resposta = '".$idResposta."')"; 

	$result = mysqli_query($TIG, $RsQtdComentarios);
	$row_RsQtdComentario = mysqli_fetch_assoc($result);


?>