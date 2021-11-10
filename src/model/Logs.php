<?php

class Logs {
    private $idUserLogs;
    private $dateu;
    private $heure;
    
    function Logs() {
        
    }
    
    function getIdUser() {
        return $this->idUserLogs;
    }

    function setIdUser($idUserLogs) {
        $this->idUserLogs = $idUserLogs;
    }

    function getDate() {
        return $this->dateu;
    }
    
    function setDate($dateu) {
        $this->dateu = $dateu;
    }

    function getHeure() {
        return $this->heure;
    }
    
    function setHeure($heure) {
        $this->heure = $heure;
    }
    
}

