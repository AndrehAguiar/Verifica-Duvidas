<?php 

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 

	$RsQtdPerguntasCateg = mysqli_query( $TIG, "SELECT COUNT(*) AS qtd_perguntasCateg 
						FROM u793605722_tig5.pergunta 
						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						LEFT JOIN (u793605722_tig5.categoria)
						ON (categoria.id = materia.fk_categoria)
						WHERE categoria.id = '".$idCategoria."'")
		or die( mysqli_error( $TIG ) );

	$RsQtdMateriasCateg = mysqli_query( $TIG, "SELECT COUNT(*) AS qtd_materiasCateg 
						FROM u793605722_tig5.materia 
						LEFT JOIN (u793605722_tig5.categoria)
						ON (categoria.id = materia.fk_categoria)
						WHERE categoria.id = '".$idCategoria."'")
		or die( mysqli_error( $TIG ) );

	$RsPerguntasRespondidas = mysqli_query( $TIG, "SELECT COUNT(DISTINCT fk_pergunta) AS perg_respondidas 
						FROM u793605722_tig5.resposta
						LEFT JOIN (u793605722_tig5.pergunta)
						ON (pergunta.id = resposta.fk_pergunta)
						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						WHERE materia.fk_categoria = '".$idCategoria."'")
		or die( mysqli_error( $TIG ) );	

	$TIG->close();
?>