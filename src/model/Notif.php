<?php

class Notif {
    private $idNotif;
    private $date;
    private $heure;
    private $contenu;

    function Notif(){}

    function getIdNotif(){
        return $this->idNotif;
    }
    function getDate(){
        return $this->date;
    }
    function getHeure(){
        return $this->heure;
    }
    function getContenu(){
        return $this->contenu;
    }
    

    function setIdNotif($idNotif) {
        $this->idFormaidNotiftion = $idNotif;
    }
    function setDate($date) {
        $this->date = $date;
    }
    function setHeure($heure) {
        $this->heure = $heure;
    }
    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

}