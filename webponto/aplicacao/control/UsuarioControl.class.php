<?php
class UsuarioControl extends DAO {
	public function UsuarioControlDAO(PDO $conexao = null) {
		if ($conexao == null) {
			
			parent::DAO ();
		} else
			parent::DAO ( $conexao );
	}
	public function insereUsuario(Usuario $usuario) {
		$nome = $usuario->getNome ();
		$nusuario = $usuario->getNUsuario ();
		$senha = $usuario->getSenha();
		$email = $usuario->getEmail ();
		$nivel = $usuario->getNivel ();
		$ativo = $usuario->getAtivo ();
		$empresa = $usuario->getEmpresa();
		
		$inserir = "insert into usuarios(nome,usuario,senha,email,nivel,ativo,cadastro,empresa)values
		('$nome','$nusuario',SHA1('$senha'),'$email','$nivel','$ativo', now(),'$empresa')";
		
		if ($this->conexao->query ( $inserir ))
		
			return true;
		
			else
				return false;
	}
	
	public function retornaUsuario() {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from usuarios order by id desc" );
	
		foreach ( $listagem as $linha ) {
	
			$usuario = new Usuario ( $linha ['id'], $linha ['nome'],$linha ['usuario'], $linha ['email'], $linha['nivel'], $linha ['ativo'], $linha ['cadastro'],$linha ['empresa'] );
				
			$usuario->setId ( $linha ['id'] );
			$usuario->setNome( $linha ['nome'] );
			$usuario->setNUsuario($linha['usuario']);
			$usuario->setEmail($linha['email']);
			$usuario->setNivel($linha['nivel']);
			$usuario->setAtivo($linha['ativo']);
			$usuario->setCadastro($linha['cadastro']);
			$usuario->setEmpresa($linha['empresa']);
			$result [] = $usuario;
		}
	
		return $result;
	}
}