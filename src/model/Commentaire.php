<?php

class Commentaire {
    private $Id;
    private $IdArticleCommentaire;
    private $Contenu;
    private $IdPhotoArticle;
    private $IdUserCommentaire;

    function Commentaire(){}

    function getId(){
        return $this->Id;
    }
    function getIdArticleCommentaire(){
        return $this->IdArticleCommentaire;
    }
    function getContenu(){
        return $this->Contenu;
    }
    function getIdPhotoArticle(){
        return $this->IdPhotoArticle;
    }
    function getIdUserCommentaire(){
        return $this->IdUserCommentaire;
    }
    
    function setIdArticleCommentaire($IdArticleCommentaire) {
        $this->IdArticleCommentaire = $IdArticleCommentaire;
    }
    function setContenu($Contenu) {
        $this->Contenu = $Contenu;
    }
    function setIdPhotoArticle($IdPhotoArticle) {
        $this->IdPhotoArticle = $IdPhotoArticle;
    }
    function setIdUserCommentaire($IdUserCommentaire) {
        $this->IdUserCommentaire = $IdUserCommentaire;
    }

}