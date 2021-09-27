<?php

class User {
    private $Id;
    private $Mail;
    private $Mdp;
    
    function User() {
        
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
    
    function setLogin($Mail) {
        $this->Mail = $Mail;
    }

    function setMdp($Mdp) {
        $this->Mdp = $Mdp;
    }
    
}

