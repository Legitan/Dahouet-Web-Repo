<?php
namespace Dahouet\MainBundle\Modele\Metier;

class Voilier{
	
	
	private $numvoil;
	private $numclass;
	private $idmbr;
	private $nomvoil;
	private $nbrpts;
	
	public function __construct($numvoil, $numclass, $idmbr, $nomvoil, $nbrpts){
		$this->numvoil = $numvoil;
		$this->numclass = $numclass;
		$this->idmbr = $idmbr;
		$this->nomvoil = $nomvoil;
		$this->nbrpts = $nbrpts;
	}
	public function getNumvoil() {
		return $this->numvoil;
	}
	public function setNumvoil($numvoil) {
		$this->numvoil = $numvoil;
		return $this;
	}
	public function getNumclass() {
		return $this->numclass;
	}
	public function setNumclass($numclass) {
		$this->numclass = $numclass;
		return $this;
	}
	public function getIdmbr() {
		return $this->idmbr;
	}
	public function setIdmbr($idmbr) {
		$this->idmbr = $idmbr;
		return $this;
	}
	public function getNomvoil() {
		return $this->nomvoil;
	}
	public function setNomvoil($nomvoil) {
		$this->nomvoil = $nomvoil;
		return $this;
	}
	public function getNbrpts() {
		return $this->nbrpts;
	}
	public function setNbrpts($nbrpts) {
		$this->nbrpts = $nbrpts;
		return $this;
	}
	
	
	
	
}