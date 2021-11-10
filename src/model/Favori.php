<?php

class Favori {
    private $idUserFavori;
    private $idArticleFavori;

    function Favori(){}

    function getIdUserFavori(){
        return $this->idUserFavori;
    }
    function getIdArticleFavori(){
        return $this->idArticleFavori;
    }
    function setIdUserFavori($idUserFavori) {
        $this->idUserFavori = $idUserFavori;
    }
    function setIdArticleFavori($idArticleFavori) {
        $this->idArticleFavori = $idArticleFavori;
    }

}