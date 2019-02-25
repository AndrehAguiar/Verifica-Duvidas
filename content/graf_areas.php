<!--DESENVOLVIDO POR
  	TOP Artes - Impressões Vídeos e WEB
  	topartes.com
  	André Aguiar
  	andre@topartes.com
  	31 3327-5397
  --><!--Div that will hold the pie chart-->
<div id="chart_div_areas"></div>

<script type="text/javascript">

  // Load the Visualization API and the corechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChartAreas);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChartAreas() {

	// Create the data table.
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Topping');
	data.addColumn('number', 'Slices');
	data.addRows([
		<?php while($row_categorias = mysqli_fetch_assoc($sl_categ)){

			$idCategoria = $row_categorias['id']; 
			include(SQL_PATH."conta_perguntasCateg.php");

			while ($row_RsQtdMaterias = mysqli_fetch_assoc($RsQtdMateriasCateg)){
				echo "['";
				echo ($row_categorias['categoria']); 
				echo "',";
				echo ($row_RsQtdMaterias['qtd_materiasCateg']);
				echo "],";
			}
		}?>
	]);

	// Set chart options
	var options = {'title':'Matérias por área do conhecimento',
				   'width':300,
				   'height':300};

	// Instantiate and draw our chart, passing in some options.
	var chart = new google.visualization.PieChart(document.getElementById('chart_div_areas'));
	chart.draw(data, options);
  }
</script>