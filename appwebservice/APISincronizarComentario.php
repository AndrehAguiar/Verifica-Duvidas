<?php

header('Content-type: application/json');

ini_set('default_charset', 'utf-8');

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	require_once('db_config.php');

    mysqli_set_charset($conn, "utf8");
	
	$statement = mysqli_prepare($conn, "SELECT * FROM comentario");	
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $id, $imagem, $comentario, $fk_resposta, $fk_usuario, $data);
    if (mysqli_stmt_num_rows($statement) > 0) {
		
        while (mysqli_stmt_fetch($statement)) {
			array_push($response, array("id" => $id, "imagem" => $imagem, "comentario" => $comentario, "fk_resposta" => $fk_resposta, "fk_usuario" => $fk_usuario, "data" => $data));
		}         
	}else{
		$response["sucesso"] = false;
	}
    echo json_encode($response);
}else{
	$response["sucesso"] = false;    
    echo json_encode($response);
}
mysqli_close($conn);
?>
	