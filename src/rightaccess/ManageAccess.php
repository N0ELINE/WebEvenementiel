<?php

class ManageAccess {
    public $id;
    public $url;
    private $droit;
    private $controleur;
    private $fonction;

    function ManageAccess(){}

    function getUrl(){
        return $this->url;
    }
    function getDroit(){
        return $this->droit;
    }
    function getControleur(){
        return $this->controleur;
    }
    function getFonction(){
        return $this->fonction;
    }
}