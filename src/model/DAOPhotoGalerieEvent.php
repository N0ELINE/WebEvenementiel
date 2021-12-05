<?php

require_once 'Photo.php';
require_once 'singleton.php';

 
Class DAOPhotoGalerieEvent {//
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx;
    }    
    
    function findByIdEvent($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM GALERIEEVENT WHERE idEventGalerie=:id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $requete -> execute();
            while ( $result = $requete->fetchObject('PhotoGalerieEvent') ){
                $PhotoGalerieEvent[] = $result; 
            };
            return $PhotoGalerieEvent;
    }

    function findByIdPhoto($id) : object {
        $requete = $this->cnx -> prepare("SELECT * FROM GALERIEEVENT WHERE idPhotoGalerie=:id");
        $requete -> bindValue(':id', $id, PDO::PARAM_INT);
        $requete -> execute();
        $result = $requete->fetchObject('PhotoGalerieEvent');
        return $result;
}
    
    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM GALERIEEVENT");
            $requete -> execute();      
            $Photo = array();
            while ( $result = $requete->fetchObject('PhotoGalerieEvent') ){
                $PhotoGalerieEvent[] = $result; 
            };
            return $PhotoGalerieEvent;       
    }
    
    // public function remove($id){
    //         $requete = $this->cnx -> prepare("DELETE FROM GALERIEEVENT WHERE idPhotoGalerie=:id");
    //         $requete->bindValue("id", $id,PDO::PARAM_INT);
    //         $requete -> execute();
    // }
    
    // public function savePhoto(Photo $Photo){
       
    //     $cnx=$this->cnx;
       
    //     $lien=$Photo->getLien();
        
    //     //requete sql
    //     $SQLS="INSERT INTO GALERIEEVENT (lien) VALUES (:lien)";
    //     //prepare statement
    //     $prepareStatementSave=$cnx->prepare($SQLS);
    //     $prepareStatementSave->bindValue(":lien",$lien, PDO::PARAM_STR);

    //     $prepareStatementSave->execute();
    // }

    // public function update(Photo $Photo){
        
    //     $cnx=$this->cnx;
       
    //     $idPhoto=$Photo->getId();
    //     $Lien=$Photo->getMail();

    //     //requete sql
    //     $SQLU="UPDATE GALERIEEVENT SET Lien=:Lien WHERE idPhotoGalerie=:id";
       
    //     //prepare statement
    //     $prepareStatementUpdate=$cnx->prepare($SQLU);
    //     $prepareStatementUpdate->bindValue(":id",$idPhoto, PDO::PARAM_INT);
    //     $prepareStatementUpdate->bindValue(":Lien",$Lien, PDO::PARAM_STR);

    //     $prepareStatementUpdate->execute();
    // }
    
}
