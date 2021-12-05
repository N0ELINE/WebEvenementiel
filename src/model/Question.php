<?php

class Question {
    private $idQuestion;
    private $idQuestionFormation;
    private $libelle;

    function Question(){
        
    }
    function getIdQuestion() {
        return $this->idQuestion;
    }
    function getIdQuestionFormation() {
        return $this->idQuestionFormation;
    }
    function getLibelle() {
        return $this->libelle;
    }
    
    function setIdQuestion($idQuestion) {
        $this->idQuestion = $idDifidQuestionficultée;
    }

    function setIdQuestionFormation($idQuestionFormation) {
        $this->idQuestionFormation = $idQuestionFormation;
    }
    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }
  
}

