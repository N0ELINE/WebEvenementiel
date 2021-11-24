<?php

class Article {
    private $idArticle;
    private $nom;
    private $description;
    private $contenu;
    private $date;
    private $idPhotoArticle;


    function Article(){}

    function getNom(){
        return $this->nom;
    }
    function getDescription(){
        return $this->description;
    }
    function getContenu(){
        return $this->contenu;
    }
    function getDate(){
        return $this->date;
    }
    function getidPhotoArticle(){
        return $this->idPhotoArticle;
    }
    function getId(){
        return $this->idArticle;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }
    function setDescription($Description) {
        $this->description = $Description;
    }
    function setContenu($Contenu) {
        $this->contenu = $Contenu;
    }
    function setDate($Date) {
        $this->date = $Date;
    }
    function setidPhotoArticle($idPhotoArticle) {
        $this->idPhotoArticle = $idPhotoArticle;
    }
}