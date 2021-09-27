<?php

require_once 'User.php';
require_once 'singleton.php';

 
Class DAOUser {
    
    private $cnx;
    
    public function __construct() {
        $this->cnx = Singleton::getInstance() -> cnx;
    }    
    
    function find($id) : object {
            $requete = $this->cnx -> prepare("SELECT * FROM User WHERE IdUser=:id");
            $requete -> bindValue(':id', $id, PDO::PARAM_INT);
            $requete -> execute();
            $result = $requete->fetchObject('User');
            return $result;
    }
    
    public function findAll() :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM User");
            $requete -> execute();      
            $Users = array();
            while ( $result = $requete->fetchObject('User') ){
                $Users[] = $result; 
            };
            return $Users;       
    }
    
    public function findByMail(string $adresseMail) :Array {
            $requete = $this->cnx -> prepare("SELECT * FROM User WHERE adresseMail = :adresseMail");
            $requete -> bindValue(':adresseMail', $adresseMail, PDO::PARAM_STR);
            $requete -> execute();
            $Users = array();
            while ($result = $requete->fetchObject('User') ){
                $Users[] = $result; 
            }; 
            return $Users;  
    }  
    
    public function remove($id){
            $requete = $this->cnx -> prepare("DELETE FROM User WHERE IdUser=:id");
            $requete->bindValue("id", $id,PDO::PARAM_INT);
            $requete -> execute();
    }
    
   public function save(User $User){
       
        $cnx=$this->cnx;
       
        $Mail=$User->getMail();
        $Mdp=$User->getMdp();
        
        //requete sql
        $SQLS="INSERT INTO USER (Mail,Mdp) VALUES (:Mail,:Mdp)";
        //prepare statement
        $prepareStatementSave=$cnx->prepare($SQLS);
        $prepareStatementSave->bindValue(":Mail",$Mail, PDO::PARAM_STR);
        $prepareStatementSave->bindValue(":Mdp",$Mdp, PDO::PARAM_STR);

        $prepareStatementSave->execute();
    }
    
    public function update(User $User){
        
        $cnx=$this->cnx;
       
        $id=$User->getId();
        $Login=$User->getMail();
        $Mdp=$User->getMdp();
       
        //requete sql
        $SQLU="UPDATE USER SET Mail=:Mail, Mdp=:Mdp WHERE Id=:id";
       
        //prepare statement
        $prepareStatementUpdate=$cnx->prepare($SQLU);
        $prepareStatementUpdate->bindValue(":id",$id, PDO::PARAM_INT);
        $prepareStatementUpdate->bindValue(":Mail",$Mail, PDO::PARAM_STR);
        $prepareStatementUpdate->bindValue(":Mdp",$Mdp, PDO::PARAM_STR);

        $prepareStatementUpdate->execute();
    }
    
}
