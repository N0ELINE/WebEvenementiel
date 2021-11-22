<?php

class Event
{
    private $idEvent;
    private $nom;
    private $description;
    private $date;
    private $heure;
    private $dureeMinute;
    private $effectifMax;
    private $localisation;
    private $photoPath;


    function Event()
    {
    }

    function getId()
    {
        return $this->idEvent;
    }

    function getNom()
    {
        return $this->nom;
    }
    function getDescription()
    {
        return $this->description;
    }
    function getDate()
    {
        return $this->date;
    }
    function getHeure()
    {
        return $this->heure;
    }
    function getDureeMinute()
    {
        return $this->dureeMinute;
    }
    function getEffectifMax()
    {
        return $this->effectifMax;
    }
    function getLocalisation()
    {
        return $this->localisation;
    }
    function getPhotoPath()
    {
        return $this->photoPath;
    }


    function setNom($nom)
    {
        $this->nom = $nom;
    }
    function setDescription($description)
    {
        $this->description = $description;
    }
    function setDate($date)
    {
        $this->date = $date;
    }
    function setHeure($heure)
    {
        $this->heure = $heure;
    }
    function setDureeMinute($dureeMinute)
    {
        $this->dureeMinute = $dureeMinute;
    }
    function setEffectifMax($effectifMax)
    {
        $this->effectifMax = $effectifMax;
    }
    function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }
    function setPhotoPath($photoPath)
    {
        $this->photoPath = $photoPath;
    }
}
