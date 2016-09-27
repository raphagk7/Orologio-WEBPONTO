<?php
class UsuarioView {
	const TELA_NOVO_USUARIO = 0;
	const TELA_CONSULTA_USUARIO = 1;
	public $usuariodao;
	public function UsuarioView() {
		$this->usuariodao = new UsuarioControl ();
	}
	public function mostraTelaNovoUsuario() {
		echo "<form action='' method='post' name='meuForm' id='formulario' >
				<div class='box'>
				<label>
				<span>Nome Completo</span>
				<input type='text' name='nome' size='50' required>
				</label> 
				
				<label> 
				<span>Status</span>
				<select name='ativo'>
				<option value='1'> Ativo</option>
				<option value='0'> Inativo</option>
				</select>
				</label> 
				
				<label> 
				<span>Usu&aacute;rio</span><input type='text' name='nusuario'>
				</label> 
				
				<label> 
				<span>Email</span>
				<input type='text' name='email'>
				</label> 
				
				<label> 
				<span>Senha</span><input type='password' name='senha'>
				</label> 
				
				<label> 
				<span>Nivel</span>
				<select name='nivel'>
				<option value='1'>Gerente</option>
				<option value='2'>RH</option>
				<option value='3'>Administrador</option>
				</select>
				</label> 
				
				<label><span>Empresa</span>";
		
		$instrucaoSQL = "select * from empresa";
		$consulta = mysql_query ( $instrucaoSQL );
		
		echo "<select name='empresa'>";
		while ( $cadaLinha = mysql_fetch_array ( $consulta ) ) {
			echo '<option value="' . $cadaLinha ['razaosocial'] . '">'. $cadaLinha ['razaosocial'] . '</option>';
		}
		echo "</select>";
				
		echo "</label>
				
				<label> 
				<input type='submit' class='button' name='enviar' value='Cadastrar'>
				</label> 
				
				</div>
				</form>";
		
		if (isset ( $_POST ['enviar']) ){
			
			$Usuario = new Usuario ();
			
			$Usuario->setNome ( $_POST ['nome'] );
			$Usuario->setNUsuario ( $_POST ['nusuario'] );
			$Usuario->setSenha($_POST['senha']);
			$Usuario->setEmail($_POST['email']);
			$Usuario->setNivel($_POST['nivel']);
			$Usuario->setAtivo($_POST['ativo']);
			$Usuario->setEmpresa($_POST['empresa']);
						
			if ($this->usuariodao->insereUsuario ( $Usuario )) {
				echo '<br>' . "Novo usu&aacute;rio cadastrado com sucesso";
				echo '<meta http-equiv="refresh" content="5;url=novoUsuario.php">';
			} else
				echo "Houve falha no cadastro, tente novamente";
		}
	}
	
	public function mostraTelaListaUsuario(){
		
		$lista = $this->usuariodao->retornaUsuario();
		
		echo "<table border='1' width='100%' cellspacing='0'>";
		echo "<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Usuario</th>
				<th>Email</th>
				<th>Nivel</th>
				<th>Ativo</th>
				<th>Dt. Cadastro</th>
				<th>Empresa</th>
				
				</tr>";
		
		foreach ( $lista as $usuar ) {
			echo "<tr>";
			echo "<td>" . $usuar->getId() . "</td>";
			echo "<td>" . $usuar->getNome() . "</td>";
			echo "<td>" . $usuar->getNUsuario(). "</td>";
			echo "<td>" . $usuar->getEmail() . "</td>";
			
			switch ($usuar->getNivel()){
				
				case 1:
				echo "<td>Gerente</td>";
				break;
				
				case 2:
				echo "<td>RH</td>";
				break;
				
				case 3:
				echo "<td>Administrador</td>";
				break;
				
				
				
			}
			
			if ($usuar->getAtivo() == 1){
				echo "<td>SIM</td>";
			}else{
				"<td>NAO</td>";
			}
			
			
			echo "<td>" . $usuar->getCadastro(). "</td>";
			echo "<td>" . $usuar->getEmpresa(). "</td>";
			
			/*echo "<td>" . '<form action="" method="post">
			 <input type="submit" name="visualizar" value="Visualizar">
			 <input type="hidden" name="cod" value="' . $ocorre->getCod () . '">
			 </form>' . "</td>";*/
			echo "</tr>";
		}
		
		echo "</table><br>";
		
		echo '<form action="" method="Post">
		
			<input type=button value=imprimir onclick=window.print();>
		
			</form>';
		
	}
	
	
	
	public static function main($tela) {
		switch ($tela) {
			
			case self::TELA_NOVO_USUARIO :
				$telaUsuario = new UsuarioView ();
				$telaUsuario->mostraTelaNovoUsuario ();
				break;
				
			case self::TELA_CONSULTA_USUARIO :
				$telaUsuario = new UsuarioView ();
				$telaUsuario->mostraTelaListaUsuario();
				break;
			
			default :
				echo "PADRÃO";
				break;
		}
	}
}