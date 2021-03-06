<?php

require_once 'Formation.php';
require_once 'singleton.php';

 
Class DAOFormation {//
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx; 
    }    
    
    function findById($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM FORMATION WHERE idFormation = :id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $j = $requete -> execute();
            $result = $requete->fetchObject('Formation'); 
            return $result;
    }

    function findByTypeFormationFormation($id) : object {
        $requete = $this->cnx -> prepare("SELECT * FROM FORMATION WHERE idTypeFormation = :id");
        $requete -> bindValue(':id', $id, PDO::PARAM_INT);
        $j = $requete -> execute();
        $result = $requete->fetchObject('Formation'); 
        return $result;
    }
    function findAllTypeFormation() {
        $requete = $this->cnx -> prepare("SELECT * FROM TYPEFORMATION");
        $requete -> execute();
            $type = array();
            while ( $result = $requete->fetchObject('TypeFormation') ){
                $type[] = $result; 
            };
            return $type; 
    }

    
    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM FORMATION");
            $requete -> execute();
            $Formation = array();
            while ( $result = $requete->fetchObject('Formation') ){
                $Formation[] = $result; 
            };
            return $Formation;       
    }

    public function remove($id){
            $requete = $this->cnx -> prepare("DELETE FROM FORMATION WHERE idFormation=:id");
            $requete->bindValue("id", $id,PDO::PARAM_INT);
            $requete -> execute();
    }
    
    public function saveFormation(Formation $Formation){
       
        $cnx=$this->cnx;
       
        $idFormation=$Formation->getIdFormation();
        $nom=$Formation->getNom();
        $description=$Formation->getDescription();
        $dureeHeure=$Formation->getDureeHeure();
        $idTypeFormation=$Formation->getIdTypeFormation();
        $idDifficult??eFormation=$Formation->getIdDifficult??eFormation();
        
        //requete sql
        $SQLS="INSERT INTO USER (idFormation,nom,description,dureeHeure,idTypeFormation,idDifficult??eFormation) VALUES (:idFormation,:nom,:description,:dureeHeure,:idTypeFormation,:idDifficult??eFormation)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":idFormation",$idFormation, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":nom",$nom, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":description",$description, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":dureeHeure",$dureeHeure, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idTypeFormation",$idTypeFormation, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idDifficult??eFormation",$idDifficult??eFormation, PDO::PARAM_STR);

        $prepareStatementSave->execute();
    }

    
    
    public function update(User $User){
        
        $cnx=$this->cnx;
       
        $idFormation=$Formation->getIdFormation();
        $nom=$Formation->getNom();
        $description=$Formation->getDescription();
        $dureeHeure=$Formation->getDureeHeure();
        $idTypeFormation=$Formation->getIdTypeFormation();
        $idDifficult??eFormation=$Formation->getIdDifficult??eFormation();

        //requete sql
        $SQLU="UPDATE FORMATION SET description=:description,dureeHeure=:dureeHeure,idTypeFormation=:idTypeFormation,idDifficult??eFormation=:idDifficult??eFormation, nom=:nom WHERE idFormation=:idFormation";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);
        $prepareStatementSave->bindValue(":idFormation",$idFormation, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":nom",$nom, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":description",$description, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":dureeHeure",$dureeHeure, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idTypeFormation",$idTypeFormation, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idDifficult??eFormation",$idDifficult??eFormation, PDO::PARAM_STR);

        $prepareStatementUpdate->execute();
    }
    
}
