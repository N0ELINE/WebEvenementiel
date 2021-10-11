<?php

class Photo {
    private $idEventGalerie;
    private $idPhotoGalerie;

    
    function Photo() {
        
    }
    
    function getIdPhotoGalerie() {
        return $this-> idPhotoGalerie;
    }

    function setIdPhotoGalerie($idPhotoGalerie) {
        $this->idPhotoGalerie = $idPhotoGalerie;
    }

    function getIdEventGalerie() {
        return $this->idEventGalerie;
    }
    
    function setIdEventGalerie($idEventGalerie) {
        $this->idEventGalerie = $idEventGalerie;
    }
    
}

