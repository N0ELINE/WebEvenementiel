<?php

class Commence {
    private $idFormationCommence;
    private $idUserCommence;
    private $avancement;
    private $dateDebut;

    function Commence(){}

    function getIdFormationCommence(){
        return $this->idFormationCommence;
    }
    function getidUserCommence(){
        return $this->idUserCommence;
    }
    function getAvancement(){
        return $this->avancement;
    }
    function getDateDebut(){
        return $this->dateDebut;
    }
     
    function setIdFormationCommence($idFormationCommence) {
        $this->idFormationCommence = $idFormationCommence;
    }
    function setIdUserCommence($idUserCommence) {
        $this->idUserCommence = $idUserCommence;
    }
     
    function setAvancement($avancement) {
        $this->avancement = $avancement;
    }
    function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;
    }

}