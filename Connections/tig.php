<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_TIG = "mysql.hostinger.com.br";
$database_TIG = "u793605722_tig5";
$username_TIG = "u793605722_gti5t";
$password_TIG = "LqDyNy:?I1Sgehv`sZ";
$TIG = new mysqli( $hostname_TIG, $username_TIG, $password_TIG) or trigger_error(mysqli_error(),E_USER_ERROR); 
mysqli_set_charset( $TIG, 'utf8' );
 
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
?>
