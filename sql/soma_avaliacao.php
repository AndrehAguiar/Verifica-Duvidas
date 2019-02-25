<?php 

	 $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');  
	 $TIG = new PDO("mysql:host=localhost; dbname=u793605722_tig5;", "u793605722_gti5t", "LqDyNy:?I1Sgehv`sZ", $opcoes); 

	// Check connection
	if ($TIG->connect_error) {
	   die("Connection failed: " . $TIG->connect_error);
	} 

	$soma = $TIG->prepare("SELECT SUM(avaliacao.avaliacao) AS cls_respostas FROM u793605722_tig5.avaliacao
									WHERE avaliacao.fk_resposta = '".$id_resposta."'");	

	$result = mysqli_query($TIG, $soma);
	$total  = mysqli_fetch_assoc($result);

	$TIG->close();

?>