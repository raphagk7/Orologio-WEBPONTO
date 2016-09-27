<!doctype html>
<?php
?>
<html>
<head>
<link rel="stylesheet" type="text/css"  href="CSS/estilo.css" />
</head>

<body>
<div style="text-align: center;";>
<div id='containerLogin'>
<!-- Formulário de Login -->
<div id='imagemBtLogin'><img src="imagens/logoIN.png" width="146" height="68" alt="imagens/logoIN.png"></div>
<div id='formLogin'>
<form action="validacao.php" method="post">
<p><label for="txUsuario"><span style="color:#fff;font-weight: bold;"></span></label>
<input style="font-size:14pt;border-radius:0px;text-align:center;" type="text" name="usuario" id="txUsuario" maxlength="25" size="15" placeholder="Usu&aacute;rio" /><p>
<label for="txSenha"><span style="color:#fff;font-weight: bold;"></span></label>
<input style="font-size:14pt;border-radius:0px;text-align:center;" type="password" name="senha" id="txSenha" size="15" placeholder="Senha"/><p>
<input type="submit" style="font-size: 14pt;" value="Entrar" id="botEntra">
</form>
</div>
</div>
</div>
</body>
</html>