<?php
class RegistroHoras {
	private $id;
	private $idFuncionario;
	private $data;
	private $horainicial;
	private $saidaalmoco;
	private $retornoalmoco;
	private $saidafinal;
	private $nome;
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setIdFuncionario($idFuncionario) {
		$this->idFuncionario = $idFuncionario;
	}
	public function getIdFuncionario() {
		return $this->idFuncionario;
	}
	public function setData($data) {
		$this->data = $data;
	}
	public function getData() {
		return $this->data;
	}
	public function setHoraInicial($horainicial) {
		$this->horainicial = $horainicial;
	}
	public function getHoraInicial() {
		return $this->horainicial;
	}
	public function setSaidaAlmoco($saidaalmoco) {
		$this->saidaalmoco = $saidaalmoco;
	}
	public function getSaidaAlmoco() {
		return $this->saidaalmoco;
	}
	public function setRetornoAlmoco($retornoalmoco) {
		$this->retornoalmoco = $retornoalmoco;
	}
	public function getRetornoAlmoco() {
		return $this->retornoalmoco;
	}
	public function setSaidaFinal($saidafinal) {
		$this->saidafinal = $saidafinal;
	}
	public function getSaidaFinal() {
		return $this->saidafinal;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getNome(){
		return $this->nome;
	}
}
?>