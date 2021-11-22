<?php

class AvisFormation {
    private $idFormationAvis;
    private $idAvisFormation;

    function AvisFormation(){}

    function getIdFormationAvis(){
        return $this->idFormationAvis;
    }
    function getIdAvisFormation(){
        return $this->idAvisFormation;
    }
    
    function setIdFormationAvis($idFormationAvis) {
        $this->idFormationAvis = $idFormationAvis;
    }
    function setIdAvisFormation($idAvisFormation) {
        $this->idAvisFormation = $idAvisFormation;
    }

}