<?php

class Article {
    private $Id;
    private $Nom;
    private $Description;
    private $Contenu;
    private $Date;
    private $idPhotoArticle;


    function Article(){}

    function getNom(){
        return $this->Nom;
    }
    function getDescription(){
        return $this->Description;
    }
    function getContenu(){
        return $this->Contenu;
    }
    function getDate(){
        return $this->Date;
    }
    function getidPhotoArticle(){
        return $this->idPhotoArticle;
    }
    function getId(){
        return $this->Id;
    }

    function setNom($Nom) {
        $this->Nom = $Nom;
    }
    function setDescription($Description) {
        $this->Description = $Description;
    }
    function setContenu($Contenu) {
        $this->Contenu = $Contenu;
    }
    function setDate($Date) {
        $this->Date = $Date;
    }
    function setidPhotoArticle($idPhotoArticle) {
        $this->idPhotoArticle = $idPhotoArticle;
    }
}