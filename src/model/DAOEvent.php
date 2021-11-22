<?php

require_once 'Event.php';
require_once 'singleton.php';

 
Class DAOEvent{
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx;
    }    
    
    function find($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM EVENT WHERE idEvent=:id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $requete -> execute();
            $result = $requete->fetchObject('Event');
            return $result;
    }
    
    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM EVENT");
            $requete -> execute();      
            $Event = array();
            while ( $result = $requete->fetchObject('Event') ){
                
                $Participe[] = $result; 

            };
            return $Event;       
    }
    
    public function remove($id){
            $requete = $this->cnx -> prepare("DELETE FROM EVENT WHERE idEvent=:id");
            $requete->bindValue("id", $id,PDO::PARAM_INT);
            $requete -> execute();
    }
    
   public function save(Event $Event){
       
        $cnx=$this->cnx;

        $nom=$Event->getNom();
        $description=$Event->getDescription();
        $date=$Event->getDate();
        $heure=$Event->getHeure();
        $dureeMinute=$Event->getDureeMinute();
        $effectifMax=$Event->getEffectifMax();
        $localisation=$Event->getLocalisation();
        $photoIdPath=$Event->getPhotoPath();
        
        //requete sql
        $SQLS="INSERT INTO EVENT (nom, description, date, heure, dureeMinute, effectifMax, localisation, idPhotoEvent) 
        VALUES (:nom, :description, :date, :heure, :dureeMinute, :effectifMax, :localisation, :photoIdPath)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":nom",$nom, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":description",$description, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":date",$date, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":heure",$heure, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":dureeMinute",$dureeMinute, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":effectifMax",$effectifMax, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":localisation",$localisation, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idPhotoEvent",$photoIdPath, PDO::PARAM_STR);

        $prepareStatementSave->execute();
    }

    public function update(Event $Event){
        
        $cnx=$this->cnx;
       
        $idEvent=$Event->getId();
        $nom=$Event->getNom();
        $description=$Event->getDescription();
        $date=$Event->getDate();
        $heure=$Event->getHeure();
        $dureeMinute=$Event->getDureeMinute();
        $effectifMax=$Event->getEffectifMax();
        $localisation=$Event->getLocalisation();
        $photoIdPath=$Event->getPhotoPath();

        //requete sql
        $SQLU="UPDATE USER SET nom=:nom, description=:description, date=:date, heure=:heure, dureeMinute=:dureeMinute, effectifMax=:effectifMax, localisation=:localisation, idPhotoEvent=:idPhotoEvent WHERE idEvent=:id";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);

        $prepareStatementUpdate->bindValue(":id",$idEvent, PDO::PARAM_STR);

        $prepareStatementUpdate->bindValue(":nom",$nom, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":description",$description, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":date",$date, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":heure",$heure, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":dureeMinute",$dureeMinute, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":effectifMax",$effectifMax, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":localisation",$localisation, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":idPhotoEvent",$photoIdPath, PDO::PARAM_STR);

        $prepareStatementUpdate->execute();
    }
}
