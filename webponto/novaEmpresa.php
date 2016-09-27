<!DOCTYPE html>

<?php 
include 'DAO/DAO.class.php';
include 'aplicacao/control/EmpresaControl.class.php';
include 'aplicacao/model/Empresa.class.php';
include 'aplicacao/view/EmpresaView.class.php';

?>

<html>

<head>
<title>Cadastro - Empresa</title>
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
include 'abaEmpresa.php';
echo "</div>";
EmpresaView::main(EmpresaView::TELA_NOVA_EMPRESA);
echo "</div>";

echo "<div id='rodape'>";
echo "</div>";

echo "<div id='final'>";
echo "</div>";



echo "</div>";

?>

</body>

</html>
