<?php
// Dados do banco
$dbhost   = "127.0.0.1";   #Nome do host
$db       = "webponto";   #Nome do banco de dados
$user     = "root"; #Nome do usu�rio
$password = "";   #Senha do usu�rio

@mysql_connect($dbhost,$user,$password) or die("N�o foi poss�vel a conex�o com o servidor!");
@mysql_select_db("$db") or die("N�o foi poss�vel selecionar o banco de dados!");

?>