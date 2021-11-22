<?php

class AvisEvent {
    private $idEventAvis;
    private $idAvisEvent;

    function AvisEvent(){}

    function idEventAvis(){
        return $this->idEventAvis;
    }
    function getIdAvisEvent(){
        return $this->idAvisEvent;
    }
    
    function setIdEventAvis($idEventAvis) {
        $this->idEventAvis = $idEventAvis;
    }
    function setIdAvisEvent($idAvisEvent) {
        $this->idAvisEvent = $idAvisEvent;
    }

}