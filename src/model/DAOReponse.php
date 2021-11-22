<?php

require_once 'Reponse.php';
require_once 'singleton.php';

 
Class DAOFormation {//
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx; 
    }    
    
    function findById($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM REPONSES WHERE idReponses = :id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $j = $requete -> execute();
            $result = $requete->fetchObject('Reponse'); 
            return $result;
    }

    
    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM REPONSES");
            $requete -> execute();
            $Formation = array();
            while ( $result = $requete->fetchObject('Reponse') ){
                $Formation[] = $result; 
            };
            return $Formation;       
    }

    public function remove($id){
            $requete = $this->cnx -> prepare("DELETE FROM REPONSES WHERE idReponses=:id");
            $requete->bindValue("id", $id,PDO::PARAM_INT);
            $requete -> execute();
    }
    
    public function saveReponse(Reponse $Reponse){
       
        $cnx=$this->cnx;
       
        $idReponses=$Reponse->getIdReponses();
        $idReponseQuestion=$Reponse->getIdReponseQuestion();
        $libelle=$Reponse->getLibelle();
        $bonne_rep=$Reponse->getBonne_rep();
       
        //requete sql
        $SQLS="INSERT INTO REPONSES (idReponses,idReponseQuestion,libelle,bonne_rep) VALUES (:idReponses,:idReponseQuestion,:libelle,:bonne_rep)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":idReponses",$idReponses, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idReponseQuestion",$idReponseQuestion, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":libelle",$libelle, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":bonne_rep",$bonne_rep, PDO::PARAM_STR);
       
        $prepareStatementSave->execute();
    }

    
    
    public function update(User $User){
        
        $cnx=$this->cnx;

        $idReponses=$Reponse->getIdReponses();
        $idReponseQuestion=$Reponse->getIdReponseQuestion();
        $libelle=$Reponse->getLibelle();
        $bonne_rep=$Reponse->getBonne_rep();
        //requete sql
        $SQLU="UPDATE QUESTIONS SET idReponseQuestion=:idReponseQuestion,bonne_rep=:bonne_rep,libelle=:libelle WHERE idReponses=:idReponses";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);
        $prepareStatementSave->bindValue(":idReponses",$idReponses, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idReponseQuestion",$idReponseQuestion, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":libelle",$libelle, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":bonne_rep",$bonne_rep, PDO::PARAM_STR);
        $prepareStatementUpdate->execute();
    }
    
}
