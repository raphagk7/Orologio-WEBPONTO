<?php
class EmpresaView {
	const TELA_NOVA_EMPRESA = 0;
	const TELA_CONSULTA_EMPRESA = 1;
	public $empresadao;
	public function EmpresaView() {
		$this->empresadao = new EmpresaControl ();
	}
	public function mostraTelaNovaEmpresa() {
		echo "<form action='' method='post' name='meuForm' id='formulario' >
				<div class='box'>
				<label>
				<span>Raz&atilde;o Social</span>
				<input type='text' name='razaosocial' size='50' required>
				</label> 
				
				<label>
				<span>CNPJ</span>
				<input type='text' name='cnpj'>
				</label>
				
				<label>
				<span>Ativa</span>
				<select name='ativa'>
				<option value='1'>Ativa</option>
				<option value='0'>Inativa</option>
				</select>
				</label>
				
				<label>
				<span>Logradouro</span>
				<input type='text' name='logradouro'>
				</label>
				
				<label>
				<span>N&uacute;mero</span>
				<input type='text' name='numero'>
				</label>
				
				<label>
				<span>CEP</span>
				<input type='text' name='cep'>
				</label>
				
				<label>
				<span>Bairro</span>
				<input type='text' name='bairro'>
				</label>
				
				<label>
				<span>Cidade</span>
				<input type='text' name='cidade'>
				</label>
				
				<label>
				<span>UF</span>
				<select name='uf'>
       <option value='AC'>AC</option>
       <option value='AL'>AL</option>
       <option value='AP'>AP</option>
       <option value='AM'>AM</option>
       <option value='BA'>BA</option>
       <option value='CE'>CE</option>
       <option value='DF'>DF</option>
       <option value='ES'>ES</option>
       <option value='GO'>GO</option>
       <option value='MA'>MA</option>
       <option value='MT'>MT</option>
       <option value='MS'>MS</option>
       <option value='MG'>MG</option>
       <option value='PR'>PR</option>
       <option value='PB'>PB</option>
       <option value='PA'>PA</option>
       <option value='PE'>PE</option>
       <option value='PI'>PI</option>
       <option value='RJ'>RJ</option>
       <option value='RN'>RN</option>
       <option value='RS'>RS</option>
       <option value='RO'>RO</option>
       <option value='RR'>RR</option>
       <option value='SC'>SC</option>
       <option value='SE'>SE</option>
       <option value='SP'>SP</option>
       <option value='TO'>TO</option>
				
				</select>
				</label>
				
				<label> 
				<input type='submit' class='button' name='enviar' value='Cadastrar'>
				</label> 
				
				</div>
				</form>";
		if (isset ( $_POST ['enviar'] )) {
			
			$Empresa = new Empresa ();
			
			$Empresa->setRazaoSocial ( $_POST ['razaosocial'] );
			$Empresa->setCnpj ( $_POST ['cnpj'] );
			$Empresa->setAtiva ( $_POST ['ativa'] );
			$Empresa->setLogradouro ( $_POST ['logradouro'] );
			$Empresa->setNumeroEndereco ( $_POST ['numero'] );
			$Empresa->setCep ( $_POST ['cep'] );
			$Empresa->setBairro ( $_POST ['bairro'] );
			$Empresa->setCidade ( $_POST ['cidade'] );
			$Empresa->setUf ( $_POST ['uf'] );
			
			if ($this->empresadao->insereEmpresa ( $Empresa )) {
				echo '<br>' . "Nova empresa cadastrada com sucesso";
				echo '<meta http-equiv="refresh" content="5;url=novaEmpresa.php">';
			} else
				echo "Houve falha no cadastro, tente novamente";
		}
	}
	public function mostraTelaListaEmpresa() {
		$lista = $this->empresadao->retornaEmpresa ();
		
		echo "<table border='1' width='100%' cellspacing='0'>";
		echo "<tr>
				<th>Id</th>
				<th>Raz&atilde;o Social</th>
				<th>CNPJ</th>
				<th>Ativa</th>
				<th>Logradouro</th>
				<th>N&uacute;mero</th>
				<th>CEP</th>
				<th>Bairro</th>
				<th>Cidade</th>
				<th>UF</th>
				</tr>";
		
		foreach ( $lista as $empr ) {
			echo "<tr>";
			echo "<td>" . $empr->getId () . "</td>";
			echo "<td>" . $empr->getRazaoSocial () . "</td>";
			echo "<td>" . $empr->getcnpj () . "</td>";
			echo "<td>" . $empr->getAtiva () . "</td>";
			echo "<td>" . $empr->getLogradouro () . "</td>";
			echo "<td>" . $empr->getNumeroEndereco () . "</td>";
			echo "<td>" . $empr->getCep () . "</td>";
			echo "<td>" . $empr->getBairro () . "</td>";
			echo "<td>" . $empr->getCidade () . "</td>";
			echo "<td>" . $empr->getUf () . "</td>";
			
			echo "</tr>";
		}
		
		echo "</table><br>";
		
		echo '<form action="" method="Post">
			
			<input type=button value=imprimir onclick=window.print();>
			
			</form>';
	}
	
	public static function main($tela) {
		switch ($tela) {
			
			case self::TELA_NOVA_EMPRESA :
				$telaEmpresa = new EmpresaView ();
				$telaEmpresa->mostraTelaNovaEmpresa ();
				break;
			
			case self::TELA_CONSULTA_EMPRESA :
				$telaEmpresa = new EmpresaView ();
				$telaEmpresa->mostraTelaListaEmpresa ();
				break;
			
			default :
				echo "PADRÃO";
				break;
		}
	}
}