<?php

class Droits {
    private $Id;
    private $libelleDroit;
    
    function Droits() {
        
    }
    
    function getId() {
        return $this->Id;
    }

    function getLibelle() {
        return $this->Libelle;
    }
    
    function setLibelle($Libelle) {
        $this->Libelle = $Libelle;
    }
    
}

