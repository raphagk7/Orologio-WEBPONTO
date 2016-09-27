<?php
class EmpresaControl extends DAO {
	public function EmpresaControlDAO(PDO $conexao = null) {
		if ($conexao == null) {
			
			parent::DAO ();
		} else
			parent::DAO ( $conexao );
	}
	
	public function insereEmpresa(Empresa $empresa){
		
		$razaosocial = $empresa->getRazaoSocial();
		$cnpj = $empresa->getcnpj();
		$ativa = $empresa->getAtiva();
		$logradouro = $empresa->getLogradouro();
		$numeroendereco = $empresa->getNumeroEndereco();
		$cep = $empresa->getCep();
		$bairro = $empresa->getBairro();
		$cidade = $empresa->getCidade();
		$uf = $empresa->getUf();
		
		$inserir = "insert into empresa (razaosocial,cnpj,ativa,logradouro,numeroendereco,cep,bairro,cidade,uf) 
				values ('$razaosocial','$cnpj','$ativa','$logradouro','$numeroendereco','$cep','$bairro','$cidade','$uf')";
		
		if ($this->conexao->query ( $inserir ))
		
			return true;
		
			else
				return false;
		
	}
	
	public function retornaEmpresa() {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from empresa order by id desc" );
	
		foreach ( $listagem as $linha ) {
	
			$empresa = new Empresa( $linha ['id'], $linha ['razaosocial'],$linha ['cnpj'], $linha ['ativa'], $linha['logradouro'], $linha ['numeroendereco'], $linha ['cep'],$linha['bairro'], $linha['cidade'],$linha['uf']);
	
			$empresa->setId ( $linha ['id'] );
			$empresa->setRazaoSocial($linha['razaosocial']);
			$empresa->setCnpj($linha['cnpj']);
			$empresa->setAtiva($linha['ativa']);
			$empresa->setLogradouro($linha['logradouro']);
			$empresa->setNumeroEndereco($linha['numeroendereco']);
			$empresa->setCep($linha['cep']);
			$empresa->setBairro($linha['bairro']);
			$empresa->setCidade($linha['cidade']);
			$empresa->setUf($linha['uf']);
			
			$result [] = $empresa;
		}
	
		return $result;
	}
	
}