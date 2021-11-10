<?php

require_once 'Participe.php';
require_once 'singleton.php';

 
Class DAOParticipe{
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx;
    }    
    
    function findOne($idevent,$iduser) : object {
        $requete = $this->cnx -> prepare("SELECT * FROM PARTICIPE WHERE idEventParticipe=:id1 AND idUserParticipe=:id2");
        $requete -> bindValue(':id1', $idevent, PDO::PARAM_INT);
        $requete -> bindValue(':id2', $iduser, PDO::PARAM_INT);
        $requete -> execute();
        $result = $requete->fetchObject('Participe');
        return $result;
}

    function findbyIdEventParticipe($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM PARTICIPE WHERE idEventParticipe=:id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $requete -> execute();
            $result = $requete->fetchObject('Participe');
            return $result;
    }

    function findbyIdUserParticipe($id) : object {
        $requete = $this->cnx -> prepare("SELECT * FROM PARTICIPE WHERE idUserParticipe=:id");
        $requete -> bindValue(':id', $id, PDO::PARAM_INT);
        $requete -> execute();
        $result = $requete->fetchObject('Participe');
        return $result;
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
    
    public function findByLibelle(string $libelle) :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM EVENT WHERE nom = :libelle");
            $requete -> bindValue(':libelle', $libelle, PDO::PARAM_STR);
            $requete -> execute();
            $Participe = array();
            while ($result = $requete->fetchObject('Participe') ){
                $Participe[] = $result; 
            }; 
            return $Participe;  
    }  
    
    public function remove($idEvent,$idUser){
            $requete = $this->cnx -> prepare("DELETE FROM EVENT WHERE idEventParticipe=:id");
            $requete->bindValue("id", $id,PDO::PARAM_INT);
            $requete -> execute();
    }
    
   public function save(Participe $Participe){
       
        $cnx=$this->cnx;
       
        $idEventParticipe=$Event->getIdEventParticipe();
        $idUserParticipe=$Event->getIdUserParticipe();
        $nbrPersonnes=$Event->getNbrPersonnes();
        //requete sql
        $SQLS="INSERT INTO EVENT (idEventParticipe, idUserParticipe, nbrPersonnes) 
        VALUES (:idEventParticipe, :idUserParticipe, :nbrPersonnes)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":idEventParticipe",$idEventParticipe, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idUserParticipe",$idUserParticipe, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":nbrPersonnes",$nbrPersonnes, PDO::PARAM_STR);

        $prepareStatementSave->execute();
    }

    public function update(Participe $User){
        
        $cnx=$this->cnx;
       
        $id=$User->getId();
        $Login=$User->getMail();
        $Mdp=$User->getMdp();

        //requete sql
        $SQLU="UPDATE USER SET idEventParticipe=:idEventParticipe, idUserParticipe=:idUserParticipe, nbrPersonnes=:nbrPersonnes WHERE idEventParticipe=:id";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);
        $prepareStatementSave->bindValue(":idEventParticipe",$idEventParticipe, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":idUserParticipe",$idUserParticipe, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":nbrPersonnes",$nbrPersonnes, PDO::PARAM_STR);

        $prepareStatementUpdate->execute();
    }

}
