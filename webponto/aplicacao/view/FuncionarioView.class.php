<?php
class FuncionarioView {
	const TELA_NOVO_FUNCIONARIO = 0;
	const TELA_CONSULTA_FUNCIONARIO = 1;
	public $funcionariodao;
	public function FuncionarioView() {
		$this->funcionariodao = new FuncionarioControl ();
	}
	public function mostraTelaNovoFuncionario() {
		echo "<form action='' method='post' name='meuForm' id='formulario' >
		<div class='box'>
		<label>
		<span>Nome</span>
		<input type='text' name='nome' size='50' required>
		</label>
				
		<label>
		<span>Ativo</span>
				<select name='ativo'>
				<option value='1'>Ativo</option>
				<option value='0'>Inativo</option>
				</select>
		</label>
				
		<label>
		<span>Data de Nascimento</span>
		<input type='date' name='datanascimento'>
		</label>
		
		<label>
		<span>Cargo</span>
		<input type='text' name='cargo'>
		</label>
				
		<label>
		<span>Data Admiss&atilde;o</span>
		<input type='date' name='dataadmissao'>
		</label>
				
		<label>
		<span>CPF</span>
		<input type='text' name='cpf'>
		</label>
				
		<label>
		<span>Empresa</span>";
		
		$instrucaoSQL = "select * from empresa";
		$consulta = mysql_query ( $instrucaoSQL );
		
		echo "<select name='empresa'>";
		while ( $cadaLinha = mysql_fetch_array ( $consulta ) ) {
			echo '<option value="' . $cadaLinha ['razaosocial'] . '">'. $cadaLinha ['razaosocial'] . '</option>';
		}
		echo "</select>";
				
		echo "</label>
				
		<label>
		<span>CTPS</span>
		<input type='text' name='ctps'>
		</label>
				
		<label>
		<span>Sal&aacute;rio</span>
		<input type='text' name='salario'>
		</label>
		
		<label> 
				<input type='submit' class='button' name='enviar' value='Cadastrar'>
				</label> 
				
				</div>
				</form>";
		if (isset ( $_POST ['enviar'] )) {
				
			$Funcionario = new Funcionario();
				
			$Funcionario->setNome( $_POST ['nome'] );
			$Funcionario->setAtivo($_POST['ativo']);
			$Funcionario->setDataNascimento($_POST['datanascimento']);
			$Funcionario->setCargo($_POST['cargo']);
			$Funcionario->setDataAdmissao($_POST['dataadmissao']);
			$Funcionario->setCpf($_POST['cpf']);
			$Funcionario->setEmpresa($_POST['empresa']);
			$Funcionario->setNctps($_POST['ctps']);
			$Funcionario->setSalario($_POST['salario']);
		
				
			if ($this->funcionariodao->insereFuncionario( $Funcionario )) {
				echo '<br>' . "Novo funcionario cadastrado com sucesso";
				echo '<meta http-equiv="refresh" content="5;url=novoFuncionario.php">';
			} else
				echo "Houve falha no cadastro, tente novamente";
		}
		
	}
	
	public function mostraTelaListaFuncionario() {
		$lista = $this->funcionariodao->retornaFuncionario();
	
		echo "<table border='1' width='100%' cellspacing='0'>";
		echo "<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Ativo</th>
				<th>Data de Nascimento</th>
				<th>Cargo</th>
				<th>Data de admiss&atilde;o</th>
				<th>CPF</th>
				<th>Empresa</th>
				<th>CTPS</th>
				<th>Sal&aacute;rio</th>
				</tr>";
	
		foreach ( $lista as $func ) {
			echo "<tr>";
			echo "<td>" . $func->getId () . "</td>";
			echo "<td>" . $func->getNome() . "</td>";
			echo "<td>" . $func->getAtivo() . "</td>";
			echo "<td>" . $func->getDataNascimento() . "</td>";
			echo "<td>" . $func->getCargo() . "</td>";
			echo "<td>" . $func->getDataAdmissao(). "</td>";
			echo "<td>" . $func->getCpf() . "</td>";
			echo "<td>" . $func->getEmpresa() . "</td>";
			echo "<td>" . $func->getNctps() . "</td>";
			echo "<td>" . $func->getSalario() . "</td>";
				
			echo "</tr>";
		}
	
		echo "</table><br>";
	
		echo '<form action="" method="Post">
		
			<input type=button value=imprimir onclick=window.print();>
		
			</form>';
	}
	public static function main($tela) {
		switch ($tela) {
			
			case self::TELA_NOVO_FUNCIONARIO :
				$telaFuncionario = new FuncionarioView ();
				$telaFuncionario->mostraTelaNovoFuncionario ();
				break;
				
			case self::TELA_CONSULTA_FUNCIONARIO :
				$telaFuncionario = new FuncionarioView ();
				$telaFuncionario->mostraTelaListaFuncionario();
				break;
			
			default :
				echo "PADRÃO";
				break;
		}
	}
}