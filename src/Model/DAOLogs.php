<?php

require_once 'Logs.php';
require_once 'singleton.php';

 
Class DAOUser {
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx;
    }    
    
    function find($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM LOGS WHERE idUserLogs=:id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $requete -> execute();
            $result = $requete->fetchObject('Logs');
            return $result;
    }
    
    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM LOGS");
            $requete -> execute();      
            $Logs = array();
            while ( $result = $requete->fetchObject('Logs') ){
                $Logs[] = $result; 
            };
            return $Logs;       
    }
    
    public function saveLogs(Logs $Log){
       
        $cnx=$this->cnx;
        $Id=$Log->getId();
        $Date=$Log->getDate();
        $Heure=$Log->getHeure();
        
        //requete sql
        $SQLS="INSERT INTO LOGS (idUserLogs,dateu,heure) VALUES (:idUserLogs,:dateu,:heure)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":idUserLogs",$Id, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":dateu",$Dateu, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":heure",$Heure, PDO::PARAM_STR);

        $prepareStatementSave->execute();
    }
    
}
