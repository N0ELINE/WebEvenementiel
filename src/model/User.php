<?php

class User {
    private $idUser;
    private $Mail;
    private $hashMdp;
    private $droit;

    function User(){
        
    }
    function getId() {
        return $this->idUser;
    }
    function getMail() {
        return $this->Mail;
    }

    function getMdp() {
        return $this->hashMdp;
    }

    function getDroit() {
        return $this->droit;
    }
    
    function setMail($mail) {
        $this->Mail = $mail;
    }

    function setMdp($mdp) {
        $this->hashMdp = $mdp;
    }
    
    function setDroit($droit) {
        $this->droit = $droit;
    }
}

