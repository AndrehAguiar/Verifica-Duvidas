<?php 

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 

	$RsQtdPerguntas = mysqli_query( $TIG, "SELECT COUNT(*) AS qtd_perguntas FROM u793605722_tig5.pergunta 
						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						WHERE materia = '".$materia."'")
		or die( mysqli_error( $TIG ) );
	
	$sl_perguntaMateria = mysqli_query( $TIG, "SELECT * FROM u793605722_tig5.pergunta
						LEFT JOIN u793605722_tig5.resposta
						ON (resposta.fk_pergunta = pergunta.id)
						WHERE pergunta.fk_materia = '".$idMateria."'")
		or die( mysqli_error( $TIG ) ); 

	$RsPerguntasRespondidas = mysqli_query( $TIG, "SELECT COUNT(DISTINCT fk_pergunta) AS perg_respondidas 
						FROM u793605722_tig5.resposta
						LEFT JOIN (u793605722_tig5.pergunta)
						ON (pergunta.id = resposta.fk_pergunta)
						WHERE pergunta.fk_materia = '".$idMateria."'")
		or die( mysqli_error( $TIG ) );	

	$TIG->close();
?>