<?php

class User {
    private $Id;
    private $Mail;
    private $Mdp;
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
        return $this->Mdp;
    }

    function getDroit() {
        return $this->Droit;
    }
    
    function setLogin($mail) {
        $this->Mail = $mail;
    }

    function setMdp($mdp) {
        $this->Mdp = $mdp;
    }
    
    function setDroit($droit) {
        $this->Droit = $droit;
    }
}

