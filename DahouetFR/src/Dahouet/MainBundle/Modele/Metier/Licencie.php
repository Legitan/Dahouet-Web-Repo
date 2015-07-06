<?php
namespace Dahouet\MainBundle\Modele\Metier;

class Licencie{
	
	
	private $numLic;
	private $nomLic;
	private $ptsFfv;
	private $annLic;
	private $datNaiss;
	
	
	public function __construct($numLic, $nomLic, $ptsFfv, $annLic, $datNaiss){
		$this->numLic = $numLic;
		$this->nomLic = $nomLic;
		$this->ptsFfv = $ptsFfv;
		$this->annLic = $annLic;
		$this->datNaiss = $datNaiss;
		
	}
	public function getNumLic() {
		return $this->numLic;
	}
	public function setNumLic($numLic) {
		$this->numLic = $numLic;
		return $this;
	}
	public function getNomLic() {
		return $this->nomLic;
	}
	public function setNomLic($nomLic) {
		$this->nomLic = $nomLic;
		return $this;
	}
	public function getPtsFfv() {
		return $this->ptsFfv;
	}
	public function setPtsFfv($ptsFfv) {
		$this->ptsFfv = $ptsFfv;
		return $this;
	}
	public function getAnnLic() {
		return $this->annLic;
	}
	public function setAnnLic($annLic) {
		$this->annLic = $annLic;
		return $this;
	}
	public function getDatNaiss() {
		return $this->datNaiss;
	}
	public function setDatNaiss($datNaiss) {
		$this->datNaiss = $datNaiss;
		return $this;
	}
	
	
	
	
}