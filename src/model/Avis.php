<?php

class Avis {
    private $Id;
    private $Contenu;
    private $Etoiles;
    private $idUserAvis;
    private $idConcerneFormaEvent;

    function Avis(){}

    function getId(){
        return $this->Id;
    }
    function getContenu(){
        return $this->Contenu;
    }
    function getEtoiles(){
        return $this->Etoiles;
    }
    function getidUserAvis(){
        return $this->idUserAvis;
    }
    function getidConcerne(){
        return $this->idConcerneFormaEvent;
    }

    function setContenu($Contenu) {
        $this->Contenu = $Contenu;
    }
    function setEtoiles($Etoiles) {
        $this->Etoiles = $Etoiles;
    }
    function setidUserAvis($idUserAvis) {
        $this->idUserAvis = $idUserAvis;
    }
    function setidConcerne($idConcerneFormaEvent) {
        $this->idConcerneFormaEvent = $idConcerneFormaEvent;
    }

}