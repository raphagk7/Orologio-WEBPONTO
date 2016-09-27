<?php
class Empresa {
	private $id;
	private $razaosocial;
	private $cnpj;
	private $ativa;
	private $logradouro;
	private $numeroendereco;
	private $cep;
	private $bairro;
	private $cidade;
	private $uf;
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setRazaoSocial($razaosocial) {
		$this->razaosocial = $razaosocial;
	}
	public function getRazaoSocial() {
		return $this->razaosocial;
	}
	public function setCnpj($cnpj) {
		$this->cnpj = $cnpj;
	}
	public function getcnpj() {
		return $this->cnpj;
	}
	public function setAtiva($ativa) {
		$this->ativa = $ativa;
	}
	public function getAtiva() {
		return $this->ativa;
	}
	public function setLogradouro($logradouro) {
		$this->logradouro = $logradouro;
	}
	public function getLogradouro() {
		return $this->logradouro;
	}
	public function setNumeroEndereco($numeroendereco) {
		$this->numeroendereco = $numeroendereco;
	}
	public function getNumeroEndereco() {
		return $this->numeroendereco;
	}
	public function setCep($cep) {
		$this->cep = $cep;
	}
	public function getCep() {
		return $this->cep;
	}
	public function setBairro($bairro) {
		$this->bairro = $bairro;
	}
	public function getBairro() {
		return $this->bairro;
	}
	public function setCidade($cidade) {
		$this->cidade = $cidade;
	}
	public function getCidade() {
		return $this->cidade;
	}
	public function setUf($uf) {
		$this->uf = $uf;
	}
	public function getUf() {
		return $this->uf;
	}
}