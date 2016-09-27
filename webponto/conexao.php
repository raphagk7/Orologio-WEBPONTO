<?php
// Dados do banco
$dbhost   = "127.0.0.1";   #Nome do host
$db       = "webponto";   #Nome do banco de dados
$user     = "root"; #Nome do usuário
$password = "";   #Senha do usuário

@mysql_connect($dbhost,$user,$password) or die("Não foi possível a conexão com o servidor!");
@mysql_select_db("$db") or die("Não foi possível selecionar o banco de dados!");

?>