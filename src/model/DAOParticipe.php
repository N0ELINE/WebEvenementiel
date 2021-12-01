<?php

require_once 'Participe.php';
require_once 'singleton.php';

 
Class DAOParticipe{
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx;
    }    
    
    //     function findOne($idevent,$iduser) : object {
    //         $requete = $this->cnx -> prepare("SELECT * FROM PARTICIPE WHERE idEventParticipe=:id1 AND idUserParticipe=:id2");
    //         $requete -> bindValue(':id1', $idevent, PDO::PARAM_INT);
    //         $requete -> bindValue(':id2', $iduser, PDO::PARAM_INT);
    //         $result=$requete->execute();
    //         if($result===false){
    //             var_dump($result);
    //             var_dump($requete->errorInfo());
    //         }
    //         return $result;
    // }

    // function findbyIdEventParticipe($id) : array {
    //         $requete = $this->cnx -> prepare("SELECT * FROM PARTICIPE WHERE idEventParticipe=:id");
    //         $requete -> bindValue(':id', $id, PDO::PARAM_INT);
    //         $requete -> execute();
    //         while ( $result = $requete->fetchObject('Participe') ){
    //             $Participe[] = $result; 
    //         };
    //         return $Participe;
    // }

    function findbyIdUserParticipe($id) : array {
        $requete = $this->cnx -> prepare("SELECT * FROM PARTICIPE WHERE idUserParticipe=:id");
        $requete -> bindValue(':id', $id, PDO::PARAM_INT);
        $requete -> execute();
        while ( $result = $requete->fetchObject('Participe') ){
            $Participe[] = $result; 
        };
        return $Participe;
    }
    
    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM PARTICIPE");
            $requete -> execute();      
            $Droits = array();
            while ( $result = $requete->fetchObject('Participe') ){
                
                $Participe[] = $result; 

            };
            return $Participe;       
    }
    
    // public function findByLibelle(string $libelle) :Array {
    //         $requete = $this->cnx -> prepare("SELECT * FROM EVENEMENT WHERE nom = :libelle");
    //         $requete -> bindValue(':libelle', $libelle, PDO::PARAM_STR);
    //         $requete -> execute();
    //         $Participe = array();
    //         while ($result = $requete->fetchObject('Participe') ){
    //             $Participe[] = $result; 
    //         }; 
    //         return $Participe;  
    // }  
    
   public function save(Participe $Participe){
       
        $cnx=$this->cnx;
       
        $idEventParticipe=$Participe->getIdEventParticipe();
        $idUserParticipe=$Participe->getIdUserParticipe();
        $nbrPersonnes=$Participe->getNbrPersonnes();
        //requete sql
        $SQLS="INSERT INTO PARTICIPE (idEventParticipe, idUserParticipe, nbrPersonnes) 
        VALUES (:idEventParticipe, :idUserParticipe, :nbrPersonnes)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":idEventParticipe",$idEventParticipe, PDO::PARAM_INT);
        $prepareStatementSave->bindValue(":idUserParticipe",$idUserParticipe, PDO::PARAM_INT);
        $prepareStatementSave->bindValue(":nbrPersonnes",$nbrPersonnes, PDO::PARAM_INT);

        $result=$prepareStatementSave->execute();
        if($result===false){
            var_dump($result);
            var_dump($prepareStatementSave->errorInfo());
        }
    }

}
