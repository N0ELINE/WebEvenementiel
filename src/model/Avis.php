<?php

class Logs {
    private $idAvis;
    private $contenu;
    private $etoiles;
    private $idUserAvis;

    
    function Logs() {
        
    }
    
    function getId() {
        return $this-> idAvis;
    }

    function getContenu() {
        return $this->contenu;
    }
    
    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    function getEtoiles() {
        return $this->etoiles;
    }
    
    function setEtoiles($etoiles) {
        $this->etoiles = $etoiles;
    }

    function getidUserAvis() {
        return $this->idUserAvis;
    }
    
    function setidUserAvis($idUserAvis) {
        $this->idUserAvis = $idUserAvis;
    }
    
}

