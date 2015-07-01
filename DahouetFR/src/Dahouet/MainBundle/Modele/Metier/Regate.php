<?php
namespace Dahouet\MainBundle\Modele\Metier;

class Regate{
	
	
	private $NUMREG;
	private $CDOCHAL;
	private $CODCOM;
	private $LIBREG;
	private $DATREG;
	private $LIEUREG;
	private $DISTANCE;
	private $HEURDEP;
	
	
	public function __construct($NUMREG, $CDOCHAL, $CODCOM, $LIBREG, $DATREG, $LIEUREG, $DISTANCE, $HEURDEP){
		$this->NUMREG = $NUMREG;
		$this->CDOCHAL = $CDOCHAL;
		$this->CODCOM = $CODCOM;
		$this->LIBREG = $LIBREG;
		$this->DATREG = $DATREG;
		$this->LIEUREG = $LIEUREG;
		$this->DISTANCE = $DISTANCE;
		$this->HEURDEP = $HEURDEP;
	}
	public function getNUMREG() {
		return $this->NUMREG;
	}
	public function setNUMREG($NUMREG) {
		$this->NUMREG = $NUMREG;
		return $this;
	}
	public function getCDOCHAL() {
		return $this->CDOCHAL;
	}
	public function setCDOCHAL($CDOCHAL) {
		$this->CDOCHAL = $CDOCHAL;
		return $this;
	}
	public function getCODCOM() {
		return $this->CODCOM;
	}
	public function setCODCOM($CODCOM) {
		$this->CODCOM = $CODCOM;
		return $this;
	}
	public function getLIBREG() {
		return $this->LIBREG;
	}
	public function setLIBREG($LIBREG) {
		$this->LIBREG = $LIBREG;
		return $this;
	}
	public function getDATREG() {
		return $this->DATREG;
	}
	public function setDATREG($DATREG) {
		$this->DATREG = $DATREG;
		return $this;
	}
	public function getLIEUREG() {
		return $this->LIEUREG;
	}
	public function setLIEUREG($LIEUREG) {
		$this->LIEUREG = $LIEUREG;
		return $this;
	}
	public function getDISTANCE() {
		return $this->DISTANCE;
	}
	public function setDISTANCE($DISTANCE) {
		$this->DISTANCE = $DISTANCE;
		return $this;
	}
	public function getHEURDEP() {
		return $this->HEURDEP;
	}
	public function setHEURDEP($HEURDEP) {
		$this->HEURDEP = $HEURDEP;
		return $this;
	}
	
	
	
	
	
}