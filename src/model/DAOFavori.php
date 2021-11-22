<?php

require_once 'Favori.php';
require_once 'singleton.php';

 
Class DAOFavori{

    function findById($id) : object {
        $requete = $this->cnx -> prepare("SELECT * FROM FAVORI WHERE idUserFavori = :id");
        $requete -> bindValue(':id', $id, PDO::PARAM_INT);
        $j = $requete -> execute();
        $result = $requete->fetchObject('Favori'); 
        return $result;
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

    public function saveFavoris(Favori $Favori){
       
        $cnx=$this->cnx;
       
        $idUser=$Favori->getIdUserFavori();
        $idArticle=$Favori->getIdArticleFavori();
        
        //requete sql
        $SQLS="INSERT INTO FAVORI (idUserFavori,idArticleFavori) VALUES (:idUserFavori,:idArticleFavori";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":idUserFavori",$idUser, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idArticleFavori",$idArticle, PDO::PARAM_STR);
        $prepareStatementSave->execute();
    }

    public function update(Favori $Favori){
        
        $cnx=$this->cnx;

        $idUser=$Favori->getIdUserFavori();
        $idArticle=$Favori->getIdArticleFavori();

        //requete sql
        $SQLU="UPDATE FAVORI SET idArticleFavori=:idArticle, idUserFavori=:idUserFavori WHERE idArticleFavori=:idArticle";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);
        $prepareStatementSave->bindValue(":idUserFavori",$idUser, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idArticle",$idArticle, PDO::PARAM_STR);
        $prepareStatementUpdate->execute();
    }
    

}
