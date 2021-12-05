<?php

require_once 'Photo.php';
require_once 'singleton.php';

 
Class DAOPhoto {
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx;
    }    
    
    function find($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM PHOTO WHERE idPhoto=:id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $requete -> execute();
            $result = $requete->fetchObject('Photo');
            return $result;
    }
    
    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM PHOTO");
            $requete -> execute();      
            $Photo = array();
            while ( $result = $requete->fetchObject('Photo') ){
                $Photo[] = $result; 
            };
            return $Photo;       
    }
    
    public function remove($id){
            $requete = $this->cnx -> prepare("DELETE FROM PHOTO WHERE idPhoto=:id");
            $requete->bindValue("id", $id,PDO::PARAM_INT);
            $requete -> execute();
    }
    
    public function savePhoto(Photo $Photo){
       
        $cnx=$this->cnx;
       
        $lien=$Photo->getLien();
        
        //requete sql
        $SQLS="INSERT INTO PHOTO (lien) VALUES (:lien)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":lien",$lien, PDO::PARAM_STR);

        $prepareStatementSave->execute();
    }

    public function update(Photo $Photo){
        
        $cnx=$this->cnx;
       
        $idPhoto=$Photo->getId();
        $Lien=$Photo->getMail();

        //requete sql
        $SQLU="UPDATE PHOTO SET Lien=:Lien WHERE idPhoto=:id";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);
        $prepareStatementUpdate->bindValue(":id",$idPhoto, PDO::PARAM_INT);
        $prepareStatementUpdate->bindValue(":Lien",$Lien, PDO::PARAM_STR);

        $prepareStatementUpdate->execute();
    }
    
}
