<?php include(SQL_PATH."select.php"); ?>
<!--Div that will hold the pie chart-->
<div id="chart_div_respostas"></div>

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
		<?php while($row_materias = mysqli_fetch_assoc($sl_materias)){
	
			$materia = $row_materias["materia"];
			$idMateria = $row_materias["id"];
			include(SQL_PATH."conta_perguntasMateria.php");
	
			while ($row_RsQtdRespostasAvalia = mysqli_fetch_assoc($RsQtdRespostasAvalia)){
				echo "['";
				echo ($row_materias['materia']); 
				echo "',";
				echo ($row_RsQtdRespostasAvalia['qtd_respostaAvalia']);
				echo "],";
			}
		}?>
	]);

	// Set chart options
	var options = {'title':'Respostas avaliadas',
				   'width':300,
				   'height':300};

	// Instantiate and draw our chart, passing in some options.
	var chart = new google.visualization.PieChart(document.getElementById('chart_div_respostas'));
	chart.draw(data, options);
  }
</script>