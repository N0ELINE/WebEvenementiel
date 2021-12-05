<?php

class Notife {
    private $idUserNotifie;
    private $idNotifNotifie;
    private $consulte;

    function Notife(){}

    function getIdUserNotifie(){
        return $this->idUserNotifie;
    }
    function getidNotifNotifie(){
        return $this->idNotifNotifie;
    }
    function getConsulte(){
        return $this->consulte;
    }

    function setIdUserNotifie($idUserNotifie) {
        $this->idUserNotifie = $idUserNotifie;
    }
    function setIdNotifNotifie($idNotifNotifie) {
        $this->idNotifNotifie = $idNotifNotifie;
    }
    function setConsulte($consulte) {
        $this->consulte = $consulte;
    }


}