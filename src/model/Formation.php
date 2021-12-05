<?php

class Formation {
    private $idFormation;
    private $nom;
    private $description;
    private $dureeHeure;
    private $idTypeFormation;
    private $idDifficultéeFormation;

    function Formation(){}

    function getIdFormation(){
        return $this->idFormation;
    }
    function getNom(){
        return $this->idArticleFavori;
    }
    function getDescription(){
        return $this->description;
    }
    function getDureeHeure(){
        return $this->dureeHeure;
    }
    function getIdTypeFormation(){
        return $this->idTypeFormation;
    }
    function getIdDifficultéeFormation(){
        return $this->idDifficultéeFormation;
    }

    function setIdFormation($idFormation) {
        $this->idFormation = $idFormation;
    }
    function setNom($nom) {
        $this->nom = $nom;
    }
    function setDescription($description) {
        $this->description = $description;
    }
    function setDureeHeure($dureeHeure) {
        $this->dureeHeure = $dureeHeure;
    }
    function setIdTypeFormation($idTypeFormation) {
        $this->idTypeFormation = $idTypeFormation;
    }
    function setIdDifficultéeFormation($idDifficultéeFormation) {
        $this->idDifficultéeFormation = $idDifficultéeFormation;
    }

}