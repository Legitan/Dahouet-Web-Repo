<?php

namespace Dahouet\MainBundle\Modele\Metier;

class Participe {
	private $CODEPAR;
	private $NUMVOIL;
	private $NUMREG;
	private $NUMLICSKI;
	private $STATUS;
	private $DATEINSC;
	private $TPSREEL;
	private $CODEDEC;
	private $PLACE;
	private $TPSCOMP;
	private $HEURARR;
	private $NUMPORT;
	
	
	public function __construct($CODEPAR,$NUMVOIL,	$NUMREG,$NUMLICSKI,$STATUS,$DATEINSC,$TPSREEL,$CODEDEC,$PLACE,$TPSCOMP,$HEURARR,$NUMPORT){
		$this->CODEPAR=$CODEPAR;
		$this->NUMVOIL=$NUMVOIL;
		$this->NUMREG=$NUMREG;
		$this->NUMLICSKI=$NUMLICSKI;
		$this->STATUS=$STATUS;
		$this->DATEINSC=$DATEINSC;
		$this->TPSREEL=$TPSREEL;
		$this->CODEDEC=$CODEDEC;
		$this->PLACE=$PLACE;
		$this->TPSCOMP=$TPSCOMP;
		$this->HEURARR=$HEURARR;
		$this->NUMPORT=$NUMPORT;
	}
	public function getCODEPAR() {
		return $this->CODEPAR;
	}
	public function setCODEPAR($CODEPAR) {
		$this->CODEPAR = $CODEPAR;
		return $this;
	}
	public function getNUMVOIL() {
		return $this->NUMVOIL;
	}
	public function setNUMVOIL($NUMVOIL) {
		$this->NUMVOIL = $NUMVOIL;
		return $this;
	}
	public function getNUMREG() {
		return $this->NUMREG;
	}
	public function setNUMREG($NUMREG) {
		$this->NUMREG = $NUMREG;
		return $this;
	}
	public function getNUMLICSKI() {
		return $this->NUMLICSKI;
	}
	public function setNUMLICSKI($NUMLICSKI) {
		$this->NUMLICSKI = $NUMLICSKI;
		return $this;
	}
	public function getSTATUS() {
		return $this->STATUS;
	}
	public function setSTATUS($STATUS) {
		$this->STATUS = $STATUS;
		return $this;
	}
	public function getDATEINSC() {
		return $this->DATEINSC;
	}
	public function setDATEINSC($DATEINSC) {
		$this->DATEINSC = $DATEINSC;
		return $this;
	}
	public function getTPSREEL() {
		return $this->TPSREEL;
	}
	public function setTPSREEL($TPSREEL) {
		$this->TPSREEL = $TPSREEL;
		return $this;
	}
	public function getCODEDEC() {
		return $this->CODEDEC;
	}
	public function setCODEDEC($CODEDEC) {
		$this->CODEDEC = $CODEDEC;
		return $this;
	}
	public function getPLACE() {
		return $this->PLACE;
	}
	public function setPLACE($PLACE) {
		$this->PLACE = $PLACE;
		return $this;
	}
	public function getTPSCOMP() {
		return $this->TPSCOMP;
	}
	public function setTPSCOMP($TPSCOMP) {
		$this->TPSCOMP = $TPSCOMP;
		return $this;
	}
	public function getHEURARR() {
		return $this->HEURARR;
	}
	public function setHEURARR($HEURARR) {
		$this->HEURARR = $HEURARR;
		return $this;
	}
	public function getNUMPORT() {
		return $this->NUMPORT;
	}
	public function setNUMPORT($NUMPORT) {
		$this->NUMPORT = $NUMPORT;
		return $this;
	}
	
}