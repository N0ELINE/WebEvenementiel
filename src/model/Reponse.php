<?php

class Reponse {
    private $idReponses;
    private $idReponseQuestion;
    private $libelle;
    private $bonne_rep;

    function Reponse(){
        
    }
    function getIdReponses() {
        return $this->idReponses;
    }
    function getIdReponseQuestion() {
        return $this->idReponseQuestion;
    }
    function getLibelle() {
        return $this->libelle;
    }
    function getBonne_rep() {
        return $this->bonne_rep;
    }
    
    function setIdReponses($idReponses) {
        $this->idReponses = $idReponses;
    }

    function setIdReponseQuestion($idReponseQuestion) {
        $this->idReponseQuestion = $idReponseQuestion;
    }
    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }
    function setbonne_rep($bonne_rep) {
        $this->bonne_rep = $bonne_rep;
    }
  
}

