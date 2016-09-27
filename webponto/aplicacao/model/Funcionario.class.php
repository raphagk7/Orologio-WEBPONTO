<?php
class Funcionario {
	private $id;
	private $nome;
	private $ativo;
	private $datanascimento;
	private $cargo;
	private $dataadmissao;
	private $cpf;
	private $empresa;
	private $nctps;
	private $salario;
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getNome() {
		return $this->nome;
	}
	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}
	public function getAtivo() {
		return $this->ativo;
	}
	public function setDataNascimento($datanascimento) {
		$this->datanascimento = $datanascimento;
	}
	public function getDataNascimento() {
		return $this->datanascimento;
	}
	public function setCargo($cargo) {
		$this->cargo = $cargo;
	}
	public function getCargo() {
		return $this->cargo;
	}
	public function setDataAdmissao($dataadmissao) {
		$this->dataadmissao = $dataadmissao;
	}
	public function getDataAdmissao() {
		return $this->dataadmissao;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	public function getCpf() {
		return $this->cpf;
	}
	public function setEmpresa($empresa) {
		$this->empresa = $empresa;
	}
	public function getEmpresa() {
		return $this->empresa;
	}
	public function setNctps($nctps) {
		$this->nctps = $nctps;
	}
	public function getNctps() {
		return $this->nctps;
	}
	public function setSalario($salario) {
		$this->salario = $salario;
	}
	public function getSalario() {
		return $this->salario;
	}
}