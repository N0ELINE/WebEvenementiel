<?php

class Photo {
    private $idPhoto;
    private $lien;

    
    function Photo() {
        
    }
    
    function getId() {
        return $this-> idPhoto;
    }

    function getLien() {
        return $this->lien;
    }
    
    function setLien($lien) {
        $this->lien = $lien;
    }
    
}

