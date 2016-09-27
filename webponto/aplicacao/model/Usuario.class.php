<?php

class Usuario{
	
	private $id;
	private $nome;
	private $nusuario;
	private $senha;
	private $email;
	private $nivel;
	private $ativo;
	private $cadastro;
	private $empresa;
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setNUsuario($nusuario){
		$this->nusuario = $nusuario;
	}
	
	public function getNUsuario(){
		return $this->nusuario;
	}
	
	public function setSenha($senha){
		$this->senha = $senha;
	}
	
	public function getSenha(){
		return $this->senha;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setNivel($nivel){
		$this->nivel = $nivel;
	}
	
	public function getNivel(){
			return $this->nivel;
	}
	
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	
	public function getAtivo(){
		return $this->ativo;
	}
	
	public function setCadastro($cadastro){
		$this->cadastro = $cadastro;
	}
	
	public function getCadastro(){
		return $this->cadastro;
	}
	
	public function setEmpresa($empresa){
		$this->empresa = $empresa;
	}
	
	public function getEmpresa(){
		return $this->empresa;
	}
	
}
