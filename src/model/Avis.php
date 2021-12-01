<?php

class Avis {
    private $idAvis;
    private $contenu;
    private $etoiles;
    private $idUserAvis;
    private $idEvent;

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
        return $this->idEvent;
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
    function setidConcerne($idEvent) {
        $this->idEvent = $idEvent;
    }

}