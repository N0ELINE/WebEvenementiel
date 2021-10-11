<?php

class Event {
    private $idEvent;
    private $nom;
    private $description;
    private $date;
    private $heure;
    private $dureeMinute;
    private $effectifMax;
    private $localisation;
    private $photoPath;
    private $participants;

    
    function Event(){
        
    }
    
    function getId() {
        return $this-> idEvent;
    }

    function getNom() {
        return $this->nom;
    }
    
    function setDescription($description) {
        $this->description = $description;
    }

    function getDate() {
        return $this->date;
    }
    
    function setDate($date) {
        $this->date = $date;
    }

    function getHeure() {
        return $this->heure;
    }
    
    function setHeure($heure) {
        $this->heure = $heure;
    }

    function getDureeMinute() {
        return $this->dureeMinute;
    }
    
    function setDureeMinute($dureeMinute) {
        $this->dureeMinute = $dureeMinute;
    }

    function getEffectifMax() {
        return $this->effectifMax;
    }
    
    function setEffectifMax($effectifMax) {
        $this->effectifMax = $effectifMax;
    }

    function getLocalisation() {
        return $this->localisation;
    }
    
    function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    function getPhotoPath() {
        return $this->photoPath;
    }
    
    function setPhotoPath($photoPath) {
        $this->photoPath = $photoPath;
    }
    
}

