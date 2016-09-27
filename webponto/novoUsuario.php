<!DOCTYPE html>

<?php 
include 'DAO/DAO.class.php';
include 'aplicacao/control/UsuarioControl.class.php';
include 'aplicacao/model/Usuario.class.php';
include 'aplicacao/view/UsuarioView.class.php';
include 'conexao.php';

?>

<html>

<head>
<title>Cadastro - Usuario</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
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
include 'menuaba.php';
echo "</div>";
UsuarioView::main(UsuarioView::TELA_NOVO_USUARIO);
echo "</div>";

echo "<div id='rodape'>";
echo "</div>";

echo "<div id='final'>";
echo "</div>";



echo "</div>";

?>

</body>

</html>
