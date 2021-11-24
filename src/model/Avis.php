<?php

class Avis {
    private $idAvis;
    private $contenu;
    private $etoiles;
    private $idUserAvis;
    private $idConcerneFormaEvent;

    function Avis(){}

    function getId(){
        return $this->idAvis;
    }
    function getContenu(){
        return $this->contenu;
    }
    function getEtoiles(){
        return $this->etoiles;
    }
    function getidUserAvis(){
        return $this->idUserAvis;
    }
    function getidConcerne(){
        return $this->idConcerneFormaEvent;
    }

    function setContenu($Contenu) {
        $this->contenu = $Contenu;
    }
    function setEtoiles($Etoiles) {
        $this->etoiles = $Etoiles;
    }
    function setidUserAvis($idUserAvis) {
        $this->idUserAvis = $idUserAvis;
    }
    function setidConcerne($idConcerneFormaEvent) {
        $this->idConcerneFormaEvent = $idConcerneFormaEvent;
    }

}