<?php
namespace Dahouet\MainBundle\Modele\Metier;

class Proprietaire{
	
	
	private $idmbr;
	private $idclub;
	private $nommbr;
	private $mailmbr;
	private $pwmbr;
	
	
	public function __construct($idmbr, $idclub, $nommbr, $mailmbr, $pwmbr){
		$this->idmbr = $idmbr;
		$this->idclub = $idclub;
		$this->nommbr = $nommbr;
		$this->mailmbr = $mailmbr;
		$this->pwmbr = $pwmbr;
	}
	public function getIdmbr() {
		return $this->idmbr;
	}
	public function setIdmbr($idmbr) {
		$this->idmbr = $idmbr;
		return $this;
	}
	public function getIdclub() {
		return $this->idclub;
	}
	public function setIdclub($idclub) {
		$this->idclub = $idclub;
		return $this;
	}
	public function getNommbr() {
		return $this->nommbr;
	}
	public function setNommbr($nommbr) {
		$this->nommbr = $nommbr;
		return $this;
	}
	public function getMailmbr() {
		return $this->mailmbr;
	}
	public function setMailmbr($mailmbr) {
		$this->mailmbr = $mailmbr;
		return $this;
	}
	public function getPwmbr() {
		return $this->pwmbr;
	}
	public function setPwmbr($pwmbr) {
		$this->pwmbr = $pwmbr;
		return $this;
	}
	
}