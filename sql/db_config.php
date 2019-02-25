<?php
define('HostName', 'http://mysql.hostinger.com.br');
define('HostUser', 'u793605722_gti5t');
define('HostPass', 'LqDyNy:?I1Sgehv`sZ');
define('DataBaseName', 'u793605722_tig5');

$conn = mysqli_connect(HostName, HostUser, HostPass, DataBaseName) or die("Falha ao conectar ao BD");

?>