<?php

class User {
    private $IdUserMail;
    private $Mdp;
    private $Droit;

    function User(){
        
    }

    function getMail() {
        return $this->IdUserMail;
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

