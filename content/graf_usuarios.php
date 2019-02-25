<?php include(SQL_PATH."select.php"); ?>
<!--Div that will hold the pie chart-->
<div id="chart_div_usuarios"></div>

<script type="text/javascript">

  // Load the Visualization API and the corechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChartMaterias);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChartMaterias() {

	// Create the data table.
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Topping');
	data.addColumn('number', 'Slices');
	data.addRows([
		<?php $totalPergunta = 0;
		while($row_RsRegiao = mysqli_fetch_assoc($RsRegiao)){
			$estado = $row_RsRegiao["estado"];
			
			include(SQL_PATH."conta_users_uf.php");	
			while ($row_qtd_perguntasEstado = mysqli_fetch_assoc($qtd_perguntasEstado)){
				$qtdPerguntas = $row_qtd_perguntasEstado['qtd_perguntas_estado'];
			
				$totalPergunta = $totalPergunta + $qtdPerguntas;
			}				
				echo "['";
				echo ($estado); 
				echo "',";
				echo ($qtdPerguntas);
				echo "],";
		}
		while ($row_qtd_perguntas = mysqli_fetch_assoc($qtd_perguntas)){
			$qtdTotalPerguntas = $row_qtd_perguntas['qtdTotalPerguntas'];
		}
		$total = $qtdTotalPerguntas - $totalPergunta;
		if($total != 0){			
				echo "['";
				echo "Não Informado"; 
				echo "',";
				echo ($total);
				echo "],";			
		}?>
		
	]);

	// Set chart options
	var options = {'title':'Usuários por estado',
				   'width':300,
				   'height':300};

	// Instantiate and draw our chart, passing in some options.
	var chart = new google.visualization.PieChart(document.getElementById('chart_div_usuarios'));
	chart.draw(data, options);
  }
</script>