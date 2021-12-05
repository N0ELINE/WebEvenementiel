<?php

require_once 'Question.php';
require_once 'singleton.php';

 
Class DAOFormation {//
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx; 
    }    
    
    function findById($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM QUESTIONS WHERE idQuestion = :id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $j = $requete -> execute();
            $result = $requete->fetchObject('Question'); 
            return $result;
    }

    
    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM QUESTIONS");
            $requete -> execute();
            $Formation = array();
            while ( $result = $requete->fetchObject('Question') ){
                $Formation[] = $result; 
            };
            return $Formation;       
    }

    public function remove($id){
            $requete = $this->cnx -> prepare("DELETE FROM QUESTIONS WHERE idQuestion=:id");
            $requete->bindValue("id", $id,PDO::PARAM_INT);
            $requete -> execute();
    }
    
    public function saveQuestion(Question $Question){
       
        $cnx=$this->cnx;
       
        $idQuestion=$Question->getIdQuestion();
        $idQuestionFormation=$Question->getIdQuestionFormation();
        $libelle=$Question->getLibelle();
       
        //requete sql
        $SQLS="INSERT INTO QUESTIONS (idQuestion,idQuestion,libelle) VALUES (:idQuestion,:idQuestionFormation,:libelle)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":idQuestion",$idFormation, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idQuestionFormation",$nom, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":libelle",$description, PDO::PARAM_STR);
       
        $prepareStatementSave->execute();
    }

    
    
    public function update(User $User){
        
        $cnx=$this->cnx;
       
        $idQuestion=$Question->getIdQuestion();
        $idQuestionFormation=$Question->getIdQuestionFormation();
        $libelle=$Question->getLibelle();
       
        //requete sql
        $SQLU="UPDATE QUESTIONS SET idQuestion=:idQuestion,idQuestionFormation=:idQuestionFormation,libelle=:libelle WHERE idQuestion=:idQuestion";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);
        $prepareStatementSave->bindValue(":idQuestion",$idFormation, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idQuestionFormation",$nom, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":libelle",$description, PDO::PARAM_STR);
        $prepareStatementUpdate->execute();
    }
    
}
