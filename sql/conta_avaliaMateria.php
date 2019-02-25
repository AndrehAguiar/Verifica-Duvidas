<?php 

		$RsMediaRespostasAvalia  = mysqli_query( $TIG, "SELECT AVG(avaliacao.avaliacao) AS media_respostaAvalia 
						FROM u793605722_tig5.avaliacao 

						LEFT JOIN (u793605722_tig5.resposta)
						ON (resposta.id = avaliacao.fk_resposta)

						LEFT JOIN (u793605722_tig5.pergunta)
						ON (pergunta.id = resposta.fk_pergunta)

						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						WHERE materia.id = '".$idMateria."'")

		or die( mysqli_error( $TIG ) );
		$row_RsMediaRespostasAvalia  = mysqli_fetch_assoc($RsMediaRespostasAvalia);

			$RsSomaRespostasAvalia  = mysqli_query( $TIG, "SELECT SUM(avaliacao.avaliacao) AS soma_respostaAvalia 
						FROM u793605722_tig5.avaliacao 

						LEFT JOIN (u793605722_tig5.resposta)
						ON (resposta.id = avaliacao.fk_resposta)

						LEFT JOIN (u793605722_tig5.pergunta)
						ON (pergunta.id = resposta.fk_pergunta)

						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						WHERE materia.id = '".$idMateria."'")

		or die( mysqli_error( $TIG ) );
		$row_RsSomaRespostasAvalia = mysqli_fetch_assoc($RsSomaRespostasAvalia);

			$RsContaRespostasAvalia  = mysqli_query( $TIG, "SELECT COUNT(avaliacao.avaliacao) AS soma_respostaAvalia 
						FROM u793605722_tig5.avaliacao 

						LEFT JOIN (u793605722_tig5.resposta)
						ON (resposta.id = avaliacao.fk_resposta)

						LEFT JOIN (u793605722_tig5.pergunta)
						ON (pergunta.id = resposta.fk_pergunta)

						LEFT JOIN (u793605722_tig5.materia)
						ON (materia.id = pergunta.fk_materia)
						WHERE materia.id = '".$idMateria."'")

		or die( mysqli_error( $TIG ) );
		$row_RsContaRespostasAvalia = mysqli_fetch_assoc($RsContaRespostasAvalia);

	$TIG->close();

?>