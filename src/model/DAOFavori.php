<?php

require_once 'Favori.php';
require_once 'singleton.php';

 
Class DAOFavori{

    private $cnx;

    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx; 
    }  


    public function findById($id) :Array {
        $requete = $this->cnx -> prepare("SELECT * FROM FAVORI WHERE idUserFavori = :id");
        $requete -> bindValue(':id', $id, PDO::PARAM_INT);
        $requete -> execute();
        $Favoris = array();
        while ( $result = $requete->fetchObject('Favori') ){
            $Favoris[] = $result; 
        };
        return $Favoris;       
    }

    public function findAll() :Array {
        $requete = $this->cnx -> prepare("SELECT * FROM FAVORI");
        $requete -> execute();
        $Favoris = array();
        while ( $result = $requete->fetchObject('Favori') ){
            $Favoris[] = $result; 
        };
        return $Favoris;       
    }

    public function remove($idUser,$idArticle){
        $requete = $this->cnx -> prepare("DELETE FROM FAVORI WHERE idUserFavori=:idUser AND idArticleFavori=:idFavori");
        $requete->bindValue("idUser", $idUser,PDO::PARAM_INT);
        $requete->bindValue("idFavori", $idArticle,PDO::PARAM_INT);
        $requete -> execute();
    
    }

    public function saveFavori(Favori $Favori){
       
        $cnx=$this->cnx;
       
        $idUserFavori=$Favori->getIdUserFavori();
        $idArticleFavori=$Favori->getIdArticleFavori();
        
        //requete sql
        $SQLS="INSERT INTO FAVORI (idUserFavori,idArticleFavori) VALUES (:idUserFavori,:idArticleFavori)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":idUserFavori",$idUserFavori, PDO::PARAM_INT);
        $prepareStatementSave->bindValue(":idArticleFavori",$idArticleFavori, PDO::PARAM_INT);
        $result=$prepareStatementSave->execute();
        if($result===false){
            var_dump($result);
            var_dump($prepareStatementSave->errorInfo());
        }
    }

    

}
