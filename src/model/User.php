<?php

class User {
    private $Id;
    private $Mail;
    private $hashMdp;
    private $Droit;

    function User(){
        
    }
    function getId() {
        return $this->Id;
    }
    function getMail() {
        return $this->Mail;
    }

    function getMdp() {
        return $this->hashMdp;
    }

    function getDroit() {
        return $this->Droit;
    }
    
    function setMail($mail) {
        $this->Mail = $mail;
    }

    function setMdp($mdp) {
        $this->hashMdp = $mdp;
    }
    
    function setDroit($droit) {
        $this->Droit = $droit;
    }
}

