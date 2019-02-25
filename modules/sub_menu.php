<?php 
	include(SQL_PATH."slc_categMateria.php");
	while ($row_RsMaterias = mysqli_fetch_assoc($RsMaterias)){ ?>
	<li onclick="MM_goToURL('parent','?p=categorias&materia=<?php echo $row_RsMaterias['id']; ?>');return document.MM_returnValue">
	  <a><?php echo $row_RsMaterias['materia']; ?></a>
	</li>
<?php } ?>