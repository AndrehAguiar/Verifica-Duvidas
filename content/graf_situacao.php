<?php 
	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
?>

<div id="chart_div_situacao" style="width: 100%; height: 500px;"></div>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Matéria','Total Perguntas','Perguntas Respondidas', 'Respostas Avaliadas', 'Quant. Avaliações', 'Soma Avaliações', 'Média Avaliações'],
		<?php 

			$RsMateria = mysqli_query( $TIG, "SELECT * FROM u793605722_tig5.materia")
				or die( mysqli_error( $TIG ) );
			
			foreach($RsMateria as $row_materias):
				$idMateria = $row_materias['id']; 
			
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
			$media = $row_RsMediaRespostasAvalia['media_respostaAvalia'] == 0 ? 0 : $row_RsMediaRespostasAvalia['media_respostaAvalia'];
			
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
			$soma = $row_RsSomaRespostasAvalia['soma_respostaAvalia'] == 0 ? 0 : $row_RsSomaRespostasAvalia['soma_respostaAvalia'];	
			
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
			$conta = $row_RsContaRespostasAvalia['soma_respostaAvalia'] == 0 ? 0 : $row_RsContaRespostasAvalia['soma_respostaAvalia'];
			
			$RsSomaResposta  = mysqli_query( $TIG, "SELECT COUNT(DISTINCT fk_resposta) AS soma_resposta 
							FROM u793605722_tig5.avaliacao 

							LEFT JOIN (u793605722_tig5.resposta)
							ON (resposta.id = avaliacao.fk_resposta)

							LEFT JOIN (u793605722_tig5.pergunta)
							ON (pergunta.id = resposta.fk_pergunta)

							LEFT JOIN (u793605722_tig5.materia)
							ON (materia.id = pergunta.fk_materia)
							WHERE materia.id = '".$idMateria."' AND avaliacao.avaliacao <> 0")

			or die( mysqli_error( $TIG ) );
			$row_RsSomaResposta = mysqli_fetch_assoc($RsSomaResposta);
			$respostas = $row_RsSomaResposta['soma_resposta'] == 0 ? 0 : $row_RsSomaResposta['soma_resposta'];
			
			$RsPerguntasRespondidas  = mysqli_query( $TIG, "SELECT COUNT(DISTINCT fk_pergunta) AS perg_respondidas 
						FROM u793605722_tig5.resposta
							LEFT JOIN (u793605722_tig5.pergunta)
						ON (pergunta.id = resposta.fk_pergunta)
						WHERE pergunta.fk_materia = '".$idMateria."'")

			or die( mysqli_error( $TIG ) );
			$row_RsPerguntasRespondidas = mysqli_fetch_assoc($RsPerguntasRespondidas);			
			$perguntas = $row_RsPerguntasRespondidas['perg_respondidas'] == 0 ? 0 : $row_RsPerguntasRespondidas['perg_respondidas'];
			
			$qtdPerguntas = mysqli_query($TIG, "SELECT COUNT(*) AS qtd_perguntas
						FROM u793605722_tig5.pergunta
						WHERE pergunta.fk_materia = '".$idMateria."'")

			or die( mysqli_error( $TIG ) );
			$row_qtdPerguntas = mysqli_fetch_assoc($qtdPerguntas);
			$row_qtdPerguntas = $row_qtdPerguntas['qtd_perguntas'];
			?>
								  
				['<?php echo $row_materias['materia']; ?>', <?php echo $row_qtdPerguntas; ?>, <?php echo $perguntas; ?>, <?php echo $respostas; ?>, <?php echo $conta; ?>, <?php echo $soma; ?>, <?php echo $media; ?>],
		<?php endforeach; ?>
      ]);

    var options = {
      title : 'Visão geral de avaliações',
      vAxis: {title: 'Avaliação'},
      hAxis: {title: 'Matérias'},
      seriesType: 'bars',
      series: {5: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div_situacao'));
    chart.draw(data, options);
  }
</script>