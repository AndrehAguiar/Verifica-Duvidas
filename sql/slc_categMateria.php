<?php
	// Create connection
	$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG); 
	mysqli_set_charset( $TIG, 'utf8' );

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 
	
	if(isset($_GET['categoria'])!=''){
		$categoria = $_GET['categoria'];
	}else{
		$categoria = isset($_GET['categoria']);
	}

	$RsMaterias = mysqli_query( $TIG, "SELECT * FROM u793605722_tig5.materia WHERE materia.fk_categoria = '".$idCategoria."'" )
		or die( mysqli_error( $TIG ) );

	$RsMateriaCateg = mysqli_query( $TIG, "SELECT * FROM u793605722_tig5.materia
						WHERE materia.fk_categoria = '".$categoria."'" )
		or die( mysqli_error( $TIG ) );

	$TIG -> close();
?>