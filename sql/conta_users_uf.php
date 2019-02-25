<?php

	$qtd_perguntas = mysqli_query($TIG, "SELECT COUNT(*) AS qtdTotalPerguntas 
							FROM u793605722_tig5.pergunta" )
		or die( mysqli_error( $TIG ) );

	$qtd_perguntasEstado = mysqli_query($TIG, "SELECT COUNT(*) AS qtd_perguntas_estado 
							FROM u793605722_tig5.pergunta 
							JOIN (u793605722_tig5.users) 
								ON (users.id_usuario = pergunta.fk_usuario) 
							LEFT JOIN (u793605722_tig5.cadastro) 
								ON (cadastro.fk_usuario = users.id_usuario)
							WHERE cadastro.estado = '".$estado."'" )
		or die( mysqli_error( $TIG ) );
	$TIG->close();
?>