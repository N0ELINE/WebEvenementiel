<?php

class Participe {
    private $idEventParticipe;
    private $idUserParticipe;
    private $nbrPersonnes;

    
    function Participe(){
        
    }
    
    function getIdEventParticipe() {
        return $this-> idEventParticipe;
    }

    function setIdEventParticipe($idEventParticipe) {
        $this->idEventParticipe = $idEventParticipe;
    }

    function getIdUserParticipe() {
        return $this->idUserParticipe;
    }
    
    function setIdUserParticipe($idUserParticipe) {
        $this->idUserParticipe = $idUserParticipe;
    }

    function getNbrPersonnes() {
        return $this->nbrPersonnes;
    }
    
    function setNbrPersonnes($nbrPersonnes) {
        $this->nbrPersonnes = $nbrPersonnes;
    }
    
}

