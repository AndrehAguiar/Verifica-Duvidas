<?php 

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 

	$RsQtdPerguntasMateria = mysqli_query( $TIG, "SELECT COUNT(*) AS qtd_perguntasMateria 
						FROM u793605722_tig5.pergunta 
						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						LEFT JOIN (u793605722_tig5.categoria)
						ON (categoria.id = materia.fk_categoria)
						WHERE pergunta.fk_materia = '".$idMateria."'")
		or die( mysqli_error( $TIG ) );

	$RsMediaRespostasAvalia  = mysqli_query( $TIG, "SELECT AVG(avaliacao.avaliacao) AS media_respostaAvalia 
						FROM u793605722_tig5.avaliacao 
						
						JOIN (u793605722_tig5.resposta)
						ON (resposta.id = avaliacao.fk_resposta)
						
						LEFT JOIN (u793605722_tig5.pergunta)
						ON (pergunta.id = resposta.fk_pergunta)
						
						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						
						WHERE materia.id = '".$idMateria."'")
		
		or die( mysqli_error( $TIG ) );

	$RsSomaRespostasAvalia  = mysqli_query( $TIG, "SELECT SUM(avaliacao.avaliacao) AS soma_respostaAvalia 
						FROM u793605722_tig5.avaliacao 
						
						JOIN (u793605722_tig5.resposta)
						ON (resposta.id = avaliacao.fk_resposta)
						
						LEFT JOIN (u793605722_tig5.pergunta)
						ON (pergunta.id = resposta.fk_pergunta)
						
						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						
						WHERE materia.id = '".$idMateria."'")
		
		or die( mysqli_error( $TIG ) );

	$RsQtdRespostasAvalia  = mysqli_query( $TIG, "SELECT COUNT(*) AS qtd_respostaAvalia 
						FROM u793605722_tig5.avaliacao 
						
						JOIN (u793605722_tig5.resposta)
						ON (resposta.id = avaliacao.fk_resposta)
						
						LEFT JOIN (u793605722_tig5.pergunta)
						ON (pergunta.id = resposta.fk_pergunta)
						
						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						
						WHERE materia.id = '".$idMateria."'")
		
		or die( mysqli_error( $TIG ) );

	$RsPerguntasRespondidas = mysqli_query( $TIG, "SELECT COUNT(DISTINCT resposta.fk_pergunta) AS perg_respondidas 
						FROM u793605722_tig5.resposta
						LEFT JOIN (u793605722_tig5.pergunta)
						ON (pergunta.id = resposta.fk_pergunta)
						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						WHERE materia.id = '".$idMateria."'")
		or die( mysqli_error( $TIG ) );	

	$TIG->close();
?>