<?php
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('db_config.php');

    mysqli_set_charset($conn, "utf8");

    $imagem = $_POST["imagem"];
    $comentario = $_POST["comentario"];
    $fk_resposta = $_POST["fk_resposta"];
    $fk_usuario = $_POST["fk_usuario"]; 

    $sql = "INSERT INTO comentario(imagem, comentario, fk_resposta, fk_usuario) VALUES ('$imagem', '$comentario', '$fk_resposta', '$fk_usuario')";
            
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