<?php
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('db_config.php');

    mysqli_set_charset($conn, "utf8");

    $materia = $_POST["imagem"];
    $pergunta = $_POST["pergunta"];
    $nivel = $_POST["nivel"];
    $fk_materia = $_POST["fk_materia"];
    $fk_usuario = $_POST["fk_usuario"]; 

    $sql = "INSERT INTO pergunta(imagem, pergunta, nivel, fk_materia, fk_usuario) VALUES ('$imagem', '$pergunta', '$nivel', '$fk_materia', '$fk_usuario')";
            
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