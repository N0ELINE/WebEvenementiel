<?php

require_once 'Logs.php';
require_once 'singleton.php';

 
Class DAOLogs {
    
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
       
        $idUser=$Log->getIdUser();
        $Date=$Log->getDate();
        $Heure=$Log->getHeure();
        
        //requete sql
        $SQLS="INSERT INTO LOGS (idUserLogs,dateu,heure) VALUES (:idUserLogs,:dateu,:heure)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":idUserLogs",$idUser, PDO::PARAM_INT);
        $prepareStatementSave->bindValue(":dateu",$Date, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":heure",$Heure, PDO::PARAM_STR);
        var_dump("nodenkovfe");
        $result=$prepareStatementSave->execute();
        if($result===false){
            var_dump($result);
            var_dump($prepareStatementSave->errorInfo());
        }
    }

    
}
