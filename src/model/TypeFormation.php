<?php

class TypeFormation{
    private $idType;
    private $libelleFormation;


    function TypeFormation(){}

    function getIdType(){
        return $this->idType;
    }
    function getlibelleFormation(){
        return $this->libelleFormation;
    }
    

    function setIdType($idType) {
        $this->idType = $idType;
    }
    function setLibelleFormation($libelleFormation) {
        $this->libelleFormation = $libelleFormation;
    }
   

}