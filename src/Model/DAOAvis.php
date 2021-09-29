<?php

require_once 'Avis.php';
require_once 'singleton.php';

 
Class DAOAvis{
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx;
    }    
    
    function find($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM AVIS WHERE IdDroits=:id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $requete -> execute();
            $result = $requete->fetchObject('Avis');
            return $result;
    }
    
    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM AVIS");
            $requete -> execute();      
            $Droits = array();
            while ( $result = $requete->fetchObject('Avis') ){
                $Avis[] = $result; 
            };
            return $Avis;       
    }

    public function findAllFormation() :Array {
        $requete = $this->cnx -> prepare("SELECT * FROM AVIS,AVISFORMATION WHERE idAvis=idAvisFormation");
        $requete -> execute();      
        $Droits = array();
        while ( $result = $requete->fetchObject('Avis') ){
            $Avis[] = $result; 
        };
        return $Avis;       
}

public function findAllAtelier() :Array {
    $requete = $this->cnx -> prepare("SELECT * FROM AVIS,AVISATELIER WHERE idAvis=idAtelierAvis");
    $requete -> execute();      
    $Droits = array();
    while ( $result = $requete->fetchObject('Avis') ){
        $Avis[] = $result; 
    };
    return $Avis;       
}
    
    
    public function removeFormation($id){
        $requete2= $this->cnx -> prepare("DELETE FROM AVISFORMATION WHERE idAvisFormation=:id");
        $requete2->bindValue("id", $id,PDO::PARAM_INT);
        $requete2 -> execute();
        $requete = $this->cnx -> prepare("DELETE FROM AVIS WHERE idAvis=:id");
        $requete->bindValue("id", $id,PDO::PARAM_INT);
        $requete -> execute();
    }

    public function removeAtelier($id){
            $requete2= $this->cnx -> prepare("DELETE FROM AVISATELIER WHERE idAvisAtelier=:id");
            $requete2->bindValue("id", $id,PDO::PARAM_INT);
            $requete2 -> execute();
            $requete = $this->cnx -> prepare("DELETE FROM AVIS WHERE idAvis=:id");
            $requete->bindValue("id", $id,PDO::PARAM_INT);
            $requete -> execute();
    }
    
    public function save(Avis $Avis){
        
        $cnx=$this->cnx;
        
        $contenu=$Avis->getContenu();
        $etoiles=$Avis->getEtoiles();
        
        //requete sql
        $SQLS="INSERT INTO AVIS (contenu,etoiles) VALUES (:contenu,:etoiles)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":contenu",$contenu, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":etoiles",$etoiles, PDO::PARAM_STR);

        $prepareStatementSave->execute();
    }
    
    public function update(Avis $Avis){
        
        $cnx=$this->cnx;
       
        $id=$Avis->getId();
        $Login=$Avis->getLibelle();
       
        //requete sql
        $SQLU="UPDATE DROITS SET contenu=:contenu,etoiles=:etoiles WHERE idAvis=:id";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);
        $prepareStatementUpdate->bindValue(":id",$contenu, PDO::PARAM_INT);
        $prepareStatementUpdate->bindValue(":Libelle",$etoiles, PDO::PARAM_STR);

        $prepareStatementUpdate->execute();
    }
    
}
