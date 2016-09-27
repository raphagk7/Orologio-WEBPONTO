<?php
class FuncionarioControl extends DAO{
	
	public function FuncionarioControlDAO(PDO $conexao = null) {
		if ($conexao == null) {
				
			parent::DAO ();
		} else
			parent::DAO ( $conexao );
	}
	
	public function insereFuncionario(Funcionario $funcionario){
		
		$nome = $funcionario->getNome();
		$ativo = $funcionario->getAtivo();
		$datanascimento = $funcionario->getDataNascimento();
		$cargo = $funcionario->getCargo();
		$dataadmissao = $funcionario->getDataAdmissao();
		$cpf = $funcionario->getCpf();
		$empresa = $funcionario->getEmpresa();
		$nctps = $funcionario->getNctps();
		$salario = $funcionario->getSalario();
		
		$inserir = "insert into funcionario(nome,ativo,datanascimento,cargo,dataadmissao,cpf,empresa,nctps,salario)
				values('$nome','$ativo','$datanascimento','$cargo','$dataadmissao','$cpf','$empresa','$nctps','$salario')";
		
		if ($this->conexao->query ( $inserir ))
		
			return true;
		
			else
				return false;
	}
	
	public function retornaFuncionario() {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from funcionario order by id desc" );
	
		foreach ( $listagem as $linha ) {
	
			$funcionario= new Funcionario( $linha ['id'], $linha ['nome'],$linha ['ativo'], $linha ['datanascimento'], $linha['cargo'], $linha ['dataadmissao'], $linha ['cpf'],$linha['funcionario'], $linha['nctps'],$linha['salario']);
	
			$funcionario->setId ( $linha ['id'] );
			$funcionario->setNome($linha['nome']);
			$funcionario->setAtivo($linha['ativo']);
			$funcionario->setDataNascimento($linha['datanascimento']);
			$funcionario->setCargo($linha['cargo']);
			$funcionario->setDataAdmissao($linha['dataadmissao']);
			$funcionario->setCpf($linha['cpf']);
			$funcionario->setEmpresa($linha['empresa']);
			$funcionario->setNctps($linha['nctps']);
			$funcionario->setSalario($linha['salario']);
				
			$result [] = $funcionario;
		}
	
		return $result;
	}
	
}