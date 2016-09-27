<!DOCTYPE html>

<?php 
include 'DAO/DAO.class.php';
include 'aplicacao/control/FuncionarioControl.class.php';
include 'aplicacao/model/Funcionario.class.php';
include 'aplicacao/view/FuncionarioView.class.php';

?>

<html>

<head>
<title>Consulta - Funcion&aacute;rio</title>
<link rel="stylesheet" type="text/css" href="CSS/estilo.css" />
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
</head>


<body>

<?php

echo "<div id='container'>";

echo "<div id='header'>";

echo "<div id='imagemheader'>";
echo "</div>";

echo "<div id='menu'>";
include 'menu.php';
echo "</div>";

echo "</div>";


echo "<div id='center'>";
echo "<div id='aba'>";
include 'abaFuncionario.php';
echo "</div>";
FuncionarioView::main(FuncionarioView::TELA_CONSULTA_FUNCIONARIO);
echo "</div>";

echo "<div id='rodape'>";
echo "</div>";

echo "<div id='final'>";
echo "</div>";



echo "</div>";

?>

</body>

</html>