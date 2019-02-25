<?php 

	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 	
	if (isset($idPergunta) == ""){
		$idPergunta = isset($_GET['pergunta']);	
	}	
	if (isset($idResposta) == ""){
		$idResposta = isset($_GET['resposta']);	
	}
	

	$RsQtdResposta =  "SELECT COUNT(*) AS qtd_respostas 
			FROM u793605722_tig5.resposta 
			WHERE (resposta.fk_pergunta = '".$idPergunta."')"; 

	$result = mysqli_query($TIG, $RsQtdResposta);
	$row_RsQtdResposta = mysqli_fetch_assoc($result);
	
	$RsNivel = "SELECT SUM(avaliacao.avaliacao) AS cls_respostas 
		FROM u793605722_tig5.avaliacao
		LEFT JOIN (u793605722_tig5.resposta)
			ON (resposta.fk_pergunta = '".$idPergunta."')
			WHERE (avaliacao.fk_resposta = resposta.id 
			AND resposta.fk_pergunta = '".$idPergunta."')";	

	$result = mysqli_query($TIG, $RsNivel);
	$row_RsNivel = mysqli_fetch_assoc($result);
	
	$RsNivelResp = "SELECT SUM(avaliacao.avaliacao) AS cls_respostas 
		FROM u793605722_tig5.avaliacao
		LEFT JOIN (u793605722_tig5.resposta)
			ON (resposta.fk_pergunta = '".$idPergunta."')
			WHERE (avaliacao.fk_resposta = resposta.id 
			AND resposta.fk_pergunta = '".$idPergunta."')";	

	$result = mysqli_query($TIG, $RsNivelResp);
	$row_RsNivelResp = mysqli_fetch_assoc($result);
	
	$RsNivelResposta = "SELECT SUM(avaliacao.avaliacao) AS cls_respostas 
		FROM u793605722_tig5.avaliacao
		LEFT JOIN (u793605722_tig5.resposta)
			ON (resposta.id = avaliacao.fk_resposta)
			WHERE (resposta.id = '".isset($idResposta)."')";	

	$result = mysqli_query($TIG, $RsNivelResposta);
	$row_RsNivelResposta = mysqli_fetch_assoc($result);

		$RsNivelUser = "SELECT SUM(avaliacao.avaliacao) AS cls_respostas FROM u793605722_tig5.avaliacao
			LEFT JOIN (u793605722_tig5.resposta)
				ON (resposta.fk_pergunta = '".$idPergunta."')
				WHERE (avaliacao.fk_resposta = '".$idResposta."' 
				AND avaliacao.fk_usuario = '".$user."')";	

		$result = mysqli_query($TIG, $RsNivelUser);
		$row_RsNivelUser = mysqli_fetch_assoc($result);

	$TIG->close();

?>