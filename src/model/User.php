<?php

class User {
    private $Id;
    private $UserMail;
    private $Mdp;
    private $Droit;

    function User(){
        
    }
    function getId() {
        return $this->Id;
    }
    function getMail() {
        return $this->UserMail;
    }

    function getMdp() {
        return $this->Mdp;
    }

    function getDroit() {
        return $this->Droit;
    }
    
    function setMail($mail) {
        $this->IdUserMail = $mail;
    }

    function setMdp($mdp) {
        $this->Mdp = $mdp;
    }
    
    function setDroit($droit) {
        $this->Droit = $droit;
    }
}

