<?php

class Difficultee {
    private $idDifficultée;
    private $libelleDifficultée;

    function Difficultee(){
        
    }
    function getIdDifficultée() {
        return $this->idDifficultée;
    }
    function getlibelleDifficultée() {
        return $this->libelleDifficultée;
    }
    
    function setIdDifficultée($idDifficultée) {
        $this->idDifficultée = $idDifficultée;
    }

    function setLibelleDifficultée($libelleDifficultée) {
        $this->libelleDifficultée = $libelleDifficultée;
    }
  
}

