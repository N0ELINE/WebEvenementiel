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
            $Users[] = $result; 
        };
        return $Users;       
    }
    public function remove($id){
        $requete = $this->cnx -> prepare("DELETE FROM ARTICLE WHERE idArticle=:id");
        $requete->bindValue("id", $id,PDO::PARAM_INT);
        $requete -> execute();
    }
    public function save(Article $Article){
       
        $cnx=$this->cnx;

        $id->$Article->getId();
        $nom=$Article->getNom();
        $description=$Article->getDescription();
        $contenu->$Article->getContenu();
        $date->$Article->getDate();
        $idPhotoArticle->$Article->getidPhotoArticle();
        
        //requete sql
        $SQLS="INSERT INTO ARTICLE (idArticle,nom,description,contenu,date,idPhotoArticle) VALUES (:id,:nom,:description,:contenu,:date,:idPhotoArticle)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":id",$id, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":nom",$nom, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":description",$description, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":contenu",$contenu, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":date",$date, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idPhotoArticle",$idPhotoArticle, PDO::PARAM_STR);
        $prepareStatementSave->execute();
    }

    public function update(Article $Article){
        
        $cnx=$this->cnx;

        $id->$Article->getId();
        $nom=$Article->getNom();
        $description=$Article->getDescription();
        $contenu->$Article->getContenu();
        $date->$Article->getDate();
        $idPhotoArticle->$Article->getidPhotoArticle();

        //requete sql
        $SQLU="UPDATE ARTICLE SET idArticle=:id,nom=:nom,description=:description,contenu=:contenu,date=:date,idPhotoArticle=:idPhotoArticle WHERE idArticle=:id";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);
        $prepareStatementUpdate->bindValue(":id",$id, PDO::PARAM_INT);
        $prepareStatementUpdate->bindValue(":nom",$nom, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":description",$description, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":contenu",$contenu, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":date",$date, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":idPhotoArticle",$idPhotoArticle, PDO::PARAM_STR);
        $prepareStatementUpdate->execute();
    }
}
