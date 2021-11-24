<?php

require_once 'Article.php';
require_once 'singleton.php';


class DAOArticle
{

    private $cnx;

    public function __construct()
    {
        $this->cnx = Singleton::getInstance()->cnx;
    }

    function find($id) : object {
        $requete = $this->cnx -> prepare("SELECT * FROM ARTICLE WHERE idArticle = :id");
        $requete -> bindValue(':id', $id, PDO::PARAM_INT);
        $j = $requete -> execute();
        $result = $requete->fetchObject('Article'); 
        return $result;
    }
    public function findAll() :Array {
        $requete = $this->cnx -> prepare("SELECT * FROM ARTICLE");
        $requete -> execute();
        $Articles = array();
        while ( $result = $requete->fetchObject('Article') ){
            $Articles[] = $result; 
        };
        return $Articles;       
    }
    public function remove($id){
        $requete = $this->cnx -> prepare("DELETE FROM ARTICLE WHERE idArticle=:id");
        $requete->bindValue("id", $id,PDO::PARAM_INT);
        $requete -> execute();
    }
}
