<?php
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('db_config.php');

    mysqli_set_charset($conn, "utf8");

    $imagem = $_POST["imagem"];
    $resposta = $_POST["resposta"];
    $fk_pergunta = $_POST["fk_pergunta"];
    $fk_usuario = $_POST["fk_usuario"]; 

    $sql = "INSERT INTO resposta(imagem, resposta, fk_materia, fk_usuario) VALUES ('$imagem', '$resposta', '$fk_pergunta', '$fk_usuario')";
            
    if (mysqli_query($conn, $sql))
     {
			echo "Sucesso";			
      } else {
      
            echo "Erro ".$sql;
      }

    mysqli_close($conn); 
    
} else {
   
  echo "Acesso Negado";
}

?>