<?php

require_once 'Event.php';
require_once 'singleton.php';

 
Class DAOEvent{
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx;
    }    
    
    function find($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM EVENEMENT WHERE idEvent=:id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $requete -> execute();
            $result = $requete->fetchObject('Event');
            return $result;
    }

    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM EVENEMENT");
            $requete -> execute();      
            $Event = array();
            while ( $result = $requete->fetchObject('Event') ){
                $Event[] = $result;
            };
            return $Event;       
    }
    
    public function remove($id){
            $requete = $this->cnx -> prepare("DELETE FROM EVENEMENT WHERE idEvent=:id");
            $requete->bindValue("id", $id,PDO::PARAM_INT);
            $requete -> execute();
    }
    
   

   public function save(Event $Event){
       
        $cnx=$this->cnx;

        $nom=$Event->getNom();
        $date=$Event->getDate();
        $heure=$Event->getHeure();
        
        //requete sql
        $SQLS="INSERT INTO EVENEMENT (nom,date,heure) VALUES (:nom,:date,:heure);";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":nom",$nom, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":date",$date, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":heure",$heure, PDO::PARAM_STR);
        $result=$prepareStatementSave->execute();
        if($result===false){
            var_dump($result);
            var_dump($prepareStatementSave->errorInfo());
        }
    }

    public function update(Event $Event){
        
        $cnx=$this->cnx;
       
        $idEvent=$Event->getId();
        $nom=$Event->getNom();
        $description=$Event->getDescription();
        $dureeMinute=$Event->getDureeMinute();
        $effectifMax=$Event->getEffectifMax();
        $localisation=$Event->getLocalisation();

        //requete sql
        $SQLU="UPDATE EVENEMENT SET nom=:nom, description=:description, dureeMinute=:dureeMinute, effectifMax=:effectifMax, localisation=:localisation WHERE idEvent=:id";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);

        $prepareStatementUpdate->bindValue(":id",$idEvent, PDO::PARAM_INT);

        $prepareStatementUpdate->bindValue(":nom",$nom, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":description",$description, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":dureeMinute",$dureeMinute, PDO::PARAM_INT);
        $prepareStatementUpdate->bindValue(":effectifMax",$effectifMax, PDO::PARAM_INT);
        $prepareStatementUpdate->bindValue(":localisation",$localisation, PDO::PARAM_STR);
        $result=$prepareStatementUpdate->execute();
        if($result===false){
            var_dump($result);
            var_dump($prepareStatementUpdate->errorInfo());
        }
    }

    public function findEventLastOne(){
        $requete = $this->cnx->prepare("SELECT * FROM EVENEMENT ORDER BY idEvent  DESC LIMIT 1");
        $requete->execute();
        while ($result = $requete->fetchObject('Event')) {
            $Event[] = $result;
        };
        return $Event;
    }
}
